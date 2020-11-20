<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doc;

class DocController extends Controller
{
    public function docs()
    {
        $docs = Doc::all();

        return view ('pages.docs.index')->with([
            'docs' => $docs
        ]);
    }

    public function showDoc($slug)
    {
        $doc = Doc::select(
            ['id','name','slug','content','meta_title','meta_description','meta_keywords']
            )->where('slug', $slug)->first();

        return view ('pages.docs.show')->with(['doc' => $doc]);
    }
}