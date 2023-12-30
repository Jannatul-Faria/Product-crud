<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    public function gallary(){
        $albums = DB::table('albums')->get();
        
        return view("backend.gallary" , compact('albums'));
    }
    public function createAlbum(Request $request)
    {
        return view("backend.Pages.gallary.album.create");
    }
    public function storeAlbum(Request $request)
    {
    
        //dd($request->all());
        //validation:
        $this->validate($request, [
            "name"=> "required|string|max:25",
            "description"=> "nullable|string|max:255",
            "cover_photo"=>"required|image|mimes:png,jpeg,jpg,gif,svg|max:10000",
        ]);

        //image proccecing:
        if ($request->hasFile("cover_photo")) {
            $photo = $request->file('cover_photo');
            $photoName = 'cover_photo_' . md5(uniqid()) . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('assets/gallary/albums'), $photoName);

        }
        //save data to album table:
        DB::table('albums')->insert([
            'name' => $request->name,
            'description' => $request->description,
            'cover_photo' => 'assets/gallary/albums/' . $photoName,
        ]);

       
        return redirect()->back()->with('success','Album Created Successfully.');
    }    


    public function destroy($id){
        $album=DB::table('albums')->where('id', $id)->first();
        $removeFile= unlink(public_path($album->cover_photo));
        if($removeFile){
             DB::table('albums')->where('id', $id)->delete();
             return redirect()->back()->with('success','Album is deleted.');
        }
        return redirect()->back();
    }
    public function showAlbum($id){
        $album=DB::table('albums')->where('id', $id)->first();
        return view("backend.Pages.gallary.album.show",compact('album'));
    }

}
