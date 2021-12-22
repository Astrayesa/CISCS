<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curriculum;
use App\Models\Department;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        //
        $data = Curriculum::with(["department" => function ($query) {
            $query->select("id", "name_en");
        }])->get();
//        dd($data);
        return view("admin.curriculum.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        //
        $curriculum = null;
        $department = Department::all();
        return view("admin.curriculum.create", compact("curriculum", "department"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        // TODO: validation
        $data = $request->all();
        Curriculum::create($data);
        return redirect()->route("admin.curriculum.index");
    }

    /**
     * Display the specified resource.
     *
     * @param Curriculum $curriculum
     * @return string
     */
    public function show(Curriculum $curriculum)
    {
        //
        $data = $curriculum->load(["department" => function ($query) {
            $query->select("id", "name_en");
        }]);
        return $data->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Curriculum $curriculum
     * @return Application|Factory|View
     */
    public function edit(Curriculum $curriculum)
    {
        //
        $department = Department::all();
        return view("admin.curriculum.create", compact("curriculum", "department"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Curriculum $curriculum
     * @return RedirectResponse
     */
    public function update(Request $request, Curriculum $curriculum)
    {
        //
        $curriculum->update($request->all());

        return redirect()->route("admin.curriculum.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Curriculum $curriculum
     * @return RedirectResponse
     */
    public function destroy(Curriculum $curriculum)
    {
        //
        $curriculum->delete();
        return redirect()->route("admin.curriculum.index");
    }
}
