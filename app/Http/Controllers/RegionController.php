<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RegionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('components.admin.region.region');
    }
    public function fetch_all(Request $request)
    {
        if($request->ajax())
        {
            $data = Region::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return '<a href="/region/edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>&nbsp;
                        <button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    function add()
    {
        $zone_list = DB::table('zones')
                        ->select('zone_long_desc')
                        ->get();
        return view('components.admin.region.add_region')->with('zone_list', $zone_list);
    }

    public function add_validation(Request $request)
    {
        $request->validate([
            'zone'          => 'required',
            'region_name'   => 'required|unique:regions'
        ]);

        $data = $request->all();

        Region::create([
            'zone'          => $data['zone'],
            'region_name'   => $data['region_name']
        ]);

        return redirect('region')->with('success', 'New Region Added');
    }

    public function edit($id)
    {
        $zone_list = DB::table('zones')
                        ->select('zone_long_desc')
                        ->get();
        $data = Region::findOrFail($id);
        return view('components.admin.region.edit_region', compact('data'))->with('zone_list', $zone_list);
    }

    public function edit_validation(Request $request)
    {
        $request->validate([
            'zone'          => 'required',
            'region_name'   => 'required'
        ]);

        $data = $request->all();
        

        $form_data = array(
            'zone'          => $data['zone'],
            'region_name'   => $data['region_name']
        );

        Region::whereId($data['hidden_id'])->update($form_data);
        return redirect('region')->with('success', 'Region Data Updated');
    }

    function delete($id)
    {
        $data = Region::findOrFail($id);
        $data->delete();
        return redirect('region')->with('success', 'Region Data Removed');
    }
}
