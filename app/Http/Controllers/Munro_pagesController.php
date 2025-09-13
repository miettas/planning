<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Munro_page;

class Munro_pagesController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
       $page = Munro_page::with('chapters_pl')->orderBy('books_pl_bkid')->simplePaginate(15);
       return view('Munro.index', compact(['page']));  
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('Munro.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
    Munro_page::create($request->all());
       return redirect('Munro_pages');
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
           $id = "pge".$id;
           $page = Munro_page::with('chapters_pl')->where('amname',$id)->first();
       }
       else{
           $page = Munro_page::with('chapters_pl')->where('amid',$id)->first();
       }
       
       $pages = Munro_page::where('chapters_pl_chapid',$page->chapters_pl_chapid)->get();
       
       list($prevPage,$nextPage) = nextChapter('App\Models\Munro_page','amname',$page->amname,'');

       list($prevChap,$nextChap) = nextBook('App\Models\Munro_page','chapters_pl_chapid',$page->chapters_pl_chapid,'books_pl_bkid',$page->books_pl_bkid);
    
       $pageNumber = "Page".ltrim(substr($page->amname,1), '0');

       return view('Munro.show', compact(['page']))->with('pages',$pages)->with('pageNumber', $pageNumber)->with('prevPage', $prevPage)->with('nextPage', $nextPage)->with('nextChap', $nextChap)->with('prevChap', $prevChap);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $chap
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $page = Munro_page::findOrFail($id);     
       return view('Munro.edit', compact('page'));
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
        $page = Munro_page::findOrFail($id);
        $page->update($request->all());
        return redirect('munros'); 
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
