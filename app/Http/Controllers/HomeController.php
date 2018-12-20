<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests;
use Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books =DB::select('select * from books');
        return view('index',['boo' => $books]);
    }
    public function search()
    {
        $input=Request::all();

        if($input['order']==='arbitary'||$input['order']==="current_school")
        {
            $books = DB::table('books')->where('name',$input['search'])->get();
            
        }else if($input['order']==='price_asc'){

            $books = DB::table('books')->where('name',$input['search'])->orderBy('price', 'asc')->get();
            
        }else if($input['order']==='price_desc')
        {
            $books = DB::table('books')->where('name',$input['search'])->orderBy('price', 'desc')->get();
            
        }
        return view('index',['boo' => $books]);
    }
}
