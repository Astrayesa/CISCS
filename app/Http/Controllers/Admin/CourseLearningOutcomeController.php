<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseLearningOutcome;
use App\Models\Curriculum;
use App\Models\Topic;
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
        $data = $request->all();
        $data["lesson_plan_id"] = $course->lesson_plan->id;
        CourseLearningOutcome::create($data);
        return redirect()->route("admin.curriculum.course.show", [$curriculum->id, $course->id]);
    }

    public function edit(Curriculum $curriculum, Course $course, CourseLearningOutcome $clo)
    {
        return view('admin.course_learning_outcome.create', compact("curriculum", "course", "clo"));
    }

    public function update(Request $request, Curriculum $curriculum, Course $course, CourseLearningOutcome $clo)
    {
        $data = $request->all();
        $data["lesson_plan_id"] = $course->lesson_plan->id;
        $clo->update($data);
        return redirect()->route("admin.curriculum.course.show", [$curriculum->id, $course->id]);
    }

    public function destroy(Curriculum $curriculum, Course $course, CourseLearningOutcome $clo)
    {
        $clo->delete();
        return redirect()->back();
    }
}
