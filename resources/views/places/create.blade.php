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
                    Add Place
                </div>
                <div class="card-body">
                    <form action="{{ route('places.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title" name="title" id="title" value="{{ old('title')}}" />
                        @error('title')
                        <p class="invalid-feedbak">{{ $message}}</p>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror" placeholder="location"  name="location" id="location"value="{{ old('location')}}"/>
                        @error('location')
                        <p class="invalid-feedbak">{{ $message}}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Description" cols="30" rows="5" value="{{ old('description')}}"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="Image" class="form-label">Image</label>
                        <input type="file" class="form-control  @error('image') is-invalid @enderror"  name="image" id="image"/>
                        @error('image')
                        <p class="invalid-feedbak">{{ $message}}</p>
                        @enderror
                    </div>

  


                    <button class="btn btn-primary mt-2">Create</button>  
                    </form>                  
                </div>
            </div>                
        </div>               
        </div>
    </div>       


@endsection
