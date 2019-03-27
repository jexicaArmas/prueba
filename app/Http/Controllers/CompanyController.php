<?php

namespace App\Http\Controllers;

use Auth; 
use App\Models\Company; 
use Illuminate\Http\Request;
use Validator; 
use Datatables;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $companies = Company::all();
        return view('companies.index', compact('user', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $user = Auth::user(); 
        return view('companies.create', compact('user'));
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
            'name'     => 'required|string', 
            'email'    => 'unique:companies',
            'logo'     => 'string', 
            'website'  => 'url'
        ]);

        $company = new Company; 
        $company->name      = $request->name; 
        $company->email     = $request->email; 
        $company->logo      = $request->logo; 
        $company->website   = $request->website;
        $company->save(); 

        return redirect()->route('companies.index')->with('success', 'Se ha creado el registro');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function listCompanies(){
        $companies = Company::all();
        return datatables($companies)
            ->addColumn('actions',function($company) {
                $html = "<a method='post' href='".route('companies.edit',[$company->id])."'><i class='fa fa-edit'> Edit </i></a>";
                return $html;
            })
            ->toJson();
    }
}
