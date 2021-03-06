<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Validator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $authors = $request->sort ? Author::orderBy('name', 'desc')->get() : Author::all();
        if ('name' == $request->sort) {
            $authors = Author::orderBy('name')->get();
        } elseif ('surname' == $request->sort) {
            $authors = Author::orderBy('surname')->get();
        } elseif ('created_at' == $request->sort) {
            $authors = Author::orderBy('created_at', 'desc')->get();
        } else {
            $authors = Author::all();
        }
        // $authors = Author::all();
        // $authors = Author::orderBy('name', 'desc')->get();
        // dd($authors);
        return view('author.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'author_name' => ['required', 'min:3', 'max:64'],
                'author_surname' => ['required', 'min:3', 'max:64'],
            ],
            [
                'author_surname.min' => 'mano zinute'
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $author = new Author;
        $author->name = $request->author_name;
        $author->surname = $request->author_surname;
        $author->save();
        // return redirect()->route('author.index');
        return redirect()->route('author.index')->with('success_message', 'Sekmingai ??ra??ytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('author.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'author_name' => ['required', 'min:3', 'max:64'],
                'author_surname' => ['required', 'min:3', 'max:64'],
            ],
            [
                'author_surname.min' => 'mano zinute'
            ]
        );
        if ($validator->fails()) {
            $request->flash(); // momentine atmintis
            return redirect()->back()->withErrors($validator);
        }
        $author->name = $request->author_name;
        $author->surname = $request->author_surname;
        $author->save();
        // return redirect()->route('author.index');
        return redirect()->route('author.index')->with('success_message', 'S??kmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {

        if ($author->authorBooks->count()) { // objektas kuris gali save suskaiciuoti
            // return 'Trinti negalima, nes turi knyg??';
            return redirect()->back()->with('info_message', 'Trinti negalima, nes turi knyg??.');
        }
        $author->delete();
        // return redirect()->route('author.index');
        return redirect()->route('author.index')->with('success_message', 'Sekmingai i??trintas.');
    }
}