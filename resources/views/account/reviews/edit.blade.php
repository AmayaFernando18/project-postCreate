@extends('layouts.app')

@section('main')
<div class="container">
    <div class="row my-5">
        <div class="col-md-3">
            @include('layouts.sidebar')
            {{-- <div class="card border-0 shadow-lg">
                <div class="card-header  text-white">
                    Welcome, John Doe                        
                </div>
                <div class="card-body">
                    <div class="text-center mb-3">
                        <img src="images/profile-img-1.jpg" class="img-fluid rounded-circle" alt="Luna John">                            
                    </div>
                    <div class="h5 text-center">
                        <strong>John Doe</strong>
                        <p class="h6 mt-2 text-muted">5 Reviews</p>
                    </div>
                </div>
            </div>
            <div class="card border-0 shadow-lg mt-3">
                <div class="card-header  text-white">
                    Navigation
                </div>
                <div class="card-body sidebar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="place-listing.html">places</a>                               
                        </li>
                        <li class="nav-item">
                            <a href="reviews.html">Reviews</a>                               
                        </li>
                        <li class="nav-item">
                            <a href="profile.html">Profile</a>                               
                        </li>
                        <li class="nav-item">
                            <a href="my-reviews.html">My Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a href="change-password.html">Change Password</a>
                        </li> 
                        <li class="nav-item">
                            <a href="login.html">Logout</a>
                        </li>                           
                    </ul>
                </div>
            </div>                 --}}
        </div>
        <div class="col-md-9">
            @include('layouts.message')
            
            <div class="card border-0 shadow">
                <div class="card-header  text-white">
                    Edit Reviews
                </div>
                <div class="card-body pb-0">  
                    <form action="{{ route('account.reviews.updateReview', $review->id) }}" method="post"  >
                        @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Review</label>
                        <textarea placeholder="review" class="form-control @error('review') is-invalid @enderror" name="review" id="review">{{old('review',$review->review)}}</textarea>
                       
                        @error('review')
                        <p class="invalid-feedback">{{ $message }}</p>
                         @enderror
                    </div>
                   
                      
                    <button class="btn btn-primary mt-2 mb-3">Update</button> 
                    </form>          
                              
                </div>
                
            </div>                
        </div>
    </div>       
</div>

@endsection