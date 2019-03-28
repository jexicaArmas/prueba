<?php

namespace App\Http\Controllers;

use Auth;
use Storage; 
use App\Models\Company; 
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CompanyController extends Controller
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
            'email'    => 'email|unique:companies',
            'website'  => 'url'
        ]);
      
        $company = new Company; 
        $company->name      = $request->name; 
        $company->email     = $request->email; 
        $company->website   = $request->website;
        if ($request->hasFile('logo')){
            $logo     = $request->file('logo');
            $fileName = $logo->getClientOriginalName();
            $filename = $logo->store('public');
            if(Storage::exists('public/'.$fileName)){
                Storage::delete('public/'.$fileName);
            }
            Storage::disk('local')->move($filename,'logo/'.$fileName);
            $company->logo = $fileName; 
        }
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
        $company = Company::find($id); 
        return view('companies.edit', compact('user', 'company'));
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
            'name'     => 'string', 
            'email'    => 'email', 
            'website'  => 'url'
        ]);

        $company = Company::find($id); 
        $company->name      = $request->name; 
        $company->email     = $request->email; 
        if ($request->hasFile('logo')){
            $logo     = $request->file('logo');
            $fileName = $logo->getClientOriginalName();
            $filename = $logo->store('public');
            if(Storage::exists('public/'.$fileName)){
                Storage::delete('public/'.$fileName);
            }
            Storage::disk('local')->move($filename,'logo/'.$fileName);
            $company->logo = $fileName; 
        }
        $company->website   = $request->website;
        $company->update(); 

        return redirect()->route('companies.index')->with('success', 'Se ha actualizado el registro');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id); 
        $company->delete(); 
        return redirect()->route('companies.index')->with('success', 'Se ha eliminado el registro');
    }

    public function list(){
        $companies = Company::all(); 
        return datatables($companies)
            ->addColumn('actions', function($company){
                $html = "<a href='".route('companies.edit',[$company->id])."'><i class='fa fa-edit'>Edit</i></a>";
                $html.= "<a href='".route('companies.delete',[$company->id])."'><i class='fa fa-trash'>Delete</i></a>";
                return $html;
            })
            ->rawColumns(['actions'])
            ->toJson();
    }
}
