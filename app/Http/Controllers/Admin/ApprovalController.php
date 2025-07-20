<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{
        public function pendingList(){
        $users = User::where('role', 'entrepreneur_en_attente')
                    ->where('status', 'pending')
                    ->get();
        
        return view('admin.approvals', compact('users'));
    }

    public function approve(User $user, Request $request){
        $user->approve($request->notes);
        
        // Envoyer notification
        $user->notify(new AccountApproved());
        
        return back()->with('success', "Le compte de {$user->nom_entreprise} a été approuvé");
    }

    public function reject(User $user, Request $request){
        $request->validate(['rejection_reason' => 'required|string']);
        
        $user->reject($request->rejection_reason);
        
        // Envoyer notification
        $user->notify(new AccountRejected($request->rejection_reason));
        
        return back()->with('success', "Le compte a été rejeté");
    }
}
