<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Genres;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get genres
        $genres = Genres::all();
        
        //Return collection of genres as resource
        return  $genres;
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
//        print_r($request->input());exit();
        //Create or Update track
        $genres = $request->isMethod('put') ? Genres::findOrFail($request->genre_id) : new Genres;
        $genres->title = $request->input('genre_title');
        $genres->id = $request->input('genre_id');
        
        if($genres->save()){
            return $genres;
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
        //get a single track by its id
        $genres = Genres::findOrFail($id);
        return $genres;
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
        //delete a single track by its id
        $genres = Genres::findOrFail($id);
        
        if($genres->delete()){
            return $genres;
        }
    }
}
