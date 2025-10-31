<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Swipe;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function test()
    {
        return response()->json([
            'message' => 'API is working!', 
            'status' => 'success',
            'people_count' => Person::count(),
            'swipes_count' => Swipe::count()
        ]);
    }

    public function recommendations()
    {
        $swipedPersonIds = Swipe::where('swiper_id', 1)->pluck('person_id');
        
        $recommendations = Person::whereNotIn('id', $swipedPersonIds)->get();

        return response()->json([
            'message' => 'Recommendations loaded successfully',
            'count' => $recommendations->count(),
            'data' => $recommendations
        ]);
    }

    public function like($id)
    {
        $person = Person::find($id);
        if (!$person) {
            return response()->json(['error' => 'Person not found'], 404);
        }

        $existingSwipe = Swipe::where('swiper_id', 1)
            ->where('person_id', $id)
            ->first();

        if ($existingSwipe) {
            return response()->json(['error' => 'Already swiped this person'], 400);
        }

        Swipe::create([
            'swiper_id' => 1,
            'person_id' => $id,
            'type' => 'like'
        ]);

        return response()->json([
            'message' => 'Successfully liked ' . $person->name,
            'success' => true,
            'person' => $person
        ]);
    }

    public function dislike($id)
    {
        $person = Person::find($id);
        if (!$person) {
            return response()->json(['error' => 'Person not found'], 404);
        }

        $existingSwipe = Swipe::where('swiper_id', 1)
            ->where('person_id', $id)
            ->first();

        if ($existingSwipe) {
            return response()->json(['error' => 'Already swiped this person'], 400);
        }

        Swipe::create([
            'swiper_id' => 1,
            'person_id' => $id,
            'type' => 'dislike'
        ]);

        return response()->json([
            'message' => 'Successfully disliked ' . $person->name,
            'success' => true
        ]);
    }

    public function liked()
    {
        $likedPersonIds = Swipe::where('swiper_id', 1)
            ->where('type', 'like')
            ->pluck('person_id');

        $likedPeople = Person::whereIn('id', $likedPersonIds)->get();

        return response()->json([
            'message' => 'Liked people loaded successfully',
            'count' => $likedPeople->count(),
            'data' => $likedPeople
        ]);
    }

    // Debug route to see all swipes
    public function debugSwipes()
    {
        $swipes = Swipe::with('person')->get();
        return response()->json($swipes);
    }
}