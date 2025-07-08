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

        $blogs = Page::where('title', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%")
                    ->where('content_type', 'blog')
                    ->get();

        return view('pages.main.search', [
            'current_page' => 'search',
            'navigations' => Navigation::where('category', 'public')->where('status', 'show')->get(),
            'products' => $products,
            'blogs' => $blogs,
            'javascript_file' => ''
        ]);
    }


    public function about()
    {
        return view('pages.main.about',
            [
                'current_page' => 'about',
                'navigations' => Navigation::where('category', 'public')->where('status', 'show')->get(),
                'page_detail' => Page::where('slug', 'about-us')->first(),
                'javascript_file' => ''
            ]
        );
    }

    public function product()
    {
        return view(
            'pages.main.product',
            [
                'current_page' => 'products',
                'navigations' => Navigation::where('category', 'public')->where('status', 'show')->get(),
                'products' => Product::all(),
                'javascript_file' => 'main/home.js'
            ]
        );
    }

    public function productDetail($id) {

        return view(
            'pages.main.product-detail',
            [
                'current_page' => 'products',
                'navigations' => Navigation::where('category', 'public')->where('status', 'show')->get(),
                'products' => Product::whereNot('id', $id)->get(),
                'detail' => Product::find($id),
                'javascript_file' => ''
            ]
        );
    }


    public function blogs()
    {
        return view(
            'pages.main.blogs',
            [
                'current_page' => 'blogs',
                'navigations' => Navigation::where('category', 'public')->where('status', 'show')->get(),
                'blogs' => Page::where('content_type', 'blog')->get(),
                'javascript_file' => 'main/home.js'
            ]
        );
    }

   public function blogDetail($slug){
        return view(
            'pages.main.blog-detail',
            [
                'current_page' => 'blog',
                'navigations' => Navigation::where('category', 'public')->where('status', 'show')->get(),
                'detail' => Page::where('slug', $slug)->first(),
                'blogs' =>Page::where('content_type', 'blog')->whereNot('slug', $slug)->get(),
                'javascript_file' => ''
            ]
        );
    }

    public function order()
    {
        return view(
            'pages.main.order',
            [
                'current_page' => 'order',
                'navigations' => Navigation::where('category', 'public')->where('status', 'show')->get(),
                'products' => Product::all(),
                'javascript_file' => 'main/home.js'
            ]
        );
    }
}
