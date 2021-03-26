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
