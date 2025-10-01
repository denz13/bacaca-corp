<?php

namespace App\Http\Controllers\pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\applied_candidacy;
use App\Models\school_year_and_semester;
use App\Models\voting_vote_count;
use App\Models\voting_exclusive;
use App\Models\students;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function candidatesList()
    {
        // Get the active school year
        $activeSchoolYear = school_year_and_semester::active()->first();
        
        if (!$activeSchoolYear) {
            abort(404, 'No active school year found');
        }

        // Get approved candidacies for the current school year
        $approvedCandidacies = applied_candidacy::where('status', 'approved')
            ->where('school_year_and_semester_id', $activeSchoolYear->id)
            ->with(['students', 'position', 'school_year_and_semester'])
            ->get();

        // Group candidates by position
        $candidatesByPosition = [];
        foreach ($approvedCandidacies as $candidacy) {
            $positionName = $candidacy->position ? $candidacy->position->position_name : 'Unknown Position';
            if (!isset($candidatesByPosition[$positionName])) {
                $candidatesByPosition[$positionName] = collect();
            }
            $candidatesByPosition[$positionName]->push($candidacy);
        }

        // Generate PDF
        $pdf = Pdf::loadView('pdf.print-candidates-position', [
            'candidatesByPosition' => $candidatesByPosition,
            'activeSchoolYear' => $activeSchoolYear,
            'totalCandidates' => $approvedCandidacies->count()
        ]);

        return $pdf->stream('candidates-list-' . date('Y-m-d') . '.pdf');
    }

    public function candidatesElection()
    {
        // Get ALL vote counts from voting_vote_count table (no restrictions)
        $voteCounts = voting_vote_count::with(['student', 'appliedCandidacy.position', 'voting_exclusive'])->get();

        // Get all voting exclusives for display
        $activeVotings = voting_exclusive::all();

        // Get any school year for display (or create a default one)
        $activeSchoolYear = school_year_and_semester::active()->first();
        if (!$activeSchoolYear) {
            // Create a default school year object if none exists
            $activeSchoolYear = (object) [
                'school_year' => 'Current',
                'semester' => 'Semester'
            ];
        }

        // Group candidates by position
        $candidatesByPosition = [];
        foreach ($voteCounts as $voteCount) {
            $position = $voteCount->appliedCandidacy?->position;
            if ($position) {
                $positionName = $position->position_name;
                if (!isset($candidatesByPosition[$positionName])) {
                    $candidatesByPosition[$positionName] = collect();
                }
                $candidatesByPosition[$positionName]->push($voteCount);
            }
        }

        // Sort candidates within each position by vote count (descending)
        foreach ($candidatesByPosition as $positionName => $candidates) {
            $candidatesByPosition[$positionName] = $candidates->sortByDesc('number_of_vote');
        }

        // Ensure candidatesByPosition is not null
        if (empty($candidatesByPosition)) {
            $candidatesByPosition = [];
        }

        // Generate PDF and stream it (preview in browser)
        $pdf = Pdf::loadView('pdf.print-candidates-election', [
            'candidatesByPosition' => $candidatesByPosition,
            'activeSchoolYear' => $activeSchoolYear,
            'activeVotings' => $activeVotings,
            'totalCandidates' => $voteCounts->count()
        ]);

        return $pdf->stream('election-results-' . date('Y-m-d') . '.pdf');
    }

    public function studentsAccount()
    {
        // Get the active school year
        $activeSchoolYear = school_year_and_semester::active()->first();
        
        if (!$activeSchoolYear) {
            // Create a default school year object if none exists
            $activeSchoolYear = (object) [
                'school_year' => 'Current',
                'semester' => 'Semester'
            ];
        }

        // Get all students with their relationships
        $students = students::with(['course', 'department', 'school_year_and_semester'])
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->get();

        // Group students by course for better organization
        $studentsByCourse = [];
        foreach ($students as $student) {
            $courseName = $student->course ? $student->course->course_name : 'No Course';
            if (!isset($studentsByCourse[$courseName])) {
                $studentsByCourse[$courseName] = collect();
            }
            $studentsByCourse[$courseName]->push($student);
        }

        // Generate PDF
        $pdf = Pdf::loadView('pdf.print-students-account', [
            'studentsByCourse' => $studentsByCourse,
            'activeSchoolYear' => $activeSchoolYear,
            'totalStudents' => $students->count()
        ]);

        return $pdf->stream('students-account-' . date('Y-m-d') . '.pdf');
    }

    public function adminAccount()
    {
        // Get all admins
        $admins = User::orderBy('name')->get();

        // Group admins by role for better organization
        $adminsByRole = [];
        foreach ($admins as $admin) {
            $roleName = $admin->role ? ucfirst($admin->role) : 'No Role';
            if (!isset($adminsByRole[$roleName])) {
                $adminsByRole[$roleName] = collect();
            }
            $adminsByRole[$roleName]->push($admin);
        }

        // Generate PDF
        $pdf = Pdf::loadView('pdf.print-admin-account', [
            'adminsByRole' => $adminsByRole,
            'totalAdmins' => $admins->count()
        ]);

        return $pdf->stream('admin-account-' . date('Y-m-d') . '.pdf');
    }
}
