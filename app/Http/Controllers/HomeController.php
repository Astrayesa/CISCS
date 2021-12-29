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
        $department = Department::with('Curriculums.courses')->first();
        return $department;
        $departments = Department::all();
        return view("user.curriculum", compact("departments"));
    }
}
