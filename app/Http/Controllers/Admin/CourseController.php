<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Curriculum;
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
        return view("admin.course.create", compact("curriculum", "course"));
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
        $data = $request->all();
        $data["curriculum_id"] = $curriculum->id;
//        dd($data, $request);
        Course::create($data);
        return redirect()->route("admin.curriculum.show", $curriculum->id);
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
        return view("admin.course.show", compact("curriculum", "course", "lessonPlan", "clos"));
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
        return view("admin.course.create", compact("curriculum", "course"));
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
        $course->update($request->all());
        return redirect()->route("admin.curriculum.show", $curriculum->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @return RedirectResponse
     */
    public function destroy(Curriculum $curriculum, Course $course)
    {
        //
        $course->delete();
        return redirect()->back();
    }
}
