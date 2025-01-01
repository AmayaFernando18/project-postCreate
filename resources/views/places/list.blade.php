@extends('layouts.app')

@section('main')

<div class="container">
    <div class="row my-5">
        <div class="col-md-3">
            @include('layouts.sidebar')
            {{-- <div class="card border-0 shadow-lg">
                <div class="card-header  text-white">
                    Welcome, {{ Auth::user()->name }}                       
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        @if (Auth::user()->image != "")
                        <img src="{{ asset('uploads/profile/'.Auth::user()->image)}}" class="img-fluid rounded-circle" alt="Luna John">  
                        @endif                          
                    </div>
                    <div class="h5 text-center">
                        <strong>{{ Auth::user()->name }} </strong>
                        <p class="h6 mt-2 text-muted">5 Reviews</p>
                    </div>
                </div>
            </div>
            <div class="card border-0 shadow-lg mt-3">
                <div class="card-header  text-white">
                    Navigation
                </div>
                <div class="card-body sidebar">
                @include('layouts.sidebar')
                </div>
            </div> --}}
        </div>
        <div class="col-md-9">
            @include('layouts.message')

            <div class="card border-0 shadow">
                <div class="card-header  text-white">
                    Places
                </div>
                <div class="card-body pb-0">     
                    <div class="d-flex justify-content-between">
                        <a href="{{route('places.create')}}" class="btn btn-primary">Add Place</a>
                       
                            <form action="" method="get">
                                <div class="d-flex">
                            <input type="text" name="keyword" class="form-control" value="{{ Request::get('keyword')}}" placeholder="Keyword">
                            <button type="submit" class="btn btn-primary ms-2">Search</button>
                            <a href="{{ route('places.index')}}" class="btn btn-secondary ms-2">Clear</a>
                        </div>
                            </form>
                        

                    </div>
                              
                    <table class="table  table-striped mt-3">
                        <thead class="table-dark">
                            <tr>
                                <th>Title</th>
                                <th>Location </th>
                                <th>Rating</th>
                                <th width="150">Action</th>
                            </tr>
                            <tbody>
                                @if ($places->isNotEmpty())
                                @foreach ($places as $place)

                                <tr>
                                    <td>{{ $place->title }}</td>
                                    <td>{{ $place->location }}</td>
                                    <td>3.0 (3 Reviews)</td>
                                    
                                    <td>
                                        <a href="#" class="btn btn-success btn-sm"><i class="fa-regular fa-star"></i></a>
                                        <a href="{{route('places.edit',$place->id) }}" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a href="#" onclick="deletePlace({{ $place->id}})" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>

                                @endforeach

                                @else
                                <tr>
                                    <td colspan="5">Places Not Found</td>
                                </tr>

                                @endif
                               
                              
                            </tbody>
                        </thead>
                    </table>  
                   @if ($places->isNotEmpty())
                   
                   @endif
                    
                </div>
                
            </div>                
        </div>
    </div>       
                           
           
</div>

@endsection


@section('script')
<script>
    function deletePlace(id){
        if (confirm("Are you sure you want to delete?")){
            $.ajax({
                url: '{{route("places.destroy")}}',
                type: 'delete',
                data: {id:id},
                headers: {
                    'X-CSRF-TOKEN' : '{{ csrf_token() }}'
                },
                success: function(response){
                    window.location.href = '{{route("places.index")}}';
                }
            });
        }

    }

    </script>

@endsection