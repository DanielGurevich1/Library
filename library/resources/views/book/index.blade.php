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
                    @foreach ($books as $book)
                    {{$book->title}} | {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}} | <a href="{{route('book.edit',[$book])}}">[edit]</a>
                    <form method="POST" action="{{route('book.destroy', [$book])}}">
                        @csrf
                        <button type="submit">[delete]</button>
                    </form>
                    <br>
                    @endforeach

                    @extends('layouts.app')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
