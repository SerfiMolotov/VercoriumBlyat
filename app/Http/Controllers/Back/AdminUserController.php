<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('name')->get();

        return view('admin.users.index', compact('users'));
    }

    public function updateRole(Request $request, User $user)
    {
        if (Auth::id() === $user->id) {
            return back()->with('error', 'Vous ne pouvez pas modifier votre propre rôle administrateur.');
        }
        $request->validate([
            'role' => 'required|string'
        ]);

        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'Le rôle de l’utilisateur a été mis à jour.');
    }

    public function destroy(User $user)
    {
        if (Auth::id() === $user->id) {
            return back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte administrateur.');
        }

        $user->delete();

        return back()->with('success', 'L\'utilisateur a été supprimé avec succès.');
    }

}
