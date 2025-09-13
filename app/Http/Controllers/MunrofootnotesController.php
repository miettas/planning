<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Munrofootnote;

class MunrofootnotesController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $page = Munrofootnote::simplePaginate(15);
       return view('Munrofootnote.index', compact(['page']));  
   }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
       return view('Munrofootnote.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Munrofootnote::create($request->all());
        return redirect('Munrofootnotes');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $chap
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {       
        $page = Munrofootnote::where('mfnid',$id)->first();
    
        // list($prevPage,$nextPage) = nextPage('App\Models\Munrofootnote','mfnname',$page->amname,'book_bkid',$page->book_bkid);
 
        // list($prevChap,$nextChap) = nextChapter('App\Models\Munro','chapter_chapid',$page->chapter_chapid,'book_bkid',$page->book_bkid);
     
        // $pageNumber = "Page".ltrim(substr($page->amname,1), '0');
 
        return view('Munrofootnote.show', compact('page'));
        // ->with('pages',$pages)->with('pageNumber', $pageNumber)->with('prevPage', $prevPage)->with('nextPage', $nextPage)->with('nextChap', $nextChap)->with('prevChap', $prevChap)
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $chap
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Munrofootnote::findOrFail($id);     
        return view('Munrofootnote.edit', compact('page'));
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
        $page = Munrofootnote::findOrFail($id);
        $page->update($request->all());
        return redirect('Munrofootnotes'); 
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
