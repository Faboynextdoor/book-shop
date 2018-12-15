<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    //
    public function getAllBooksByOwner(){
        $id = Auth::id();
        $books = DB::select('select * from owners left join books on owners.book_id=books.id where owner_id = ?', [$id]);
        return view('mybooks.index',['books' => $books]);
    }
    
    //得到对应bookid的mybook界面(仅书的主人可以看到)
    public function getBookByOwner(Book $book){
        $id = Auth::id();
        //return $book;
        $owner = DB::select('select * from owners where book_id = ?', [$book->id]);
        if($id!=$owner[0]->id) return "您没有权限访问此界面";
        $orders = DB::select('select * from owners where book_id = ?', [$book->id]);
        // return $owner[0]->owner_id;
        return view('mybooks.show',['owner' => $owner[0],'book' => $book,'orders' => $orders]);
    }
}
