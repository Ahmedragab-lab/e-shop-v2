<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
// use DataTables;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $users =  User::latest()->get();
        //  $users =  User::orderByDesc('id')->get();
        if ($request->ajax()) {
            return Datatables::of($users)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser">Edit</a>';
                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser">Delete</a>';
                    return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('Admin.user.index');
    }
    // public function data()
    // {
    //     // $users = User::where('type', 'user')->select();
    //     $users =  User::latest()->get();
    //     return DataTables::of($users)
    //         // ->addColumn('record_select', 'Admin.user.data_table.record_select')
    //         ->editColumn('created_at', function (User $user) {
    //             return $user->created_at->format('Y-m-d');
    //         })
    //         ->addColumn('actions', 'Admin.user.data_table.actions')
    //         ->rawColumns(['record_select', 'actions'])
    //         ->toJson();

    // }// end of data
    // public function create()
    // {
    //     return view('Admin.user.create');

    // }// end of create
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => ['required','min:3','max:100'],
        //     'email' => ['required','email', Rule::unique('users')->ignore($this->user)],
        //     'password' => 'required|same:confirm-password',

        //     ]);
        User::updateOrCreate(
        [
        'id' => $request->user_id
        ],
        [
         'name' => $request->name,
         'email' => $request->email,
         'password' => Hash::make($request->password),
        ]);
        return response()->json(['success'=>'user saved successfully.']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return User::findOrFail($id);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json(['success'=>'User deleted successfully.']);

    }
}
