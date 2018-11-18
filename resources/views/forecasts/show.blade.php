@extends('layouts.header')

@section('content')

    <div class="container">

        <h1>{{ $headerShow }}</h1>
        <p>About Forecasts</p>
        <div class="zodiacs">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        @foreach($zodiacs as $zodiac)
                            <th><a class="" href="/forecasts/{{ $zodiac->id }}/0"><button type="submit" class="btn btn-link">{{ $zodiac->name }}</button></a></th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($zodiacs as $zodiac)
                            @if(in_array( $zodiac->id, $statistic ))
                                <th><i style="color:green" class="fas fa-check-circle"></i></th>
                            @else
                                <th><i style="color:red" class="fas fa-times-circle"></i></th>
                            @endif
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <form style="float: left;" id="showForecastForm" class="sortFormCompatibility" action="/forecasts" method="post">

            <label for="exampleInputSelectType" class="mr-sm-2">Forecast Type:</label>
            <select name="type" id="exampleInputSelectType" class="form-control">
                <option selected value="{{ $typeId }}">{{ $forecast_type_name->name }}</option>
                @foreach($forecasts_type as $type)
                    @if($type->id != $typeId)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endif
                @endforeach
            </select>

            <input id="zodiacId" type="hidden" value="{{ $zodiacId }}">

            <button type="submit" class="btn btn-primary mb-2">Show</button>

            {{ csrf_field() }}
        </form>


        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Zodiac name</th>
                    <th>Date</th>
                    <th>Text</th>
                    <th>Type</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($forecasts as $forecast)
                    <tr>
                        <td>{{ $forecast->zodiac->name }}</td>
                        <td>{{ $forecast->date }}</td>
                        <td>{{ $forecast->text }}</td>
                        <td>{{ $forecast->forecasts_type->name }}</td>
                        <td><a class="" href="/forecasts/{{ $forecast->id }}/edit"><button type="submit" class="btn btn-info">Update</button></a></td>
                        <td><form action="/forecasts/{{ $forecast->id }}" method="post">
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                                {{ csrf_field() }}
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="pagination">
                <?php echo $forecasts->render(); ?>
            </div>
        </div>

    </div>

@endsection