<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function index(){
         $searchtext=request('searchtext');
         $category=request('category');
         $location=request('location');

        return view('search.search',['searchtext'=>$searchtext,'category'=>$category,'location'=>$location]);
    }
}
