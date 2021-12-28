<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseLearningOutcomeEvaluation;
use App\Models\Curriculum;
use App\Models\Topic;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function view;

class CourseController extends Controller
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
        $course = null;
        $lessonPlan = null;
        return view("admin.course.create", compact("curriculum", "course", "lessonPlan"));
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
        $request->validate([
            "code" => "required|string|max:20",
            "title_en" => "required|string|max:100",
            "title_id" => "required|string|max:100",
            "desc_en" => "required|string|max:255",
            "desc_id" => "required|string|max:255",
            "semester" => "required|integer|max:8",
            "theory_credit" => "required|integer|max:8",
            "non_theory_credit" => "required|integer|max:8",
            "developer_name" => "required|string|max:100",
            "reference" => "required"
        ]);
        $data = $request->all();
        $data["curriculum_id"] = $curriculum->id;
        $course = Course::create($data);
        $course->lesson_plan()->create($data);

        return redirect()->route("admin.curriculum.show", $curriculum->id)->with("success", "Data created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param Curriculum $curriculum
     * @param Course $course
     * @return Application|Factory|View
     */
    public function show(Curriculum $curriculum, Course $course)
    {
        //
        $lessonPlan = $course->lesson_plan()->get();
        $clos = $course->clos()->get();
        $clos_id = $clos->pluck("id")->toArray();
        $topics = Topic::where("CLO_id", "=", $clos_id)->get();
        $evaluations = CourseLearningOutcomeEvaluation::where("CLO_id", "=", $clos_id)->with("evaluation")->get()->pluck("evaluation");
        return view("admin.course.show", compact("curriculum", "course", "lessonPlan", "clos", "topics", "evaluations"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Curriculum $curriculum
     * @param Course $course
     * @return Application|Factory|View
     */
    public function edit(Curriculum $curriculum, Course $course)
    {
        //
        $lessonPlan = $course->lesson_plan()->first();
        return view("admin.course.create", compact("curriculum", "course", "lessonPlan"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Curriculum $curriculum
     * @param Course $course
     * @return RedirectResponse
     */
    public function update(Request $request, Curriculum $curriculum, Course $course)
    {
        //
        $request->validate([
            "code" => "required|string|max:20",
            "title_en" => "required|string|max:100",
            "title_id" => "required|string|max:100",
            "desc_en" => "required|string|max:255",
            "desc_id" => "required|string|max:255",
            "semester" => "required|integer|max:8",
            "theory_credit" => "required|integer|max:8",
            "non_theory_credit" => "required|integer|max:8",
        ]);
        $course->update($request->all());
        return redirect()->route("admin.curriculum.show", $curriculum->id)->with("success", "Data updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Curriculum $curriculum
     * @param Course $course
     * @return RedirectResponse
     */
    public function destroy(Curriculum $curriculum, Course $course)
    {
        //
        $course->lesson_plan()->delete();
        $course->delete();
        return redirect()->route("admin.curriculum.show", $curriculum->id)->with("success", "Data deleted successfully");
    }
}
