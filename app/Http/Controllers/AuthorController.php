<?php

namespace App\Http\Controllers;


use Request;
use App\Author;
use App\Http\Requests;

class AuthorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $authors=Author::all();

        return view('books.authors',['authors'=>$authors]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('books.create_author');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $author=Request::all();

        Author::create($author);

        return redirect('author');
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
        $author=Author::find($id);

        return view('books.edit_author',compact('author'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $authorUpdate=Request::all();
        $author=Author::find($id);
        
        $author->update($authorUpdate);

        return redirect('author');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Author::find($id)->delete();

        return redirect('author');
    }
}
