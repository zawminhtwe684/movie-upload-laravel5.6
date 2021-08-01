<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $categories =  Category::latest()->get(); //Category Model or Table ထဲက ကောင်တွေကိုယူချင်လို့
//        return view ("category.index",compact("categories"));// ဒေတာကို ဟိုဘက်ကိုသယ်ဆောင်ပေးခြင်းဖြစ်သည်
        return view ("category.index"); // သူကတော့ ပြန်ညွှန်ကြားချက်ဖြစ်သည်
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
           'title'=>'required',
        ]);
        $category = new Category();
        $category->title = $request->title;
        $category->user_id = Auth::id();
        $category->save();
        return redirect()->route("category.index")->with("toast","New Category Added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view("category.edit",compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $request->validate([
           'title'=> "required",
        ]);
        $category->title = $request->title;
        $category->update();
        return redirect()->route("category.index")->with("toast","Category Update successful");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        //
    }
}
