<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use HasFactory;
	
	public static function getCompanyAll()
    {
        $companies = DB::table('companies')
            ->join('admins', 'admins.id', '=', 'companies.user_id')
            ->get();
        return $companies;
    }
}


/*

$users = User::join('posts', 'posts.user_id', '=', 'users.id')
              ->join('comments', 'comments.post_id', '=', 'posts.id')
              ->get(['users.*', 'posts.descrption']);*/
