<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use App\Jobs\CreateBook;
use App\Jobs\DeleteBook;
use App\Book;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class BookController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $books = DB::table('books')
                    ->join('authors', 'authors.id', '=', 'books.author_id')
                    ->select('books.id', 'books.title', 'books.description', 'books.author_id','authors.author_name','books.updated_at')
                    ->get();

        return view('books.index',['books'=>$books]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('books.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $book=Request::all();

        $validator = Validator::make($book, [
            'title' => 'required|max:255',
            'author_id' => 'required',
            'description' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('books/create')
                ->withErrors($validator)
                ->withInput();
        }

        $this->dispatch(new CreateBook($book));

        return redirect()->route('books');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $book=Book::find($id);

        return view('books.edit',compact('book'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $bookUpdate=Request::all();
        $book=Book::find($id);

        $book->update($bookUpdate);

        return redirect()->route('books');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteBook($id));
        return redirect()->route('books');
    }
}
