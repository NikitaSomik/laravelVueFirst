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

    public function index(){
        return view('main');
    }

    public function apiTwitter(Request $request) {
        //return response()->json(['reply' => request('lat')]);
        Codebird::setConsumerKey('SD7iWNQ6MvNQAapjXTWwkN4iA', 'fwaPpJzEN5NeTIOIjpyxobbnyOCs41xmC5L1NyDv3u1kVR8AgU');
        $cb = Codebird::getInstance();

        $p = ['grant_type' => 'client_credentials'];
        $cb->oauth2_token($p);
        //$bearer_token = $reply->access_token;

        $cb->setToken(
            '1014513551774494727-a9Z8YOGg8Je6E8o16LDBkFu7RmAwXW',
            'nc0pCFlmLfg3gKC9YXx4vzxved9cLht04vZFXMbVrX0Bq'
        );

        //$reply = (array) $cb->search_tweets();
        $params = [
            'q' => '',
//            'lat'    => request('lat'),
//            'long'   => request('lng'),
            'geocode' => request('lat'),request('lng'),request('radius')
        ];
        $reply = $cb->search_tweets($params);
        //$reply = $cb->users_show($params);

//        $params = [
//            'status' => 'I love Kiev',
//            'lat'    => 51.5033,
//            'long'   => 0.1197
//        ];
//        $reply = $cb->statuses_update($params);



        //dd($reply);
        //$reply = $cb->users_show($params);

      //  $reply = $reply->data;
//dd($reply);

//        $twitterUserLoc = new TwitterUserLoc();
//        $twitterUserLoc->name = $reply->name;
//        $twitterUserLoc->location = $reply->location;
//        $twitterUserLoc->description = $reply->description;
//        //$twitterUserLoc->followers_count = $reply->followers_count;
//        //$twitterUserLoc->friends_count = $reply->friends_count;
//        //$twitterUserLoc->statusText = $reply->status->text;
//        $twitterUserLoc->image  = $reply->profile_image_url;
//        //$twitterUserLoc->user_id = 2;
//        $twitterUserLoc->save();


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


        return response()->json(['reply' => $reply]);
    }



//    public function guard() {
//        return \Auth::Guard('api');
//    }
}


