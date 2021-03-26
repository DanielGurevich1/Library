@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div style="margin:20px; color:blue;" class="form-group">
                        <h2>Add an Author</h2>
                        {{-- <input type="text" class="form-control"> --}}
                        {{-- <small class="form-text text-muted">text</small> --}}

                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('author.store')}}"> // linkas i varda
                        <div class="form-group">
                            <label> Author's Name </label>
                            <input type="text" name="author_name" class="form-control" value="{{old('author_name')}}">

                        </div>
                        <div class="form-group">
                            <label> Author's Surname </label>
                            <input type="text" name="author_surname" class="form-control" value="{{old('author_name')}}">

                        </div>

                        @csrf
                        <button type="submit" class="btn btn-outline-success">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
