<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\Master;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
 
class MasterController extends Controller
{
    public function index()
    {
        $data = master::all()->toArray();
        return view('/admin/master/index',['data' => $data]);
    }

    public function create()
    {
        return view('/admin/master/create');
    }

    public function edit()
    {
        return view('/admin/master/edit');
    }

    public function add(Request $request)
    {
        // dd($request->master_item_name);
        $key = $request->master_item_name;
        $value = " ";
        master::updateOrCreate(['master_key' => $key],['master_key' => $key,'master_value' => $value,'created_at' => Carbon::now()->timestamp]);
    }
    public function add_item(Request $request)
    {
        // dd($request);
        
        
        $key = $request->master_item_name;
        if(empty($key))
        {
            $key = " ";
        }
        $value = $request->master_value_item;
        if(empty($value))
        {
            $value = " ";
        }
        master::updateOrCreate(['master_key' => $key],['master_key' => $key,'master_value' => $value,'created_at' => Carbon::now()->timestamp]);
    }  
    public function remove_master_item(Request $request)
    {
        $key = $request->master_item_name;
        if(empty($key))
        {
            $key = " ";
        }
        master::where('master_key', $key)->delete();
    }  
}
