<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_title = 'Activities List';
        $data = Activity::where('status', 1)->latest()->get();
        return view('dashboard.activities.index', compact('data', 'page_title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($activity_id)
    {
        $activity = Activity::find($activity_id);

        if ($activity) {
            // $activity->delete();
            $activity->status = 4;
            $activity->update();
            return response()->json(['message' => 'Activity deleted successfully']);
        } else {
            return response()->json(['message' => 'Activity not found'], 404);
        }
    }
}
