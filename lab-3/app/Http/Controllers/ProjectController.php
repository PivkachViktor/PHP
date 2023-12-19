<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



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
        $user = Auth::user();
        $this->debug_to_console("Create");
        if (Gate::forUser($user)->allows('create-project')) {
            return view('projects.create');
        } else {
            abort(403);
        }
    }

    public function show($id)
    {
        $user = Auth::user();
        $this->debug_to_console("Show");
        $project = project::findOrFail($id);
        if (Gate::forUser($user)->allows('show-project')) {
            return view('projects.show',['project'=>$project]);
        } else {
            abort(403);
        }
    }
    public function edit($id)
    {
        $user = Auth::user();

        $project = project::findOrFail($id);
        if (Gate::forUser($user)->allows('edit-project', $project)) {
            return view('projects.edit', ['project' => $project]);
        } else {
            abort(403);
        }
    }

    public function destroy($id)
    {
        $user = Auth::user();
        $project = Project::findOrFail($id);
        if(Gate::forUser($user)->allows('delete-project',$project)){
            $project->delete();
            return redirect('/projects')->with('success', 'Project deleted successfully!');
        }else{
            abort(403);
        }

    }

    public function store(Request $request)
    {
        $validator = Validator([
            'userName' => 'required|max:255',
            'price' => 'required|numeric',
            'mark_1' => 'required',
            'mark_2' => 'required',
            'mark_3' => 'required',
        ]);

        //if ($validator->fails()) {
            //return redirect('/projects/create')
                //->withErrors($validator)
                //->withInput();
        //}
        $user = Auth::user();
        project::create(array_merge($request->all(), ['creator_user_id' => $user->id]));
        return redirect('/projects')->with('success', 'Project created successfully!');
    }

    public function update(Request $request, $id)
    {


        $validator = Validator([
            'userName' => 'required|max:255',
            'price' => 'required|numeric',
            'mark_1' => 'required',
            'mark_2' => 'required',
            'mark_3' => 'required',
        ]);

        //if ($validator->fails()) {
            //return redirect('/projects/' . $id . '/edit')
                //->withErrors($validator)
                //->withInput();
        //}
        $project = Project::findOrFail($id);
        $project->update($request->all());
        return redirect('/projects/' . $project->id)->with('success', 'project updated successfully!');
    }

}
