<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use App\Models\Department;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view("user.home", compact("departments"));
    }

    public function showDepartment(Department $department)
    {
        $departments = Department::all();
        return view("user.department", compact("departments", "department"));
    }

    public function listCurriculums()
    {
        $departments = Department::with('Curriculums')->get();
        return view("user.curriculum", compact("departments"));
    }

    public function listCourses()
    {
        $data = Department::with('Curriculums.courses.clos.Topics')->get();
        $departments = Department::all();
        return view("user.course", compact("departments", "data"));
    }

    public function listGP()
    {
        $data = Department::with('Curriculums.graduateProfiles')->get();
        $departments = Department::all();
        return view("user.graduate_profiles", compact("departments", "data"));
    }
}
