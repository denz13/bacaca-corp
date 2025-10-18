<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\RouteController;
use App\Livewire\Dashboard\Dashboard as DashboardComponent;
use App\Http\Controllers\forgotpassword\ForgotPasswordController;
use App\Http\Controllers\otp\OtpController;
use App\Http\Controllers\appointment\AppointmentController;
use App\Http\Controllers\register\RegisterController;
use App\Http\Controllers\pdf\PdfController;
use App\Livewire\Earnings\EarningsManager;
use App\Livewire\Deduction\DeductionManager;

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Register Routes
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Forgot Password Routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgot-password');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendOtp'])->name('forgot-password.send');


// OTP Routes
Route::get('/otp', [OtpController::class, 'index'])->name('otp');
Route::post('/otp', [OtpController::class, 'verifyOtp'])->name('otp.verify');
Route::post('/otp/resend', [OtpController::class, 'resendOtp'])->name('otp.resend');

// Appointment Routes
Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment');
Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');

// PDF Routes
Route::get('/pdf/candidates-list', [PdfController::class, 'candidatesList'])->name('pdf.candidates-list');
Route::get('/pdf/candidates-election', [PdfController::class, 'candidatesElection'])->name('pdf.candidates-election');
Route::get('/pdf/students-account', [PdfController::class, 'studentsAccount'])->name('pdf.students-account');
Route::get('/pdf/admin-account', [PdfController::class, 'adminAccount'])->name('pdf.admin-account');

Route::get('/dashboard', function() {
    return view('dashboard.index-dashboard');
})->name('dashboard');

// Earnings Management
Route::get('/earnings-management', function() {
    return view('earnings.earnings-manager-page');
})->name('earnings.management');

// Deduction Management
Route::get('/deduction-management', function() {
    return view('deduction.deduction-manager-page');
})->name('deduction.management');

// Notification Routes
Route::post('/notifications/{notification}/mark-read', function($notificationId) {
    $notification = \App\Models\Notification::findOrFail($notificationId);
    $notification->markAsRead();
    
    return response()->json(['success' => true]);
})->name('notifications.mark-read');

// API route to fetch unread notifications for login toasts
Route::get('/api/notifications/unread', function() {
    // Get current user ID and type from either guard
    $userId = null;
    $userType = null;
    
    if (auth()->check()) {
        $userId = auth()->id();
        $userType = 'App\\Models\\User';
    } elseif (auth()->guard('students')->check()) {
        $userId = auth()->guard('students')->id();
        $userType = 'App\\Models\\students';
    }
    
    // Debug logging
    \Log::info('API Notifications Debug', [
        'user_id' => $userId,
        'user_type' => $userType,
        'auth_check' => auth()->check(),
        'students_auth_check' => auth()->guard('students')->check(),
        'auth_id' => auth()->id(),
        'students_auth_id' => auth()->guard('students')->id(),
    ]);
    
    if (!$userId) {
        return response()->json(['success' => false, 'message' => 'Not authenticated']);
    }
    
    // Get unread notifications for the current user where they are the notifiable_id (the one who was notified)
    $notifications = \App\Models\Notification::where('user_id', $userId)
        ->where('notifiable_id', (string) $userId) // Only show if current user is the notifiable_id
        ->where('notifiable_type', $userType) // Match the user type
        ->whereNull('read_at')
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();
    
    // Additional debug: Check if any notifications exist for this user
    \Log::info('User notification check', [
        'current_user_id' => $userId,
        'current_user_type' => auth()->check() ? 'User' : 'Student',
        'notifications_for_user' => $notifications->count(),
        'all_notifications_in_db' => \App\Models\Notification::count(),
        'sample_notification' => \App\Models\Notification::first() ? \App\Models\Notification::first()->toArray() : null
    ]);
    
    // Debug logging
    \Log::info('Notifications found', [
        'count' => $notifications->count(),
        'notifications' => $notifications->toArray()
    ]);
    
    $formattedNotifications = $notifications->map(function($notification) {
        return [
            'id' => $notification->id,
            'title' => $notification->title,
            'message' => $notification->message,
            'status' => $notification->status,
            'type' => $notification->type,
            'icon' => $notification->icon,
            'icon_color' => $notification->icon_color,
            'url' => $notification->url,
            'created_at' => $notification->created_at->format('M d, Y h:i A'),
        ];
    });
    
    return response()->json([
        'success' => true,
        'notifications' => $formattedNotifications,
        'count' => $formattedNotifications->count(),
        'debug' => [
            'user_id' => $userId,
            'total_notifications' => \App\Models\Notification::where('user_id', $userId)->count(),
            'unread_notifications' => \App\Models\Notification::where('user_id', $userId)->whereNull('read_at')->count()
        ]
    ]);
})->name('api.notifications.unread');

// API route to process expired voting status updates
Route::post('/api/voting/process-expired', function() {
    try {
        $processedCount = \App\Services\VotingStatusService::processExpiredVotings();
        
        return response()->json([
            'success' => true,
            'processed_count' => $processedCount,
            'message' => $processedCount > 0 ? "Processed {$processedCount} expired voting(s)" : 'No expired votings to process'
        ]);
    } catch (\Exception $e) {
        \Log::error('Error processing expired votings: ' . $e->getMessage());
        
        return response()->json([
            'success' => false,
            'message' => 'Error processing expired votings',
            'error' => $e->getMessage()
        ], 500);
    }
})->name('api.voting.process-expired');

// Profile Management Route
Route::get('/profile-management', function() {
    return view('profile-management.index-profile-management');
})->name('profile-management');

// Employee Routes
Route::middleware(['auth'])->prefix('employee')->name('employee.')->group(function () {
    Route::get('/dashboard', App\Livewire\Employee\Dashboard::class)->name('dashboard');
    Route::get('/my-attendance', App\Livewire\Employee\MyAttendance::class)->name('my-attendance');
    Route::get('/my-payroll', App\Livewire\Employee\MyPayroll::class)->name('my-payroll');
    Route::get('/view-payslip/{payrollId}', App\Livewire\Employee\ViewPayslip::class)->name('view-payslip');
});

Route::get("{any}", [RouteController::class, 'routes']);