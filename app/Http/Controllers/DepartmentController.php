<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia; 

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::paginate(10);

        $department = Department::all();
        return Inertia::render('Departments/Index',['departments' => $departments,
         'departments' => $departments]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Departments/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 'name' => 'required|max:100','tarea' => 'required|max:300', 'asignacion' => 'required|max:12', 'entrega' => 'required|max:12']);
        $department = new Department($request->input());
        $department->save();
        return redirect('departments');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return Inertia::render('Departments/Edit', [
            'department' => $department 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $request->validate(['name' => 'required|max:100','tarea' => 'required|max:300', 'asignacion' => 'required|max:12', 'entrega' => 'required|max:12']);
        $department->update($request->all());
        return redirect('departments');
     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect('departments');
    }
}
