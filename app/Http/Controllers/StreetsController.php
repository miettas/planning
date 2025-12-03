<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Street;
use App\Models\Pimage;

class StreetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $streets = Street::with('pimage')->orderBy('streetname')->get();
        return view('Street.index', compact('streets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Street.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Street::create($request->all());
        return redirect('streets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $chap
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $streets = Street::findOrFail($id);
        
        $img200 = Pimage::where('streets_street_id', $streets->id)
            ->orWhere('street_id2', $streets->id)
            ->orWhere('street_id3', $streets->id)
            ->orderBy('pname')->get();

        list($prevPage,$nextPage) = nextChapter('App\Models\Street','id',$streets->id, '');
        
        return view('Street.show', compact(['streets']))->with('prevPage',$prevPage)->with('nextPage',$nextPage)->with('img200',$img200); 
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $chap
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $streets = Street::findOrFail($id);
        return view('Street.edit', compact('streets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $chap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Street = Street::findOrFail($id);
        $Street->update($request->all());
        return redirect('streets'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $chap
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
