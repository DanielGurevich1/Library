@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div style="margin:20px; color:blue;" class="form-group">
                        <h2>Edit Author's List</h2>
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
                                <form method="POST" action="{{route('author.destroy', [$author])}}">
                                    <button style="{{route('author.edit',[$author])}}" class="btn btn-outline-primary btn-sm">click to edit it</button>
                                    @csrf
                                    <button style="display: inline-block;" type="submit" class="btn btn-outline-danger btn-sm">delete</button>
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
