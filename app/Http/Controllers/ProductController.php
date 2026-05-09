<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index():View
    {   
        $products=Product::latest()->paginate(10);

        return view('products.index', compact('products'));  
    }

    public function create():View{
        return view('products.create');
    }

    public function store(Request $request):RedirectResponse {
        $request->validate([
            'image'         =>'required|image|mimes:jpg,png,jpeg|max:2048',
            'title'         =>'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric',
        ]);

        $image = $request->file('image');  
        $image->storeAs('products',$image->hashName());

        $products = Product::create([
            'image'=> $image->hashName(),
            'title'=> $request->title,
            'description'=> $request->description,
            'price'=>$request->price,
            'stock'=>$request->stock,
        ]);
        return redirect()->route('products.index')->with(['success'=>'Data berhasil disimpan!']);
    }

    public function show(string $id){
        $product=Product::findOrFail($id);

        return view('products.show', compact('product'));
    }

    public function edit(string $id){
        $product=Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'title' => 'required|string|min:3',
        'description' => 'required|min:10',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
    ]);

    $product = Product::findOrFail($id);

    if ($request->hasFile('image')) {

        Storage::delete('product/' . $product->image);

        $image = $request->file('image');
        $image->storeAs('product', $image->hashName());

        $product->image = $image->hashName();
    }

    $product->update([
        'title' => $request->title,
        'description' => $request->description,
        'price' => $request->price,
        'stock' => $request->stock,
    ]);

    return redirect()->route('products.index')
        ->with('success', 'Data berhasil diubah');
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        Storage::delete('products/'.$product->image);
        $product->delete();

        return redirect()->route('products.index')->with(['success'=>'Data Berhasil dihapus']);
    }
}
