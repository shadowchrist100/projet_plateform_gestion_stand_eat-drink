<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $unapproved=$this->get_unapproved_users();
        $approved=$this->get_approved_users();
        return view('admin.dashboard',[
            'approved'=>$approved,
            'unapproved'=>$unapproved
        ]);
    }

    private function get_approved_users()
    {
        $users=User::approvedEntrepreneurs()->get();
        return $users;
    }

    protected function get_unapproved_users()
    {
        $users=User::pendingEntrepreneurs()->get();
        return $users;
    }
}
