@extends('layouts.header')

@section('content')

    <div class="container">
        <h1>{{ $headerUpdate }} <strong> with id: {{ $showForecastsType->id }}</strong></h1>

        <form method="POST" class="form" action="/forecasts-types/{{ $showForecastsType->id }}">
            <label for="exampleInputName" class="mr-sm-2">Name:</label>
            <input name="name" type="text" class="form-control mb-2 mr-sm-2" value="{{$showForecastsType->name}}" id="exampleInputName" required>

            <input name="id" type="hidden" class="form-control mb-2 mr-sm-2" value="{{ $showForecastsType->id }}" id="idItem">
            <p><small>Last update: <strong>{{ $showForecastsType->updated_at }}</strong></small></p>
            <p><button type="submit" class="btn btn-primary mb-2">Update</button></p>

            {{ method_field('PUT') }}
            {{ csrf_field() }}
        </form>

    </div>

@endsection