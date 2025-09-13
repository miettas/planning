<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Chapters_pl;
use App\Models\Green_page;
use App\Models\Mccplan_page;
use App\Models\Mimage;
use App\Models\Munro_page;
use App\Models\Page;
use App\Models\Place;
use App\Models\People_pl;
use App\Models\Pimage;
use App\Models\Street;

class SearchController extends Controller
{
    public function searcharticles(Request $request)
	{
		$r = $request->input('query'); 
		$article = Article::search($r)->paginate(15);
		if(isset($article)){
			if( !empty($article)){
				return view('Article.index', compact('article'));
			}
		else
		{	
				return view('Article.index', ['noresult'=>'No article matches your query. Try again . . .']);
			}
		}
	}

	//----------------------------------------------
	   		
	public function searchchapters(Request $request)
	{					
		$r = $request->input('query');
		$chapter = Chapters_pl::search($r)->paginate(15);
		if(isset($chapter)){
			if( !empty($chapter)){
				return view('Chapter.index', compact('chapter_pl'));
			}
			else
			{
				return view('Chapter.index', ['noresult'=>'No Chapter matches your query. Try again . . .']);
			}
		}
	}

	//----------------------------------------------

	public function searchgreeneries(Request $request)
	{
		$r = $request->input('query');
		$page = Green_page::search($r)->paginate(15);
		if(isset($page)){
			if( !empty($page)){
				return view('Greenery.index', compact('page'));
			}
			else{
				return view('Greenery.index', ['noresult'=>'No Page matches your query. Try again . . .']);
			}
		}
	}

	//----------------------------------------------

	public function searchmccplans(Request $request)
	{
		$r = $request->input('query');
		$page = Mccplan_page::search($r)->with('chapters_pl')->paginate(15);
		if(isset($page)){
			if( !empty($page)){
				return view('Mccplan.index', compact('page'));
			}
			else{
				return view('Mccplan.index', ['noresult'=>'No Page matches your query. Try again . . .']);
			}
		}
	}

    //----------------------------------------------

	public function searchmunros(Request $request)
	{
		$r = $request->input('query');
		$page = Munro_page::search($r)->with('chapters_pl')->paginate(15);
		if(isset($page)){
			if( !empty($page)){
				return view('Munro.index', compact('page'));
			}
			else{
                return view('Munro 
                .index', ['noresult'=>'No Page matches your query. Try again . . .']);
			}
		}
	}

	//----------------------------------------------

	public function searchimages(Request $request)
	{
		$r = $request->input('query');
		$mimages = Mimage::search($r)->paginate(15);
		if(isset($mimages)){
			if( !empty($mimages)){
				return view('Mimage.index', compact('mimages'));
			}
			else
			{	
				return view('Mimage.index', ['noresult'=>'No image matches your query. Try again . . .']);
			}
		}
	}

	//----------------------------------------------

	public function searchpages(Request $request)
	{
		$r = $request->input('query');
		$page = Page::search($r)->with('chapters_pl')->paginate(15);
		if(isset($page)){
			if( !empty($page)){
				return view('Page.index', compact('page'));
			}
			else{
				return view('Page.index', ['noresult'=>'No Page matches your query. Try again . . .']);
			}
		}
	}

	//----------------------------------------------

	public function searchpeople(Request $request)
	{ 
		$r = $request->input('query');
		$person = People_pl::search($r)->paginate(15);
		if(isset($person)){
			if( !empty($person)){
				return view('Person.index', compact('person'));
			}
			else
			{	
				return view('Person.index', ['noresult'=>'No person matches your query. Try again . . .']);
			}
		}
	}

	public function searchplaces(Request $request)
	{ 
		$r = $request->input('query');
		$place = Place::search($r)->paginate(15);
		if(isset($place)){
			if( !empty($place)){
				return view('Place.index', compact('place'));
			}
			else
			{	
				return view('Place.index', ['noresult'=>'No place matches your query. Try again . . .']);
			}
		}
	}
}
