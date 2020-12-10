<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Config;
use DB;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Store;


class StoreController extends Controller
{
    //
    public function create(Request $request)
    {
        return view('admin.store.create');
    }

    public function index()
    {
        
        $stores= Store::Selection()->get();
        return view('admin.store.index',compact('stores'));
    }
    public function store(StoreRequest $request)
    {
        try {
            if (!$request->has('active'))
                $request->request->add(['active' => 0]);
            else
                $request->request->add(['active' => 1]);
            
            DB::beginTransaction();

            $color=Store::create([
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
                'active' => $request->active,
            ]);

            DB::commit();

            return redirect()->route('admin.store')->with(['success' => 'تم الحفظ بنجاح']);

        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('admin.store')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
