<?php

namespace App\Http\Controllers;

use App\episode;
use App\post;
use Illuminate\Http\Request;

class EpisodeController extends Controller
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
    public function create($id)
    {

        $post = post::find($id);// သူကပါလာတဲ့ အိုင််ဒီကို ပြန်ပြီးဖော်ယူတာ
//        return $post;
        return view("post.create-episode",compact("post")); //ဒေတာပြန်သယ်သွားတယ်
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "post_id"=>"required",
            "number" => "required|integer",
            "title"=> "required"
        ]);
        $episode = new episode();
        $episode->post_id = $request->post_id;
        $episode->number = $request->number;
        $episode->title = $request ->title;
        $episode->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show(episode $episode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function edit(episode $episode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, episode $episode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function destroy(episode $episode)
    {
        $episode->delete();
        return redirect()->back();
    }
}
