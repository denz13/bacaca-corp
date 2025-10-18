<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ActionLog;
use App\Models\attendance;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->email;
        $password = $request->password;

        // Check if email exists in User model
        $user = User::where('email', $email)->first();
        if ($user && Hash::check($password, $user->password)) {
            // Login as User using web guard
            Auth::guard('web')->login($user);
            $request->session()->regenerate();
            
            // Log the login activity
            ActionLog::create([
                'document_type' => get_class($user),
                'document_id' => $user->id,
                'user_id' => $user->id,
                'created_by' => $user->id,
                'action' => 'login',
                'details' => 'User logged in successfully',
                'remarks' => json_encode([
                    'login_type' => 'web',
                    'user_role' => $user->role == 1 ? 'employee' : 'admin',
                    'login_time' => now()->toISOString()
                ]),
                'trackable_type' => get_class($user),
                'trackable_id' => $user->id,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'location' => 'Login System',
            ]);

            // Record attendance for employees (role = 1)
            if ($user->role == 1) {
                $this->recordAttendance($user->id, 'time_in');
            }
            
            // Redirect based on role
            if ($user->role == 1) {
                // Employee - redirect to employee dashboard
                return redirect()->intended('/employee/dashboard?login=success');
            } else {
                // Admin - redirect to admin dashboard
                return redirect()->intended('/dashboard?login=success');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        
        // Log the logout activity before logging out
        if ($user) {
            ActionLog::create([
                'document_type' => get_class($user),
                'document_id' => $user->id,
                'user_id' => $user->id,
                'created_by' => $user->id,
                'action' => 'logout',
                'details' => 'User logged out successfully',
                'remarks' => json_encode([
                    'logout_type' => 'web',
                    'user_role' => $user->role == 1 ? 'employee' : 'admin',
                    'logout_time' => now()->toISOString()
                ]),
                'trackable_type' => get_class($user),
                'trackable_id' => $user->id,
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'location' => 'Login System',
            ]);

            // Record attendance for employees (role = 1)
            if ($user->role == 1) {
                $this->recordAttendance($user->id, 'time_out');
            }
        }
        
        // Logout from web guard
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    /**
     * Record attendance for employees
     */
    private function recordAttendance($userId, $action)
    {
        // Check if there's already an attendance record for this action today
        $today = now()->startOfDay();
        $existingRecord = attendance::where('users_id', $userId)
            ->where('action', $action)
            ->whereDate('timestamp', $today)
            ->first();

        // Only create a new record if one doesn't exist for this action today
        if (!$existingRecord) {
            attendance::create([
                'users_id' => $userId,
                'action' => $action,
                'timestamp' => now(),
                'time' => now()->format('H:i:s'),
                'is_late' => $this->checkIfLate($action),
                'late_minutes' => $this->calculateLateMinutes($action),
                'overtime_minutes' => 0, // Will be calculated later
            ]);
        }
    }

    /**
     * Check if the employee is late (for 'time_in' action)
     */
    private function checkIfLate($action)
    {
        if ($action !== 'time_in') {
            return false;
        }

        // Assuming work starts at 8:00 AM
        $workStartTime = now()->setTime(8, 0, 0);
        return now()->gt($workStartTime);
    }

    /**
     * Calculate late minutes (for 'time_in' action)
     */
    private function calculateLateMinutes($action)
    {
        if ($action !== 'time_in') {
            return 0;
        }

        // Assuming work starts at 8:00 AM
        $workStartTime = now()->setTime(8, 0, 0);
        if (now()->gt($workStartTime)) {
            return now()->diffInMinutes($workStartTime);
        }

        return 0;
    }
}
