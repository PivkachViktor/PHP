<?php
include 'database.php';

$db = new Database('students.csv');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_GET['action']) && $_GET['action'] == 'edit') {
        $student = $db->getStudentById($id);

        if (!$student) {
            echo 'Student not found.';
        } else {
            // Display a form for editing the student data
            // You can customize the form as needed
            echo '<form method="post" action="?id=' . $id . '&action=update">';
            echo 'Name: <input type="text" name="name" value="' . $student[1] . '"><br>';
            echo 'Course: <input type="text" name="course" value="' . $student[2] . '"><br>';
            echo 'Specialty: <input type="text" name="specialty" value="' . $student[3] . '"><br>';
            echo '<input type="submit" value="Update">';
            echo '</form>';
        }
    } elseif (isset($_GET['action']) && $_GET['action'] == 'update') {
        // Update student data
        $name = $_POST['name'];
        $course = $_POST['course'];
        $specialty = $_POST['specialty'];

        $updated = $db->updateStudent($id, [$id, $name, $course, $specialty]);

        if ($updated) {
            echo 'Student data updated successfully.';
        } else {
            echo 'Failed to update student data.';
        }
    } else {
        $student = $db->getStudentById($id);

        if (!$student) {
            echo 'Student not found.';
        } else {
            // Display student data
            echo 'ID: ' . $student[0] . '<br>';
            echo 'Name: ' . $student[1] . '<br>';
            echo 'Course: ' . $student[2] . '<br>';
            echo 'Specialty: ' . $student[3] . '<br>';
            echo '<a href="?id=' . $id . '&action=edit">Edit</a>';
        }
    }
} else {
    $students = $db->getAllStudents();

    // Display a list of students with links to view their details
    echo '<ul>';
    foreach ($students as $student) {
        echo '<li><a href="?id=' . $student[0] . '">' . $student[1] . '</a></li>';
    }
    echo '</ul>';
}
?>
