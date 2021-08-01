<?php

namespace App\Providers;

use App\category;
use App\genre;
use App\post;
use App\quality;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share("categories",Category::latest()->get()); // သူကတော့ view တွေကို shared သုံးတာဖြစ်လို့ ဒေတာကို compact() နှင့် သယ်စရာမလိုအောင်ပါ
        View::share("genres",Genre::latest()->get()); // သူကတော့ view တွေကို shared သုံးတာဖြစ်လို့ ဒေတာကို compact() နှင့် သယ်စရာမလိုအောင်ပါ
        View::share("qualities",Quality::latest()->get()); // သူကတော့ view တွေကို shared သုံးတာဖြစ်လို့ ဒေတာကို compact() နှင့် သယ်စရာမလိုအောင်ပါ

//        DB::listen(function($query) { သူလိုတယ်
//            Log::info(
//                $query->sql,
//                $query->bindings,
//                $query->time
//            );
//        })
//  $posts = post::with('category','user','genre','quality')->Latest()->paginate(5);  ရေးပုံက with နဲ့သယ်တယ်
 //       https://laravel-news.com/eloquent-eager-loading သွားကြည့်ရမယ့်လင့်ဖြစ်တယ်
///
    }

}
