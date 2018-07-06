<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class Twitter extends Controller {

    public function index()
    {
        \Codebird\Codebird::setConsumerKey(
            'SD7iWNQ6MvNQAapjXTWwkN4iA',
            'fwaPpJzEN5NeTIOIjpyxobbnyOCs41xmC5L1NyDv3u1kVR8AgU'
        );
        $cb = \Codebird\Codebird::getInstance();

        $cb->setToken(
            '1014513551774494727-yxKDNhtbi6ngf0sq6q0y0A9pArIZsA',
            'ZQ9srd4rJ8IMftvEXdTDnFUIZNltyCcnRmJEKdtA9Sey9'
        );

        $reply = (array)$cb->statuses_homeTimeline();

        echo '<pre>';
        print_r($reply);

        $reply = $cb->statuses_update('status=Whohoo, I just Tweeted!');

        return view('welcome', compact('reply'));
    }
}


