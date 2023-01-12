<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Offer;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\TagResource;
use App\Notifications\OfferCreated;
use App\Http\Resources\UserResource;
use App\Notifications\OfferAccepted;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\CategoryResource;

class ApiController extends Controller
{
    public function get_categories()
    {
        $categories = Category::all();

        return CategoryResource::collection($categories);
    }

    public function get_tags()
    {
        $tags = Tag::all();

        return TagResource::collection($tags);
    }

    public function user_data_profile()
    {
        $user = auth()->user();
        return new UserResource($user);
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'category_id' => 'required',
            'job_title' => 'required',
            'bio' => 'required',
        ]);

        $user = auth()->user();

        $user->update([
           'name' => $request->name,
        ]);

        $user->profile()->update($request->except('name'));

        return new UserResource($user);
    }

    public function create_job(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'category_id' => 'required',
            'type' => 'required',
        ]);

        $user = auth()->user();
        $data = $request->except('tags');
        $data['slug'] = Str::slug($request->title);

        $project = $user->projects()->create($data);

        $project->tags()->attach($request->tags);

        return 'done';
    }

    public function find_job()
    {
        $projects = Project::latest()->get();
        return ProjectResource::collection($projects);
    }

    public function applyProject($id)
    {
        $project = Project::whereId($id)->first();

        $project->offers()->create([
            'freelancer_id' => auth()->id()
        ]);

        $user = User::whereId($project->client_id)->first();
        $userAuth = auth()->user()->name;
        $user->notify(new OfferCreated($project, $userAuth));

        return 'done';
    }

    public function AcceptOffer(Offer $offer)
    {
        $offer->update([
           'status' => Offer::ACCEPT
        ]);
        $project = Project::whereId($offer->project_id)->first();


        $project->offers()->where('id', '!=', $offer->id)->update([
            'status' => Offer::REJECT
        ]);
//        $user = $offer->user;
//
//        $user->notify(new OfferAccepted($project));

        return $offer;
    }

    public function RejectOffer(Offer $offer)
    {
        $offer->update([
            'status' => Offer::REJECT
        ]);

        return 'done';
    }

    public function send_message(Request $request)
    {
        $project = Project::whereId($request->project_id)->first();

        $sender_id = '';
        $receive_id = '';

        if (auth()->id() == $project->client_id) {
            $sender_id = $project->client_id;
            $receive_id = Offer::where('project_id', $request->project_id)->whereStatus(1)->first()->user->id;

        }else{
            $sender_id = Offer::where('project_id', $request->project_id)->whereStatus(1)->first()->user->id;
            $receive_id = $project->client_id;
        }
        $project->messages()->create([
            'sender_id' => $sender_id,
            'message' => $request->message,
            'receive_id' => $receive_id,
        ]);

        return 'done';
    }

    public function get_messages(Request $request)
    {
            $project = Project::whereId($request->project_id)->first();
        $messages = $project->messages()->latest()->get();
        return $messages;
    }
}
