<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
    * is_admin
    * 1=supper admin
    *2=finance
    *3=sell
    *4=user
    */

    public function index()
    {
        $users = User::where('status','<>',3)->orderBy('id', 'DESC')->get();
        $data['users'] = $users;
        return view('admin.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate(
            [
                'name'              =>      'required|string|max:20',
                'email'             =>      'required|email|unique:users,email',
                'is_admin'          =>      'required',
                // 'password'          =>      'required|alpha_num|min:6',
                'password'          =>      'required|min:6',
                'password_confirmation'  => 'required|same:password'
            ]
        );

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'is_admin' => $request['is_admin'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect("/users");
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user= User::find($id);
        
        return view('admin.user.edit')->with(compact('user'));
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
        $request->validate(
            [
                'name'              =>      'required|string|max:20',
                // 'email'             =>      'required|email|unique:users,email',
                'is_admin'          =>      'required'
            ]
        );
        
        // $userId = $request->id;
       
        User::where('id',$id)->update([
            "name"=>$request->name , 
            // "email"=>$request->email,
            "is_admin"=>$request->is_admin
        ]);

        return redirect("/users");
    }

    /**
     * change password
     */
    public function changePwd($id)
    {
        $user= User::find($id);
        
        return view('admin.user.changepwd')->with(compact('user'));;
    }

    /**
     * update password
     */
    public function updatepwd(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
