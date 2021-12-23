<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\LearningOutcome;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LearningOutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Curriculum $curriculum)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request, Curriculum $curriculum)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param LearningOutcome $learningOutcome
     * @return Response
     */
    public function show(Curriculum $curriculum, LearningOutcome $learningOutcome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LearningOutcome $learningOutcome
     * @return Response
     */
    public function edit(Curriculum $curriculum, LearningOutcome $learningOutcome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param LearningOutcome $learningOutcome
     * @return Response
     */
    public function update(Request $request, Curriculum $curriculum, LearningOutcome $learningOutcome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LearningOutcome $learningOutcome
     * @return Response
     */
    public function destroy(Curriculum $curriculum, LearningOutcome $learningOutcome)
    {
        //
    }
}
