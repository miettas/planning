<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapters_pl;
use App\Models\Books_pl;
use App\Models\Page;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::with('chapters_pl')->orderBy('books_pl_bkid')->orderBy('pname')->simplePaginate(15);
        return view('Page.index', compact(['page']));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Page::create($request->all());
        return redirect('pages');
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
            $page = Page::with('chapters_pl')->where('pname',$id)->first(); 
        }
        else{
            $page = Page::with('chapters_pl')->where('pid',$id)->first(); 
        }
   
        $pages = Page::where('chapters_pl_chapid','=',$page->chapters_pl_chapid)->get();
        $books = Page::where('books_pl_bkid',$page->books_pl_bkid)->first();

        list($prevPage,$nextPage) = nextChapter('App\Models\Page','pname',$page->pname,'');
        list($prevChap,$nextChap) = nextBook('App\Models\Page',        'chapters_pl_chapid',$page->chapters_pl_chapid,'books_pl_bkid',$page->books_pl_bkid);
        // $prev =$prev->pid;
        // $next =$next->pid;
        
        $pageNumber = "Page ".ltrim(substr($page->pname,1), '0');

        return view('Page.show', compact(['page']))->with('books',$books)->with('pages',$pages)->with('pageNumber', $pageNumber)->with('prevPage', $prevPage)->with('nextPage', $nextPage)->with('nextChap', $nextChap)->with('prevChap', $prevChap);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $chap
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);     
        return view('Page.edit', compact('page'));
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
        $page = Page::findOrFail($id);
        $page->update($request->all());
        return redirect('pages'); 
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
