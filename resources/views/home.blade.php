@extends('layouts.app')

@section('main')
<div class="container mt-3 pb-5">
    <div class="row justify-content-center d-flex mt-5">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                <h2 class="mb-3" style="font-family: 'Lato', sans-serif;
            font-style: italic; color:#157b71; font-weight:bold">Explore, Experience, Express - Review Your Journey Here!</h2>
                <div class="mt-2">
                    <a href="{{route('home')}}" class="text-dark">Clear</a>
                </div>
            </div>
            <div class="card shadow-lg border-0">
                <form action="" method="GET">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-11 col-md-11">
                            <input type="text" value="{{Request::get('keyword')}}" class="form-control form-control-lg" name="keyword" placeholder="Search by title">
                        </div>
                        <div class="col-lg-1 col-md-1">
                            <button class="btn btn-primary btn-lg w-100"><i class="fa-solid fa-magnifying-glass"></i></button>                                                                    
                        </div>                                                                                 
                    </div>
                </div>
                </form>
            </div>
            <div class="row mt-4">
                @if($places->isNotEmpty())
                @foreach ($places as $place)
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card border-0 shadow-lg">
                        {{-- <a href="{{ route('place.detail', ['id' => $place->id]) }}"> --}}
                            <a href="{{ route('place.detail', $place->id) }}">
                        @if($place->image != '')
                        <img src="{{asset('uploads/places/'.$place->image)}}" alt="" class="card-img-top">
                        @else
                        <img src="https://placehold.co/600x400?text=No Image" alt="" class="card-img-top">
                        @endif
                        
                    </a>
                        <div class="card-body">
                            <h3 class="h4 heading"><a href="#">{{$place->title}}</a></h3>
                            <p>{{$place->location}}</p>

                            @php

                            if($place->reviews_count > 0){
                                $avgRating = $place->reviews_sum_rating/$place->reviews_count;
                            }
                            else{
                                $avgRating = 0;
                            }

                            $avgRatingPer = ($avgRating*100)/5;
                                
                            @endphp

                            <div class="star-rating d-inline-flex ml-2" title="">
                                <span class="rating-text theme-font theme-yellow">{{ number_format($avgRating, 1)}}</span>
                                <div class="star-rating d-inline-flex mx-2" title="">
                                    <div class="back-stars ">
                                        <i class="fa fa-star " aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
    
                                        <div class="front-stars" style="width: {{ $avgRatingPer }}%">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <span class="theme-font text-muted">{{ ($place->reviews_count > 1) ? $place->reviews_count.' Reviews' : $place->reviews_count.' Review'}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
              

                  {{ $places->links() }}
                
            </div>
        </div>
    </div>
</div>    


@endsection