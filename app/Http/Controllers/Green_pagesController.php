<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapters_pl;
use App\Models\Green_page;

class Green_pagesController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Green_page::with('chapters_pl')->orderBy('books_pl_bkid')->orderBy('grname')->simplePaginate(15);
        return view('Greenery.index', compact(['page']));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Greenery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Green_page::create($request->all());
        return redirect('greeneries');
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
            $page = Green_page::with('chapters_pl')->where('grname',$id)->first();
        }
        else{
            $page = Green_page::with('chapters_pl')->where('grid',$id)->first();
        }
        
        $pages = Green_page::where('chapters_pl_chapid',$page->chapters_pl_chapid)->get();
                                                                              
        list($prevPage,$nextPage) = nextChapter('App\Models\Green_page','grname',$page->grname,'');
       
        list($prevChap,$nextChap) = nextBook('App\Models\Green_page','chapters_pl_chapid',$page->chapters_pl_chapid,'books_pl_bkid',$page->books_pl_bkid);
     
        $pageNumber = "Page".ltrim(substr($page->grname,1), '0');

        return view('Greenery.show', compact(['page']))->with('pages',$pages)->with('pageNumber', $pageNumber)->with('prevPage', $prevPage)->with('nextPage', $nextPage)->with('prevChap', $prevChap)->with('nextChap', $nextChap);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $chap
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Green_page::findOrFail($id);
        return view('Greenery.edit', compact('page'));
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
        $page = Green_page::findOrFail($id);
        $page->update($request->all());
        return redirect('green_pages'); 
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
