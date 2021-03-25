@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div style="margin:20px; color:blue;" class="form-group">
                        <h2>Edit the book</h2>
                    </div>
                </div>


                <div class="card-body">
                    <form method="POST" action="{{route('book.update',[$book])}}">
                        <div class="form-group">
                            <label>Edit</label>
                            <input type="text" name="book_title" class="form-control" value="{{$book->title}}">

                        </div>
                        <div class="form-group">
                            <label>ISBN:</label>
                            <input type="text" name="book_isbn" class="form-control" value="{{$book->isbn}}">

                        </div>
                        <div class="form-group">
                            <label>Pages:</label>
                            <textarea name="boo_about"></textarea>
                            <input type="text" name="book_pages" class="form-control" value="{{$book->pages}}">

                        </div>
                        <div class="form-group">
                            <label>About the book</label>
                            <input type="text" name="book_about" class="form-control" value="{{$book->about}}">

                        </div>

                        <select name="author_id">
                            @foreach ($authors as $author)
                            <option value="{{$author->id}}" @if($author->id == $book->author_id) selected
                                @endif>
                                {{$author->name}} {{$author->surname}}
                            </option>
                            @endforeach
                        </select>
                        @csrf
                        <button type="submit">EDIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });

</script>

@endsection
