<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;

class LoginController extends Controller
{
    // Constants for roles and messages
    private const ADMIN_ROLE = 'admin';
    private const STAFF_ROLE = 'staff';
    private const ERROR_INVALID_CREDENTIALS = 'The username or password is incorrect.';
    private const ERROR_NO_ACCOUNT = 'Sorry, no account found for these credentials.';

    public function handleLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        $user = $this->getUserByUsername($credentials['username']);

        if ($user && $this->validatePassword($credentials['password'], $user->password)) {
            return $this->redirectToDashboard($user);
        }

        return Redirect::to("/")->withErrors($user ? self::ERROR_INVALID_CREDENTIALS : self::ERROR_NO_ACCOUNT);
    }

    public function handleLogout()
    {
        Session::forget(['Session_Type', 'Session_Value']);
        return Redirect::to('/');
    }

    private function getUserByUsername(string $username)
    {
        return DB::table('user_account')
            ->select('staff_id', 'username', 'password', 'account_type')
            ->where('username', $username)
            ->first();
    }

    private function validatePassword(string $enteredPassword, string $storedPassword): bool
    {
        // Assuming password is stored as plain text (replace with proper hash comparison if using hashed passwords)
        return $enteredPassword === $storedPassword;
    }

    private function redirectToDashboard($user)
    {
        if ($user->account_type === self::ADMIN_ROLE) {
            Session::put('Session_Type', 'Admin');
            Session::put('Session_Value', $user->username);
            return Redirect::to('/view-home-page');
        }

        if ($user->account_type === self::STAFF_ROLE) {
            Session::put('Session_Type', 'Staff');
            Session::put('Session_Value', $user->staff_id);
            return Redirect::to('/view-home-page-of-staff-account');
        }

        return Redirect::to("/")->withErrors(self::ERROR_INVALID_CREDENTIALS);
    }
}