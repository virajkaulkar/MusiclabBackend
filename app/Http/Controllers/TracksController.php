<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Tracks;

class TracksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get Tracks
//        $count = Tracks::count();
        $tracks = Tracks::latest();
        $count = $tracks->count();    
        $all_tracks = $tracks->paginate($count);
        
        //Return collection of tracks as resource
        return  $all_tracks;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTrackByName($name='')
    {
        $name = \Illuminate\Support\Facades\Input::get('name');
        //Get Tracks
        if(!empty($name)){
            $tracks = Tracks::where('title', 'like', '%' . $name . '%');
        }
        else{
            $tracks = Tracks::latest();
        }
        
        $count = $tracks->count();
        $all_tracks = $tracks->paginate($count);
        //Return collection of tracks as resource
        return  $all_tracks;
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
        $track = $request->isMethod('put') ? Tracks::findOrFail($request->track_id) : new Tracks;
        $track->title = $request->input('track_title');
        $track->genre_id = $request->input('genre');
        $track->ratings = $request->input('ratings1');
        if($track->save()){
            return $track;
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
        $track = Tracks::findOrFail($id);
        return $track;
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
//        echo(1111);exit();    
        //delete a single track by its id
        $track = Tracks::findOrFail($id);
        
        if($track->delete()){
            return $track;
        }
    }
}
