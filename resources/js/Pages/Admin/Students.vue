<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Admin Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full text-left text-sm font-light">
                                            <thead class="border-b font-medium dark:border-neutral-500">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-4">Name</th>
                                                    <th scope="col"
                                                        class="px-6 py-4">Email</th>
                                                    <th scope="col"
                                                        class="px-6 py-4">Registration</th>
                                                    <th scope="col"
                                                        class="px-6 py-4">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="border-b dark:border-neutral-500"
                                                    v-for="s in students"
                                                    :key="s.index">
                                                    <td class="whitespace-nowrap px-6 py-4">{{ s.name }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">{{ s.email }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        <span v-if="s.registration"
                                                              class="text-green-600">Done</span>
                                                        <span v-else
                                                              class="text-red-600">Not Done</span>
                                                    </td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        <PrimaryButton v-if="s.registration"
                                                                       @click="showDetailsButton(s.id)">Details
                                                        </PrimaryButton>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Modal :show="showDetails">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Student Registration Details
                </h2>

                <div class="mt-1 text-sm text-gray-600">
                    <h4 class="font-bold text-gray-900">Personal Details</h4>
                    <div class="pl-3">
                        <p>Name: {{ studentRegistration.registration.name }}</p>
                        <p>Date of Birth: {{ studentRegistration.registration.date_of_birth }}</p>
                        <p>Gender: {{ studentRegistration.registration.gender }}</p>
                        <p>Nationality: {{ studentRegistration.registration.nationality }}</p>
                    </div>
                    <h4 class="font-bold text-gray-900">Contact Details</h4>
                    <div class="pl-3">
                        <p>Address: {{ studentRegistration.registration.address }}</p>
                        <p>District: {{ studentRegistration.registration.district }}</p>
                        <p>Pin Code: {{ studentRegistration.registration.pin_code }}</p>
                        <p>Country: {{ studentRegistration.registration.country }}</p>
                        <p>Email Address: {{ studentRegistration.registration.email_address }}</p>
                        <p>Contact Number: {{ studentRegistration.registration.contact_number }}</p>
                    </div>
                    <h4 class="font-bold text-gray-900">Education Details</h4>
                    <div class="pl-3">
                        <p>University Name: {{ studentRegistration.registration.university_name }}</p>
                        <p>Course: {{ studentRegistration.registration.course }}</p>
                        <p>Year: {{ studentRegistration.registration.year }}</p>
                        <p>Session: {{ studentRegistration.registration.session }}</p>
                    </div>
                    <h4 class="font-bold text-gray-900">Other Details</h4>
                    <div class="pl-3">
                        <p>Adhaar Number: {{ studentRegistration.registration.adhaar_number }}</p>
                        <p>Bank Account: {{ studentRegistration.registration.bank_account }}</p>
                        <p>Category: {{ studentRegistration.registration.category }}</p>
                        <p>Deposit Date: {{ studentRegistration.registration.deposit_date }}</p>
                        <p>Designation: {{ studentRegistration.registration.designation }}</p>
                        <p>Employed: {{ studentRegistration.registration.employed }}</p>
                        <p>Employer Name: {{ studentRegistration.registration.employer_name }}</p>
                        <p>Mode of Payment: {{ studentRegistration.registration.mode_of_payment }}</p>
                        <p>Mode of Study: {{ studentRegistration.registration.mode_of_study }}</p>
                        <p>Father's Name: {{ studentRegistration.registration.father_name }}</p>
                        <p>Mother's Name: {{ studentRegistration.registration.mother_name }}</p>
                        <p>Name of Candidate: {{ studentRegistration.registration.name_of_candidate }}</p>
                        <p>Passport Number: {{ studentRegistration.registration.passport_number }}</p>
                        <p>Photo: {{ studentRegistration.registration.photo }}</p>
                        <p>Signature: {{ studentRegistration.registration.signature }}</p>
                        <p>State: {{ studentRegistration.registration.state }}</p>
                    </div>
                </div>

                <div class="mt-6">

                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeShowDetails"> Cancel </SecondaryButton>
                </div>
            </div>
        </Modal>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/Admin/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import Modal from '@/Components/Modal.vue';
import { Head } from '@inertiajs/vue3';
import { ref, toRef, computed } from 'vue';

const props = defineProps(['students']);
const studentRegDetails = toRef(props, 'students');

const showDetails = ref(false);
const modalSessionId = ref(null);

function showDetailsButton (id) {
    showDetails.value = true;
    modalSessionId.value = id
}

function closeShowDetails () {
    showDetails.value = false;
}

const studentRegistration = computed(() => {
    return studentRegDetails.value.find((studentRegistration) => studentRegistration.id === modalSessionId.value);
});

</script>
