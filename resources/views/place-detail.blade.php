@extends('layouts.app')

@section('main')
<div class="container mt-3 ">
    <div class="row justify-content-center d-flex mt-5">
        <div class="col-md-12">
            <a href="{{route('home')}}" class="text-decoration-none text-dark ">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; <strong>Back to Places</strong>
            </a>
            <div class="row mt-4">
                <div class="col-md-4">
                    {{-- <img src="images/place06.jpg" alt="" class="card-img-top"> --}}

                    @if($place->image != '')
                        <img src="{{asset('uploads/places/'.$place->image)}}" alt="" class="card-img-top">
                        @else
                        <img src="https://placehold.co/600x400?text=No Image" alt="" class="card-img-top">
                        @endif
                </div>
                <div class="col-md-8">
                    @include('layouts.message')
                    <h3 class="h2 mb-3">{{$place->title}}</h3>
                    <div class="h4 text-muted">{{$place->location}}</</div>
                    <div class="star-rating d-inline-flex ml-2" title="">
                        <span class="rating-text theme-font theme-yellow">5.0</span>
                        <div class="star-rating d-inline-flex mx-2" title="">
                            <div class="back-stars ">
                                <i class="fa fa-star " aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>

                                <div class="front-stars" style="width: 100%">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <span class="theme-font text-muted">(0 Review)</span>
                    </div>

                    <div class="content mt-3">
                        {{$place->description}}</
                    </div>

                    <div class="col-md-12 pt-2">
                        <hr>
                    </div>
                    
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h2 class="h3 mb-4">Suggetions</h2>
                        </div>

                        @if($relatedPlaces->isNotEmpty())
                        @foreach($relatedPlaces as $relatedPlace)

                        
                        
                        <div class="col-md-4 col-lg-4 mb-4">
                            <div class="card border-0 shadow-lg">

                                <a href="{{ route("place.detail", $relatedPlace->id) }}">
                                @if($relatedPlace->image != '')
                                <img src="{{asset('uploads/places/'.$relatedPlace->image)}}" alt="" class="card-img-top">
                                @else
                                <img src="https://placehold.co/600x400?text=No Image" alt="" class="card-img-top">
                                @endif
                                </a>
                                <div class="card-body">

                                {{-- <img src="images/place02.jpg" alt="" class="card-img-top"> --}}
                                
                                    <h3 class="h4 heading"><a href="{{ route('place.detail', 
                                    $relatedPlace->id) }}"> {{$relatedPlace->title}}</a></h3>
                                    <p>{{$relatedPlace->location}}</p>
                                    <div class="star-rating d-inline-flex ml-2" title="">
                                        <span class="rating-text theme-font theme-yellow">0.0</span>
                                        <div class="star-rating d-inline-flex mx-2" title="">
                                            <div class="back-stars ">
                                                <i class="fa fa-star " aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
            
                                                <div class="front-stars" style="width: 70%">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="theme-font text-muted">(0)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        @endforeach
                        @endif
                    </div>
                        {{-- <div class="col-md-4 col-lg-4 mb-4">
                            <div class="card border-0 shadow-lg">
                                <img src="images/place02.jpg" alt="" class="card-img-top">
                                <div class="card-body">
                                    <h3 class="h4 heading">{{$relatedPlace->title}}</h3>
                                    <p>{{$relatedPlace->location}}l</p>
                                    <div class="star-rating d-inline-flex ml-2" title="">
                                        <span class="rating-text theme-font theme-yellow">0.0</span>
                                        <div class="star-rating d-inline-flex mx-2" title="">
                                            <div class="back-stars ">
                                                <i class="fa fa-star " aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
            
                                                <div class="front-stars" style="width: 70%">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="theme-font text-muted">(0)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                         --}}
                                         
                    </div>
                    <div class="col-md-12 pt-2">
                        <hr>
                    </div>
                    <div class="row pb-5">
                        <div class="col-md-12  mt-4">
                            <div class="d-flex justify-content-between">
                                <h3>Reviews</h3>
                                <div>
                                    @if (Auth::check())
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Add Review
                                      </button>
                                      @else
                                      <a href="{{route('account.login')}}" class="btn btn-primary">Add Review</a>
                                      @endif
                                </div>
                            </div> 
                            
                            @if($place->reviews->isNotEmpty())
                            @foreach  ($place->reviews as $review)

                
                            <div class="card border-0 shadow-lg my-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="mb-3">{{ $review->user->name}}</h4>
                                        <span class="text-muted">
                                            {{\Carbon\Carbon::parse($review->created_at)->format('d M, Y')}}
                                            </span>         
                                    </div>
                                   @php
                                    $ratingPer = ($review->rating/5)*100;
                                   @endphp
                                    <div class="mb-3">
                                        <div class="star-rating d-inline-flex" title="">
                                            <div class="star-rating d-inline-flex " title="">
                                                <div class="back-stars ">
                                                    <i class="fa fa-star " aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                
                                                    <div class="front-stars" style="width: $ratingPer">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                                           
                                    </div>
                                    <div class="content">
                                        <p>{{$review->review}}</p>
                                    </div>
                                </div>
                            </div> 
                            @endforeach
                            @endif 
                            
                            
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>   

<!-- Modal -->
<div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Review for <strong>{{$place->title}}</strong></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" id="placeReviewForm" name="placeReviewForm">
                <input type="hidden" name="place_id" value="{{$place->id}}">
            <div class="modal-body">
                
                    <div class="mb-3">
                        <label for="" class="form-label">Review</label>
                        <textarea name="review" id="review" class="form-control" cols="5" rows="5" placeholder="Review"></textarea>
                        <p class="invalid-feedback" id="review-error"></p>
                    </div>
                    <div class="mb-3">
                        <label for=""  class="form-label">Rating</label>
                        <select name="rating" id="rating" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection




@section('script')
<script>
$("#placeReviewForm").submit(function(e){
    e.preventDefault();
    $.ajax({
        url: '{{ route('place.saveReview')}}',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        data: $("#placeReviewForm").serializeArray(),
            success:function(response){
                if(response.status == false){
                    var errors = response.errors;
                    if(errors.review){
                        $("#review").addClass('is-invalid');
                        $("#review-error").html(errors.review);
                    }
                    else{
                        $("#review").removeClass('is-invalid');
                        $("#review-error").html('');

                    }

                }
                else{
                    window.location.href='{{ route("place.detail",$place->id)}}'
                }
            } 
            
        
    });
});


</script>

@endsection

