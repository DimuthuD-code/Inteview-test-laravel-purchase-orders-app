<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ZoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('components.admin.zone.zone');
    }
    public function fetch_all(Request $request)
    {
        if($request->ajax())
        {
            $data = Zone::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return '<a href="/zone/edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>&nbsp;
                        <button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    function add()
    {
        return view('components.admin.zone.add_zone');
    }

    public function add_validation(Request $request)
    {
        $request->validate([
            'zone_long_desc'    => 'required|unique:zones',
            'short_desc'        => 'required|unique:zones'
        ]);

        $data = $request->all();

        Zone::create([
            'zone_long_desc' => $data['zone_long_desc'],
            'short_desc'     => $data['short_desc']
        ]);

        return redirect('zone')->with('success', 'New Zone Added');
    }

    public function edit($id)
    {
        $data = Zone::findOrFail($id);
        return view('components.admin.zone.edit_zone', compact('data'));
    }

    public function edit_validation(Request $request)
    {
        $request->validate([
            'zone_long_desc' => 'required',
            'short_desc'     => 'required'
        ]);

        $data = $request->all();
        

        $form_data = array(
            'zone_long_desc' => $data['zone_long_desc'],
            'short_desc'     => $data['short_desc']
        );

        Zone::whereId($data['hidden_id'])->update($form_data);
        return redirect('zone')->with('success', 'Zone Data Updated');
    }

    function delete($id)
    {
        $data = Zone::findOrFail($id);
        $data->delete();
        return redirect('zone')->with('success', 'Zone Data Removed');
    }

}
