<?php

namespace App\Http\Controllers;

use App\server;
use Illuminate\Http\Request;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = Server::latest()->get();
        return view("server.index",compact("servers"));
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
        $request->validate([
            "name" => "required|unique:servers,name",
            "url" => "required|unique:servers,url","name"=>"required",
            "icon"=>"required|mimes:jpeg,png,jpg"
        ]);
        $dir="public/server_icon"; //သိမ်းမည့်လမ်းကြောင်း ၃
        $file=$request->file("icon"); // ဘေအေဘယ် တစ်ခုအနေနဲ့အရင်သိမ်းလိုက်တယ် ၁
        $newName=uniqid()."_"."icon.".$file->getClientOriginalExtension();//ဖိုင်နာမည်ပြောင်းတယ် ပြီးတော့ extension ယူ ၂
        $request->file("icon")->storeAs($dir,$newName);//ဖိုင်သိမ်းတဲ့အဆင့်ပါ ၄


        $server = new Server();
        $server->name=$request->name;
        $server->url=$request->url;
        $server->icon = $newName;//dbထဲကို ဖိုင်နာမည်ထည့်မယ် ၅
        $server->save();

        return redirect()->route("server.index")->with("toast","server save successful");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\server  $server
     * @return \Illuminate\Http\Response
     */
    public function show(server $server)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\server  $server
     * @return \Illuminate\Http\Response
     */
    public function edit(server $server)
    {
        $servers = Server::latest()->get();
        return view("server.edit",compact("servers","server"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\server  $server
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, server $server)
    {
        $request->validate([
            "name" => "required|unique:servers,name,".$server->id,
            "url" => "required|unique:servers,url,".$server->id,
//          "icon"=>"required|mimes:jpeg,png,jpg"
            "icon"=>"sometimes|mimes:jpeg,png,jpg" //sometime ဆိုတာက ဘာလုပ်တာလည်းဆိုရင် ဖိုင်ပါလာရင်အလုပ်လုပ်မယ် မပါလာရင်လည်း မလုပ်ဘူး
        ]);

       if($request->hasFile("icon")){ //request ထဲမှာ icon ဆိုတာပါလာမှ အလုပ်ဆက်လုုပ်စေမည်
           $dir="public/server_icon"; //သိမ်းမည့်လမ်းကြောင်း ၃
           $file=$request->file("icon"); // ဘေအေဘယ် တစ်ခုအနေနဲ့အရင်သိမ်းလိုက်တယ် ၁
           $newName=uniqid()."_"."icon.".$file->getClientOriginalExtension();//ဖိုင်နာမည်ပြောင်းတယ် ပြီးတော့ extension ယူ ၂
           $request->file("icon")->storeAs($dir,$newName);//ဖိုင်သိမ်းတဲ့အဆင့်ပါ ၄
       }


//        $server = new Server();
        $server->name=$request->name;
        $server->url=$request->url;
       if ($request->hasFile("icon")){
           $server->icon = $newName;//dbထဲကို ဖိုင်နာမည်ထည့်မယ် ၅
       }
        $server->update();
        return redirect()->route("server.index")->with("toast","server save successful");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\server  $server
     * @return \Illuminate\Http\Response
     */
    public function destroy(server $server)
    {
        //
    }
}
