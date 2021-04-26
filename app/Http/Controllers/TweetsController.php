<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Location;
use App\Models\Resource;
use App\Models\Tweet;
use App\Models\TweetAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TweetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd("in");
        $request->validate([
            "content" => "required",
            "resource" => "required",
            "location" => "required",
            "tweeted_time" => "required",
        ]);

        $resource = Resource::where("name", $request->resource)->first();
        $location = Resource::where("name", $request->resource)->first();

        if(!$resource) {
            $resource = Resource::create([
                "name" => $request->resource,
            ]);
        }

        if(!$location){
            $location = Location::create([
                "name" => $request->location
            ]);
        }

        $tweet = Tweet::create([
            "content" => $request->content,
            "resource_id" => $resource->id,
            "location_id" => $location->id,
            "is_verified" => $request->verified,
            "tweeted_time" => $request->tweeted_time,
            "is_verified" => $request->is_verified ? $request->is_verified : 0,
        ]);

        if($request->attachments) {
            $attachments = json_decode($request->attachments);
            foreach($attachments as $attachment) {
                TweetAttachment::create([
                    "tweet_id" => $tweet->id,
                    "url" => $attachment,
                ]);
            }
        }

        if($request->contacts) {
            $contacts = json_decode($request->contacts);

            foreach($contacts as $contact) {
                Contact::create([
                    "tweet_id" => $tweet->id,
                    "number" => $contact,
                ]);
            }
        }

        if($request->wantsJson()) {
            if($tweet) {
                return response()->json(["message" => "record was added successfully"]);
            }
            return response()->json(["message" => "error occurred while adding record"]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function upvote(Request $request)
    {
        $request->validate([
            "id" => "required",
        ]);

        $tweet = Tweet::find($request->id);
        if($request->wantsJson()) {
            if(!$tweet) {
                return response()->json(["message" => "error while upvoting"]);
            }
        }

        $response = DB::table("tweet_upvotes")->insert([
            "tweet_id" => $tweet->id,
            "upvote" => 1,
        ]);

        if($request->wantsJson()) {
            if(!$response) {
                return response()->json(["message" => "error while upvoting"]);
            }
        }
    }
}
