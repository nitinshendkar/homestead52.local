<?php

namespace App\Http\Controllers;


use Request;
use Validator;
use App\Author;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;

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

        return view('authors.index',['authors'=>$authors]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('authors.create');
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

        return redirect('authors');
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

        return view('authors.edit',compact('author'));
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

        $validator = Validator::make($authorUpdate, [
            'author_name' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('authors/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
        $author->update($authorUpdate);

        return redirect()->route('authors');
        
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

        return redirect('authors');
    }
}
