<?php


namespace App;


class Custom
{
    public static $info =  [

        "name" => "ZMH Movie Upload",
        "short_name" => "ZMH Movie Lesson",
        "type" => "dashobard",
        "phone" => "",
        "address" =>"",
        "meta-img" => "f/img/meta.jpg",
        "mms-logo" => "dashboard/images/mms-logo.jpg",
        "c-logo" => "dashboard/images/logo.jpg",
        "main_css" => "dashboard/css/bootstrap.min.css",
    ];

    public static function makeSlug($x){ // ပြန်လည်အစားထိုးဖို့ရန်အသုုံးပြုခြင်း
        $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $x);
        return trim($slug,"-");
    }

    public static function makeExcerpt($x,$end=100){ //စကားလုံးရေ လျော့၍ ဖော်ပြခြင််းး

        $txt = strip_tags($x);// ရိုးရိုးစာသားဖြစ်မယ်
        if(strlen($txt)>$end){ //အလုံးရေတွက် ၁၀၀ မကျော်ရင် ဖြတ်မပေးဘူး ၁၀၀ ကျော်မှ ဖြတ််ပြီးဖော်ပြပေးမယ်
            $txt = mb_substr($txt,0,$end,"UTF-8")." ...";
        }

        return $txt;
    }

}
