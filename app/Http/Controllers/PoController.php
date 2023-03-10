<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if(Auth::user()->type == 'Admin')
        {
            $data = PurchaseOrder::latest()->orderBy('id', 'desc')->get();
        }
        if(Auth::user()->type == 'User')
        {
            $user_name  = Auth::user()->name;
            $data = PurchaseOrder::latest()
                    ->where('distributor', $user_name)
                    ->orderBy('id', 'desc')
                    ->get();
        }
        return view('components.user.po', compact('data'));
    }

    public function export_purchase_order()
    {
        return Excel::download(new PurchaseOrdersExport, 'purchase_orders.xlsx');
    }

    function getterritory(Request $request)
    {
        $select = $request->get('select');
        $value  = $request->get('value');
        $dependent  = $request->get('dependent');
        $data   = DB::table('territories')
                ->where($select, $value)
                ->get();
        $output = '<option value="">Select '.ucfirst($dependent).'</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
        }
        echo $output;
    }
    
    function getdistributor(Request $request)
    {
        $value  = $request->get('value');
        $data   = DB::table('users')
                ->where('territory', $value)
                ->get();
        $output = '<option value="">Select Distributor</option>';
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->name.'">'.$row->name.'</option>';
        }
        echo $output;
    }

    public function add() 
    {
        $zone_list = DB::table('zones')
                        ->select('zone_long_desc')
                        ->get();
        $data = Product::latest()->get();
        return view('components.user.add_po', compact('data'))->with('zone_list', $zone_list);
    }

    public function add_validation(Request $request)
    {
        $request->validate([
            'zone'          => 'required',
            'region'        => 'required',
            'territory'     => 'required',
            'distributor'   => 'required'
        ]);

        $data = $request->all();

        PurchaseOrder::create([
            'zone'          => $data['zone'],
            'region'        => $data['region'],
            'territory'     => $data['territory'],
            'distributor'   => $data['distributor'],
            'sku_code'      => implode(", ", $data['sku_code']),
            'sku_name'      => implode(", ", $data['sku_name']),
            'unit_price'    => implode(", ", $data['unit_price']),
            'quantity'      => implode(", ", $data['quantity']),
            'total_price'   => implode(", ", $data['total_price'])
        ]);

        return redirect('po/add')->with('success', 'Purchase Order added');
    }

    public function view($id)
    {
        $data = PurchaseOrder::findOrFail($id);
        return view('components.user.view_po', compact('data'));
    }

    public function invoiceGenarate(Request $request)
    {
        $po_id_array_string  = $request->input('po_ids');
        $po_id_array = explode(",",$po_id_array_string[0]);

        if($po_id_array[0] == null)
        {
            return redirect('po')->with('warning', 'Please select po number');
        }

        $data = PurchaseOrder::find($po_id_array);

        return view('components.user.invoice', compact('data'));
    }
}
