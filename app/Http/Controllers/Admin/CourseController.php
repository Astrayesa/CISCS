<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Curriculum;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function view;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
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
        return view("admin.course.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request, Curriculum $curriculum)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @return Response
     */
    public function show(Curriculum $curriculum, Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Course $course
     * @return Response
     */
    public function edit(Curriculum $curriculum, Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Course $course
     * @return Response
     */
    public function update(Request $request, Curriculum $curriculum,  Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @return Response
     */
    public function destroy(Curriculum $curriculum, Course $course)
    {
        //
    }
}
