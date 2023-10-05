<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Company;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;


class CompanyController extends Controller
{
	
	public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       if (is_null($this->user) || !$this->user->can('company.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any company !');
        }

        $company = Company::getCompanyAll();
        return view('backend.pages.company.index', compact('company'));

    }
	
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('company.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any company !');
        }

	     $roles  = Role::all();

        return view('backend.pages.company.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
	     // Validation Data
        $request->validate([
            'company_name' => 'required|max:50',
		    'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);
		

            // Create New company
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->username = $request->email;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        if ($request->roles) {
            $admin->assignRole($request->roles);
        }
	     $Company = new Company();  
         $Company->company_name = $request->company_name;
		 $Company->user_id = $admin->id;
		 $Company->business = $request->business;
         $Company->save();


		 
		 
        session()->flash('success', 'Company account has been created !!');
        return redirect()->route('admin.admins.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
