<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseLearningOutcome;
use App\Models\Curriculum;
use Illuminate\Http\Request;

class CourseLearningOutcomeController extends Controller
{
    public function create(Curriculum $curriculum, Course $course)
    {
        $clo = null;
        return view('admin.course_learning_outcome.create', compact("curriculum", "course", "clo"));
    }

    public function store(Request $request, Curriculum $curriculum, Course $course)
    {
        $data = $request->validate([
            "title_en" => "required|string|max:50",
            "title_id" => "required|string|max:50",
            "desc_en" => "required|string|max:100",
            "desc_id" => "required|string|max:100",
            "percent_to_graduate_LO" => "required|numeric|min:0|max:100",
            "LO_id" => "required|exists:learning_outcomes,id",
        ]);

        $data["lesson_plan_id"] = $course->lesson_plan->id;
        CourseLearningOutcome::create($data);
        return redirect()->route("admin.curriculum.course.show", [$curriculum->id, $course->id])->with("success", "Data created successfully");
    }

    public function edit(Curriculum $curriculum, Course $course, CourseLearningOutcome $clo)
    {
        return view('admin.course_learning_outcome.create', compact("curriculum", "course", "clo"));
    }

    public function update(Request $request, Curriculum $curriculum, Course $course, CourseLearningOutcome $clo)
    {
        $data = $request->validate([
            "title_en" => "required|string|max:50",
            "title_id" => "required|string|max:50",
            "desc_en" => "required|string|max:100",
            "desc_id" => "required|string|max:100",
            "percent_to_graduate_LO" => "required|numeric|min:0|max:100",
            "LO_id" => "required|exists:learning_outcomes,id",
        ]);
        $data["lesson_plan_id"] = $course->lesson_plan->id;
        $clo->update($data);
        return redirect()->route("admin.curriculum.course.show", [$curriculum->id, $course->id])->with("success", "Data updated successfully");
    }

    public function destroy(Curriculum $curriculum, Course $course, CourseLearningOutcome $clo)
    {
        $clo->delete();
        return redirect()->back()->with("success", "Data updated successfully");
    }
}
