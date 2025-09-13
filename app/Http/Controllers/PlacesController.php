<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Place;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $place = Place::simplePaginate(15);
        return view('Place.index', compact('place'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Place.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Place::create($request->all());
        return redirect('places');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $plc
     * @return \Illuminate\Http\Response
     */
    public function show($plc)
    {
        $place = Place::findOrFail($plc);
       
        list($prevPage,$nextPage) = nextChapter('App\Models\Place','plid',$place->plid,'');
        
        return view('Place.show', compact(['place']))->with('prevPage', $prevPage)->with('nextPage', $nextPage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $plc
     * @return \Illuminate\Http\Response
     */
    public function edit($plc)
    {
        $place = Place::findOrFail($plc);
        return view('Place.edit', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $plc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $plc)
    {
        $place = Place::findOrFail($plc);
        $place->update($request->all());
        return redirect('places'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $plc
     * @return \Illuminate\Http\Response
     */
    public function destroy($plc)
    {
        //
    }
}
