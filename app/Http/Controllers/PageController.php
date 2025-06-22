<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Navigation;
use App\Models\Page;


class PageController extends Controller
{
    public function index()
    {
        return view('pages.main.home',
            [
                'current_page' => 'home',
                'navigations' => Navigation::where('category', 'public')->where('status', 'show')->get(),
                'products' => Product::all(),
                'javascript_file' => 'main/home.js'
            ]
        );
    }

    public function search(Request $request)
    {
        $query = $request->input('search');

        $products = Product::where('product_name', 'like', "%{$query}%")
                            ->orWhere('product_description', 'like', "%{$query}%")
                            ->get();

        // $blogs = Page::where('title', 'like', "%{$query}%")
        //             ->orWhere('content', 'like', "%{$query}%")
        //             ->where('content_type', 'blog')
        //             ->get();

        return view('pages.main.search', [
            'current_page' => 'search',
            'navigations' => Navigation::where('category', 'public')->where('status', 'show')->get(),
            'products' => $products,
            // 'blogs' => $blogs,
            'javascript_file' => ''
        ]);
    }


    public function about()
    {
        return view('pages.main.about',
            [
                'current_page' => 'about',
                

            
            ]
        );
    }

    public function products()
    {

    }

    public function blogs()
    {

    }


    public function order()
    {

    }
}
