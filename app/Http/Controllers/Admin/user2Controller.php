<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\storedata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class user2Controller extends Controller
{

    public function index()
    {
        $users = User::orderByDesc('id')->get();
        return view('Admin.user2.index',compact('users'));
    }


    public function create()
    {
        return view('Admin.user2.create');
    }


    public function store(storedata $request)
    {
        try{
            $data = new User();
            // if($request->hasfile('image')){
            //     $file = $request->file('image');
            //     $ext  = $file->getClientOriginalExtension();
            //     $filename = time().'.'.$ext;
            //     $file->move('uploads/user-img/', $filename);
            //     $data->image = $filename;
            // }
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->save();
            toastr()->success(__('user create successfully'));
            return redirect()->route('user2.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('Admin.user2.edit',compact('user'));
    }

    public function update(storedata $request, $id)
    {
        try{


            $data = User::findorfail($id);
            // if($request->hasFile('image')){
            //     $path = 'uploads/user-img/' . $data->image;
            //     if(File::exists($path)){
            //         File::delete($path);
            //     }
            //     $file = $request->file('image');
            //     $ext  = $file->getClientOriginalExtension();
            //     $filename = time() . '.' . $ext ;
            //     $file->move('uploads/user-img',$filename);
            //     $data->image = $filename;
            // }
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
            return redirect()->route('user2.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
         }
    }

    public function destroy($id)
    {
        User::destroy($id);
        toastr()->success(__('user deleted successfully'));
        return redirect()->route('user2.index');
    }
}
