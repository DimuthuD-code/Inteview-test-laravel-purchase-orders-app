<?php

namespace App\Http\Controllers;

use App\Models\Territory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class TerritoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('components.admin.territory.territory');
    }
    public function fetch_all(Request $request)
    {
        if($request->ajax())
        {
            $data = Territory::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return '<a href="/territory/edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>&nbsp;
                        <button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    function getregion(Request $request)
    {
        $value  = $request->get('value');
        $data   = DB::table('regions')
                ->select('region_name')
                ->where('zone', $value)
                ->get();
        $output = '<option value="">Select Region</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->region_name.'">'.$row->region_name.'</option>';
        }
        echo $output;
    }

    function add()
    {
        $zone_list = DB::table('zones')
                        ->select('zone_long_desc')
                        ->get();
        return view('components.admin.territory.add_territory')->with('zone_list', $zone_list);
    }

    public function add_validation(Request $request)
    {
        $request->validate([
            'zone'              => 'required',
            'region'              => 'required',
            'territory_name'    => 'required|unique:territories'
        ]);

        $data = $request->all();

        Territory::create([
            'zone'              => $data['zone'],
            'region'            => $data['region'],
            'territory_name'    => $data['territory_name']
        ]);

        return redirect('territory')->with('success', 'New Territory Added');
    }

    public function edit($id)
    {
        $zone_list = DB::table('zones')
                        ->select('zone_long_desc')
                        ->get();
        $data = Territory::findOrFail($id);
        return view('components.admin.territory.edit_territory', compact('data'))->with('zone_list', $zone_list);
    }

    public function edit_validation(Request $request)
    {
        $request->validate([
            'zone'              => 'required',
            'region'            => 'required',
            'territory_name'    => 'required'
        ]);

        $data = $request->all();
        

        $form_data = array(
            'zone'              => $data['zone'],
            'region'            => $data['region'],
            'territory_name'    => $data['territory_name']
        );

        Territory::whereId($data['hidden_id'])->update($form_data);
        return redirect('territory')->with('success', 'Territory Data Updated');
    }

    function delete($id)
    {
        $data = Territory::findOrFail($id);
        $data->delete();
        return redirect('territory')->with('success', 'Territory Data Removed');
    }
}
