<?php

namespace App\Http\Controllers;

use App\Sertificate;

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
    public function create()
    {
        return view('admin.sertificates.create', [
            'sertificate' => []
            ]);
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
        Storage::makeDirectory('uploads/sertificates/sert-id-' . $sertificate->id);
        
            $request->file('prew')
                ->move(storage_path() . '/app/public/uploads/sertificates/sert-id-' . $sertificate->id, 'sertificateImage.jpg');
 
            $sertificate->prew = '/storage/uploads/sertificates/sert-id-' . $sertificate->id . '/sertificateImage.jpg';
            
            $request->file('file')
            ->move(storage_path() . '/app/public/uploads/sertificates/sert-id-' . $sertificate->id, 'sertificateFile.pdf');

        $sertificate->file = '/storage/uploads/sertificates/sert-id-' . $sertificate->id . '/sertificateFile.pdf';
            $sertificate->save();
        return redirect('/dashboard/products')->with('success', 'Продукт отредактирован');
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
