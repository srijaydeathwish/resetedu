<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Registration;
use App\Models\CourseSession;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class RegistrationController extends Controller
{
    public $candidateEmail;
    public $university;
    public $mode;

    public function __construct(Request $request)
    {
        $this->university     = $request->university;
        $this->mode           = $request->mode;
    }

    public function showForm(Request $request)
    {
        $courses = Course::all()->makeHidden(['created_at', 'updated_at']);
        $sessions = CourseSession::all()->makeHidden(['created_at', 'updated_at']);
        return Inertia::render('Student/Modes/Registration/Form', [
            'courses' => $courses,
            'sessions' => $sessions,
            'mode'              => $this->mode,
            'university'        => $this->university,
            'formPart'  => $request->query('formPart') ?? 'part1',
        ]);
    }

    public function submitPart1(Request $request)
    {

        // Validate the request data
        $validatedData = $request->validate([
            'contactNumber' => 'required',
            'country' => 'required',
            'nationality' => 'required',
            'state' => 'required',
            'district' => 'required',
            'address' => 'required',
            'pinCode' => 'required|numeric',
            'candidateName' => 'required|string',
            'fatherName' => 'required|string',
            'motherName' => 'required|string',
            'universityName' => 'required|string',
            'dateOfBirth' => 'required|date',
            'gender' => 'required|in:male,female,others',
            'category' => 'required|string',
            'aadhaarNumber' => 'required|string',
            'passportNumber' => 'nullable|string',
            'employed' => 'required|boolean',
            'employerName' => 'nullable|required_if:employed,1|string',
            'designation' => 'nullable|required_if:employed,1|string',
        ]);

        // Create a new candidate using the create method
        $candidate = Registration::updateOrCreate([
            'email_address' => auth()->user()->email
        ], [
            'email_address' => auth()->user()->email,
            'contact_number' => $validatedData['contactNumber'],
            'country' => $validatedData['country'],
            'nationality' => $validatedData['nationality'],
            'state' => $validatedData['state'],
            'district' => $validatedData['district'],
            'address' => $validatedData['address'],
            'pin_code' => $validatedData['pinCode'],
            'name_of_candidate' => $validatedData['candidateName'],
            'father_name' => $validatedData['fatherName'],
            'mother_name' => $validatedData['motherName'],
            'university_name' => $validatedData['universityName'],
            'date_of_birth' => $validatedData['dateOfBirth'],
            'gender' => $validatedData['gender'],
            'category' => $validatedData['category'],
            'adhaar_number' => $validatedData['aadhaarNumber'],
            'passport_number' => $validatedData['passportNumber'],
            'employed' => $validatedData['employed'],
            'employer_name' => $validatedData['employerName'],
            'designation' => $validatedData['designation'],
        ]);

        return redirect()->route('student.registration.showForm', [
            'mode'              => $this->mode,
            'university'        => $this->university,
            'formPart'  => 'part2',
        ]);
    }

    public function submitPart2(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'secYearOfPassing' => 'nullable|numeric',
            'secBoardUniversity' => 'nullable|string',
            'secPercentageCgpa' => 'nullable|numeric',
            'secSubjects' => 'nullable|string',
            'srSecYearOfPassing' => 'nullable|numeric',
            'srSecBoardUniversity' => 'nullable|string',
            'srSecPercentageCgpa' => 'nullable|numeric',
            'srSecSubjects' => 'nullable|string',
            'gradYearOfPassing' => 'nullable|numeric',
            'gradBoardUniversity' => 'nullable|string',
            'gradPercentageCgpa' => 'nullable|numeric',
            'gradSubjects' => 'nullable|string',
            'psGradYearOfPassing' => 'nullable|numeric',
            'psGradBoardUniversity' => 'nullable|string',
            'psGradPercentageCgpa' => 'nullable|numeric',
            'psGradSubjects' => 'nullable|string',
            'othYearOfPassing' => 'nullable|numeric',
            'othBoardUniversity' => 'nullable|string',
            'othPercentageCgpa' => 'nullable|numeric',
            'othSubjects' => 'nullable|string',
        ]);

        $secondary = [
            'year' => $validatedData['secYearOfPassing'],
            'board' => $validatedData['secBoardUniversity'],
            'percentage' => $validatedData['secPercentageCgpa'],
            'subject' => $validatedData['secSubjects'],
        ];

        $srSecondary = [
            'year' => $validatedData['srSecYearOfPassing'],
            'board' => $validatedData['srSecBoardUniversity'],
            'percentage' => $validatedData['srSecPercentageCgpa'],
            'subject' => $validatedData['srSecSubjects'],
        ];

        $graduation = [
            'year' => $validatedData['gradYearOfPassing'],
            'board' => $validatedData['gradBoardUniversity'],
            'percentage' => $validatedData['gradPercentageCgpa'],
            'subject' => $validatedData['gradSubjects'],
        ];

        $postGraduation = [
            'year' => $validatedData['psGradYearOfPassing'],
            'board' => $validatedData['psGradBoardUniversity'],
            'percentage' => $validatedData['psGradPercentageCgpa'],
            'subject' => $validatedData['psGradSubjects'],
        ];

        $others = [
            'year' => $validatedData['othYearOfPassing'],
            'board' => $validatedData['othBoardUniversity'],
            'percentage' => $validatedData['othPercentageCgpa'],
            'subject' => $validatedData['othSubjects'],
        ];

        $educationDetails = json_encode([
            'secondary' => $secondary,
            'sr_secondary' => $srSecondary,
            'graduation' => $graduation,
            'post_graduation' => $postGraduation,
            'others' => $others,
        ]);

        $candidate = Registration::where('email_address', auth()->user()->email)->first();

        $candidate->update(
            [
                'previous_qualification_details' => $educationDetails
            ]
        );

        return redirect()->route('student.registration.showForm', [
            'mode'              => $this->mode,
            'university'        => $this->university,
            'formPart'  => 'part3',
        ]);
    }

    public function submitPart3(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'course' => 'nullable|string',
            'year' => 'nullable|string',
            'session' => 'nullable|string',
            'modeOfStudy' => 'nullable|string',
        ]);

        $candidate = Registration::where('email_address', auth()->user()->email)->first();

        $candidate->update(
            [
                'course' => $validatedData['course'],
                'year' => $validatedData['year'],
                'session' => $validatedData['session'],
                'mode_of_study' => $validatedData['modeOfStudy'],
            ]
        );

        return redirect()->route('student.registration.showForm', [
            'mode'              => $this->mode,
            'university'        => $this->university,
            'formPart'  => 'part4',
        ]);
    }

    public function submitPart4(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'modeOfPayment' => 'nullable|string',
            'bankAccount' => 'nullable|string',
            'depositDate' => 'nullable|string',
        ]);

        $candidate = Registration::where('email_address', auth()->user()->email)->first();
        $candidate->update([
            'mode_of_payment' => $validatedData['modeOfPayment'],
            'bank_account' => $validatedData['bankAccount'],
            'deposit_date' => $validatedData['depositDate'],
        ]);

        return redirect()->route('student.registration.showForm', [
            'mode'              => $this->mode,
            'university'        => $this->university,
            'formPart'  => 'part5',
        ]);
    }

    public function uploadPassportPhoto(Request $request)
    {
        $request->validate([
            'pphoto' => 'required|mimes:jpg,png,webp',
        ]);

        // Retrieve the uploaded files
        $file1 = $request->file('pphoto');

        // Generate unique filenames for storing the files
        $filename1 = time() . '_' . $file1->getClientOriginalName();

        // Move the uploaded files to the desired storage location
        $file1->storeAs('uploads/'. auth()->user()->email, $filename1);

        // Create records in the database for the uploaded files
        $file1Path = $filename1;

        $candidate = Registration::where('email_address', auth()->user()->email)->first();

        $candidate->update([
            'photo' => $file1Path,
        ]);
        // Return a response indicating successful upload
        return response()->json(['message' => 'Files uploaded successfully.']);
    }

    public function uploadSignature(Request $request)
    {
        $request->validate([
            'sphoto' => 'required|mimes:jpg,png,webp',
        ]);

        // Retrieve the uploaded files
        $file1 = $request->file('sphoto');

        // Generate unique filenames for storing the files
        $filename1 = time() . '_' . $file1->getClientOriginalName();

        // Move the uploaded files to the desired storage location
        $file1->storeAs('uploads/'. auth()->user()->email, $filename1);

        // Create records in the database for the uploaded files
        $file1Path = $filename1;

        $candidate = Registration::where('email_address', auth()->user()->email)->first();

        $candidate->update([
            'signature' => $file1Path,
        ]);
        // Return a response indicating successful upload
        return response()->json(['message' => 'Files uploaded successfully.']);
    }

    public function submitPart5(Request $request)
    {
        // Validate the uploaded files
        $request->validate([
            'pphoto' => 'required|mimes:jpg,png,webp|max:2048',
            'sphoto' => 'required|mimes:jpg,png,webp|max:2048',
        ]);

        // Retrieve the uploaded files
        $file1 = $request->file('pphoto');
        $file2 = $request->file('sphoto');

        // Generate unique filenames for storing the files
        $filename1 = time() . '_' . $file1->getClientOriginalName();
        $filename2 = time() . '_' . $file2->getClientOriginalName();

        // Move the uploaded files to the desired storage location
        $file1->storeAs('uploads/', $filename1);
        $file2->storeAs('uploads/', $filename2);

        // Create records in the database for the uploaded files
        $file1Path = $filename1;
        $file2Path = $filename2;

        $candidate = Registration::where('email_address', auth()->user()->email)->first();

        $candidate->update([
            'photo' => $file1Path,
        ]);

        $candidate->update([
            'signature' => $file2Path,
        ]);

        // Return a response indicating successful upload
        return response()->json(['message' => 'Files uploaded successfully.']);

        // return redirect()->route('student.registration.showForm', [
        //     'mode'              => $this->mode,
        //     'university'        => $this->university,
        //     'formPart'  => 'part6',
        // ]);
    }

    public function submitPart6(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'declaration'  => 'required|boolean',
        ]);

        $candidate = Registration::where('email_address', auth()->user()->email)->first();

        $candidate->update([
            'declaration_by_applicant' => $validatedData['declaration']
        ]);

        return Inertia::render('Student/Modes/Registration/Success');
    }
}
