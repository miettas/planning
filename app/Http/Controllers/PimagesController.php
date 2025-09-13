<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pimage;
use App\Models\Street;

class PimagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pimages = Pimage::orderBy('pname')->get();
        
        return view('Pimage.index', compact(['pimages']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pimage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pimage::create($request->all());
        return redirect('pimages');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mimages  $mimages
     * @return \Illuminate\Http\Response
     */
    public function show($img)
    {
        $pimage = Pimage::findOrFail($img); 
        $st = Street::findOrFail($pimage['streets_street_id']);

        list($prevChap,$nextChap) = nextBook('App\Models\Pimage','pimgid',$pimage->pimgid,'streets_street_id',$pimage->streets_street_id);
        list($prevPage,$nextPage) = nextChapter('App\Models\Pimage','pimgid',$pimage->pimgid,0);
        
        return view('Pimage.show', compact(['pimage']))->with('nextChap', $nextChap)->with('prevChap', $prevPage)->with('nextPage', $nextPage)->with('prevPage');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mimages  $mimages
     * @return \Illuminate\Http\Response
     */
    public function edit($img)
    {
        $pimages = Pimage::findOrFail($img);
        $pstreet = Street::findOrFail('streets_street_id');
        return view('Pimage.edit', compact('pimages'))->with();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mimages  $mimages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $img)
    {
        $pimage = Pimage::findOrFail($img);
        $pimage->update($request->all());
        return redirect('pimages'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pimages  $mimages
     * @return \Illuminate\Http\Response
     */
    public function destroy($img)
    {
        //
    }
}
