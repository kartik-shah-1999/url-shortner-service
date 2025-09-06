<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function addCompanyForm(){
        return view('company.addcompany');
    }

    public function addCompany(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:30']
        ]);
        if($request->_token){
            Company::create([
                'name' => $request->name,
                'owner_id' => Auth::id()
            ]);
            return back()->with('success','Company added successfully');
        }
    }
}
