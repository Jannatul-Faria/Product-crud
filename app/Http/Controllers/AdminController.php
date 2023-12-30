<?php

namespace App\Http\Controllers;

use App\Models\Sold;
use App\Models\Table;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('backend.admin');
    }
    public function task()
    {
        return view('backend.task');
    }
    
    public function forms()
    {
        return view('backend.forms');
    }
    public function login()
    {
        return view('backend.login');
    }
    public function profile()
    {
        return view('backend.profile');
    }
    public function register()
    {
        return view('backend.register');
    }
    public function reset()
    {
        return view('backend.reset');
    }
    public function tables()
    {
        $products=Table::get();

        return view('backend.tables')->with('products',$products);    
    }






    public function sell( $id)
    {
         $product = Table::findOrFail($id);
        return view('backend.Pages.sell', compact('product'));
       
       
    }

    public function selsStore(Request $request, $id)
    {
       // validation
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',

        ]);
       
            //product save
            Sold::create($request->input());
            Table::where('id',$id)->decrement('quantity', $request->input('quantity'));


        Table::where('quantity','=', 0)
        ->delete();
           
        return redirect()->route('admin.tables')->with('success','product add successfully');
        

       
    }

    
        

     public function sold()
    {
        $products=Sold::get();
        // return redirect()->route('admin.tables');
         return view('backend.sold')->with('products',$products);
       
    }
    









    public function add()
    {
        return view('backend.Pages.add');
    }
    








    public function store(Request $request)
    {
       // validation
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'status' => 'required',
            'checkbox' => 'required',

        ]);
        // dd($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'product-img' . md5(uniqid()) . '.' . $file->getClientOriginalExtension();
            // $filename = 'product-img' . '.' . md5(uniqid()) . $file->getClientOriginalExtension();
            $imagestore= $file->move(public_path('photos'), $filename);

            //product save
            Table::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'category' => $request->category,
                'image' => $imagestore,
                'status' => $request->status,
                'checkbox' => $request->checkbox,
            ]);
            return redirect()->route('admin.tables')->with('success','product add successfully');
        }

       
    }









    public function edit(Request $request, $id){

        $product = Table::findOrFail($id);
        return view('backend.Pages.edit', compact('product'));

    }
    
    public function update(Request $request, $id)
    {
       // validation
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
            'status' => 'required',
            'checkbox' => 'required',

        ]);
        // dd($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'product-img' . md5(uniqid()) . '.' . $file->getClientOriginalExtension();
            // $filename = 'product-img' . '.' . md5(uniqid()) . $file->getClientOriginalExtension();
            $imagestore= $file->move(public_path('photos'), $filename);

            //product save
            $product=Table::findOrFail($id);
            $product->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'category' => $request->category,
                'image' => $request->hasFile('image') ? $imagestore:$product->image,
                'status' => $request->status,
                'checkbox' => $request->checkbox,
            ]);
            return redirect()->route('admin.tables')->with('success','product add successfully');
        }

       
    }













    

    
    public function delete($id){
        $product=Table::findorFail($id);
        $product->delete();
        return redirect()->route('admin.tables')->with('success');
    }


}
