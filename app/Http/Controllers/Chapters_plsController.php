<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Green_page;
use App\Models\Mccplan_page;
use App\Models\Munro_page;
use App\Models\Books_pl;
use App\Models\Chapters_pl;

class Chapters_plsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chapter = Chapters_pl::with('books_pl','page')->orderBy('books_pl_bkid','asc')->orderBy('chapid','asc')->simplePaginate(15);
        return view('Chapter.index', compact(['chapter']));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Chapter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Chapters_pl::create($request->all());
        return redirect('chapters_pls');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $chap
     * @return \Illuminate\Http\Response
     */
    public function show($chap)
    {
        $chapter = Chapters_pl::with('books_pl','page')->findOrFail($chap);
        $chaps = Chapters_pl::where('books_pl_bkid',$chapter->books_pl_bkid)->get();
        $book = Books_pl::where('bkid',$chapter->books_pl_bkid)->get();

        if($chapter->books_pl_bkid == 1){ 
            $pges = Page::where('chapters_pl_chapid',$chapter->chapid)->get();
        }
        elseif($chapter->books_pl_bkid == 2 || $chapter->books_pl_bkid == 3) {
            $pges = Green_page::where('chapters_pl_chapid',$chapter->chapid)->get();
        }
        elseif($chapter->books_pl_bkid == 4){
            $pges = Mccplan_page::where('chapters_pl_chapid',$chapter->chapid)->get();
        }
        elseif($chapter->books_pl_bkid == 5){
            $pges = Munro_page::where('chapters_pl_chapid',$chapter->chapid)->get();
        }

        list($prevPage,$nextPage) = nextBook('App\Models\Chapters_pl','chapid',$chapter->chapid,'books_pl_bkid',$chapter->books_pl_bkid);
        list($prevChap,$nextChap) = nextChapter('App\Models\Chapters_pl','books_pl_bkid',$chapter->books_pl_bkid,'');

        return view('Chapter.show', compact(['chapter', 'pges']))->with('books_pls',$book)->with('chaps',$chaps)->with('prevPage', $prevPage)->with('nextPage', $nextPage)->with('nextChap', $nextChap)->with('prevChap', $prevChap)->with('pges', $pges)->with('book',$book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $chap
     * @return \Illuminate\Http\Response
     */
    public function edit($chap)
    {
        $chapter = Chapters_pl::findOrFail($chap);
        return view('Chapter.edit', compact('chapter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $chap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $chap)
    {
        $chapter = Chapter_pl::findOrFail($chap);
        $chapter->update($request->all());
        return redirect('chapters'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $chap
     * @return \Illuminate\Http\Response
     */
    public function destroy($chap)
    {
        //
    }
}
