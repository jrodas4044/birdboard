<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = \App\Project::all();

        return  view('projects.index')
            ->with(compact('projects'));
    }

    public function show(Project $project)
    {
        return  view('projects.show')
            ->with(compact('project'));
    }

    public function store()
    {
        auth()->user()->projects()->create( request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]));

        return redirect('/projects');
    }
}
