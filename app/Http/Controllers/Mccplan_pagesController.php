<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter_pl;
use App\Models\Mccplan_page;

class Mccplan_pagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Mccplan_page::with('chapters_pl')->orderBy('books_pl_bkid')->orderBy('mccname')->simplePaginate(15);
        return view('Mccplan.index', compact(['page']));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Mccplan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Mccplan_page::create($request->all());
        return redirect('mccplans_pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $chap
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {       
        if(strlen($id)>3){
            $id = preg_replace('/\D/','',$id); 
            if(strlen($id)<3){
                $id = str_pad($id, 3, "0", STR_PAD_LEFT);
            }
            $id = "p".$id;
            $page = Mccplan_page::with('chapters_pl')->where('mccname',$id)->first();
        }
        else{
            $page = Mccplan_page::with('chapters_pl')->where('mccid',$id)->first();
        }
        
        $pages = Mccplan_page::where('chapters_pl_chapid',$page->chapters_pl_chapid)->get(); 

        list($prevPage,$nextPage) = nextChapter('App\Models\Mccplan_page','mccname',$page->mccname,'');

        list($prevChap,$nextChap) = nextBook('App\Models\Mccplan_page','chapters_pl_chapid',$page->chapters_pl_chapid,'books_pl_bkid',$page->books_pl_bkid);
        
        $chapters_pls = $page->chapters_pls;
        $pageNumber = "Page".ltrim(substr($page->mccname,1), '0');

        return view('Mccplan.show', compact(['page']))->with('chapters_pls',$chapters_pls)->with('pages',$pages)->with('pageNumber', $pageNumber)->with('prevPage', $prevPage)->with('nextPage', $nextPage)->with('nextChap', $nextChap)->with('prevChap', $prevChap);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $chap
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Mccplan_page::findOrFail($id);     
        return view('Mccplan.edit', compact('page'));
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
        $page = Mccplan_page::findOrFail($id);
        $page->update($request->all());
        return redirect('mccplan_pages'); 
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
