<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Author;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) //atvaizdavimas
    {
        //paimam dezes
        $authors = Author::all();
        // dd($request->author_id);
        if ($request->author_id) {
            Book::where('author_id', $request->author_id)->get();
            $filterBy = $request->author_id;
        } else {
            $books = Book::all();
        }
        // objektas - kolekcija 
        // $books = $books->sortBy(' title');

        return view('book.index', ['books' => $books, 'authors' => $authors]); //perduodam i db ['books' => $books]
    }
    // rusiavymas
    // public function index(Request $request)
    // {
    //     $authors = Author::all();

    //     //FILTRAVIMAS
    //     if ($request->author_id) {
    //         $books = Book::where('author_id', $request->author_id)->get();
    //         $filterBy = $request->author_id;
    //     }
    //     else {
    //         $books = Book::all();
    //     }

    //     //RUSIAVIMAS
    //     if ($request->sort && 'asc' == $request->sort) {
    //         $books = $books->sortBy('title');
    //         $sortBy = 'asc';
    //     }
    //     elseif ($request->sort && 'desc' == $request->sort) {
    //         $books = $books->sortByDesc('title');
    //         $sortBy = 'desc';
    //     }

    //     return view('book.index', [
    //         'books' => $books,
    //         'authors' => $authors,
    //         'filterBy' => $filterBy ?? 0,
    //         'sortBy' => $sortBy ?? ''
    //         ]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('book.create');
        $authors = Author::all();
        return view('book.create', ['authors' => $authors]); // view + kelias i faila create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book; //sukuriam nauja book
        $book->title = $request->book_title; // kreipiames i savybe =  requestas pasiima is create input
        // db dalis             formos dalis
        $book->isbn = $request->book_isbn;
        $book->pages = $request->book_pages;
        $book->about = $request->book_about;
        $book->author_id = $request->author_id;
        $book->save(); // irasome i db
        return redirect()->route('book.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('book.edit', ['book' => $book, 'authors' => $authors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->title = $request->book_title;
        $book->isbn = $request->book_isbn;
        $book->pages = $request->book_pages;
        $book->about = $request->book_about;
        $book->author_id = $request->author_id;
        $book->save();
        return redirect()->route('book.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('book.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}