@extends('layouts.header')

@section('content')

    <div class="container">
        <h1>{{ $header }}</h1>

        <form method="POST" class="form" action="/forecasts-types">
            <label for="exampleInputName" class="mr-sm-2">Name:</label>
            <input name="name" type="text" class="form-control mb-2 mr-sm-2" id="exampleInputName" required>

            <p><button type="submit" class="btn btn-primary mb-2">Create</button></p>

            {{ method_field('POST') }}
            {{ csrf_field() }}
        </form>

    </div>

@endsection