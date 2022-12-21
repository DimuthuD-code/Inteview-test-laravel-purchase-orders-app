<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        return view('components.admin.product.product');
    }
    public function fetch_all(Request $request)
    {
        if($request->ajax())
        {
            $data = Product::latest()->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return '<a href="/product/edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>&nbsp;
                        <button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    public function add()
    {
        return view('components.admin.product.add_product');
    }

    public function add_validation(Request $request)
    {
        $request->validate([
            'sku_code'          => 'required',
            'sku_name'          => 'required',
            'mrp'               => 'required',
            'distributor_price' => 'required',
            'volume'            => 'required',
            'unit'              => 'required'
        ]);

        $data = $request->all();

        Product::create([
            'sku_code'          => $data['sku_code'],
            'sku_name'          => $data['sku_name'],
            'mrp'               => $data['mrp'],
            'distributor_price' => $data['distributor_price'],
            'volume'            => $data['volume'],
            'unit'              => $data['unit']
        ]);

        return redirect('product')->with('success', 'New Product Added');

    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);
        return view('components.admin.product.edit_product', compact('data'));
    }

    public function edit_validation(Request $request)
    {
        $request->validate([
            'sku_code'          => 'required',
            'sku_name'          => 'required',
            'mrp'               => 'required',
            'distributor_price' => 'required',
            'volume'            => 'required',
            'unit'              => 'required'
        ]);

        $data = $request->all();

        $form_data = array(
            'sku_code'          => $data['sku_code'],
            'sku_name'          => $data['sku_name'],
            'mrp'               => $data['mrp'],
            'distributor_price' => $data['distributor_price'],
            'volume'            => $data['volume'],
            'unit'              => $data['unit']
        );

        Product::whereId($data['hidden_id'])->update($form_data);
        return redirect('product')->with('success', 'Product Data Updated');

    }

    function delete($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();
        return redirect('product')->with('success', 'Product Data Removed');
    }
}
