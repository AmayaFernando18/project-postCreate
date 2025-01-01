<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    //show review in backend

    public function index(){
        $reviews = Review::with('place','user')->orderBy('created_at','DESC')->paginate(10);
        return view('account.reviews.list',[
            'reviews' => $reviews
        ]);
    }

//edit review
public function edit($id){
    $review = Review::findOrFail($id);

    return view('account.reviews.edit',[
        'review' => $review
    ]);
}


//update a review
public function updateReview($id, Request $request){
    $review = Review::findOrFail($id);

    $validator = Validator::make($request->all(),[
        'review' => 'required',

    ]);

    if ($validator->fails()) {
        return redirect()->route('account.reviews.edit',$id)->withInput()->withErrors($validator);

}
$review->review = $request->review;
$review->save();


session()->flash('success','Review updated successfully.');

return redirect()->route('account.reviews');

}


//delete review

public function deleteReview(Request $request){
    $id = $request->id;

    $review = Review::find($id);

    if($review == null){
        session()->flash('error','Review not found.');
        return response ()->json([
            'status' =>false
        ]);

    }
    else{}
        $review->delete();
        if($review == null){
            session()->flash('succcess','Review deleted successfully.');
            return response ()->json([
                'status' =>false
            ]);
    

    


    }

}}