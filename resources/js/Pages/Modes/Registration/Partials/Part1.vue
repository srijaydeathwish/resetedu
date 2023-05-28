<template>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Personal Details
            </h2>
        </header>
        <form @submit.prevent="form.post(route('registration.submit1', ['distance', 'sgvu']))"
              class="mt-6 space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                <div class="mb-5">
                    <InputLabel for="candidateName"
                                value="Name of the candidate" />
                    <TextInput id="candidateName"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.candidateName"
                               required
                               autofocus
                               autocomplete="candidateName" />
                    <InputError class="mt-2"
                                :message="form.errors.candidateName" />
                </div>
                <div class="mb-5">
                    <InputLabel for="fatherName"
                                value="Father's Name" />
                    <TextInput id="fatherName"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.fatherName"
                               required
                               autofocus
                               autocomplete="fatherName" />
                    <InputError class="mt-2"
                                :message="form.errors.fatherName" />
                </div>
                <div class="mb-5">
                    <InputLabel for="motherName"
                                value="Mother's Name" />
                    <TextInput id="motherName"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.motherName"
                               required
                               autofocus
                               autocomplete="motherName" />
                    <InputError class="mt-2"
                                :message="form.errors.motherName" />
                </div>
                <div class="mb-5">
                    <InputLabel for="universityName"
                                value="Name of the University" />
                    <TextInput id="universityName"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.universityName"
                               required
                               autofocus
                               autocomplete="universityName" />
                    <InputError class="mt-2"
                                :message="form.errors.universityName" />
                </div>
                <div class="mb-5">
                    <InputLabel for="dateOfBirth"
                                value="Date of Birth" />
                    <TextInput id="dateOfBirth"
                               type="date"
                               class="mt-1 block w-full"
                               v-model="form.dateOfBirth"
                               required
                               autofocus
                               autocomplete="dateOfBirth" />
                    <InputError class="mt-2"
                                :message="form.errors.dateOfBirth" />
                </div>
                <div class="mb-5">
                    <InputLabel for="photoUpload"
                                value="Upload photo" />
                    <FileInput id="photoUpload"
                               class="mt-1 block w-full"
                               v-model="form.photo"
                               accept="image/*"
                               required
                               autofocus />
                    <InputError class="mt-2"
                                :message="form.errors.photo" />
                </div>
                <div class="mb-5">
                    <InputLabel for="gender"
                                value="Gender" />
                    <SelectInput id="gender"
                                 class="mt-1 block w-full"
                                 v-model="form.gender"
                                 :options="genderOptions"
                                 required
                                 autofocus />
                    <InputError class="mt-2"
                                :message="form.errors.gender" />
                </div>
                <div class="mb-5">
                    <InputLabel for="category"
                                value="Category" />
                    <SelectInput id="category"
                                 class="mt-1 block w-full"
                                 v-model="form.category"
                                 :options="categoryOptions"
                                 required
                                 autofocus />
                    <InputError class="mt-2"
                                :message="form.errors.category" />
                </div>
                <div class="mb-5">
                    <InputLabel for="aadhaarNumber"
                                value="Aadhaar Number" />
                    <TextInput id="aadhaarNumber"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.aadhaarNumber"
                               required
                               autofocus
                               autocomplete="aadhaarNumber" />
                    <InputError class="mt-2"
                                :message="form.errors.aadhaarNumber" />
                </div>
                <div class="mb-5">
                    <InputLabel for="passportNumber"
                                value="Passport Number" />
                    <TextInput id="passportNumber"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.passportNumber"
                               required
                               autofocus
                               autocomplete="passportNumber" />
                    <InputError class="mt-2"
                                :message="form.errors.passportNumber" />
                </div>
                <div class="mb-5">
                    <InputLabel for="employed"
                                value="Are you Employed" />
                    <SelectInput id="employed"
                                 class="mt-1 block w-full"
                                 v-model="form.employed"
                                 :options="employedOptions"
                                 required
                                 autofocus />
                    <InputError class="mt-2"
                                :message="form.errors.employed" />
                </div>
                <div class="mb-5"
                     v-if="form.employed === 'yes'">
                    <InputLabel for="employerName"
                                value="Employer Name" />
                    <TextInput id="employerName"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.employerName"
                               :disabled="form.employed === 'no'"
                               required
                               autofocus
                               autocomplete="employerName" />
                    <InputError class="mt-2"
                                :message="form.errors.employerName" />
                </div>
                <div class="mb-5"
                     v-if="form.employed === 'yes'">
                    <InputLabel for="designation"
                                value="Designation" />
                    <TextInput id="designation"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.designation"
                               :disabled="form.employed === 'no'"
                               required
                               autofocus
                               autocomplete="designation" />
                    <InputError class="mt-2"
                                :message="form.errors.designation" />
                </div>

            </div>
            <div class="mb-5">
                <PrimaryButton class="mt-5"
                               type="submit"
                               value="Submit">Save and Go to Page 2</PrimaryButton>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import SelectInput from "@/Components/SelectInput.vue";
import FileInput from "@/Components/FileInput.vue";

import { markRaw, reactive } from "vue";

const form = useForm({
    candidateName: "srijay",
    fatherName: "father",
    motherName: "mother",
    universityName: "iias",
    dateOfBirth: "19-06-1992",
    photo: null,
    gender: "male",
    category: "SC",
    aadhaarNumber: "123123123",
    passportNumber: "123123123",
    employed: 0,
    employerName: "",
    designation: "",
});

const employedOptions = markRaw([
    { label: "Yes", value: 1 },
    { label: "No", value: 0 },
]);

const genderOptions = markRaw([
    { label: "Male", value: "male" },
    { label: "Female", value: "female" },
    { label: "Other", value: "others" }
]);

const categoryOptions = markRaw([
    { label: "General", value: "General" },
    { label: "SC", value: "SC" },
    { label: "ST", value: "ST" },
    { label: "BC", value: "BC" },
    { label: "SBC", value: "SBC" },
    { label: "OBC", value: "OBC" },
    { label: "PH", value: "PH" },
    { label: "Ex-Servicemen", value: "Ex-Servicemen" }
]);

</script>
