@extends('layouts.header')

@section('content')

    <div class="container">
        <h1>{{ $headerList }}</h1>
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
                @foreach($forecast as $value)
                    <tr>
                        <td>{{ $value->zodiac->name }}</td>
                        <td>{{ $value->date }}</td>
                        <td>{{ $value->text }}</td>
                        <td>{{ $value->forecasts_type->name }}</td>
                        <td><a class="" href="/forecasts/{{ $value->id }}/edit"><button type="submit" class="btn btn-info">Update</button></a></td>
                        <td><form action="/forecasts/{{ $value->id }}" method="post">
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
                <?php echo $forecast->render(); ?>
            </div>
        </div>

    </div>

@endsection