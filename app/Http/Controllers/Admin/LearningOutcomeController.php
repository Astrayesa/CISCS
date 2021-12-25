<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\LearningOutcome;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LearningOutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Curriculum $curriculum)
    {
        //
        $learningOutcome = null;
        return view("admin.learning_outcome.create", compact("curriculum", "learningOutcome"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request, Curriculum $curriculum)
    {
        //
        $data = $request->all();
        $data["curriculum_id"] = $curriculum->id;
        LearningOutcome::create($data);
        return redirect()->route("admin.curriculum.show", $curriculum->id);
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
        return compact("curriculum", "learningOutcome");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param LearningOutcome $learningOutcome
     * @return Application|Factory|View|Response
     */
    public function edit(Curriculum $curriculum, LearningOutcome $learningOutcome)
    {
        //
        return view("admin.learning_outcome.create", compact("curriculum", "learningOutcome"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param LearningOutcome $learningOutcome
     * @return RedirectResponse
     */
    public function update(Request $request, Curriculum $curriculum, LearningOutcome $learningOutcome)
    {
        //
        $learningOutcome->update($request->all());
        return redirect()->route("admin.curriculum.show", $curriculum->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param LearningOutcome $learningOutcome
     * @return RedirectResponse
     */
    public function destroy(Curriculum $curriculum, LearningOutcome $learningOutcome)
    {
        //
        $learningOutcome->delete();
        return redirect()->route("admin.curriculum.show", $curriculum->id);
    }
}
