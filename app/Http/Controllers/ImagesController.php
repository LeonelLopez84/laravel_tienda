<?php

namespace Ecommerce\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ecommerce\Image;

class ImagesController extends Controller
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
        if($request->hasFile('image')){
            $Image = new Image;
            $Image->extension = $request->image->extension();
            $Image->product_id = $request->product_id;
            if($Image->save()){
                $Image->name = "{$Image->id}.{$Image->extension}";
                $Image->save();
                $path = $request->file('image')->storeAs('images',$Image->name);
                
                return response()->json(['path'=>$path,'id'=>$Image->id]);
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
        $Image=Image::find($id);
        $id=$Image->id;
        $name=$Image->name;
        $Image->delete();
        //Storage::setVisibility("images/{$name}", 'public');
        Storage::delete("images/{#$name}");
        return response()->json(['id'=>$id]);

    }
}
