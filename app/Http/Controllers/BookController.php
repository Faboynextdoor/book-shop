<?php

namespace App\Http\Controllers;

 use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Request as Req;
use \Input as Input;


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
        if($id!=$owner[0]->owner_id) return view('message',['message' => "您没有权限访问此界面"]);
        $orders = DB::select('select * from owners where book_id = ?', [$book->id]);
        // return $owner[0]->owner_id;
        return view('mybooks.show',['owner' => $owner[0],'book' => $book,'orders' => $orders]);
    }

    public function getPublishView(){
        $categorys = DB::select('select subcategorys.name subcate,categorys.name cate,categorys.id id,subcategorys.id subid from subcategorys join categorys on categorys.id=subcategorys.category_id');
        $publishers = DB::select('select * from publishers');

        return view('publish',['categorys' => $categorys,'publishers'=>$publishers]);
    }
    public function store(Request $request){
        $id=Auth::id();
        $input=Req::all();
        $this->validate($request,[
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $imagefile=$request->file('image');
        $photoName = time().'.'.$imagefile->getClientOriginalExtension();
        $request->image->move(getcwd().'\/img/', $photoName);
        $bookid = DB::table('books')->insertGetId(
            [
                'name' => $input['title'], 
                'publisher_id' => $input['publisher'],
                'subcategory_id' => $input['subcategory'],
                'writer' => $input['writer'],
                'price' => $input['price'],
                'book_image' => $photoName,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                ]);
        if($bookid==null) return view('message',['message' => "发生错误，发布失败"]);
        else DB::table('owners')->insert([
            'book_id'=>$bookid,
            'owner_price'=>$input['owner_price'],
            'discription'=>$input['discription'],
            'owner_id'=>$id,
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);
        return view('message',['message' => "发布成功"]);
    }
}
