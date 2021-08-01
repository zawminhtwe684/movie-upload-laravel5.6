<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class download extends Model
{
    public function server(){
        return $this->belongsTo(server::class,"server_id");
    }
    public function episode(){
        return $this->belongsTo(episode::class,"episode_id");
    }
}
