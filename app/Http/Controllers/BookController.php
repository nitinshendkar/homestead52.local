<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use App\Book;
use App\Http\Requests;

class BookController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $books=Book::all();

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
            'title' => 'required|unique:posts|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('books')
                ->withErrors($validator)
                ->withInput();
        }

        Book::create($book);

        return redirect('books');
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

        return redirect('books');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();

        return redirect('books');
    }
}
