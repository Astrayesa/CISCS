<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseLearningOutcomeEvaluation;
use App\Models\Curriculum;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            "file" => "required|file",
            "type" => "required|string",
            "percent_to_graduate_CLO" => "required|numeric"
        ]);
        $data = $request->all();
        $filename = "evaluation-" . time() . "." . $request->file("file")->getClientOriginalExtension();
        $file_path = $request->file("file")->storeAs("evaluation_file", $filename, "public");
        $data["file"] = $file_path;

        $evaluation = Evaluation::create($data);
        $evaluation_clos = array_key_exists("CLO_id", $data) ? $data["CLO_id"] : [];
//        dd($evaluation_clos);
        $evaluation->clos()->attach($evaluation_clos);

//        foreach ($data['CLO_id'] as $clo_id) {
//            CourseLearningOutcomeEvaluation::create([
//                'CLO_id' => $clo_id,
//                'evaluation_id' => $evaluation->id
//            ]);
//        }
        return redirect(route("admin.curriculum.course.show", [$curriculum->id, $course->id]));
    }

    public function edit(Curriculum $curriculum, Course $course, Evaluation $evaluation)
    {
        $clos = $course->clos;
        return view('admin.evaluation.create', compact("curriculum", "course", "clos", "evaluation"));
    }

    public function update(Request $request, Curriculum $curriculum, Course $course, Evaluation $evaluation)
    {
        $data = $request->all();
        if ($request->file('file')) {
            if ($request->oldfile) {
                Storage::disk('public')->delete($evaluation->file);
            }
            $filename = "evaluation-" . time() . "." . $request->file("file")->getClientOriginalExtension();
            $data["file"] = $request->file("file")->storeAs("evaluation_file", $filename, "public");
        }
        $evaluation->update($data);

        CourseLearningOutcomeEvaluation::where('evaluation_id', $evaluation->id)->forceDelete();
        if ($request->CLO_id) {
            foreach ($data['CLO_id'] as $clo_id) {
                CourseLearningOutcomeEvaluation::create([
                    'CLO_id' => $clo_id,
                    'evaluation_id' => $evaluation->id
                ]);
            }
        }
        return redirect(route("admin.curriculum.course.show", [$curriculum->id, $course->id]));
    }

    public function destroy(Curriculum $curriculum, Course $course, Evaluation $evaluation)
    {
        if ($evaluation->file) {
            Storage::disk('public')->delete($evaluation->file);
        }
        CourseLearningOutcomeEvaluation::where('evaluation_id', $evaluation->id)->forceDelete();
        $evaluation->delete();
        return redirect()->back();
    }
}
