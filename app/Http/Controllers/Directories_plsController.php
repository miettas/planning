<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapters_pl;
use App\Models\Page;
use App\Models\Books_pl;
use App\Models\Directories_pl;
use App\Models\Article;
use App\Models\People_pl;

class Directories_plsController extends Controller
{
    public function index()
    {
        $directory = Directories_pl::paginate(15);
        return view('Directory.index', compact(['directory']));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Directory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Directories_pl::create($request->all());
        return redirect('directories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dir)
    {
        $directory = Directories_pl::findOrFail($dir);
        //list($prevPage,$nextPage) = nextBook('App\Models\Directory','dirid',$directory->dirid,'dirid');
        return view('Directory.show', compact(['directory']));
        //->with('prevPage', $prevPage)->with('nextPage', $nextPage);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dir)
    {
        $directory = Directories_pl::findOrFail($dir);
        return view('Directory.edit', compact('directory'));
    }

    /**
     * Update the specified resource in storage.
     *11111
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dir)
    {
        $directory = Directories_pl::findOrFail($dir);
        $directory->update($request->all());
        return redirect('directories');   
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($dir)
    {
        //
    }
    public function welcome()
    {
        $directory = Directories_pl::where('dirid',4)->first();
        
        $arr = []; $filearray = []; $file =[]; $array = []; $array1=[];
       

        if($directory->infoCol2){

            $table = 'App\Models\Article';
            $id = 'artid';
            for ($x = 0; $x < 3; $x++){ 
                $file = random($table, $id, '','');
                $ary = getImage($file,'');
                array_push($array,$ary);
            }
            array_push($array,$filearray);
        }
        if($directory->infoCol3){
            $table = 'App\Models\People_pl';
            $id = 'ppid';
            for ($x = 0; $x < 3; $x++){ 
                $file = random($table, $id, 'journalist');
                $ary = getImage($file,'journalist'); 
                array_push($array1,$ary);
            }
            array_push($array1,$filearray);
        }
       
   
    return view('Directory.show', compact(['directory']))->with('array', $array)->with('array1', $array1);
    }
}

