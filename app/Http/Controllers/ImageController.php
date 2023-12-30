<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function singleImgUp(Request $request){

        //dd($request->all()); details show:
        //validation
         $this->validate($request, [
          $image = 'require|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
         ]);

        //image upload:
         if ($request->hasFile('image')) {
             $image = $request->file('image');
             $imageName = 'photo- ' . md5(uniqid()) . '.' . $image->getClientOriginalExtension();
            // $image->move(public_path('image'), $imageName);
           // $image->move(public_path('assets/uploads'), $imageName);
            $image->storeAs('public/uploads', $imageName);
         }
         return redirect()->back();

    }
}
