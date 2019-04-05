<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'xx' ;
        return view('pages.index')
            ->with( 'title', 'bla bla ') ;
        // return view('pages.index', compact('title')) ;
    }

    public function about()
    {
        $title = 'about us Ttt' ;
        return view('pages.about')->with('title', $title) ;
    }
    public function services()
    {
        $data = [
            'title' => 'services title',
            'services' => [
                'webdesign', 'prograing', 'seo'
            ]  
        ] ;
        return view('pages.service')->with($data) ;
    }
}
