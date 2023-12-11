<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    protected $projects;

    public function __construct()
    {
        $this->projects = Project::all();
    }

    function debug_to_console($data) {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    public function index()
    {
        $this->debug_to_console("Index");
        return view('projects.index', ['projects' => $this->projects]);
    }
    public function create()
    {
        $this->debug_to_console("Create");
        return view('projects.create');
    }
    public function store(Request $request)
    {

        Project::create($request->all());

        return redirect('/projects')->with('success', 'Project created successfully!');
    }
    public function show($id)
    {
        $this->debug_to_console("Show");
        $project = Project::findOrFail($id);
        return view('projects.show', ['project' => $project]);
        //
    }
    public function edit($id)
    {
        $this->debug_to_console("Edit");
        $project = Project::findOrFail($id);
        return view('projects.edit', ['project' => $project]);
        //
    }
    public function update(Request $request, $id)
    {

        $project = Project::findOrFail($id);
        $project->update($request->all());
        return redirect('/projects/' . $project->id)->with('success', 'project updated successfully!');
        //
    }
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return redirect('/projects')->with('success', 'Project deleted successfully!');
    }

}
