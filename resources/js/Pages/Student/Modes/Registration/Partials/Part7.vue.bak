<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectInput from '@/Components/SelectInput.vue';
import { reactive } from 'vue';

const form = useForm({
    candidateName: '',
    fatherName: '',
    motherName: '',
    universityName: '',
    dateOfBirth: '',
    photo: null,
    gender: '',
    category: '',
    aadhaarNumber: '',
    passportNumber: '',
    employed: '',
    employerName: '',
    designation: '',
    contactNumber: '',
    emailAddress: '',
    country: '',
    nationality: '',
    state: '',
    district: '',
    address: '',
    pinCode: '',
    qualificationDetails: '',
    course: '',
    year: '',
    session: '',
    studyMode: '',
    paymentMode: '',
    bankAccount: '',
    depositDate: '',
    declaration: false,
    signature: null
})

const employedOptions = reactive([
    { label: 'Yes', value: 'yes' },
    { label: 'No', value: 'no' }
])




</script>

<template>
    <Head title="Modes" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Modes</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Basic Details</h2>
                        </header>

                        <div class="mt-6 space-y-6">






                            <div class="mb-5">
                                <InputLabel for="qualificationDetails"
                                            value="Previous Qualification Details" />

                                <TextareaInput id="qualificationDetails"
                                               class="mt-1 block w-full"
                                               v-model="form.qualificationDetails"
                                               required
                                               autofocus
                                               autocomplete="qualificationDetails" />

                                <InputError class="mt-2"
                                            :message="form.errors.qualificationDetails" />
                            </div>


                            <div class="mb-5">
                                <InputLabel for="course"
                                            value="Course" />

                                <TextInput id="course"
                                           type="text"
                                           class="mt-1 block w-full"
                                           v-model="form.course"
                                           required
                                           autofocus
                                           autocomplete="course" />

                                <InputError class="mt-2"
                                            :message="form.errors.course" />
                            </div>

                            <div class="mb-5">
                                <InputLabel for="year"
                                            value="Year" />

                                <TextInput id="year"
                                           type="text"
                                           class="mt-1 block w-full"
                                           v-model="form.year"
                                           required
                                           autofocus
                                           autocomplete="year" />

                                <InputError class="mt-2"
                                            :message="form.errors.year" />
                            </div>


                            <div class="mb-5">
                                <InputLabel for="session"
                                            value="Session" />

                                <TextInput id="session"
                                           type="text"
                                           class="mt-1 block w-full"
                                           v-model="form.session"
                                           required
                                           autofocus
                                           autocomplete="session" />

                                <InputError class="mt-2"
                                            :message="form.errors.session" />
                            </div>


                            <div class="mb-5">
                                <InputLabel for="studyMode"
                                            value="Mode of Study" />

                                <SelectInput id="studyMode"
                                             class="mt-1 block w-full"
                                             v-model="form.studyMode"
                                             :options="studyModeOptions"
                                             required
                                             autofocus />

                                <InputError class="mt-2"
                                            :message="form.errors.studyMode" />
                            </div>


                            <div class="mb-5">
                                <InputLabel for="paymentMode"
                                            value="Mode of Payment" />

                                <SelectInput id="paymentMode"
                                             class="mt-1 block w-full"
                                             v-model="form.paymentMode"
                                             :options="paymentModeOptions"
                                             required
                                             autofocus />

                                <InputError class="mt-2"
                                            :message="form.errors.paymentMode" />
                            </div>


                            <div class="mb-5">
                                <InputLabel for="bankAccount"
                                            value="Bank Account" />

                                <TextInput id="bankAccount"
                                           type="text"
                                           class="mt-1 block w-full"
                                           v-model="form.bankAccount"
                                           required
                                           autofocus
                                           autocomplete="bankAccount" />

                                <InputError class="mt-2"
                                            :message="form.errors.bankAccount" />
                            </div>


                            <div class="mb-5">
                                <InputLabel for="depositDate"
                                            value="Deposit Date" />

                                <TextInput id="depositDate"
                                           type="date"
                                           class="mt-1 block w-full"
                                           v-model="form.depositDate"
                                           required
                                           autofocus
                                           autocomplete="depositDate" />

                                <InputError class="mt-2"
                                            :message="form.errors.depositDate" />
                            </div>


                            <div class="mb-5">
                                <InputLabel for="declaration"
                                            value="Declaration by the Applicant" />

                                <CheckboxInput id="declaration"
                                               class="mt-1 block"
                                               v-model="form.declaration"
                                               required
                                               autofocus />

                                <InputError class="mt-2"
                                            :message="form.errors.declaration" />
                            </div>


                            <div class="mb-5">
                                <InputLabel for="signatureUpload"
                                            value="Upload Signature" />

                                <FileInput id="signatureUpload"
                                           class="mt-1 block w-full"
                                           v-model="form.signature"
                                           accept="image/*"
                                           required
                                           autofocus />

                                <InputError class="mt-2"
                                            :message="form.errors.signature" />
                            </div>



                            <Button class="mt-5"
                                    type="submit"
                                    value="Submit"
                                    @click="submitForm">Submit my Application</Button>

                            <div class="mb-5">
                                <Button class="mt-5"
                                        type="submit"
                                        value="Submit"
                                        @click="submitForm">Submit my Application</Button>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

