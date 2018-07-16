<?php

namespace App\Http\Controllers;

use App\Service\CodeBirdService;
use Illuminate\Http\Request;
use App\TwitterUserLoc;
use DB;

class TwitterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function fetchTweetsFromApi(Request $request){

//        $params = [
//            'q' => '',
//            'lat' => request('lat'),
//            'long' => request('lng'),
//            'accuracy' => request('radius')
//        ];

        $radius = $request->radius;
        $geo =  $request->lat.','.$request->lng.','.$radius.'km';

        $params = [
            'q' => $request->querys,
            'geocode' => $geo,
            'count' => 1000
        ];


        $tweets = CodeBirdService::fetchTweets($params);

        $arr = [];

        foreach ($tweets->statuses as $tw) {

            $arr2 = [
                //'user_id' => ,
                'createTweetData' => $tw->created_at,
                'idTweet' => $tw->id,
                'text' => $tw->text,
                'userIdTwitter' => $tw->user->id,
                'userName' => $tw->user->name,
                'description' => $tw->user->description,
                'screenName' => $tw->user->screen_name,
                'location' => $tw->user->location,
                'profileImageUrl' => $tw->user->profile_image_url
            ];

            array_push($arr, $arr2);
        }

        DB::table('twitter_user_locs')->insert($arr);

        return response()->json(['tweets' => $tweets]);
    }



}
