<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stu_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_candidate')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('university_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('photo')->nullable();
            $table->string('gender')->nullable();
            $table->string('category')->nullable();
            $table->string('adhaar_number')->nullable();
            $table->string('passport_number')->nullable();
            $table->boolean('employed')->nullable();
            $table->string('employer_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email_address')->nullable();
            $table->string('country')->nullable();
            $table->string('nationality')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('address')->nullable();
            $table->string('pin_code')->nullable();
            $table->text('previous_qualification_details')->nullable();
            $table->string('course')->nullable();
            $table->integer('year')->nullable();
            $table->string('session')->nullable();
            $table->string('mode_of_study')->nullable();
            $table->string('mode_of_payment')->nullable();
            $table->string('bank_account')->nullable();
            $table->date('deposit_date')->nullable();
            $table->boolean('declaration_by_applicant')->nullable();
            $table->string('signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stu_registrations');
    }
};
