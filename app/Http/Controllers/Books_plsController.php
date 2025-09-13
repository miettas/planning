<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books_pl;
use App\Models\Chapters_pl;

class Books_plsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Books_pl::with('chapters_pl')->simplePaginate(12);
        return view('Book.index', compact(['book']));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Books_pl::create($request->all());
        return redirect('books_pls');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($bk)
    {
        $book = Books_pl::with('chapters_pl')->findOrFail($bk);

        list($prevPage,$nextPage) = nextChapter('App\Models\Books_pl','bkid',$book->bkid,'');

        return view('Book.show', compact(['book']))->with('prevPage', $prevPage)->with('nextPage', $nextPage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($bk)
    {
        $book = Books_pl::findOrFail($bk);
        return view('Book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bk)
    {
        $book = Books_pl::findOrFail($bk);
        $book->update($request->all());
        return redirect('books'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bk)
    {
        //
    }

    public function menu($menu)
    {
        if($menu == 'all')
        {
            $book = Books_pl::get();
        }
        else{
            $book =  Books_pl::where('bktype', $menu)->get();
        }
        return view('Book.index', compact('book'));
    }
}
