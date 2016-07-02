<?php

namespace future\Http\Controllers;

use future\Category;
use future\Content;
use Illuminate\Http\Request;
use future\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Storage;

class ContentController extends Controller
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
        $categories = Category::all();

        return view('content.content_create', ['categories' => $categories]);
    }

    public function store()
    {
       // dd(Input::all());
        $Content = new Content;
        $rules = [
            'title'             => 'required',
            'description'       =>  'required',
            'publishing_date'   =>  'required',
            'exp_date'          =>  'required',
            'category'          =>  'required',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('product_store_path')
                ->withInput()
                ->withErrors($validator);
        }else {
            $Content->title = Input::get('title');
            $category = Category::where('name', Input::get('category'))->first();
            $Content->description = Input::get('description');
            $Content->publishing_date = Input::get('publishing_date');
            $Content->exp_date = Input::get('exp_date');
            $Content->author = Auth::user()->name;
            $Content->category_id = $category->id;
            $Content->user_id = Auth::id();
            if($Content->publishing_date < $Content->exp_date){
                $Content->save();
                return redirect()->route('home')->withErrors('Contenido Creado');
            }else{
                return redirect()->route('product_store_path')
                    ->withInput()
                    ->withErrors('La Fecha de creación debe ser MENOR que la fecha de Vencimiento');
            }

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
        $Content = Content::findOrFail($id);
        return view('content.content', ['content' => $Content]);
    }

    //detalles del producto

    public function details($id)
    {
        $Content = Content::findOrFail($id);
        return view('content.content_details', ['content' => $Content]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
