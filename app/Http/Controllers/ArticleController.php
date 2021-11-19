<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    private $private_api;

    function __construct()
    {

        $this -> private_api = new NewsApi(env('MY_API_KEY'));
    }

    public function index()
    {
        //get everything

        $all_articles = $this -> private_api -> getEverything(null, null, "bbc.co.uk, techcrunch.com, engadget.com");

        return new JsonResponse($all_articles->articles);
    }

    public function topheadlines()
    {
//        Get top headlines

        $top_headlines = $this -> private_api -> getTopHeadlines(null, null, "gb");

        return new JsonResponse($top_headlines->articles);
    }

    public function topheadlinesSource()
    {
//         get top-headlines/sources
        $sources = $this -> private_api -> getSources(null, "en");

        return new JsonResponse($sources->sources);
    }
}
