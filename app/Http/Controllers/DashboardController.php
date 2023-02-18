<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): View
    {
        $employees = Visitor::with('locations')->paginate(5);
        return view('dashboard')->with('employees', $employees);
    }

    public function search(Request $request)
    {
        $searchterm = $request->searchterm;
        $employees = Visitor::with('locations')->where('fullname', 'like', "%{$searchterm}%")->paginate(5);
        return view('dashboard')->with('employees', $employees);
    }
}
