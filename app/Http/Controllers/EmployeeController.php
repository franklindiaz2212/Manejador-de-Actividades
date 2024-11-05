<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees =Employee::select('employees.id','employees.name','email','phone','department_id','departments.name as department')
        ->join('departments','departments_id', '=', 'employees.department.id')
        ->paginate(10);

        $departments = Department::all();
        return Inertia::render('Employees/Index',['employees' => $employees, 'departments' => $departments]); 

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $request->validate([
        'name' => 'required|max:150',
        'email' => 'required|max:80',
        'phone' => 'required|max:15',
        'department_id' => 'required|numeric'

        ]);
        $employee = new Employee($request->input());
        $employee->save();
        return redirect('employees');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        
        $request->validate([
            'name' => 'required|max:150',
            'email' => 'required|max:80',
            'phone' => 'required|max:15',
            'department_id' => 'required|numeric'
    
            ]);
            $employee->update($request->input());
            return redirect('employees');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect('employees');
    }

    // public function EmployeeByDeparment(){
    //   $employees = Employee::select(DB::raw('count(employees.id) as count, departments.name'))
    //   ->join('departments','departments_id', '=', 'employees.department_id')
    //   ->groupBy('departments.neme')->get();
    //   return Inertia::render('Employees/Graphic',['data' => $data]);
    
    // }
}
