<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     //function for display index page and showing all services by categories

    //     $categories = Category::withCount('services')->orderBy('services_count', 'desc')->get();

    //     return view('home.index',compact('categories'));
    // }

        public function index()
    {


        $categories = Category::withCount('services')
        ->with(['services' => function ($query) {
            $query->withCount('avis');
        }])
        ->orderBy('services_count', 'desc')
        ->get();

        return view('home.index', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::withCount('services')->orderBy('services_count', 'desc')->get();
        return view('service.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( $request)
    {
      
        // if($files=$request->file('images')){
        //    foreach ($files as $file) {
        //         $image_path=$file->store("services", "public");  
        //         $images[]= $image_path;
        //         $img_url = implode(",",$images);
        //    }
        // }
            
        // $id=Auth::id();
        // $service = new Service();
        // $service->title = $request->input('title');
        // $service->description = $request->input('description');
        // $service->price = $request->input('price');
        // $service->location = $request->input('location');
        // $service->Ratings = 0;
        // $service->user_id =$id ;
        // $service->category_id = $request->input('category');
        // $service->images = $img_url;
        // $service->save();
        // return redirect()->route('user.dashbord')->with('success', 'service added seccusfuly.');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        $images = explode(",",$service->images);
        $avis = $service->avis()->with('user')->get();
        $avis_count = $service->avis()->count();
        return view("service.show",compact("service","images","avis_count","avis"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
        $categories = Category::withCount('services')->orderBy('services_count', 'desc')->get();
        return view("service.edit",compact('service','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {

       


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
