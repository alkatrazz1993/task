@extends('layouts.header')

@section('content')

    <div class="container">
        <h1>{{ $header }}</h1>

        <div class="zodiacs">
            <div class="table-responsive">
                <table class="table zodiacs-table table-hover">
                    <thead>
                    <tr>
                        @foreach($zodiacs as $zodiac)
                            <th> <a class="" href="/forecasts/{{ $zodiac->id }}/0"><button type="submit" class="btn btn-link">{{ $zodiac->name }}</button></a></th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($zodiacs as $zodiac)
                            @if(in_array( $zodiac->id, $statistic ))
                                <td><i style="color:green" class="fas fa-check-circle"></i></td>
                            @else
                                <td><i style="color:red" class="fas fa-times-circle"></i></td>
                            @endif
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <form method="POST" class="form" action="/forecasts">
            <label for="exampleInputSelectZodiacs" class="mr-sm-2">Zodiac Name:</label>
            <select name="zodiacName" id="exampleInputSelectZodiacs" class="custom-select" required>
                @foreach($zodiacs as $name)
                    <option value="{{ $name->id }}">{{ $name->name }}</option>
                @endforeach
            </select>

            <label for="exampleInputDate" class="mr-sm-2">Date:</label>
            <input name="date" type="date" class="form-control mb-2 mr-sm-2" id="exampleInputDate" value="{{ $date }}" required>

            <label for="exampleInputText" class="mr-sm-2"> Text:</label>
            <textarea name="text" class="form-control mb-2 mr-sm-2" id="exampleInputText" required></textarea>


            <label for="exampleInputSelectForecastType" class="mr-sm-2">Forecast Type:</label>
            <select name="forecast_type_id" id="exampleInputSelectForecastType" class="custom-select" required>
                @foreach($forecasts_type as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary mb-2">Create</button>

            {{ method_field('POST') }}
            {{ csrf_field() }}

        </form>

    </div>

@endsection
