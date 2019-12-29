<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Company;
use App\Models\Person;
use Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('company.index',[
            'companies' => $companies,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:255',
           // 'person_id' => 'required',
        ]);

        if ($validate->fails()){
            return back()->withErrors($validate)->withInput();
        }else{
            $model = new Company;
            $model->name = $request->all()['name'];
        //  $model->default_person = $request->all()['person_id'];
            if( $model->save()){
                return redirect()->route('company.index');
            }
        }
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
        $company = Company::find($id);
        return view('company.edit',[
            'company' => $company,
        ]);
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
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:255',
           // 'person_id' => 'required',
        ]);

        if ($validate->fails()){
            return back()->withErrors($validate)->withInput();
        }else{
            $company = Company::find($id);
            $company->name = $request->all()['name'];
            // $company->default_person = $request->all()['default_person_id'];
            if( $company->save()){
                return redirect()->back();
            }
        }
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
        $personsOfCompany = Person::where('company_id', $id)->get();
        if( $personsOfCompany->count() > 0){
            foreach ($personsOfCompany as $value) {
                $value->company_id = null;
                $value->save();
            }

        }
        if( $company->delete()){
            return response()->json();
        }
    }

    public function default_person(Request $request )
    {
        if($request->ajax()){
            $company = Company::find( $request->all()['company_id']);
            $company->default_person = $request->all()['person_id'];
            if($company->save()){
                return response()->json();
            }
        }
    }
}
