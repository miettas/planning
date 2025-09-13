<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mimage;
use App\Models\Article;

class ArticlesController extends Controller
{
    /* Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $article = Article::orderBy('artsort')->orderBy('artdate')->simplePaginate(12);
        return view('Article.index', compact(['article']));
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Article::create($request->all());
        return redirect('articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($art)
    {
        $article = Article::findOrFail($art);
        $tags = preg_split("/ /",$article['arttag']);
        $tag = Article::where('arttag', 'like', '%'.$tags[0].'%')->orderBy('artsort')->orderBy('artdate')->get();

        list($prevPage,$nextPage) = nextChapter('App\Models\Article','artid',$article->artid,'');

        return view('Article.show', compact('article'))->with('tag',$tag)->with('prevPage',$prevPage)->with('nextPage',$nextPage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($art)
    {
        $article = Article::findOrFail($art);
        return view('Article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $art)
    {
        $article = Article::findOrFail($art);
        $article->update($request->all());
        return redirect('articles');   
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function destroy($id)
    {
        //
    } //

    public function findcategory(Request $request)
    {
        $people = Person::findCategory($request->first_name, $request->surname, $request->category);
        return view('People.index', compact(['people']));
    }
}
