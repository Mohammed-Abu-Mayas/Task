<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Config;
use DB;
use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $categories=Category::with('store')->Selection()->get();
        //return $categories;
        return view('admin.product.create',compact('categories'));
    }

    public function index()
    {
        $products=Product::with('category','images')->Selection()->get();
        //return $products;
        return view('admin.product.index',compact('products'));
    }


    public function store(ProductRequest $request)
    {
       // try {
            //return $request;
            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);

            DB::beginTransaction();

            $default_product_id=Product::insertGetId([
                'name' => $request->name,
                'price' => $request->price,
                'cat_id' => $request->cat_id,
                'color' => $request->color,
                'size' => $request->size,
                'description' => $request->description,
                'active' => $request->active,
            ]);

            $filePath = "";
            if ($request->has('photo')) {

                $request->photo->store('/', 'products');
                $filename = $request->photo->hashName();
                $path = 'products' . '/' . $filename;
                //return $path;

                //$filePath = uplaodImage('products', $request->photo);
                $image1 = Image::create([
                    'product_id' => $default_product_id,
                    'link' => $path,
                ]);
            }
            $filePath2 = "";
            if ($request->has('photo1')) {

                $request->photo1->store('/', 'products');
                $filename1 = $request->photo1->hashName();
                $path1 = 'products' . '/' . $filename1;

                //$filePath2 = uplaodImage('products', $request->photo2);
                
                $image2 = Image::create([
                    'product_id' => $default_product_id,
                    'link' => $path1,
                ]);
            }

            DB::commit();
           return redirect()->route('admin.product')->with(['success' => 'تم الحفظ بنجاح']);

        //  } catch (\Exception $ex) {
        //     DB::rollback();
        //     return redirect()->route('admin.product')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        //  }
    }
}
