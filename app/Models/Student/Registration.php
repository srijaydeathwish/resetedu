<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $table = 'stu_registrations';

    protected $fillable = [
        'name_of_candidate',
        'father_name',
        'mother_name',
        'university_name',
        'date_of_birth',
        'photo',
        'gender',
        'category',
        'adhaar_number',
        'passport_number',
        'employed',
        'employer_name',
        'designation',
        'contact_number',
        'email_address',
        'country',
        'nationality',
        'state',
        'district',
        'address',
        'pin_code',
        'previous_qualification_details',
        'course',
        'year',
        'session',
        'mode_of_study',
        'mode_of_payment',
        'bank_account',
        'deposit_date',
        'declaration_by_applicant',
        'signature',
    ];
}
