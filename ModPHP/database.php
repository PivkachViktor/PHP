<?php
class Database {
    private $csvFile;

    public function __construct($csvFile) {
        $this->csvFile = $csvFile;
    }

    public function getAllStudents() {
        $students = [];
        if (($handle = fopen($this->csvFile, "r")) !== false) {
            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $students[] = $data;
            }
            fclose($handle);
        }
        return $students;
    }

    public function getStudentById($id) {
        $students = $this->getAllStudents();
        foreach ($students as $student) {
            if ($student[0] == $id) {
                return $student;
            }
        }
        return null;
    }

    public function updateStudent($id, $newData) {
        $students = $this->getAllStudents();
        $updated = false;

        foreach ($students as &$student) {
            if ($student[0] == $id) {
                $student = $newData;
                $updated = true;
                break;
            }
        }

        if ($updated) {
            $this->saveStudents($students);
            return true;
        }

        return false;
    }

    private function saveStudents($students) {
        if (($handle = fopen($this->csvFile, "w")) !== false) {
            foreach ($students as $student) {
                fputcsv($handle, $student);
            }
            fclose($handle);
        }
    }
}
?>
