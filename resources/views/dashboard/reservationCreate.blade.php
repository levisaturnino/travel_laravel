@extends('index')
@section('title', 'Create reservation')
@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <h2><a href="{{ url()->previous() }}" class="btn btn-sm btn-success">back</a>  {{ $hotelInfo->name }} - <small class="text-muted">{{ $hotelInfo->location }}</small></h2>
        </div>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">Book your stay now at the most magnificent resort in the world!</p>
            <form action="{{ route('reservations.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="room">Room Type</label>
                            <select class="form-control" name="room_id">
                                @foreach ($hotelInfo->rooms as $option)
                                    <option value="{{$option->id}}">{{ $option->type }} - ${{ $option->price }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="guests">Number of guests</label>
                            <input class="form-control" name="num_of_guests" value="{{old('num_of_guests')}}" placeholder="1">
                            @if($errors->has("num_of_guests"))
                            {{$errors->first("num_of_guests")}}
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="arrival">Arrival</label>
                            <input type="date" class="form-control" value="{{old('arrival')}}" name="arrival" placeholder="03/21/2020">
                            @if($errors->has("arrival"))
                                {{$errors->first("arrival")}}
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="departure">Departure</label>
                            <input type="date" class="form-control" value="{{old('departure')}}" name="departure" placeholder="03/23/2020">
                            @if($errors->has("departure"))
                            {{$errors->first("departure")}}
                        @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary">Book it</button>
            </form>
        </div>
    </div>
    @if(!empty(Session::get('success')))
    <div class="alert alert-success"> {{ Session::get('success') }}</div>
@endif
@if(!empty(Session::get('error')))
    <div class="alert alert-danger"> {{ Session::get('error') }}</div>
@endif
</div>
@endsection
