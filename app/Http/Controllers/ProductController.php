<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //product model
        $products = Product::all();
        //arahkan ke view master
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validaasi form
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'status' => 'required',
            'image' => 'nullable|image',
        ]);

        //deklarasi image path
        $imagePath = '';
        //cek apakah ada file image yang di upload
        if ($request->hasFile('image')) {
            //deklarasi nama file image
            $imageName = $request->image->getClientOriginalName();
            //upload image ke folder public/images
            $request->image->storeAs('public/images', $imageName);
            //deklarasi image path
            $imagePath = 'public/images/' . $imageName;
        }
        //insert data
        $product = Product::create(
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'qty' => $request->input('qty'),
                'status' => $request->input('status'),
                'image' => $imagePath,
            ]
        );
        //redirect ke halaman indexproduct
        if (!$product) {
            return redirect()->back()->with('errors', 'Data gagal disimpan');
        } else {
            return redirect()->route('product.index')->with('success', 'Data berhasil disimpan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
