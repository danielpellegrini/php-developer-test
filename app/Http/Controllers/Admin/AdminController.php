<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select('SELECT * FROM users');
        $companies = DB::select('SELECT * FROM companies');

        $usersOfCompany = DB::select(
            'SELECT users.id, users.name, users.lastname, companies.company_name
                                 FROM users
                                 INNER JOIN companies, company_user
                                 WHERE company_user.company_id = companies.id
                                 AND users.id = company_user.user_id
                                 ORDER BY companies.company_name');
        
        return view('admin.query', compact('users', 'companies', 'usersOfCompany'));

    }

}
