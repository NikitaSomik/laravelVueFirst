<?php

namespace App\Http\Controllers;

use Codebird\Codebird;
use Illuminate\Http\Request;
use App\TwitterUserLoc;
use App\User;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
use AuthController;

class Twitter extends Controller {

        public function index()
        {

            return view('main');
        }

    public function apiTwitter() {
        Codebird::setConsumerKey(
            'SD7iWNQ6MvNQAapjXTWwkN4iA',
            'fwaPpJzEN5NeTIOIjpyxobbnyOCs41xmC5L1NyDv3u1kVR8AgU'
        );
        $cb = Codebird::getInstance();

        $cb->setToken(
            '1014513551774494727-yxKDNhtbi6ngf0sq6q0y0A9pArIZsA',
            'ZQ9srd4rJ8IMftvEXdTDnFUIZNltyCcnRmJEKdtA9Sey9'
        );

        $reply = (array) $cb->statuses_homeTimeline();
        $params = [
            'status' => 'I love London',
            'lat'    => 51.5033,
            'long'   => 0.1197
        ];
        $reply = $cb->statuses_update($params);
        $params = [
            'screen_name' => 'jublonet'
        ];
        $reply = $cb->users_show($params);

      //  $reply = $reply->data;
            
//        $twitterUserLoc = TwitterUserLoc::create([
//            'name' => $reply->name,
//            'location' => $reply->location,
//            'description' => $reply->description,
//            'followers_count' => $reply->followers_count,
//            'friends_count' => $reply->friends_count,
//            'statusText' => $reply->status->text,
//            'profile_image_url' => $reply->profile_image_url,
//            'user_id' => 2
//        ]);
        $twitterUserLoc = new TwitterUserLoc();
        $twitterUserLoc->name = $reply->name;
        $twitterUserLoc->location = $reply->location;
        $twitterUserLoc->description = $reply->description;
        //$twitterUserLoc->followers_count = $reply->followers_count;
        //$twitterUserLoc->friends_count = $reply->friends_count;
        //$twitterUserLoc->statusText = $reply->status->text;
        $twitterUserLoc->image  = $reply->profile_image_url;
        //$twitterUserLoc->user_id = 2;
        $twitterUserLoc->save();


        //var_dump($reply);

       // return response()->json(['reply' => $r]);
    }



    public function guard() {
        return \Auth::Guard('api');
    }
}


