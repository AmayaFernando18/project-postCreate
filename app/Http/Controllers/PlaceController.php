<?php

namespace App\Http\Controllers;



use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PlaceController extends Controller
{
    //show places listing page
    public function index(Request $request){

        $places = Place::orderBy('created_at','DESC');

    if (!empty($request->keyword)){
        $places->where('title','like','%'.$request->keyword.'%');
    }

    $places = $places->paginate(9);

        return view('places.list',[
            'places' => $places
        ]);

    }

    //show create place page
    public function create(){
        return view('places.create');

    }


    //store a place in database
public function store(Request $request){

    $rules = [
        'title' => 'required|min:5',
        'location' => 'required|min:3',
    ];

    if(!empty($request->image)){

        $rules['image'] = 'image';}

    $validator = Validator::make($request->all(),$rules);

    if ($validator->fails()) {
        return redirect()->route('places.create')->withInput()->withErrors($validator);
    }


    //update place in DB
    $place = new Place();
    $place->title = $request->title;
    $place->location = $request->location;
    $place->description = $request->description;
    


    //upload place image
    if(!empty($request->image)){
        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/places'),$imageName);

        $place->image = $imageName;}
        $place->save();

return redirect()->route('places.index')->with('success', 'Place added successfully.');


}


    // show edit place page -->
    public function edit($id){
        $place = Place::findOrFail($id);
        return view('places.edit',[
        'place' => $place
        ]);

    }


    //update a place
public function update($id, Request $request){
    $place = Place::findOrFail($id);

    $rules = [
        'title' => 'required|min:5',
        'location' => 'required|min:3',
    ];

    if(!empty($request->image)){

        $rules['image'] = 'image';}

    $validator = Validator::make($request->all(),$rules);

    if ($validator->fails()) {
        return redirect()->route('places.edit', $place->id)->withInput()->withErrors($validator);
    }


    //update place in DB
    
    $place->title = $request->title;
    $place->location = $request->location;
    $place->description = $request->description;
    $place->save();


    //upload place image
    if(!empty($request->image)){

        //delete old place image from places directory
        File::delete(public_path('uploads/places/'.$place->image));

        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/places'),$imageName);
        $place->image = $imageName;

    
        $place->save();}
    
        
    
    
return redirect()->route('places.index')->with('success', 'Place updated successfully.');
    

}







//delete a place from DB
public function destroy(Request $request){
    $place = Place::Find($request->id);

    if($place == null){
        session()->flash('error','Place not found');
        return response()->json([
            'status' => false,
            'message' => 'Place not found.'
        ]);
    }
    else
    {
        File::delete(public_path('update/places/'.$place->image));
        $place->delete();

        session()->flash('success','Place deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Place deleted successfully.'
        ]);
    }
    
}


}
















