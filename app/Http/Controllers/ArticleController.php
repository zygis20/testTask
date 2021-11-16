<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{

    public function index()
    {
        $myapikey='0f2f4453340c44d8b27c06ae140bbc7a';
        $newsapi = new NewsApi($myapikey);

        //get everything


        $domains ="bbc.co.uk, techcrunch.com, engadget.com";
        $q= null;
        $language =null;
        $sources = null;
        $sort_by =null;
        $exclude_domains= null;
        $from= null;
        $to= null;
        $page_size=null;
        $page=null;
        $all_articles = $newsapi->getEverything($q, $sources, $domains, $exclude_domains, $from, $to, $language, $sort_by, $page_size, $page);

//        $all_articles_asArray= (array) $all_articles;
//
//        $all_articles_asArray= collect($all_articles_asArray);
//        $all_articles_asArray= $all_articles_asArray['articles'];
//        $single_article =collect($all_articles_asArray[1]);
//
//
//        return dd($single_article);
        return dd($all_articles);
//        return print_r($all_articles);




    }

    public function topheadlines()
    {
        $myapikey='0f2f4453340c44d8b27c06ae140bbc7a';
        $newsapi = new NewsApi($myapikey);

//        Get top headlines
        $q = null;
        $country ='gb';
        $sources = null;
        $category =null;
        $page_size=null;
        $page=null;

        $top_headlines = $newsapi->getTopHeadlines($q, $sources, $country, $category, $page_size, $page);
        return $top_headlines;
    }


    public function topheadlinesSource()
    {
//         get top-headlines/sources
        $myapikey='0f2f4453340c44d8b27c06ae140bbc7a';
        $newsapi = new NewsApi($myapikey);

        $category= null ;
        $language="en";
        $country= null;

        $sources = $newsapi->getSources($category, $language, $country);
        return $sources ;
    }
}
