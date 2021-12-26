<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseLearningOutcomeEvaluation;
use App\Models\Curriculum;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function create(Curriculum $curriculum, Course $course)
    {
        $evaluation = null;
        $clos = $course->clos;
        return view('admin.evaluation.create', compact("curriculum", "course", "clos", "evaluation"));
    }

    public function store(Request $request, Curriculum $curriculum, Course $course)
    {
        $data = $request->all();
        $filename = "evaluation-" . time() . "." . $request->file("file")->getClientOriginalExtension();
        $file_path = $request->file("file")->storeAs("evaluation_file", $filename, "public");
        $data["file"] = $file_path;
        $evaluation = Evaluation::create($data);
        foreach ($data['CLO_id'] as $clo_id) {
            CourseLearningOutcomeEvaluation::create([
                'CLO_id' => $clo_id,
                'evaluation_id' => $evaluation->id
            ]);
        }
        return redirect(route("admin.curriculum.course.show", [$curriculum->id, $course->id]));
    }
}
