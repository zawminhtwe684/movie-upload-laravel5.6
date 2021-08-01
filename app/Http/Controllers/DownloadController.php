<?php

namespace App\Http\Controllers;

use App\download;
use App\post;
use Illuminate\Http\Request;

class DownloadController extends Controller
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
        $post = post::find($id);
        return view("post.upload-download-link",compact("post"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  return $request;
        $request->validate([
            "post_id" => "required",
            "link" => "required",
            "file_size" => "required",
            "server_id" => "required|exists:servers,id"
        ]);

        $download = new Download();
        if($request->episode_id){
            //for series
            $download->episode_id = $request->episode_id;
        }
        //for movie
        $download->post_id = $request->post_id;
        $download->file_size = $request->file_size;
        $download->link = $request->link;
        $download->server_id = $request->server_id;
        $download->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\download  $download
     * @return \Illuminate\Http\Response
     */
    public function show(download $download)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\download  $download
     * @return \Illuminate\Http\Response
     */
    public function edit(download $download)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\download  $download
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, download $download)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\download  $download
     * @return \Illuminate\Http\Response
     */
    public function destroy(download $download)
    {
        $download->delete();
        return redirect()->back();
    }
}
