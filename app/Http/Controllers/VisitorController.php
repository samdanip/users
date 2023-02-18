<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\Builder;

class VisitorController extends Controller
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
        $validated = $request->validate([
            'fullname' => ['required', 'min:3'],
            'age' => ['required'],
        ]);
        $employee = new Visitor();
        $employee->title = $request->title;
        $employee->fullname = $request->fullname;
        $employee->gender = $request->gender;
        $employee->age = $request->age;
        $employee->email = $request->email;
        $employee->save();
        // Address
        if (isset($request->address1)) {
            for ($i = 0; $i < sizeof($request->address1); $i++) {
                $address = new Location();
                $address->visitor_id = $employee->id;
                $address->address1 = $request->address1[$i];
                $address->address2 = $request->address2[$i];
                $address->district = $request->district[$i];
                $address->state = $request->state[$i];
                $address->save();
            }
        }
        return redirect('dashboard')->with('status', 'Saved Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Visitor $visitor): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visitor $visitor): Response
    {
        $visitors = Visitor::with('locations')->where('id', $visitor->id)->get();
        return response(view('employee.edit')->with('visitor', $visitor));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visitor $visitor): RedirectResponse
    {
        $employee = Visitor::with('locations')->find($visitor->id);
        dd($employee);
        $employee->title = $request->title;
        $employee->fullname = $request->fullname;
        $employee->gender = $request->gender;
        $employee->age = $request->age;
        $employee->email = $request->email;
        // $employee->save();
        return redirect('dashboard')->with('status', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visitor $visitor): RedirectResponse
    {
        //
    }
}
