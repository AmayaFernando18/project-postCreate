<div class="card border-0 shadow-lg">
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
        <a href="{{ url('/') }}">Home</a>                               
    </li>
    @if (Auth::user()->role == 'admin')
    <li class="nav-item">
        <a href="{{route('places.index')}}">Places</a>                               
    </li>
    <li class="nav-item">
        <a href="{{route('account.reviews')}}">Reviews</a>                               
    </li>


    @endif
   
    <li class="nav-item">
        <a href="{{route('account.profile')}}">Profile</a>                               
    </li>
    <li class="nav-item">
        <a href="{{route('account.myReviews')}}">My Reviews</a>
    </li>
  
    <li class="nav-item">
        <a href="{{ route('account.logout') }}">Logout</a>
    </li>                           
</ul> 





</div>


</div>