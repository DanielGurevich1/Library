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
                    @foreach ($authors as $author)

                    <form method="POST" action="{{route('author.destroy', [$author])}}">
                        {{$author->name}} {{$author->surname}} <a href="{{route('author.edit',[$author])}}">[click to edit it]</a>
                        @csrf
                        <a href style="display: inline-block;" type="submit">[delete]</a>
                    </form>
                    <br>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
