<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;

use App\Manufacturer;
use App\Sertificate;
use App\Category;
use App\Product;
use App\Menu;

class ProductController extends Controller
{
    //Front-end
    public function catalog()
    {
        $product = Product::select(['id','name','alias','description','product_price'])->get();

        return view ('pages.catalog.index')->with('products', $product);
    }

    public function showProduct($url)
    {
        $product = Product::select(['id','name','alias','image','description','product_price'])->where('alias', $url)->first();
        
        return view ('pages.catalog.show')->with(['product' => $product,
                    'categories' => Category::get()            
                    ]);
    }

    //Back-end
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::select(['id','name','alias', 'description', 'product_price','show_on_home'])->get();
       
        return view('admin.products.index')->with('products', $products);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create', [
            'product' => [],
            'categories' => Category::get(),
            'manufacturers' => Manufacturer::get(),
            'sertificates' => Sertificate::get()
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
            'name'=>'required',
            //'alias'=>'required',
            //'description'=>'required',
            'product_price' => 'numeric'
        ]);

        $product = Product::create($request->except('categories', 'manufacturers', 'sertificates') );

            if($request->input('categories')):
                $product->categories()->attach($request->input('categories'));
            endif;
        
            if($request->input('manufacturers')):
                $product->manufacturers()->attach($request->input('manufacturers'));
            endif;
            
   
        Storage::makeDirectory('uploads/products/prod-id-' . $product->id);
        
            $request->file('image')
                ->move(storage_path() . '/app/public/uploads/products/prod-id-' . $product->id, 'productImage.jpg');
 
            $product->image = '/storage/uploads/products/prod-id-' . $product->id . '/productImage.jpg';
            $product->save();
            
        return redirect('/dashboard/products')->with('success', 'Продукт сохранен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    
     public function show($url)
    {
        $product = Product::select(['id','name','alias','image','description','product_price'])->where('alias', $url)->first();
        
        return view ('admin.products.show')->with('product', $product);
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit',  [
            'product' => $product,
            'categories' => Category::get(), 
            'manufacturers' => Manufacturer::get(),
            'sertificates' => Sertificate::get()
            ]);      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'product_price' => 'numeric'
        ]);

        $product->update($request->except('categories', 'manufacturers', 'sertificates'));

        $product->categories()->detach();
            if($request->input('categories')):
                $product->categories()->attach($request->input('categories'));
            endif; 
        $product->manufacturers()->detach();
            if($request->input('manufacturers')):
                $product->manufacturers()->attach($request->input('manufacturers'));
            endif;
       
            
          
            if ($request->hasFile('image')) {
                
                $request->file('image')->move(
                    storage_path() . '/app/public/uploads/products/prod-id-' . $product->id,
                    'productImage.jpg'
                );
                $product->image = '/storage/uploads/products/prod-id-' . $product->id . '/productImage.jpg';
            }
            $product->save();   
            
        return redirect('/dashboard/products')->with('success', 'Продукт отредактирован');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($id === null) {
            return redirect('/dashboard/products')->with('success', 'Продукт был удален ранее');
        }
        $product->delete();
        return redirect('/dashboard/products')->with('success', 'Продукт удален');
    }
}
