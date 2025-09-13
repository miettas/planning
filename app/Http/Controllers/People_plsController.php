<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\People_pl;

class People_plsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = People_pl::with('article')->simplePaginate(12); 
        return view('Person.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        People_pl::create($request->all());
        return redirect('people_pls');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $pp
     * @return \Illuminate\Http\Response
     */
    public function show($pp)
    {
        $person = People_pl::findOrFail($pp);
        $tags = preg_split("/ /",$person['pptag']);
        $tag = Article::where('arttag', 'like', '%'.$tags[0].'%')->orderBy('arttag')->orderBy('artdate')->get();
        $auth_tag = '';
        if( preg_match('/author/i',$person['type']  )){
            $p = $person['first'].' '. $person['last'];
            $auth_tag = Article::where('artauthor', 'like', '%'.$p.'%')->get();
        }

        list($prevPage,$nextPage) = nextChapter('App\Models\People_pl','ppid',$person->ppid,'');

        return view('Person.show', compact(['person']))->with('prevPage', $prevPage)->with('nextPage', $nextPage)->with('tag', $tag)->with('auth_tag', $auth_tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $pp
     * @return \Illuminate\Http\Response
     */
    public function edit($pp)
    {
        $person = People_pl::findOrFail($pp);
        return view('Person.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $pp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pp)
    {
        $person = People_pl::findOrFail($pp);
        $person->update($request->all());
        return redirect('people_pls'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $pp
     * @return \Illuminate\Http\Response
     */
    public function destroy($pp)
    {
        //
    }
}
