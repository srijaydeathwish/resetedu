<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student\Registration;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RegistrationController extends Controller
{
    public function showForm(Request $request)
    {
        // // Clear all session data
        // session()->forget('formMode');

        // // Set new session
        // session()->put('formMode', [
        //     'mode' => $request->mode,
        //     'university' => $request->university,
        // ]);

        //return Inertia::render('Modes/Registration/Form');
        return Inertia::render('Modes/Registration/Form', [
            'currentComponent' => 'showPart1', // Set the initial component to be rendered
            'candidateId' => null, // Replace with the actual candidate ID
        ]);
    }



    public function submitPart1(Request $request)
    {
        // $formProgress = session('formProgress');

        // Validate the request data
        $validatedData = $request->validate([
            'candidateName' => 'required|string',
            'fatherName' => 'required|string',
            'motherName' => 'required|string',
            'universityName' => 'required|string',
            'dateOfBirth' => 'required|date',
            'photo' => 'required|image',
            'gender' => 'required|in:male,female,others',
            'category' => 'required|string',
            'aadhaarNumber' => 'required|string',
            'passportNumber' => 'nullable|string',
            'employed' => 'required|boolean',
            'employerName' => 'nullable|required_if:employed,1|string',
            'designation' => 'nullable|required_if:employed,1|string',
        ]);

        // Create a new candidate using the create method
        $candidate = Registration::create([
            'name_of_candidate' => $validatedData['candidateName'],
            'father_name' => $validatedData['fatherName'],
            'mother_name' => $validatedData['motherName'],
            'university_name' => $validatedData['universityName'],
            'date_of_birth' => $validatedData['dateOfBirth'],
            'photo' => $validatedData['photo'],
            'gender' => $validatedData['gender'],
            'category' => $validatedData['category'],
            'adhaar_number' => $validatedData['aadhaarNumber'],
            'passport_number' => $validatedData['passportNumber'],
            'employed' => $validatedData['employed'],
            'employer_name' => $validatedData['employerName'],
            'designation' => $validatedData['designation'],
        ]);

        // Optionally, you can also store the uploaded photo
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos');
            $candidate->photo = $photoPath;
            $candidate->save();
        }

        return Inertia::render('Modes/Registration/Form', [
            'currentComponent' => 'showPart2',
            'candidateId' => $candidate->id,
        ]);
    }

    public function submitPart2(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'candidateId' => 'required',
            'contactNumber' => 'required',
            'emailAddress' => 'required|email',
            'country' => 'required',
            'nationality' => 'required',
            'state' => 'required',
            'district' => 'required',
            'address' => 'required',
            'pinCode' => 'required|numeric',
        ]);

        $candidateID = $validatedData['candidateId'];
        $candidate = Registration::find($candidateID);

        // Create a new candidate using the create method
        $candidate->update([
            'contact_number' => $validatedData['contactNumber'],
            'email_address' => $validatedData['emailAddress'],
            'country' => $validatedData['country'],
            'nationality' => $validatedData['nationality'],
            'state' => $validatedData['state'],
            'district' => $validatedData['district'],
            'address' => $validatedData['address'],
            'pin_code' => $validatedData['pinCode']
        ]);

        return Inertia::render('Modes/Registration/Form', [
            'currentComponent' => 'showPart3',
            'candidateId' => $candidate->id,
        ]);
    }

    public function submitPart3(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'candidateId' => 'required',
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

        $candidateID = $validatedData['candidateId'];
        $candidate = Registration::find($candidateID);

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

        // Create a new candidate using the create method
        $candidate->update(
            [
                'previous_qualification_details' => $educationDetails
            ]
        );

        return Inertia::render('Modes/Registration/Form', [
            'currentComponent' => 'showPart4',
            'candidateId' => $candidate->id,
        ]);
    }

    public function submitPart4(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'candidateId' => 'required',
            'course' => 'nullable|string',
            'year' => 'nullable|string',
            'session' => 'nullable|string',
            'modeOfStudy' => 'nullable|string',
        ]);

        $candidateID = $validatedData['candidateId'];
        $candidate = Registration::find($candidateID);

        // Create a new candidate using the create method
        $candidate->update(
            [
                'course' => $validatedData['course'],
                'year' => $validatedData['year'],
                'session' => $validatedData['session'],
                'mode_of_study' => $validatedData['modeOfStudy'],
            ]
        );

        return Inertia::render('Modes/Registration/Form', [
            'currentComponent' => 'showPart5',
            'candidateId' => $candidate->id,
        ]);
    }

    public function submitPart5(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'candidateId' => 'required',
            'modeOfPayment' => 'nullable|string',
            'bankAccount' => 'nullable|string',
            'depositDate' => 'nullable|string',
        ]);

        $candidateID = $validatedData['candidateId'];
        $candidate = Registration::find($candidateID);

        // Create a new candidate using the create method
        $candidate->update([
            'mode_of_payment' => $validatedData['modeOfPayment'],
            'bank_account' => $validatedData['bankAccount'],
            'deposit_date' => $validatedData['depositDate'],
        ]);

        return Inertia::render('Modes/Registration/Form', [
            'currentComponent' => 'showPart6',
            'candidateId' => $candidate->id,
        ]);
    }

    public function submitPart6(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'candidateId' => 'required',
            'declaration'  => 'required|boolean',
        ]);

        $candidateID = $validatedData['candidateId'];
        $candidate = Registration::find($candidateID);

        // Create a new candidate using the create method
        $candidate->update([
            'declaration_by_applicant' => $validatedData['declaration']
        ]);

        return Inertia::render('Modes/Registration/Success', [
            'candidateId' => $candidate->id,
        ]);
    }
}
