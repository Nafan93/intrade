<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Front-end
    public function listCategories()
    {
        $categories = Category::all();
        return view ('pages.categories.index')->with(['categories' => $categories,
                            'products' => Product::get()
                            ]);
    }

    public function showCategory($url)
    {
        $category = Category::all()->where('category_alias', $url)->first();
        return view ('pages.categories.show')->with(['category' => $category,
                            'product' => Product::get()
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
        $categories = Category::all();
        return view ('admin.categories.index')->with(['categories' => $categories,
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
        return view('admin.categories.create', [
            'category' => [],
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
            'category_name'=>'required',
        ]);

        $category = new Category([
            'category_name' => $request->get('category_name'),
            'category_alias' => $request->get('category_alias'),
            'category_img' => $request->get('category_img'),
            'meta_title' => $request->get('meta_title'),
            'meta_keywords' => $request->get('meta_keywords'),
            'meta_description' => $request->get('meta_description')
        ]);
        $category->save();
        return redirect('/dashboard/categories')->with('success', 'Категория сохранена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($url)
    {
        $category = Category::all()->where('category_alias', $url)->first();
        return view ('admin.categories.show')->with(['category' => $category,
                            'products' => Product::get()
                            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',  [
            'category' => $category
            ]);      
    }

    /** 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->category_name =  $request->get('category_name');
        $category->category_alias = $request->get('category_alias');
        $category->category_img = $request->get('category_img');
        $category->meta_title = $request->get('meta_title');
        $category->meta_keywords = $request->get('meta_keywords');
        $category->meta_description = $request->get('meta_description');
        $category->save();

        return redirect('/dashboard/categories')->with('success', 'Категория отредактирована');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        $category = Category::find($id);
        $category->delete();
        return redirect('/dashboard/categories')->with('success', 'Категория' + $category->category_name + 'удалена');

    }
}
