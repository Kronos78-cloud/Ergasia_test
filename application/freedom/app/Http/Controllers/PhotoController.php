<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Place;
use Notification;
use App\Notifications\PhotoUploaded;
use Auth;

class PhotoController extends Controller
{
    public function uploadForm()
    {
        $places = Place::all();

        return view('upload_photo', [
            'places' => $places
        ]);
    }
    
    public function uploadPhoto(Request $request)
    {
        $photo = new Photo();
        $place = Place::find($request->input('place'));

        if (!$place) {
            //add new place
            $place = new Place();
            $place->name = $request->input('place_name');
            $place->lat = $request->input('place_lat');
            $place->lng = $request->input('place_lng');
        }

        $place->visited = 1;
        $place->save();

        $photo->place()->associate($place);
        $photo->image = $request->image->store('/', 'public');
        $photo->save();
        //notify user by sending email
        $data = Auth::user()->email;
        $billData = [
            'name' => $data,
            'body' => 'Congratulations!You have just uploaded the photo of a new vaccination center!',
            'thanks' => 'Thank you',
            'text' => 'Click here to go to site',
            'offer' => url('http://34.79.170.98/'),
            'bill_id' => 30061
        ];

        Notification::route('mail', $data)->notify(new PhotoUploaded($billData));

        return redirect()->route('Main');
    }
}
