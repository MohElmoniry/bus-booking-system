<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Trips
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header"> Edit Trip </div>
                            <div class="card-body">
                                <form action="{{  url('trip/update/'.$trip->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Update Trip name</label>
                                        <input type="text" name="trip_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$trip->name}}">
                                    </div>
                                    @error('trip_name')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <label for="exampleInputEmail1" class="form-label">From City</label> <br>
                                    <div class="form-check form-check-inline">
                                        @if($trip->from == 'Cairo')
                                        <input class="form-check-input" type="radio" name="fromCity" id="inlineRadio1" value="Cairo" checked>
                                        @else
                                            <input class="form-check-input" type="radio" name="fromCity" id="inlineRadio1" value="Cairo">
                                        @endif
                                            <label class="form-check-label" for="inlineRadio1">Cairo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        @if($trip->from == 'Alex')
                                        <input class="form-check-input" type="radio" name="fromCity" id="inlineRadio2" value="Alex" checked>
                                        @else
                                            <input class="form-check-input" type="radio" name="fromCity" id="inlineRadio2" value="Alex" >
                                        @endif
                                            <label class="form-check-label" for="inlineRadio2">Alex</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        @if($trip->from == 'Asyuit')
                                        <input class="form-check-input" type="radio" name="fromCity" id="inlineRadio3" value="Asyuit" checked>
                                        @else
                                            <input class="form-check-input" type="radio" name="fromCity" id="inlineRadio3" value="Asyuit">
                                        @endif
                                            <label class="form-check-label" for="inlineRadio3">Asyuit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        @if($trip->from =='Dahab')
                                        <input class="form-check-input" type="radio" name="fromCity" id="inlineRadio3" value="Dahab" checked>
                                        @else
                                            <input class="form-check-input" type="radio" name="fromCity" id="inlineRadio3" value="Dahab">
                                        @endif
                                            <label class="form-check-label" for="inlineRadio3">Dahab</label>
                                    </div>
                                    <br>
                                    @error('from')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                    <br>
                                    <label for="exampleInputEmail1" class="form-label">To City</label> <br>
                                    <div class="form-check form-check-inline">
                                        @if($trip->to == 'Cairo')
                                        <input class="form-check-input" type="radio" name="toCity" id="inlineRadio1" value="Cairo" checked>
                                            @else
                                            <input class="form-check-input" type="radio" name="toCity" id="inlineRadio1" value="Cairo">
                                        @endif
                                        <label class="form-check-label" for="inlineRadio1">Cairo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        @if($trip->to == 'Alex')
                                        <input class="form-check-input" type="radio" name="toCity" id="inlineRadio2" value="Alex" checked>
                                        @else
                                            <input class="form-check-input" type="radio" name="toCity" id="inlineRadio1" value="Alex">
                                        @endif
                                            <label class="form-check-label" for="inlineRadio1">Alex</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        @if($trip->to == 'Asyuit')
                                        <input class="form-check-input" type="radio" name="toCity" id="inlineRadio3" value="Asyuit" checked>
                                        @else
                                            <input class="form-check-input" type="radio" name="toCity" id="inlineRadio3" value="Asyuit">
                                        @endif
                                            <label class="form-check-label" for="inlineRadio3">Asyuit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        @if($trip->to == 'Dahab')
                                        <input class="form-check-input" type="radio" name="toCity" id="inlineRadio3" value="Dahab" checked>
                                        @else
                                            <input class="form-check-input" type="radio" name="toCity" id="inlineRadio3" value="Dahab">
                                        @endif
                                            <label class="form-check-label" for="inlineRadio3">Dahab</label>
                                    </div>
                                    <br>
                                    @error('to')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                    <br>

                                    <label for="tripdate" class="form-label">Trip Date</label> <br>
                                    <input type="datetime-local" name="datetime" class="form-control" id="tripdate" value="{{$trip->datetime}}">
                                    @error('datetime')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                    <br>


                                    <label for="cost" class="form-label">Trip Cost</label> <br>
                                    <input type="number" name="cost" class="form-control" id="cost" value = "{{$trip->cost}}">
                                    @error('cost')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                    <br>

                                    <button type="submit" class="btn btn-primary">Edit Trip</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
