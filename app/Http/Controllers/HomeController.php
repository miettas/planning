<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directories_pl;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
        $directory = Directories_pl::where('dirid',4)->first();
        // $directory = $directory[0];
        return view('Directory.show', compact(['directory']));
    }
}
