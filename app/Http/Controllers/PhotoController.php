<?php

namespace App\Http\Controllers;

use App\photo;
use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
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
        $post = Post::find($id);
        return view("post.upload-photo",compact("post"));
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
            "post_id" => "required",
            "images" => "required",
            "images.*" => "mimes:jpeg,png,jpg|max:1024",
        ]);

        foreach ($request->file("images") as $img){
            //ဖိုင်မှာ သိမ်းမည့်လမ်းကြောင်းဖြစ်သည်
            $dir="public/movie_multiple_photo"; //သိမ်းမည့်လမ်းကြောင်း ၃
//          $file=$request->file("images"); // ဘေအေဘယ် တစ်ခုအနေနဲ့အရင်သိမ်းလိုက်တယ် ၁
            $newName=uniqid()."_"."movie_multiple_photomovie_photo.".$img->getClientOriginalExtension();//ဖိုင်နာမည်ပြောင်းတယ် ပြီးတော့ extension ယူ ၂
            $img->storeAs($dir,$newName);//ဖိုင်သိမ်းတဲ့အဆင့်ပါ ၄

            //Database မှာ သိမ်းမည့်လမ်းကြောင်းဖြစ်သည်

        }
            $photo = new Photo();
            $photo->post_id = $request->post_id;
            $photo->location = $newName;
            $photo->save();

            $post = post::find($request->post_id);
            //return $post;
            if ($post->category_id == 1){
                return redirect()->route("upload-movie-download-link",$post->id)->with("toast","Movies Photo Added");
            }else{

                return redirect()->route("create-episode",$post->id)->with("toast","Episode Photo Added");

            }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(photo $photo)
    {
        Storage::delete("public/movie_multiple_photo".$photo->location);
        $photo->delete();
        return redirect()->back();
    }
}
