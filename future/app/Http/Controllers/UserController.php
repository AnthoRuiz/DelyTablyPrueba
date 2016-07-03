<?php

namespace future\Http\Controllers;

use future\Category;
use future\Product;
use future\User;
use Illuminate\Http\Request;
use future\Http\Requests;
use future\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

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
        $user = User::findOrFail($id);
        return view ('user.user_profile', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view ('user.user_update', ['user' => $user]);

    }

    public function listProducts($id)
    {
        $user = User::findOrFail($id);
        return view ('user.user_listProducts', ['contents' => $user->contents]);
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
        $postData = $request->all();
        $rules = [
            'email' => 'required|email',
            'name' => 'required',
        ];
        $validator = Validator::make($postData,$rules);

        if($validator->fails())
        {
            return redirect()->route('user_edit_path', $id)
                ->withInput()
                ->withErrors($validator);
        }
        else
        {
            $user = User::findOrFail($id);
            $user->name    = $postData['name'];
            $user->email   = $postData['email'];
            $user->save();
            
            return redirect()->route('user_edit_path', $user->id)
                ->withErrors('Usuario Actualizado con exito');
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
        //
    }
}
