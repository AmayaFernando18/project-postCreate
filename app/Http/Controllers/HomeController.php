<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //show home page
    public function index(Request $request){
        
        $places = Place::withCount('reviews')->withSum('reviews','rating')->orderBy('created_at','DESC');
        if(!empty($request->keyword)){
            $places->where('title','like','%'.$request->keyword.'%');

        }
     $places=$places->paginate(8);
        return view('home',[
            'places' => $places
        ]);
    }

//show place detail
    public function detail($id){
        $place = Place::with('reviews','reviews.user')->findOrFail($id);
        // dd($place);

       

        $relatedPlaces= Place::take(3)->where('id','!=',$id)->inRandomOrder()->get();

        


        return view('place-detail',[
            'place' => $place,
            'relatedPlaces' => $relatedPlaces
        ]);

    }

    //save review in DB
    public function saveReview(Request $request){
        $validator = Validator::make($request->all(),[
            'review' => 'required|min:10',
             'rating' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        //applyin condition
        $countReview = Review::where('user_id', Auth::user()->id)->where('place_id',$request->place_id)->count();

        if($countReview > 0){
            session()->flash('error','You already submitted a review.');
            return response()->json([
                'status' => true,
            ]);
        }


        $review = new Review();
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->user_id = Auth::user()->id;
        $review->place_id = $request->place_id;
        $review->save();

        session()->flash('success','Review submitted successfully.');

        return response()->json([
            'status' => true,
        ]);
    }
}
