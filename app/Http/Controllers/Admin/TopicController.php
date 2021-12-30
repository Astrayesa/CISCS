<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Curriculum;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function create(Curriculum $curriculum, Course $course)
    {
        $topic = null;
        $clos = $course->clos;
        return view('admin.topic.create', compact("curriculum", "course", "clos", "topic"));
    }

    public function store(Request $request, Curriculum $curriculum, Course $course)
    {
        $data = $request->validate([
            "title_en" => "required|string|max:50",
            "title_id" => "required|string|max:50",
            "indicator" => "required|string|max:50",
            "start_week" => "required|numeric|min:1|max:16",
            "end_week" => "required|string|min:1|max:16|gte:start_week",
            "learning_method" => "required|string|max:50",
            "percent_to_LO" => "required|numeric|min:0|max:100",
            "CLO_id" => "required|exists:course_learning_outcomes,id",
        ]);
        Topic::create($data);
        return redirect(route("admin.curriculum.course.show", [$curriculum->id, $course->id]))->with("success", "Data created successfully");
    }

    public function edit(Curriculum $curriculum, Course $course, Topic $topic)
    {
        $clos = $course->clos;
        return view('admin.topic.create', compact("curriculum", "course", "clos", "topic"));
    }

    public function update(Request $request, Curriculum $curriculum, Course $course, Topic $topic)
    {
        $data = $request->validate([
            "title_en" => "required|string|max:50",
            "title_id" => "required|string|max:50",
            "indicator" => "required|string|max:50",
            "start_week" => "required|numeric|min:1|max:16",
            "end_week" => "required|string|min:1|max:16|gte:start_week",
            "learning_method" => "required|string|max:50",
            "percent_to_LO" => "required|numeric|min:0|max:100",
            "CLO_id" => "required|exists:course_learning_outcomes,id",
        ]);
        $topic->update($data);
        return redirect()->route("admin.curriculum.course.show", [$curriculum->id, $course->id])->with("success", "Data updated successfully");
    }

    public function destroy(Curriculum $curriculum, Course $course, Topic $topic)
    {
        $topic->delete();
        return redirect()->back()->with("success", "Data deleted successfully");
    }
}
