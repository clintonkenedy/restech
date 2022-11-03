<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit()
    {
        $user = Auth::user();
        return view('user_profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        // $data= new Postimage();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // if($request->file('img_avatar')){
        //     // if(unlink($user->avatar)) unlink($user->avatar);
        //     $file = $request->file('img_avatar');
        //     $filename = substr(str_shuffle($str_result), 0, 8)."_".$file->getClientOriginalName();
        //     $file->move(public_path('image'), $filename);
        //     $data['image'] = $filename;
        //     $user->avatar = '/image/'.$filename;
        //     $data->save();
        // }
        $user->save();

        return redirect('/profile/edit');
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

    public function edit_pass()
    {
        $user = Auth::user();
        return view('user_profile.edit_pass', compact('user'));
    }

    public function update_pass(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'new_password' => 'required',
            'new_password_confirmation' => 'required',
        ]);
        $input = $request->all();

        if ($request->input('new_password') !== $request->input('new_password_confirmation')) {
            return;
        }
        $user = Auth::user();
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->input('new_password_confirmation'))
        ]);

        // auth()->logout();
        Auth::guard('web')->logout();
        return redirect('/login');

    }
}
