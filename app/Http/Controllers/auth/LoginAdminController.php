<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\admin;
use Illuminate\Http\Request;

class LoginAdminController extends Controller
{
    // public function __construct()
    public function __construct(private admin $admin){}
    public function admin_login(Request $request){
        // https://bcknd.food2go.online/api/admin/auth/login
        // Keys
        // email, password
        $user = $this->admin
        ->where('email', $request->email)
        ->orWhere('phone', $request->email)
        ->first();
        if (empty($user)) {
            return response()->json([
                'faield' => 'This user does not have the ability to login'
            ], 405);
        }
        return $user; 
        if ($user->status == 0) {
            return response()->json([
                'falid' => 'admin is banned'
            ], 400);
        }
        if (password_verify($request->input('password'), $user->password)) {
            $user->role = 'admin';
            $user->token = $user->createToken('admin')->plainTextToken;
            return response()->json([
                'admin' => $user,
                'token' => $user->token,
            ], 200);
        }
        else { 
            return response()->json(['faield'=>'creational not Valid'],403);
        }
    }

}
