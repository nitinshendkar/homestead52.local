<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use App\Jobs\CreateBook;
use App\Jobs\DeleteBook;
use App\Jobs\UpdateBook;
use App\Book;
use App\Http\Requests;
use App\Http\Requests\CreateBookRequest;
use Illuminate\Support\Facades\DB;

class BookController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $books = Book::all();
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
     * @param  CreateBookRequest $request
     * @return Response
     */
    public function store(CreateBookRequest $request)
    {
        $this->dispatch(new CreateBook(
                $request->input('title'), $request->input('description'), $request->input('author_id')
        ));
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Book $book
     * @return Response
     */
    public function show(Book $book)
    {
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Book $book
     * @return Response
     */
    public function edit(Book $book)
    {
        return view('books.edit',compact('book'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     *
     */
    public function update($bookId, CreateBookRequest $request)
    {

        $this->dispatch(new UpdateBook($bookId,$request->input('title'), $request->input('description'), $request->input('author_id')));
        return redirect()->route('books.show',$bookId);
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
        return redirect()->route('books.index');
    }
}
