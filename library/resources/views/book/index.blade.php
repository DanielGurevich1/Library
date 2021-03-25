@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div style="margin:20px; color:blue;" class="form-group">
                        <h2>Book's List</h2>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($books as $book)
                        <li class="list-group-item list-line">
                            {{$book->title}} <br> {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}
                            <form method="get" action="{{route('book.edit', [$book])}}">
                                <button style="{{route('book.edit',[$book])}}" class="btn btn-outline-primary btn-sm">edit</button>
                                @csrf
                            </form>
                            <form method="post" action="{{route('book.destroy', [$book])}}">

                                <button type="submit" style="display: inline-block;" class="btn btn-outline-danger btn-sm">delete</button>
                                @csrf
                            </form>
                            <br>
                        </li>
                        @endforeach
                        @extends('layouts.app')
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
