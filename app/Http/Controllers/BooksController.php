<?php

namespace App\Http\Controllers;

use App\Books;
use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function create(Request $request){
        $titlu = $request['titlu'];
        $autor=$request['autor'];
        $readon=$request['readon'];

        $loggedUserID = \Auth::user()->id;

        \DB::insert("CALL AddNewBook('{$loggedUserID}', '{$titlu}', '{$autor}', '{$readon}')");

        return redirect()->back();
    }

    public function edit($id){
        $book = Books::find($id);
        return view('edit', compact('book', 'id'));
    }

    public function update(Request $request, $id){
        $book = new Books();
        $data = $this->validate($request, [
            'titlu'=>'required',
            'autor'=> 'required',
            'readon'=>'required'
        ]);

        $newTitlu = $data['titlu'];
        $newAutor = $data['autor'];
        $newreadon = $data['readon'];

        \DB::update("CALL UpdateBook('{$newTitlu}', '{$newAutor}', '{$newreadon}', '{$id}')");

        return redirect('/mybooks');
    }

    public function show(){
        #$books=Books::all();
        $loggedUserID = \Auth::user()->id;

        $books = \DB::table('books')->where('userID', '=', $loggedUserID)->get(['id', 'titlu', 'autor', 'readon']);
        return view('mybooks', ['books'=>$books]);
    }

    public function destroy($id)
    {
        #$book = Books::find($id);
        #$book->delete();

        \DB::delete("CALL DeleteBook('{$id}')");

        return redirect('/mybooks');
    }
}
