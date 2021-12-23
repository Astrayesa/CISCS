<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\GraduateProfile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GraduateProfileController extends Controller
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
     * @return Response
     */
    public function create(Curriculum $curriculum)
    {
        //
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
     * @param GraduateProfile $graduateProfile
     * @return Response
     */
    public function show(Curriculum $curriculum, GraduateProfile $graduateProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param GraduateProfile $graduateProfile
     * @return Response
     */
    public function edit(Curriculum $curriculum, GraduateProfile $graduateProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param GraduateProfile $graduateProfile
     * @return Response
     */
    public function update(Request $request, Curriculum $curriculum, GraduateProfile $graduateProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param GraduateProfile $graduateProfile
     * @return Response
     */
    public function destroy(Curriculum $curriculum, GraduateProfile $graduateProfile)
    {
        //
    }
}
