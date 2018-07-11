<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwitterUserLoc extends Model
{
    protected $table = 'twitter_user_locs';
    //protected $fillable = [' user_id, product_id, content', 'checked','published'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
