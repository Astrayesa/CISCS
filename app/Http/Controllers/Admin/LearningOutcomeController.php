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
     * @param Curriculum $curriculum
     * @return RedirectResponse
     */
    public function store(Request $request, Curriculum $curriculum)
    {
        //
        $data = $request->validate([
            "title_en" => "required|string|max:50",
            "title_id" => "required|string|max:50",
            "desc_en" => "required|string|max:255",
            "desc_id" => "required|string|max:255",
        ]);
        $data["curriculum_id"] = $curriculum->id;
        LearningOutcome::create($data);
        return redirect()->route("admin.curriculum.show", $curriculum->id)->with("success", "Data created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param Curriculum $curriculum
     * @param LearningOutcome $learningOutcome
     * @return LearningOutcome
     */
    public function show(Curriculum $curriculum, LearningOutcome $learningOutcome)
    {
        //
        return $learningOutcome;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Curriculum $curriculum
     * @param LearningOutcome $learningOutcome
     * @return Application|Factory|View
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
     * @param Curriculum $curriculum
     * @param LearningOutcome $learningOutcome
     * @return RedirectResponse
     */
    public function update(Request $request, Curriculum $curriculum, LearningOutcome $learningOutcome)
    {
        //
        $data = $request->validate([
            "title_en" => "required|string|max:50",
            "title_id" => "required|string|max:50",
            "desc_en" => "required|string|max:255",
            "desc_id" => "required|string|max:255",
        ]);
        $learningOutcome->update($data);
        return redirect()->route("admin.curriculum.show", $curriculum->id)->with("success", "Data updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Curriculum $curriculum
     * @param LearningOutcome $learningOutcome
     * @return RedirectResponse
     */
    public function destroy(Curriculum $curriculum, LearningOutcome $learningOutcome)
    {
        //
        $learningOutcome->delete();
        return redirect()->route("admin.curriculum.show", $curriculum->id)->with("success", "Data deleted successfully");
    }
}
