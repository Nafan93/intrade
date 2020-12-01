<?php

namespace App\Http\Controllers;

use App\Sertificate;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class SertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::select(['id','name'])->where('id', $id)->first();
        
        return view('admin.sertificates.create', [
            'sertificate' => []
            ])->with('product', $product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sertificate = new Sertificate([
            'title' => $request->get('title'),
            'product_id' => $request->get('product_id'),
        ]);
        $sertificate->save();
        $id = $sertificate->product_id;
        $product = Product::select(['id','alias'])->where('id', $id)->first();
        
        if($request != null) {
            Storage::makeDirectory('uploads/sertificates/product_' . $product->alias);
        
            $request->file('prew')
                ->move(storage_path() . '/app/public/uploads/sertificates/product_' . $product->alias . '/prev',  $sertificate->slug . '.jpg');
 
            $sertificate->prew = '/storage/uploads/sertificates/product_' . $product->alias . '/prev' . '/' . $sertificate->slug . '.jpg';
            
            $request->file('file')
            ->move(storage_path() . '/app/public/uploads/sertificates/product_' . $product->alias,  $sertificate->slug . '.pdf');

            $sertificate->file = '/storage/uploads/sertificates/product_' . $product->alias . '/' . $sertificate->slug  . '.pdf';
        }
       
        $sertificate->save();

        return redirect()->route('products.show', [$product->alias]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sertificate  $sertificate
     * @return \Illuminate\Http\Response
     */
    public function show(Sertificate $sertificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sertificate  $sertificate
     * @return \Illuminate\Http\Response
     */
    public function edit(Sertificate $sertificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sertificate  $sertificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sertificate $sertificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sertificate  $sertificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sertificate $sertificate)
    {
       //
    }
}
