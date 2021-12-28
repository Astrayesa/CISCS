<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\GraduateProfile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GraduateProfileController extends Controller
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
        $graduateProfile = null;
        $courses = $curriculum->courses()->get();
        return view("admin.graduate_profile.create", compact("curriculum", "courses", "graduateProfile"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request, Curriculum $curriculum)
    {
        //
        $data = $request->all();
        $data["curriculum_id"] = $curriculum->id;
        $gp = GraduateProfile::create($data);
        $gp->courses()->attach($data["course_id"]);

        return redirect()->route("admin.curriculum.show", $curriculum->id);
    }

    /**
     * Display the specified resource.
     *
     * @param Curriculum $curriculum
     * @param GraduateProfile $graduateProfile
     * @return array
     */
    public function show(Curriculum $curriculum, GraduateProfile $graduateProfile)
    {
        //
        return compact("curriculum", "graduateProfile");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Curriculum $curriculum
     * @param GraduateProfile $graduateProfile
     * @return Application|Factory|View
     */
    public function edit(Curriculum $curriculum, GraduateProfile $graduateProfile)
    {
        //
        $courses = $curriculum->courses()->get();
        return view("admin.graduate_profile.create", compact("curriculum", "graduateProfile", "courses"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Curriculum $curriculum
     * @param GraduateProfile $graduateProfile
     * @return RedirectResponse
     */
    public function update(Request $request, Curriculum $curriculum, GraduateProfile $graduateProfile)
    {
        //
        $data = $request->all();
        $graduateProfile->update();
        $gp_course = array_key_exists("course_id", $data) ? $data["course_id"] : [];

        $graduateProfile->courses()->sync($gp_course);
        return redirect()->route("admin.curriculum.show", $curriculum->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Curriculum $curriculum
     * @param GraduateProfile $graduateProfile
     * @return RedirectResponse
     */
    public function destroy(Curriculum $curriculum, GraduateProfile $graduateProfile)
    {
        //
        $graduateProfile->delete();
        return redirect()->route("admin.curriculum.show", $curriculum->id);
    }
}
