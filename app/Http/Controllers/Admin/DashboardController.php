<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (Gate::denies('access-admin')) {
            abort(403, 'Accès refusé');
        }
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

    public function approved(Request $request , $id)
    {
        $user=User::find($id);
        $user->status='approved';
        $user->approved_at=now();
        $user->updated_at=now();
        $user->role='entrepreneur_approuve';
        $user->save();
    }

    public function unapproved(Request $request , $id)
    {
        $user=User::find($id);
        $user->status='unapproved';
        $user->updated_at=now();
        $user->save();
    }
}
