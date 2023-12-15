<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Type;
use App\Models\Manual;

class AdminController extends Controller
{
    public function show()
    {
        $manuals = Manual::with('types.brand')->get();
        return view('admin/index')->with('manuals', $manuals);
        
    }

    public function create()
    {
        $brands = Brand::all();   
        return view('admin/createManual')->with('brands', $brands);
    }

    public function getType(Request $request){
        $brand = Brand::find($request->brand);
        return view('admin/createmanual2')->with('brand', $brand);
    }


    public function getLink(Request $request){
        $manual = new Manual;
        $manual->originUrl = $request->link;
        $manual->filename = $request->filename;
        $manual->filesize = 0;
        $manual->save();

        $type = Type::find($request->type);
        $type->manuals()->attach($manual);
        return redirect()->route('admin.index');
    }

    public function getFileName(Request $request){
        $manual = new Manual;
        $manual->filename = $request->filename;
        $manual->filesize = 0;
        $manual->save();

        $filename = Type::find($request->filename);
        $filename->manuals()->attach($manual);
        
    }

    public function delete(Manual $manual)
    {
        $manual->types()->detach();
        $manual->delete();

        $manuals = Manual::with('types.brand')->get();
        return redirect()->route('admin.index')->with('manuals', $manuals);
    }
}
