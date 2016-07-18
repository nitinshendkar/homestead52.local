<?php

namespace App\Http\Controllers;

use Request;
use Validator;
use App\Jobs\CreateAuthor;
use App\Jobs\DeleteAuthor;
use App\Jobs\UpdateAuthor;
use App\Author;
use App\Http\Requests;
use App\Http\Requests\CreateAuthorRequest;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller {

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
        $authors = Author::all();
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
     * @param  CreateAuthorRequest $request
     * @return Response
     */
    public function store(CreateAuthorRequest $request)
    {
        $this->dispatch(new CreateAuthor(
            $request->input('name')
        ));
        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Author $author
     * @return Response
     */
    public function show(Author $author)
    {
        return view('authors.show',compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Author $author
     * @return Response
     */
    public function edit(Author $author)
    {
        return view('authors.edit',compact('author'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     *
     */
    public function update($authorId, CreateAuthorRequest $request)
    {

        $this->dispatch(new UpdateAuthor($authorId, $request->input('name')));
        return redirect()->route('authors.show',$authorId);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->dispatch(new DeleteAuthor($id));
        return redirect()->route('authors.index');
    }
}
