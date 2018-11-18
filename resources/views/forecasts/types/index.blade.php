@extends('layouts.header')

@section('content')

    <div class="container">
        <h1>{{ $headerList }}</h1>
        <p>About Forecasts Types</p>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($forecasts_types as $type)
                    <tr>
                        <td>{{ $type->name }}</td>
                        <td><a class="" href="/forecasts-types/{{ $type->id }}/edit"><button type="submit" class="btn btn-info">Update</button></a></td>
                        <td><form action="/forecasts-types/{{ $type->id }}" method="post">
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
                <?php echo $forecasts_types->render(); ?>
            </div>
        </div>

    </div>

@endsection