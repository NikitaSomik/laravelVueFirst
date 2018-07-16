<?php

namespace App\Service;

use Codebird\Codebird;
use Illuminate\Http\Request;

class CodeBirdService
{
    private static function index() {
        Codebird::setConsumerKey(
//            env("CUSTOMER_KEY"),
//            env("CUSTOMER_SECRET")
            'SD7iWNQ6MvNQAapjXTWwkN4iA',
            'fwaPpJzEN5NeTIOIjpyxobbnyOCs41xmC5L1NyDv3u1kVR8AgU'
        );
        $cb = Codebird::getInstance();

        $cb->setToken(
//                env('CUSTOMER_TOKEN'),
//            env('CUSTOMER_TOKEN_KEY')
            '1014513551774494727-a9Z8YOGg8Je6E8o16LDBkFu7RmAwXW',
            'nc0pCFlmLfg3gKC9YXx4vzxved9cLht04vZFXMbVrX0Bq'
        );

        return $cb;
    }

    public static function fetchTweets($params){
        $cb = self::index();

        $reply = $cb->search_tweets($params);

        return $reply;
    }
}