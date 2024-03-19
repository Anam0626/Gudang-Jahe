<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function get_admin(){
        $data["admin"] = Admin::paginate(4);
        return $data["admin"];
    }
}
