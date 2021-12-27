<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use function redirect;
use function view;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        //
        $data = Department::all();
        return view("admin.department.index", compact("data"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        //
        $department = null;
        return view("admin.department.create", compact("department"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "code" => "required|max:20",
            "name_en" => "required|string|max:100",
            "name_id" => "required|string|max:100",
            "establishment_cert_num" => "required|string|max:50",
            "accreditation_cert_num" => "required|string|max:50",
            "accreditation_ranking" => "required|string|max:4",
            "accreditation_file" => "required|file|mimes:pdf|max:1024"
        ]);
        $data = $request->all();
        $filename = "department-" . time() . "." . $request->file("accreditation_file")->getClientOriginalExtension();
        $file_path = $request->file("accreditation_file")->storeAs("accreditation_file", $filename, "public");
        $data["accreditation_file"] = $file_path;
        Department::create($data);
        return redirect()->route("admin.department.index")->with("success", "Data created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param Department $department
     * @return string
     */
    public function show(Department $department)
    {
        //
        return $department->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     * @return Application|Factory|View
     */
    public function edit(Department $department)
    {
        //
        return view("admin.department.create", compact("department"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Department $department
     * @return RedirectResponse
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            "code" => "required|max:20",
            "name_en" => "required|string|max:100",
            "name_id" => "required|string|max:100",
            "establishment_cert_num" => "required|string|max:50",
            "accreditation_cert_num" => "required|string|max:50",
            "accreditation_ranking" => "required|string|max:4"
        ]);
        $data = $request->all();
        if (array_key_exists("accreditation_file", $data)) {
            $filename = "department-" . time() . "." . $request->file("accreditation_file")->getClientOriginalExtension();
            $file_path = $request->file("accreditation_file")->storeAs("accreditation_file", $filename, "public");
            $data["accreditation_file"] = $file_path;
        }
        $department->update($data);
        return redirect()->route("admin.department.index")->with("success", "Data updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return RedirectResponse
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route("admin.department.index")->with("success", "Data deleted successfully");
    }
}
