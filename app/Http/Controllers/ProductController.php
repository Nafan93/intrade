<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreated;
use App\Mail\NewOrder;

use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Api;

use App\Manufacturer;
use App\Sertificate;
use App\Category;
use App\Product;
use App\Order;
use App\Menu;

class ProductController extends Controller
{
    //Front-end
    public function catalog(Request $request)
    {
        $products = Product::select(
            ['id','name','alias','description','product_price','meta_title','meta_description','meta_keywords','show_on_home']
            )->with('categories');
       
        if ($request->has('name')) {
            $products->where('name', 'like', "%$request->name%");    
        }
        if ($request->filled('min')) {
            $products->where('product_price', '>=', $request->min);    
        }
        if ($request->filled('max')) {
            $products->where('product_price', '<=', $request->max);    
        }
        
      
        if ($request->filled('categories')) {
            
            $categories = $request->categories;

            $products = Product::when($categories, function (Builder $query, $categories) {
                return $query->whereHas('categories', function (Builder $query) use ($categories) {
                    $query->whereIn('categories.id', $categories);
                });
            });
            
        }
        
        if ($request->has('manufacturers')) {
            
            $manufacturers = $request->manufacturers;

            $products = Product::when($manufacturers, function (Builder $query, $manufacturers) {
                return $query->whereHas('manufacturers', function (Builder $query) use ($manufacturers) {
                    $query->whereIn('manufacturers.id', $manufacturers);
                });
            });
            
        }
        
        $products = $products->get();

        return view ('pages.catalog.index', compact('products'))->with([
            'categories' => Category::get(),
            'manufacturers' => Manufacturer::get(),
            ]);
    }

    public function showProduct($url)
    {
        $product = Product::select(
            ['id','name','alias','description','product_price','meta_title','meta_description','meta_keywords','show_on_home']
            )->where('alias', $url)->first();
        
        return view ('pages.catalog.show')->with(['product' => $product,
                    'categories' => Category::get()            
                    ]);
    }
    
    public function productSend(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'agreement' =>'required|accepted'
        ]);
          
        $order = new Order([
        'name' => $request->get('name'),
        'phone' => $request->get('phone'),
        'email' => $request->get('email'),
        'product_id' => $request->get('product_id'),
        'status' => $request->get('status'),
        'agreement' => $request->get('agreement')
        ]);
        
        $order->save();
       
        $adminEmail = config('app.adminEmail');
        
        Mail::to($adminEmail)->send(new NewOrder($order));
        
        Telegram::sendMessage([
            'chat_id' => config('app.chatId'),
            'text' => trans('messages.order',[
                'url' => config('app.url'),
                'product' => $order->product->name,
                'name' => $order->name,
                'phone' => $order->phone,
                'email' => $order->email
            ])
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
        
        if ($request->file != 0) {
            Storage::makeDirectory('uploads/products/prod-id-' . $product->id);
        
            $request->file('image')
                ->move(storage_path() . '/app/public/uploads/products/prod-id-' . $product->id, 'productImage.jpg');
 
            $product->image = '/storage/uploads/products/prod-id-' . $product->id . '/productImage.jpg';
        }
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
