<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\UserLocation;

class LocationController extends Controller
{
    //

    public function store(Request $request)
    {
        // return 'test';
        // $request->validate([
        //     'latitude' => 'required|numeric',
        //     'longitude' => 'required|numeric',
        // ]);
      
        // افترض إن اليوزر مسجل دخول
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $location = UserLocation::create([
            'user_id' => $user->id,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return response()->json(['message' => 'Location stored', 'location' => $location]);
    }

    public function add(){
        return view('location.add');
    }


    public function index()
    {
        $locations = UserLocation::with('user')->orderBy('created_at', 'desc')->get();
    
        return view('location.index', compact('locations'));
    }

    public function showLocation($id)
    {
        $location = UserLocation::findOrFail($id);

        // تأكد من نوع البيانات وقيمها
        info('Latitude: '.$location->latitude);
        info('Longitude: '.$location->longitude);
      
        return view('location.show-location', [
            'latitude' => $location->latitude,
            'longitude' => $location->longitude,
            'userName' => $location->user->name,
            'timestamp' => $location->created_at->format('Y-m-d H:i:s')
        ]);
    }
    


}
