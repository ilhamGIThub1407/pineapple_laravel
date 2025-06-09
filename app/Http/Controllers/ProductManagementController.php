<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class ProductManagementController extends Controller
{
    private $view_directory = 'pages.admin.product.';
    private $url = 'product-management';
    private $page_title = 'Product Management';

    public function index()
    {
        return view(
            $this->view_directory . 'index',
            [
                
                'page_title' => $this->page_title,
                'current_page' => $this->url,
                'data' => Product::paginate(4),
                'javascript_file' => '',

            ]
        );
    }

    public function create()
    {
        return view(
            $this->view_directory . 'create',
            [
                
                'page_title' => $this->page_title,
                'current_page' => $this->url,
                'javascript_file' => 'admin/product/create.js',
            ]
        );
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_video' => 'required',
            'product_video.*' => 'file|mimes:mp4,avi,mov,webm|max:51200', // max 50MB 
        ]);

        $folder_destination = 'uploads/products';
        $file = $request->file('product_video');
        $file_name = time() . '-' . $request->file('product_video')->getClientOriginalName();
        $file->move($folder_destination, $file_name);

        try {
            $data['product_name'] = $request->product_name;
            $data['product_description'] = $request->product_description;
            $data['product_video'] = $folder_destination . '/' . $file_name;
            if (Product::create($data)) {
                return response()->json([
                    'status' => 201,
                    'message' => 'The product has been added.'
                ]);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Sorry, failed to add the product.'
                ]);
            }
        } catch (\Exception $error) {
            return response()->json([
                'status' => 422,
                'message' => 'Sorry, failed to add the product.' . $error->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        return view(
            $this->view_directory . 'edit',
            [
                
                'page_title' => $this->page_title,
                'current_page' => $this->url,
                'detail' => Product::find($id),
                'javascript_file' => 'admin/product/edit.js',
            ]
        );
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_video.*' => 'file|mimes:mp4,avi,mov,webm|max:51200', // max 50MB
        ]);

        try {
            $data = Product::find($request->id);

            if ($data) {
                $data->product_name = $request->product_name;
                $data->product_description = $request->product_description;
                
                if ($request->hasFile('product_video')) {
                
                if ($data->product_video && file_exists(public_path($data->product_video))) {
                    unlink(public_path($data->product_video));
                }

                $folder_destination = 'uploads/products';
                $file = $request->file('product_video');
                $file_name = time() . '-' . $file->getClientOriginalName();
                $file->move(public_path($folder_destination), $file_name);

                $data->product_video = $folder_destination . '/' . $file_name;
            }

                $data->save();
            }

            return response()->json([
                'status' => 201,
                'message' => 'The product has been update',
            ]);

        } catch (\Exception $error) {
            return response()->json([
                'status' => 422,
                'message' => 'Failed to update data' .$error->getMessage(),
            ]);
        }
    }

    public function destroy($id){
        $data = Product::find($id);
        if($data){
            $data->delete();
            session::flash('message', 'The data has been deleted');
            return redirect('/product-management');
        }
    }
}
