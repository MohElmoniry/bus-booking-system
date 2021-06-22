<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        All trips
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header"> All Trips </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">DateTime</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Action</th>




                        </tr>
                        </thead>
                        <tbody>
                        @foreach($trips as $trip)
                            <tr>
                                <th scope="row"> {{ $trip->name }} </th>
                                <td>  {{ $trip->from }}</td>
                                <td>  {{ $trip->to }}</td>
                                <td>  {{ $trip->datetime }}</td>
                                <td>  {{ $trip->cost }}</td>
                                <td>
                                    <a href="{{ url('trip/edit/'.$trip->id) }}" class="btn btn-info">Edit</a>
                                    <a href=" {{ url('trip/delete/'.$trip->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>
                        {{ $trips->links() }}
                    </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header"> Add Trip </div>
                            <div class="card-body">
                                <form action="{{  route('store.trips') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                         <label for="exampleInputEmail1" class="form-label">Trip name</label>
                                        <input type="text" name="trip_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    @error('trip_name')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                    <label for="exampleInputEmail1" class="form-label">From City</label> <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fromCity" id="inlineRadio1" value="Cairo">
                                        <label class="form-check-label" for="inlineRadio1">Cairo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fromCity" id="inlineRadio2" value="Alex">
                                        <label class="form-check-label" for="inlineRadio2">Alex</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fromCity" id="inlineRadio3" value="Asyuit">
                                        <label class="form-check-label" for="inlineRadio3">Asyuit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fromCity" id="inlineRadio3" value="Dahab">
                                        <label class="form-check-label" for="inlineRadio3">Dahab</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="toCity" id="inlineRadio3" value="AlFayyum">
                                        <label class="form-check-label" for="inlineRadio3">AlFayyum</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="toCity" id="inlineRadio3" value="AlMinya">
                                        <label class="form-check-label" for="inlineRadio3">AlMinya</label>
                                    </div>
                                    <br>
                                    @error('from')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                    <br>
                                    <label for="exampleInputEmail1" class="form-label">To City</label> <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="toCity" id="inlineRadio1" value="Cairo">
                                        <label class="form-check-label" for="inlineRadio1">Cairo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="toCity" id="inlineRadio2" value="Alex">
                                        <label class="form-check-label" for="inlineRadio2">Alex</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="toCity" id="inlineRadio3" value="Asyuit">
                                        <label class="form-check-label" for="inlineRadio3">Asyuit</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="toCity" id="inlineRadio3" value="Dahab">
                                        <label class="form-check-label" for="inlineRadio3">Dahab</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="toCity" id="inlineRadio3" value="AlFayyum">
                                        <label class="form-check-label" for="inlineRadio3">AlFayyum</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="toCity" id="inlineRadio3" value="AlMinya">
                                        <label class="form-check-label" for="inlineRadio3">AlMinya</label>
                                    </div>
                                    <br>
                                    @error('to')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                    <br>

                                    <label for="tripdate" class="form-label">Trip Date</label> <br>
                                    <input type="datetime-local" name="datetime" class="form-control" id="tripdate">
                                    @error('datetime')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                    <br>


                                    <label for="cost" class="form-label">Trip Cost</label> <br>
                                    <input type="number" name="cost" class="form-control" id="cost">
                                    @error('cost')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                    <br>

                                    <button type="submit" class="btn btn-primary">Add Trip</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
