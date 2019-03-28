<?php

namespace App\Http\Controllers;

use Auth; 
use App\Models\Employee; 
use App\Models\Company; 
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class EmployeeController extends Controller
{
    use ValidatesRequests;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $employees = Employee::all(); 
        return view('employees.index', compact('user', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user(); 
        $companies = Company::all();
        return view('employees.create', compact('user', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 
            'name'      => 'required|string', 
            'lastname'  => 'required|string',
            'email'     => 'email',
            'phone'     => 'string', 
            'company'   => 'required|integer|exists:companies,id'
        ]);

        $employee = new Employee;
        $employee->name        = $request->name; 
        $employee->lastname    = $request->lastname; 
        $employee->email       = $request->email; 
        $employee->phone       = $request->phone; 
        $employee->company_id  = $request->company; 
        $employee->save(); 

        return redirect()->route('employees.index')->with('success', 'Se ha creado el registro');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $employee = Employee::find($id); 
        $companies = Company::all();
        return view('employees.edit', compact('user', 'employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[ 
            'name'      => 'string', 
            'lastname'  => 'string',
            'email'     => 'email',
            'phone'     => 'string', 
            'company'   => 'integer|exists:companies,id'
        ]);

        $employee = Employee::find($id);
        $employee->name        = $request->name; 
        $employee->lastname    = $request->lastname; 
        $employee->email       = $request->email; 
        $employee->phone       = $request->phone; 
        $employee->company_id  = $request->company; 
        $employee->update(); 

        return redirect()->route('employees.index')->with('success', 'Se ha creado el registro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id); 
        $employee->delete(); 
        return redirect()->route('employees.index')->with('success', 'Se ha eliminado el registro');
    }

    public function listEmployees(){
        $employees = Employee::all();
        return Datatables($employees)
            ->addColumn('actions',function($employee) {
                $html = "<a href='".route('employees.edit',[$employee->id])."'><i class='fa fa-edit'>Edit</i></a>";
                $html.= "<a href='".route('employees.delete',[$employee->id])."'><i class='fa fa-trash'>Delete</i></a>";
                return $html;
            })
            ->rawColumns(['actions'])
            ->toJson();
    }
}
