<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\Sold;
use Illuminate\Http\Request;

class TableController extends Controller
{
   
    public function task()
    {
        return view('backend.Pages.dashboard.task');
    }
    
    public function forms()
    {
        return view('backend.Pages.dashboard.forms');
    }
    public function login()
    {
        return view('backend.Pages.auth.login');
    }
    public function profile()
    {
        return view('backend.Pages.dashboard.profiles');
    }
    public function register()
    {
        return view('backend.Pages.auth.register');
    }
    public function reset()
    {
        return view('backend.Pages.auth.reset');
    }
    public function tables()
    {
        $products=Product::get();

        return view('backend.Pages.dashboard.tables')->with('products',$products);    
    }






    public function sell( $id)
    {
         $product = Product::findOrFail($id);
        return view('backend.Pages.dashboard.sell', compact('product'));
       
       
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
            Product::where('id',$id)->decrement('quantity', $request->input('quantity'));


        Product::where('quantity','=', 0)
        ->delete();
           
        return redirect()->route('admin.tables')->with('success','product add successfully');
        

       
    }

    
        

     public function sold()
    {
        $products=Sold::get();
        // return redirect()->route('admin.tables');
         return view('backend.Pages.dashboard.sold')->with('products',$products);
       
    }
    









    public function add()
    {
        return view('backend.Pages.dashboard.add');
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
            Product::create([
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

        $product = Product::findOrFail($id);
        return view('backend.Pages.dashboard..edit', compact('product'));

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
            $product=Product::findOrFail($id);
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
        $product=Product::findorFail($id);
        $product->delete();
        return redirect()->route('admin.tables')->with('success');
    }


}
