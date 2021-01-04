@extends('layouts.main')

@section('title', "Create a new board")


@section('content')
    <p>Add a board </p>
    <div>
        <form action="/boards" method="POST">
            @csrf
            <label for="title">title</label>
            <input id="title" type="text" name="title" class="@error('title') is-invalid @enderror">

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            <label for="description">Description</label>
            <input type='textarea' name='description' id="description" >
            <br>
            <button type="submit">Create</button>
        </form>

    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection