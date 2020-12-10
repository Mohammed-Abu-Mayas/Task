<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Config;
use DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function create(Request $request)
    {
        $stores = Store::active()->get();
        return view('admin.category.create',compact('stores'));
    }

    public function index()
    {
        $categories=Category::with('store')->Selection()->get();
        return view('admin.category.index',compact('categories'));
    }
    public function store(CategoryRequest $request)
    {
        try {
            
            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);
            
            DB::beginTransaction();

            $cat=Category::create([
                'name' => $request->name,
                'store_id' => $request->store_id,
                'description' => $request->description,
                'active' => $request->active,
            ]);

            DB::commit();
            return redirect()->route('admin.category')->with(['success' => 'تم الحفظ بنجاح']);

        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.category')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
         }
    }
}
