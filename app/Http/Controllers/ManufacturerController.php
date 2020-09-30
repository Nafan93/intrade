<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{

    //Front-end
    public function listManufacturers()
    {
        $manufacturers = Manufacturer::all();
        return view ('pages.manufacturers.index')->with(['manufacturers' => $manufacturers,
                            'products' => Product::get()
                            ]);
    }

    public function showManufacturer($url)
    {
        $manufacturer = Manufacturer::all()->where('manufacturer_alias', $url)->first();;
        return view ('pages.manufacturers.show')->with(['manufacturer' => $manufacturer,
                            
                            ]);
    }

    //Back-end

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::all();
        return view ('admin.manufacturers.index')->with(['manufacturers' => $manufacturers,
                            'products' => Product::get()
                            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manufacturers.create', [
            'manufacturer' => [],
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
        $request->validate([
            'name'=>'required|unique:manufacturers|max:255',
            'desc'=>'nullable',
            'site'=>'nullable'
        ]);

        $manufacturer = new Manufacturer($request->all());
        $manufacturer->save();
        return redirect('/admin/manufacturers')->with('success', 'Производитель сохранена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        $manufacturer = Manufacturer::all()->where('manufacturer_alias', $url)->first();;
        return view ('admin.manufacturers.show')->with(['manufacturer' => $manufacturer,
                            
                            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        return view('admin.manufacturers.edit',  [
            'manufacturer' => $manufacturer,
            'products' => Product::select('id','name',)->get()
            ]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $manufacturer = Manufacturer::find($id);
        $manufacturer->name =  $request->get('name');
        $manufacturer->manufacturer_alias = $request->get('manufacturer_alias');
        $manufacturer->desc = $request->get('desc');
        $manufacturer->site = $request->get('site');
        $manufacturer->meta_title = $request->get('meta_title');
        $manufacturer->meta_keywords = $request->get('meta_keywords');
        $manufacturer->meta_description = $request->get('meta_description');
        $manufacturer->save();

        return redirect('/admin/manufacturers')->with('success', 'Производитель отредактирован');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        $manufacturer = Manufacturer::find($id);
        $manufacturer->delete();
        return redirect('/dashboard/manufacturers')->with('success', 'Производитель удален');

    }
}
