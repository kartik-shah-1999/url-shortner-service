<?php

namespace App\Http\Controllers;

use App\Jobs\SendUserInviteJob;
use App\Mail\SendUserInvite;
use App\Models\CompanyUser;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    public function inviteUsersForm($id){
        $users = User::where('role','!=',1)->orderBy('name','asc')->get();
        return view('company.inviteusers')->with(['users'=>$users,'id' => $id]);
    }

    public function inviteUsers(Request $request, Company $id){
        if(!$request->_token){
            abort(401,'Unauthorized Access');
        }
        $company = $id->toArray();
        $user = User::findOrFail((int)$request->input('users'));
        $invitation = CompanyUser::where('company_id',$company['id'])
                    ->where('reciever_id',$user->id)
                    ->exists();
        if($invitation){
            return back()->with('success','Invitation already sent to the user. Kindly check your inbox.');   
        }
        if($user && !$invitation){
            CompanyUser::create([
                'company_id' => $company['id'],
                'reciever_id' => $request->input('users'),
                'sender_id' => Auth::id(),
                'invitation_status' => 0
            ]);
            dispatch(new SendUserInviteJob($id->toArray(),$user->toArray()));
            return back()->with('success','Invite sent successfully');
        }
    }
}
