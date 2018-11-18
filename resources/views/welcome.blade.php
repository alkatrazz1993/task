@extends('layouts.header')

@section('content')

    <div class="container">
        <h1>{{ $headerList }}</h1>
        <p>About Users</p>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date_of_birth</th>
                    <th>Zodiac</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['date_of_birth'] }}</td>
                        <td>{{ $user['zodiac'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="pagination">
                {{ $users->links() }}

            </div>
        </div>

    </div>

@endsection