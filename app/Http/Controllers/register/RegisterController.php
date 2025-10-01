<?php

namespace App\Http\Controllers\register;

use App\Http\Controllers\Controller;
use App\Models\students;
use App\Models\course;
use App\Models\department;
use App\Models\school_year_and_semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    public function index()
    {
        // Get active school year and semester
        $activeSchoolYear = school_year_and_semester::where('status', 'active')->first();
        
        // Get all courses and departments for dropdowns
        $courses = course::where('status', 'active')->orderBy('course_name')->get();
        $departments = department::where('status', 'active')->orderBy('department_name')->get();
        
        return view('register.register', compact('courses', 'departments', 'activeSchoolYear'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|string|max:255|unique:students,student_id',
            'course_id' => 'required|exists:course,id',
            'department_id' => 'required|exists:department,id',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:10',
            'gender' => 'required|in:Male,Female,Other',
            'date_of_birth' => 'required|date|before:today',
            'age' => 'required|integer|min:18|max:150',
            'address' => 'required|string|max:500',
            'email' => 'required|email|max:255|unique:students,email',
            'password' => 'required|string|min:8',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'student_id_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'age.min' => 'You must be at least 18 years old to register.',
            'age.max' => 'Age cannot exceed 150 years.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Get active school year and semester
            $activeSchoolYear = school_year_and_semester::where('status', 'active')->first();
            
            if (!$activeSchoolYear) {
                return redirect()->back()
                    ->withErrors(['error' => 'No active school year found. Please contact administrator.'])
                    ->withInput();
            }

            $data = $request->all();
            $data['password'] = Hash::make($request->password);
            $data['school_year_and_semester_id'] = $activeSchoolYear->id;
            $data['status'] = 'pending';

            // Handle profile image upload
            if ($request->hasFile('profile_image')) {
                $profileImage = $request->file('profile_image');
                $profileImageName = time() . '_profile_' . $profileImage->getClientOriginalName();
                $profileImage->storeAs('public/student_images', $profileImageName);
                $data['profile_image'] = 'student_images/' . $profileImageName;
            }

            // Handle student ID image upload
            if ($request->hasFile('student_id_image')) {
                $studentIdImage = $request->file('student_id_image');
                $studentIdImageName = time() . '_id_' . $studentIdImage->getClientOriginalName();
                $studentIdImage->storeAs('public/student_images', $studentIdImageName);
                $data['student_id_image'] = 'student_images/' . $studentIdImageName;
            }

            students::create($data);

            return redirect()->route('register')
                ->with('success', 'Registration successful! Your account is now pending approval. You will be notified once approved.');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors(['error' => 'Registration failed. Please try again.'])
                ->withInput();
        }
    }
}
