<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Cities
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


                            <div class="card-header"> All Cities </div>


                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Serial no</th>
                                    <th scope="col">Name </th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Action</th>





                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cities as $city)
                                <tr>
                                    <th scope="row"> {{ $city->id }} </th>
                                    <td>  {{ $city->name }}</td>
                                    <td> {{ $city->created_at->diffForHumans() }}</td>
                                    <td>
                                    <a href="{{ url('city/edit/'.$city->id) }}" class="btn btn-info">Edit</a>
                                    <a href=" {{ url('city/delete/'.$city->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header"> Add City </div>
                            <div class="card-body">
                                <form action="{{  route('store.city') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">City name</label>
                                        <input type="text" name="city_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    @error('city_name')
                                    <span class="text-danger"> {{ $message }} </span>
                                    @enderror

                                    <button type="submit" class="btn btn-primary">Add City</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
