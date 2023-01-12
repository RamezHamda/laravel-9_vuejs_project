<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Offer;
use App\Models\Project;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('projects')->get();
      //  dd($categories);
        return view('front.index', compact('categories'));
    }

    public function find_jobs()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('front.find_jobs', compact('categories', 'tags'));
    }

    public function create_job()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('front.create_job', compact('categories', 'tags'));
    }

    public function profile(Request $request)
    {
        return view('front.profile');
    }

    public function project_details($slug)
    {
        $project = Project::with(['tags', 'client', 'category', 'offers'])->whereSlug($slug)->first();

        $user = auth()->id();
        $check = in_array($user, $project->offers()->pluck('freelancer_id')->toArray());

        return view('front.project_details', compact('project', 'check'));
    }

    public function my_projects()
    {
        $user = auth()->user();
        $projects = $user->projects;

        return view('front.my_projects', compact('projects'));
    }

    public function message($id, $name, $project_id)
    {
        $user = User::where('id', $id)->first();
        $project = Project::where('slug', $project_id)->first();
        $messages = $project->messages()->latest()->get();

        return view('front.message', compact('user', 'project', 'messages'));
    }
}
