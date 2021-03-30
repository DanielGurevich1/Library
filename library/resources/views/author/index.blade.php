@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div style="margin:20px; color:blue;" class="form-group">
                        <h2> Author's List</h2>
                        <a href="{{route('author.index', ['sort' => 'surname'])}}">Sort by surname</a>
                        <a href="{{route('author.index', ['sort' => 'name'])}}">Sort by name</a>
                        <a href="{{route('author.index', ['sort' => 'created_at'])}}">Newest</a>
                        <a href="{{route('author.index')}}">Default</a>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($authors as $author)


                        <li class="list-group-item list-line">
                            <div>
                                {{$author->name}} {{$author->surname}}
                            </div>
                            <div class="list-line__buttons">
                                <form method="get" action="{{route('author.edit', [$author])}}">
                                    <button style="{{route('author.edit',[$author])}}" class="btn btn-outline-primary btn-sm">Edit</button>
                                    @csrf
                                </form>
                                <form method="post" action="{{route('author.destroy', [$author])}}">

                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                    @csrf
                                </form>
                            </div>
                        </li>

                    </ul>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- @extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
               <h2>Books List</h2>
               <div class="make-inline">
                <form action="{{route('book.index')}}" method="get" class="make-inline">
<div class="form-group make-inline">
    <label>Author: </label>
    <select class="form-control" name="author_id">
        <option value="0" disabled @if($filterBy==0) selected @endif>Select Author</option>
        @foreach ($authors as $author)
        <option value="{{$author->id}}" @if($filterBy==$author->id) selected @endif>
            {{$author->name}} {{$author->surname}}
        </option>
        @endforeach
    </select>
</div>
<label class="form-check-label">Sort by title:</label>
<label class="form-check-label" for="sortASC">ASC</label>
<div class="form-group make-inline column">
    <input type="radio" class="form-check-input" name="sort" value="asc" id="sortASC" @if($sortBy=='asc' ) checked @endif>
</div>
<label class="form-check-label" for="sortDESC">DESC</label>
<div class="form-group make-inline column">
    <input type="radio" class="form-check-input" name="sort" value="desc" id="sortDESC" @if($sortBy=='desc' ) checked @endif>
</div>
<button type="submit" class="btn btn-info">Filter</button>
</form>

<a href="{{route('book.index')}}" class="btn btn-info">Clear filter</a>
</div>
</div>
<div class="card-body">
    <ul class="list-group">
        @foreach ($books as $book)
        <li class="list-group-item list-line">
            <div class="list-line__books">
                <div class="list-line__books__title">
                    {{$book->title}}
                </div>
                <div class="list-line__books__author">
                    {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}
                </div>
            </div>
            <div class="list-line__buttons">
                <a href="{{route('book.show',[$book])}}" class="btn btn-info">SHOW</a>
                <a href="{{route('book.edit',[$book])}}" class="btn btn-info">EDIT</a>
                <form method="POST" action="{{route('book.destroy', [$book])}}">
                    @csrf
                    <button type="submit" class="btn btn-danger">DELETE</button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>
</div>
</div>
</div>
</div>
</div>
@endsection --}}
