<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        return view('components.admin.users.users');
    }
    public function fetch_all(Request $request)
    {
        if($request->ajax())
        {
            $data = User::where('type', '=', 'User')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return '<a href="/users/edit/'.$row->id.'" class="btn btn-primary btn-sm">Edit</a>&nbsp;
                        <button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'">Delete</button>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    public function add()
    {
        $territory_list = DB::table('territories')
                        ->select('territory_name')
                        ->get();
        return view('components.admin.users.add_users')->with('territory_list', $territory_list);
    }

    public function add_validation(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'nic'       => 'required',
            'address'   => 'required',
            'mobile'    => 'required|max:12',
            'email'     => 'required|email',
            'gender'    => 'required',
            'territory' => 'required',
            'username'  => 'required',
            'password'  => 'required'
        ]);

        $data = $request->all();

        User::create([
            'name'      => $data['name'],
            'nic'       => $data['nic'],
            'address'   => $data['address'],
            'mobile'    => $data['mobile'],
            'email'     => $data['email'],
            'gender'    => $data['gender'],
            'territory' => $data['territory'],
            'username'  => $data['username'],
            'password'  => Hash::make($data['password']),
            'type'      => 'User'
        ]);

        return redirect('users')->with('success', 'New User Added');

    }

    public function edit($id)
    {
        $territory_list = DB::table('territories')
                        ->select('territory_name')
                        ->get();
        $data = User::findOrFail($id);
        return view('components.admin.users.edit_users', compact('data'))->with('territory_list', $territory_list);
    }

    public function edit_validation(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'nic'       => 'required',
            'address'   => 'required',
            'mobile'    => 'required|max:12',
            'email'     => 'required|email',
            'gender'    => 'required',
            'territory' => 'required',
            'username'  => 'required',
        ]);

        $data = $request->all();

        if(!empty($data['password']))
        {
            $form_data = array(
                'name'      => $data['name'],
                'nic'       => $data['nic'],
                'address'   => $data['address'],
                'mobile'    => $data['mobile'],
                'email'     => $data['email'],
                'gender'    => $data['gender'],
                'territory' => $data['territory'],
                'username'  => $data['username'],
                'password'  => Hash::make($data['password']),
            );
        }
        else
        {
            $form_data = array(
                'name'      => $data['name'],
                'nic'       => $data['nic'],
                'address'   => $data['address'],
                'mobile'    => $data['mobile'],
                'email'     => $data['email'],
                'gender'    => $data['gender'],
                'territory' => $data['territory'],
                'username'  => $data['username'],
            );
        }

        User::whereId($data['hidden_id'])->update($form_data);
        return redirect('users')->with('success', 'User Data Updated');

    }

    function delete($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect('users')->with('success', 'User Data Removed');
    }
}
