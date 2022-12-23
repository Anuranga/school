<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function UserView(){
        #alldata = User::all();
        $data['alldata'] = User::all();
        return view('backend.user.view_user', $data);
    }
}
