<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Users = User::all();
        return view('users.index',compact('Users',$Users));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'password' => 'required|min:3',
            'phone' => 'required|min:10',
        ]);
        
        $User = User::create(['name' => $request->name,'email' => $request->email ,'password' => bcrypt($request->password),'phone' => $request->phone,'image' => $request->image]);
        return redirect('/Users/'.$User->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        return view('users.show',compact('User',$User));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        return view('users.edit',compact('User',$User));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        //Validate
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            //'password' => 'required|min:3',
            'phone' => 'required|min:10',
        ]);
        
        $User->name = $request->name;
        $User->email = $request->email;
        $User->phone = $request->phone;
        $User->image = $request->image;
        $User->save();
        $request->session()->flash('message', 'Successfully modified the User!');
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $User)
    {
        $User->delete();
        $request->session()->flash('message', 'Successfully deleted the User!');
        return redirect('users');
    }
}
