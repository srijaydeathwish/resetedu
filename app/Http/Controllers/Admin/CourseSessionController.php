<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseSession;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CourseSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courseSession = CourseSession::all()->makeHidden(['created_at', 'updated_at']);
        return Inertia::render('Admin/Session', compact('courseSession'));
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
        // Validate the request data
        $validatedData = $request->validate([
            'month' => 'required|string',
            'year' => 'required|string',
        ]);

        CourseSession::create([
            'month' => $validatedData['month'],
            'year' => $validatedData['year'],
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseSession $courseSession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseSession $courseSession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseSession $courseSession)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'month' => 'required|string',
            'year' => 'required|string',
        ]);

        $courseSession->update([
            'month' => $validatedData['month'],
            'year' => $validatedData['year'],
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseSession $courseSession)
    {
        //
    }
}
