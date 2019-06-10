<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Auth;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        //$this->authorize('Admin');
        return User::orderBy('created_at', 'desc')->with('city')->paginate(10);
        //return User::orderBy('created_at', 'desc')->with('city')->get();
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|max:100|min:8',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|string|max:100|min:8'
        ]);
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'type' => $request['type'],
            'bio' => $request['bio'],
            'photo' => $request['photo']
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate($request,[
            'name'=>'required|string|max:100|min:8',
            'email'=>'required|string|email|unique:users,email,'.$user->id
        ]);
        $user->update($request->all());
    }

    public function destroy($id)
    {
        //$this->authorize('Admin');
        $user = User::findOrFail($id);
        $user->delete();
    }

    public function updateinfo(Request $request)
    {
        $user = auth('api')->user();     

        $this->validate($request,[
            'name'=>'required|string|max:100|min:8',
            'email'=>'required|string|email|unique:users,email,'.$user->id,
            'password'=>'sometimes|max:100|min:8'
        ]);   

        if($request->photo != $user->photo){

            /* image upload to server */
            $name = time().'.'.explode('/',explode(':',substr($request->photo,0,strpos(
            $request->photo,';')))[1])[1];
            \Image::make($request->photo)->resize(300, 200)->save(public_path('img/profile/').$name);    
            
            $request->merge(['photo'=>$name]);  
            
            /* delete the old image */
            $photo = public_path('img/profile/').$user->photo;
            if(file_exists($photo)){
                @unlink($photo);
            }
            
        }
        /* check password to make it encrypted */
        if(!empty($request->password)){
            $request->merge(['password'=>Hash::make($request['password'])]);
        }

        $user->update($request->all());
        return auth('api')->user();

    }

    public function profile()
    {
        return auth('api')->user();
    }
}

