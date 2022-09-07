<?php

namespace App\Http\Controllers;

use App\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::all();
        return view('products.products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'number' => 'required',
//            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
        ], [

            'product_name.required' => 'يرجي ادخال اسم الممتج',
            'type.required' => 'يرجي رقم اسم الممتج',
//            'quantity.required' => 'يرجي ادخال  الكمية',
//            'quantity.numeric' => 'يجب ان يكون رقم',
            'price.required' => 'يرجي ادخال  السعر',
            'price.numeric' => 'يجب ان يكون رقم',

        ]);
        $filePath = "";
        if ($request->has('image')) {

            $filePath = $this->uploadImage('products', $request->image);
        }
        products::create([
            'product_name' => $request->product_name,
            'number' => $request->number,
//            'quantity' => $request->quantity,
            'price' => $request->price,
            'image' => $filePath,
            'created_by' => (Auth::user()->name),
        ]);
        session()->flash('Add', 'تم اضافة المنتج بنجاح ');
        return redirect('/products');

    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\sections $sections
     * @return \Illuminate\Http\Response
     */
    public function show(products $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\sections $sections
     * @return \Illuminate\Http\Response
     */
    public function edit(products $sections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\sections $sections
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, products $products)
    {
        $id = $request->id;

        $this->validate($request, [
            'product_name' => 'required|max:255',
            'number' => 'required',
//            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'image' => 'nullable',
        ], [

            'product_name.required' => 'يرجي ادخال اسم الممتج',
            'number.required' => 'يرجي رقم اسم الممتج',
//            'quantity.required' => 'يرجي ادخال  الكمية',
//            'quantity.numeric' => 'يجب ان يكون رقم',
            'price.required' => 'يرجي ادخال  السعر',
            'price.numeric' => 'يجب ان يكون رقم',
        ]);

        $filePath = "";
        if ($request->has('image')) {

            $filePath = $this->uploadImage('products', $request->image);
        }

        $products = products::find($id);
        $products->update([
            'product_name' => $request->product_name,
            'number' => $request->number,
//            'quantity' => $request->quantity,
            'price' => $request->price,
            'image' => $filePath,
        ]);

        session()->flash('edit', 'تم تعديل المنتج بنجاج');
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\sections $sections
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        products::find($id)->delete();
        session()->flash('delete', 'تم حذف المنتج بنجاح');
        return redirect('/products');
    }


    function uploadImage($folder,$image){
        $image->store('/', $folder);
        $filename = $image->hashName();
        return  $filename;
    }
}
