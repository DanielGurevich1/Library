@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div style="margin:20px; color:blue;" class="form-group">
                        <h2>Edit Author's details</h2>

                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('author.update',[$author->id])}}">
                        <div class="form-group">
                            <label> Author's Name </label>
                            <input type="text" name="author_name" class="form-control" value="{{$author->name}}">
                            {{-- <a href type="text" name="author_name" class="form-control" value="{{$author->name}}"> --}}

                        </div>

                        <div class="form-group">
                            <label> Author's Surname </label>
                            <input type="text" name="author_surname" class="form-control" value="{{$author->surname}}">

                        </div>
                        @csrf
                        <button type="submit">EDIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
