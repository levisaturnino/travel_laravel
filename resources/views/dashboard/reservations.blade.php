@extends('index')
@section('title', 'Reservations')
@section('content')
<div class="container mt-5">
    @if(!empty(Session::get('success')))
    <div class="alert alert-success"> {{ Session::get('success') }}</div>
@endif
@if(!empty(Session::get('error')))
    <div class="alert alert-danger"> {{ Session::get('error') }}</div>
@endif
    <h2>Your Reservations</h2>
    <table class="table mt-3">
        <thead>
            <tr>
            <th scope="col">Hotel</th>
            <th scope="col">Client</th>
            <th scope="col">Arrival</th>
            <th scope="col">Departure</th>
            <th scope="col">Type</th>
            <th scope="col">Guests</th>
            <th scope="col">Price</th>
            <th scope="col">Manage</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->room->hotel['name'] }}</td>
                <td>{{ $reservation->user->name }}</td>
                <td>{{  date('d/m/Y', strtotime($reservation->arrival))}}</td>
                <td>{{  date('d/m/Y', strtotime($reservation->departure))}}</td>
                <td>{{ $reservation->room['type'] }}</td>
                <td>{{ $reservation->num_of_guests }}</td>
                <td>${{ $reservation->room['price'] }}</td>
            <td><a href="/dashboard/reservations/{{ $reservation->id }}/edit" class="btn btn-sm btn-success">Edit</a>
                <a href="/dashboard/reservations/{{ $reservation->id }}" class="btn btn-sm btn-primary">Show</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
