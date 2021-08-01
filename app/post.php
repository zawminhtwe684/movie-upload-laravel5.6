<?php

namespace App;

use App\Http\Controllers\PhotoController;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function episode(){
        return $this->hasMany(episode::class,"post_id"); //အတည့် hsaone တစ်ခုအတွက်
    }
    public function moviePhoto(){
        return $this->hasMany(photo::class,"post_id");
    }
    public function category(){ //ဗြောင်းပြန် တိုက်ရိုက်ချိတ်ဆက်ပါသည်
        return $this->belongsTo(category::class,"category_id");
    }
    public function download(){
        return $this->hasMany(download::class,"post_id");
    }
    public function quality(){
        return $this->belongsTo(quality::class,"quality_id");
    }
    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }
    public function genre(){ // အများကြီးပြန်လိုချင်ရင် belongsToMany  ကတော့  ကြားခံချိတ်ဆက်ပေးနေတဲ့ Table ရှိမှ ရမည်
        return $this->belongsToMany(genre::class,post_genre::class,"post_id","genre_id");
        // အခု post model မှာ genre ကိုလှမ်းချိတ်မယ်,ဘယ်တေဘယ်က ကြားခံလည်း,post_genre table က post_id အရင်ဖြတ်မယ်,genre_id ကနောက်မှဖြတ်မယ်
    }

    //
}
