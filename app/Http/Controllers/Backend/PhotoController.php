<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function photo(Request $request)
    {
        return view("backend.Pages.gallary.photo.create");
    }
    public function store( Request $request ){
        // dd($request->all());
        //vallidation
        $this->validate($request, [
            "title"=> "required|string|max:50",
            "photo_discription"=> "nullable|string|max:255",
            "photo"=> "required|image|mimes:jpeg,jpg,png,svg,gif|max:10000",
        ]) ;
        
            return redirect()->back();
    }

}
