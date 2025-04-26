<?php

namespace App\Http\Controllers\book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller{
    public function index(){
        $Book = Book::all();
        return view('book.index',compact('Book'));
    }


    public function create(Request $request){
        Book::create([
            'book_name' => $request->book_name,
            'booh_url' => $request->booh_url,
        ]);
        return redirect()->back()->with('success', 'Yangi kitob qo\'shildi!');
    }

    public function delete(Request $request){
        $Book = Book::find($request->id);
        $Book->delete();
        return redirect()->back()->with('success', 'Kitob o\'chirildi!');
    }


}
