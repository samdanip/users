<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response(view('employee.add'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        dd($request);
        $validated = $request->validate([
            'fullname' => ['required', 'min:3'],
            'age' => ['required'],
        ]);
        $employee = new Employee();
        $employee->title = $request->title;
        $employee->fullname = $request->fullname;
        $employee->gender = $request->gender;
        $employee->age = $request->age;
        $employee->email = $request->email;
        $employee->save();

        return redirect('dashboard')->with('status', 'Saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee): RedirectResponse
    {
        //
    }
}
