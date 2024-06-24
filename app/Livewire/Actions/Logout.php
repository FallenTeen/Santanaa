<?php

namespace App\Http\Livewire\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Illuminate\Support\Facades\Redirect;

class UserLogout extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function destroy()
    {
        Auth::guard('web')->logout();
        Session::invalidate();
        Session::regenerateToken();

        // Redirect to home page after logout
        return Redirect::to('/');
    }

    public function render()
    {
        return view('livewire.user-logout');
    }
}