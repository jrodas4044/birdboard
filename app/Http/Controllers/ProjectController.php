<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = \App\Project::all();

        return  view('projects.index')
            ->with(compact('projects'));
    }

    public function store()
    {
        // validate
        // persist
        \App\Project::create(request(['title', 'description']));
        // redirect
        return redirect('/projects');
    }
}
