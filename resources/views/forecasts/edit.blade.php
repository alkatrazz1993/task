@extends('layouts.header')

@section('content')

    <div class="container">
        <h1>{{ $headerUpdate }} <strong> with id: {{ $forecast->id }}</strong></h1>
        <form method="POST" class="form" action="/forecasts/{{ $forecast->id }}">
            <label for="exampleInputSelectZodiacs" class="mr-sm-2">Zodiacs Name:</label>
            <select name="zodiacName" id="exampleInputSelectZodiacs" class="custom-select" required>
                @foreach($zodiacs as $zodiac)
                    <option value="{{ $zodiac->id }}" @if($zodiac->id  == $forecast->zodiac->id) selected @endif>{{ $zodiac->name }}</option>
                @endforeach
            </select>
            <label for="exampleInputDate" class="mr-sm-2">Date:</label>
            <input name="date" type="date" class="form-control mb-2 mr-sm-2" value="{{ date($forecast->date) }}" id="exampleInputDate" required>
            <label for="exampleInputText" class="mr-sm-2">Text:</label>
            <textarea name="text" class="form-control mb-2 mr-sm-2" id="exampleInputText" required>{{ $forecast->text }}</textarea>

            <label for="exampleInputSelectForecastsType" class="mr-sm-2">Forecast Type:</label>
            <select name="forecast_type_id" id="exampleInputSelectForecastsType" class="custom-select" required>
                @foreach($forecasts_type as $type)
                    <option value="{{ $type->id }}" @if($type->id  == $forecast->forecasts_type_id) selected @endif>{{ $type->name }}</option>
                @endforeach
            </select>

            <input name="id" type="hidden" class="form-control mb-2 mr-sm-2" value="{{ $forecast->id }}" id="idItem">
            <p><small>Last update: <strong>{{ $forecast->updated_at }}</strong></small></p>
            <p><button type="submit" class="btn btn-primary mb-2">Update</button></p>

            {{ method_field('PUT') }}
            {{ csrf_field() }}

        </form>

    </div>

@endsection
