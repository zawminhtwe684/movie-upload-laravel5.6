<?php

namespace App\Http\Controllers;

use App\Custom;
use App\download;
use App\episode;
use App\genre;
use App\photo;
use App\post;
use App\post_genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::with('category','user','genre','quality')->Latest()->paginate(5);
        return view("post.index",compact("posts"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("post.create");
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
        "name" => "required",
        "original_name" => "required",
        "release_year" => "required|integer|min:2011",
        "category" => "required|exists:categories,id",
        "quality" => "required|exists:qualities,id",
        "genre" => "required",
        "genre.*" => "exists:genres,id",
        "director" => "nullable",
        "actors" => "nullable",
        "trailer" => "nullable|url",
        "description" => "required",
        "photo" => "required|mimetypes:image/jpeg,image/png|max:512",
        ]);



        $post = new Post();
        $post->name = $request->name;
        $post->original_name = $request->original_name;
        $post->description = $request->description;

        $dir="public/movie_photo"; //သိမ်းမည့်လမ်းကြောင်း ၃
        $file=$request->file("photo"); // ဘေအေဘယ် တစ်ခုအနေနဲ့အရင်သိမ်းလိုက်တယ် ၁
        $newName=uniqid()."_"."movie_photo.".$file->getClientOriginalExtension();//ဖိုင်နာမည်ပြောင်းတယ် ပြီးတော့ extension ယူ ၂
        $request->file("photo")->storeAs($dir,$newName);//ဖိုင်သိမ်းတဲ့အဆင့်ပါ ၄
        $post->photo = $newName;

        $post->director = $request->director;
        $post->actors = $request->actors;

        $post->slug = Custom::makeSlug($request->name);
        $post->excerpt = Custom::makeExcerpt($request->description);
        $post->release_year = $request->release_year;
        $post->trailer = $request->trailer;
        $post->quality_id = $request->quality; //validation စစ်တဲ့နေရာမှာ အိုင််ဒီကို ပဲ ယူခဲ့ပြိးသားမို့ပ
        $post->category_id = $request->category;//validation စစ်တဲ့နေရာမှာ အိုင််ဒီကို ပဲ ယူခဲ့ပြိးသားမို့ပ
        $post->user_id = Auth::id();
        $post->save();

        foreach ($request->genre as $g){
            $postGenre = new post_genre();
            $postGenre->post_id =$post->id;
            $postGenre->genre_id = $g;//validation စစ်တဲ့နေရာမှာ အိုင််ဒီကို ပဲ ယူခဲ့ပြိးသားမို့ပ
            $postGenre->save();
        }
      //  return $request;

        return redirect()->route("upload-post-photo",$post->id)->with("toast","New Post Added");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return  view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        $request->validate([
            "name" => "required",
            "original_name" => "required",
            "release_year" => "required|integer|min:2011",
            "category" => "required|exists:categories,id",
            "quality" => "required|exists:qualities,id",
            "genre" => "nullable",
            "genre.*" => "exists:genres,id",
            "director" => "nullable",
            "actors" => "nullable",
            "trailer" => "nullable|url",
            "description" => "required",
            "photo" => "sometimes|mimetypes:image/jpeg,image/png|max:512",
        ]);
        $post->name = $request->name;
        $post->original_name = $request->original_name;
        $post->description = $request->description;

       if($request->hasFile('photo')){
           $dir="public/movie_photo"; //သိမ်းမည့်လမ်းကြောင်း ၃
           Storage::delete($dir."/".$post->photo);

           $file=$request->file("photo"); // ဘေအေဘယ် တစ်ခုအနေနဲ့အရင်သိမ်းလိုက်တယ် ၁
           $newName=uniqid()."_"."movie_photo.".$file->getClientOriginalExtension();//ဖိုင်နာမည်ပြောင်းတယ် ပြီးတော့ extension ယူ ၂
           $request->file("photo")->storeAs($dir,$newName);//ဖိုင်သိမ်းတဲ့အဆင့်ပါ ၄
           $post->photo = $newName;
       }



        $post->director = $request->director;
        $post->actors = $request->actors;

        $post->slug = Custom::makeSlug($request->name);
        $post->excerpt = Custom::makeExcerpt($request->description);
        $post->release_year = $request->release_year;
        $post->trailer = $request->trailer;
        $post->quality_id = $request->quality; //validation စစ်တဲ့နေရာမှာ အိုင််ဒီကို ပဲ ယူခဲ့ပြိးသားမို့ပ
        $post->category_id = $request->category;//validation စစ်တဲ့နေရာမှာ အိုင််ဒီကို ပဲ ယူခဲ့ပြိးသားမို့ပ

        $post->update();

       if($request->genre){
           foreach ($request->genre as $g){
               $postGenre = new post_genre();
               $postGenre->post_id =$post->id;
               $postGenre->genre_id = $g;//validation စစ်တဲ့နေရာမှာ အိုင််ဒီကို ပဲ ယူခဲ့ပြိးသားမို့ပ
               $postGenre->save();
           }
       }
        //  return $request;

        return redirect()->back()->with("toast","New Post Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {


        foreach($post->moviePhoto as $pm){   //storage ထဲကကောင်ကိုဖျက်တာပါ
            Storage::delete("public/movie_multiple_photo".$pm->location);
        }
        post_genre::where("post_id",$post->id)->delete();   // ဆက်စက်မှု တေဘယ်ကိုဖျက်
        episode::where("post_id",$post->id)->delete();      // ဆက်စက်မှု တေဘယ်ကိုဖျက်
        download::where("post_id",$post->id)->delete();     // ဆက်စက်မှု တေဘယ်ကိုဖျက်
        photo::where("post_id",$post->id)->delete();       //db record delete
        $post->delete();                                  // သူ့ကိုသူဖျက်ပစ်ခြင်း
        return redirect()->back();
//        return $post->moviePhoto->pluck("id");
//        return $post->moviePhoto;
    }
    public function deletePostGenre($post_id,$genre_id){
        $pg = post_genre::where("post_id",$post_id)->where("genre_id",$genre_id)->delete();
        return redirect()->back()->with("toast","You have delected for your SELECTED");
    }
}
