<?php

namespace App\Http\Controllers;

use my;
use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller

 {

public function register(){
    return view ('account.register');

}

public function processRegister(Request $request){
    $validator = Validator::make($request->all(),[
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users', 
        'password' => 'required|confirmed|min:5', 
        'password_confirmation' => 'required'
    ]);
    if ($validator->fails()){
        return redirect()->route('account.register')->withInput()->withErrors($validator);
    }

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->route('account.login')->with('Success','You have registered successfully.');

}

public function login(){
    return view ('account.login');

}

public function authenticate (Request $request){
    $validator = Validator::make($request->all(),[
        'email' => 'required|email', 
        'password' => 'required', 
      
    ]);


    if ($validator->fails()){
        return redirect()->route('account.login')->withInput()->withErrors($validator);
    }

if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
    return redirect()->route('account.profile');

}
else{
    return redirect()->route('account.login')->with('error','Either email/password is incorrect.');
}

}

public function profile(){

    $user = User::find(Auth::user()->id);
    return view ('account.profile', [
        'user' => $user
    ]);

}




public function updateProfile(Request $request){
    $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email,'.Auth::user()->id.',id', 
    ];

    if(!empty($request->image)){
        $rules['image'] = 'image';

    }

   
    $validator = Validator::make($request->all(),$rules);

    if ($validator->fails()){
        return redirect()->route('account.profile')->withInput()->withErrors($validator);
    }

    $user = User::find(Auth::user()->id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->save();

    //upload image
    if(!empty($request->image)){

        $rules['image'] = 'image';

        //delete old image
        File::delete(public_path('uploads/profile/'.$user->image));
        File::delete(public_path('uploads/profile/thumb/'.$user->image));


        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/profile'),$imageName);

        $user->image = $imageName;
        $user->save();

        

        }

    return redirect()->route('account.profile')->with('Success','Profile updated successfully.');
}

public function logout(){
    Auth::logout();
    return view ('account.login');

}


public function myReviews(){

    $reviews = Review::with('place')->where('user_id',Auth::user()->id)
    ->orderBy('created_at','DESC')
    ->paginate(10);

    return view('account.my-reviews.my-reviews',[
        'reviews' => $reviews
    ]);
}

//edit review page
public function editReview($id){

    $review = Review::where([
        'id' => $id,
        'user_id' => Auth::user()->id
    ])->with('place')->first();

    return view('account.my-reviews.edit-review',[
        'review' => $review
    ]);}


    //update a review
public function updateReview($id, Request $request){
    $review = Review::findOrFail($id);

    $validator = Validator::make($request->all(),[
        'review' => 'required',
        'rating' => 'required'

    ]);

    if ($validator->fails()) {
        return redirect()->route('account.myReviews.editReview',$id)->withInput()->withErrors($validator);

}
$review->review = $request->review;
$review->rating = $request->rating;
$review->save();


session()->flash('success','Review updated successfully.');

return redirect()->route('account.myReviews');

}

//delete review

public function deleteReview(Request $request){
    $id = $request->id;

    $review = Review::find($id);

    if($review == null){
        
        return response ()->json([
            'status' =>false
        ]);

    }
    
        $review->delete();
        
            session()->flash('succcess','Review deleted successfully.');
            return response ()->json([
                'status' => true,
                'message' =>'Review deleted successfully'
            ]);
    

    


    }





 }




 
