<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Place;
use App\Photo;

class MainController extends Controller
{
    function index()
    {
     return view('login');
    }

    function checklogin(Request $request)
    {
     $this->validate($request, [
      'email'   => 'required|email',
      'password'  => 'required|alphaNum|min:3'
     ]);

     $user_data = array(
      'email'  => $request->get('email'),
      'password' => $request->get('password')
     );

     if(Auth::attempt($user_data))
     {
      return redirect('main/mainpage');
     }
     else
     {
      return back()->with('error', 'Wrong Login Details');
     }

    }

    function successlogin()
    {
     return view('successlogin');
    }

    function logout()
    {
     Auth::logout();
     return redirect('main');
    }

    function mainpage()
    {
     $visited = Place::where('visited', 1)->get();
        $togo = Place::where('visited', 0)->get();

        $photos = Photo::all();

        return view('travel_list', [
            'visited' => $visited,
            'togo' => $togo,
            'photos' => $photos
        ]);
    }

    function homepage()
    {
     $visited = Place::where('visited', 1)->get();
        $togo = Place::where('visited', 0)->get();

        $photos = Photo::all();

        return view('travel_list_home', [
            'visited' => $visited,
            'togo' => $togo,
            'photos' => $photos
        ]);
    }
}

?>
