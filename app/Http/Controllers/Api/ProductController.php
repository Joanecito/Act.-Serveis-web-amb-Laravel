<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producs;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = producs::all();

        if (!$products) {
            return response()->json([
                'success' => false,
                'message' => 'No products'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'data' => $products->toArray()
        ], 200);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return producs::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new producs;

        $product->name = $request->name;

        $product->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produc = producs::where('id', $id)->get();
        
        return response()->json([
            'success' => true,
            'data' => $produc->toArray()
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = producs::find($id);

        $validated = $request->validate([
            'name' => 'required|max:50'
        ]);

        $product->name = $validated['name'];

        return response()->json([
            'success' => true,
            'data' => 'Product updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = producs::where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'data' => 'Product deleted'
        ], 200);
    }
}
