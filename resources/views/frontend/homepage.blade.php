@extends('layouts.master_home')
@section('home_content')
<!-- ======= About Us Section ======= -->
<body>
<div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-md-push-5">
                    <div class="booking-cta">
                        <h1>Make your reservation</h1>
                        <p>
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-md-pull-7">
                    <div class="booking-form">
                        <form action="{{ route('search.trips') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">From City</span>
                                        <select name="from" class="form-control"  type="text" required>
                                            @foreach($cities as $city)
                                                <option value="{{$city->name}}"> {{$city->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">To city</span>
                                        <select name="to"class="form-control" type="text" required>
                                            @foreach($cities as $city)
                                                <option value="{{$city->name}}"> {{$city->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Check In</span>
                                        <input name= "datefrom" class="form-control" type="date" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <span class="form-label">Check out</span>
                                        <input name = "dateto" class="form-control" type="date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <span class="form-label">Passengers</span>
                                        <select name= "passengers" class="form-control">
                                                @for ($i = 1; $i < $bus->capacity +1; $i++)
                                                    <option>{{$i}}</option>
                                                @endfor
                                        </select>
                                        <span class="select-arrow"></span>
                                    </div>
                                </div>

                            <div class="form-btn col-sm-10">
                                <button class="submit-btn">Check availability</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

@endsection
