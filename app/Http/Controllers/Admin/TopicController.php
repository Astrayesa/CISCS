<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseLearningOutcome;
use App\Models\Curriculum;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function create(Curriculum $curriculum, Course $course)
    {
        $topic = null;
        $clos = CourseLearningOutcome::all();
        return view('admin.topic.create', compact("curriculum", "course", "clos", "topic"));
    }

    public function store(Request $request, Curriculum $curriculum, Course $course)
    {
        $data = $request->all();
        Topic::create($data);
        return redirect(route("admin.curriculum.course.show", [$curriculum->id, $course->id]));
    }

    public function edit(Curriculum $curriculum, Course $course, Topic $topic)
    {
        $clos = CourseLearningOutcome::all();
        return view('admin.topic.create', compact("curriculum", "course", "clos", "topic"));
    }

    public function update(Request $request, Curriculum $curriculum, Course $course, Topic $topic)
    {
        $data = $request->all();
        $topic->update($data);
        return redirect()->route("admin.curriculum.course.show", [$curriculum->id, $course->id]);
    }

    public function destroy(Curriculum $curriculum, Course $course, Topic $topic)
    {
        $topic->delete();
        return redirect()->back();
    }
}
