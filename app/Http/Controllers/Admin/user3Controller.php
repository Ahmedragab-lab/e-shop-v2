<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Hash;
class user3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user3.index');
    }

    public function data()
    {
        $users =  User::latest()->select();
        return DataTables::of($users)
            ->addColumn('record_select', 'Admin.user3.data_table.record_select')
            ->editColumn('created_at', function (User $user) {
                return $user->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'Admin.user3.data_table.actions')
            ->rawColumns(['record_select', 'actions'])
            ->toJson();

    }// end of data
    public function create()
    {
        return view('Admin.user3.create');

    }// end of create

    public function store(Request $request)
    {
        // $requestData = $request->validated();
        // $requestData['password'] = bcrypt($request->password);

        User::create($request->all());

        toastr()->success(__('user create successfully'));
        return redirect()->route('user3.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user3.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{


            $data = User::findorfail($id);
            $data->name = $request->name;
            if($data->email != $request->email){
                    $this->validate($request,[
                            'email' => ['required','unique:users'],
                        ]);
                        $data->email = $request->email;
                    }
            $data->password = Hash::make($request->password);
            $data->update();
            toastr()->success(__('user update successfully'));
            return redirect()->route('user3.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        toastr()->success(__('user deleted successfully'));
        return redirect()->route('user3.index');
    }
}
