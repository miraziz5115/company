<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Person;
use App\Models\Address;
use App\Models\Company;
use Auth;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = Person::all();

        return view('person.index',[
            'persons' => $persons,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validate = Validator::make($input, [
            'fullname' => 'required|max:255',
            'birthdate' => 'required',
            'city' => 'required',
            'region' => 'required',
            'street' => 'required',
            'home' => 'required',
            'company_id' => 'required',
        ]);

        if ($validate->fails()){
            return back()->withErrors($validate)->withInput();
        }else{
            $person = Person::create([
                'fullname' => $input['fullname'],
                'birthdate' => $input['birthdate'],
                'email' => $input['email'],
                'company_id' => $input['company_id'],
            ]);
            
            $company = Company::where([ 'id'=> $input['company_id'], 'default_person' => null])->first();
            
            if( $company){
                $company->default_person = $person->id;
                $company->save();
            }

            $address = Address::create([
                'city' => $input['city'],
                'region' => $input['region'],
                'street' => $input['street'],
                'home' => $input['home'],
                'person_id' => $person->id
            ]);
            
            if( $address ){
                return redirect()->route('person.index');
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
        $person = Person::find($id);
        return view('person.edit',[
            'person' => $person,
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

        $input = $request->all();
        $validate = Validator::make($input, [
            'fullname' => 'required|max:255',
            'birthdate' => 'required',
            'city' => 'required',
            'region' => 'required',
            'street' => 'required',
            'home' => 'required',
            'company_id' => 'required',
        ]);
        
        if ($validate->fails()){
            return back()->withErrors($validate)->withInput();
        }else{
            $person = Person::find($id);
            $person->fullname = $input['fullname'];
            $person->birthdate = $input['birthdate'];
            $person->email = $input['email'];
            $person->company_id = $input['company_id'];
            
            $person->address['city']  = $input['city'];
            $person->address['region'] = $input['region'];
            $person->address['street'] = $input['street'];
            $person->address['home']  = $input['home'];
            
            if($person->save() && $person->address->save()){
                $company = Company::where('default_person', $id)->first();

                if( !empty($company) ){
                    $company->default_person = null;
                    $company->save();
                }else{
                    if( Company::where([ 'id' => $input['company_id'], 'default_person' => null ])->first()){
                        Company::find( $input['company_id'])->update(['default_person' => $id]);
                    }
                }
                return redirect()->route('person.index');
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
        $person = Person::find($id);
        if( $person->companyName['default_person'] == $id ){
            $person->companyName['default_person'] = null;
        }
        if( $person->address->delete() && $person->companyName->save() && $person->delete() ){
            return response()->json();
        }
    }
}
