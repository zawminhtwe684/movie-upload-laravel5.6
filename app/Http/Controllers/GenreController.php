<?php

namespace App\Http\Controllers;

use App\genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view ("genre.index");
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
        //        return $request;
        $request->validate([
            'title'=>'required|unique:genres,title', //genres table ဖြစ်လို့ (s) ပါရမည် ထဲက title ကို နာမည်တူ ထပ်ထည့်လို့မရအောင်လို့ unique နဲ့စစ်ခြင်း
        ]);
        $genre = new Genre();
        $genre->title = $request->title;
        $genre->user_id = Auth::id();
        $genre->save();
        return redirect()->route("genre.index")->with("toast","New Genre Added");
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(genre $genre)
    {
        return view("genre.edit",compact("genre"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, genre $genre)
    {
        $request->validate([
            'title'=> "required|unique:genres,title,".$genre->id, // update လုပ်တဲံအချိန်မှာထူးခြားချက်တစ်ခု က .$genre->id ပြန်ထည့်ပေးပါ
        ]);
        $genre->title = $request->title;
        $genre->update();
        return redirect()->route("genre.index")->with("toast","Genre Update successful");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(genre $genre)
    {
        //
    }
}
