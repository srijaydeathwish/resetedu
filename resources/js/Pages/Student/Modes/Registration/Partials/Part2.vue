<template>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Previous Qualification Details
            </h2>
        </header>
        <form @submit.prevent="handleSubmit"
              class="mt-6 space-y-6">
            <fieldset>
                <legend>Secondary:</legend>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2">

                    <div class="mb-5">
                        <InputLabel for="secYearOfPassing"
                                    value="Year Of Passing" />

                        <TextInput id="secYearOfPassing"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.secYearOfPassing"
                                   required
                                   autofocus
                                   autocomplete="secYearOfPassing" />

                        <InputError class="mt-2"
                                    :message="form.errors.secYearOfPassing" />
                    </div>
                    <div class="mb-5">
                        <InputLabel for="secBoardUniversity"
                                    value="Board/University" />

                        <TextInput id="secBoardUniversity"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.secBoardUniversity"
                                   required
                                   autofocus
                                   autocomplete="secBoardUniversity" />

                        <InputError class="mt-2"
                                    :message="form.errors.secBoardUniversity" />
                    </div>
                    <div class="mb-5">
                        <InputLabel for="secPercentageCgpa"
                                    value="Percentage/CGPA" />

                        <TextInput id="secPercentageCgpa"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.secPercentageCgpa"
                                   required
                                   autofocus
                                   autocomplete="secPercentageCgpa" />

                        <InputError class="mt-2"
                                    :message="form.errors.secPercentageCgpa" />
                    </div>

                    <div class="mb-5">
                        <InputLabel for="secSubjects"
                                    value="Subjects" />

                        <TextInput id="secSubjects"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.secSubjects"
                                   required
                                   autofocus
                                   autocomplete="secSubjects" />

                        <InputError class="mt-2"
                                    :message="form.errors.secSubjects" />
                    </div>

                </div>
            </fieldset>

            <fieldset>
                <legend>Sr. Secondary:</legend>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2">

                    <div class="mb-5">
                        <InputLabel for="srSecYearOfPassing"
                                    value="Year Of Passing" />

                        <TextInput id="srSecYearOfPassing"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.srSecYearOfPassing"
                                   required
                                   autofocus
                                   autocomplete="srSecYearOfPassing" />

                        <InputError class="mt-2"
                                    :message="form.errors.srSecYearOfPassing" />
                    </div>
                    <div class="mb-5">
                        <InputLabel for="srSecBoardUniversity"
                                    value="Board/University" />

                        <TextInput id="srSecBoardUniversity"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.srSecBoardUniversity"
                                   required
                                   autofocus
                                   autocomplete="srSecBoardUniversity" />

                        <InputError class="mt-2"
                                    :message="form.errors.srSecBoardUniversity" />
                    </div>
                    <div class="mb-5">
                        <InputLabel for="srSecPercentageCgpa"
                                    value="Percentage/CGPA" />

                        <TextInput id="srSecPercentageCgpa"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.srSecPercentageCgpa"
                                   required
                                   autofocus
                                   autocomplete="srSecPercentageCgpa" />

                        <InputError class="mt-2"
                                    :message="form.errors.srSecPercentageCgpa" />
                    </div>

                    <div class="mb-5">
                        <InputLabel for="srSecSubjects"
                                    value="Subjects" />

                        <TextInput id="srSecSubjects"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.srSecSubjects"
                                   required
                                   autofocus
                                   autocomplete="srSecSubjects" />

                        <InputError class="mt-2"
                                    :message="form.errors.srSecSubjects" />
                    </div>

                </div>
            </fieldset>

            <fieldset>
                <legend>Graduation:</legend>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2">

                    <div class="mb-5">
                        <InputLabel for="gradYearOfPassing"
                                    value="Year Of Passing" />

                        <TextInput id="gradYearOfPassing"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.gradYearOfPassing"
                                   required
                                   autofocus
                                   autocomplete="gradYearOfPassing" />

                        <InputError class="mt-2"
                                    :message="form.errors.gradYearOfPassing" />
                    </div>
                    <div class="mb-5">
                        <InputLabel for="gradBoardUniversity"
                                    value="Board/University" />

                        <TextInput id="gradBoardUniversity"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.gradBoardUniversity"
                                   required
                                   autofocus
                                   autocomplete="gradBoardUniversity" />

                        <InputError class="mt-2"
                                    :message="form.errors.gradBoardUniversity" />
                    </div>
                    <div class="mb-5">
                        <InputLabel for="gradPercentageCgpa"
                                    value="Percentage/CGPA" />

                        <TextInput id="gradPercentageCgpa"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.gradPercentageCgpa"
                                   required
                                   autofocus
                                   autocomplete="gradPercentageCgpa" />

                        <InputError class="mt-2"
                                    :message="form.errors.gradPercentageCgpa" />
                    </div>

                    <div class="mb-5">
                        <InputLabel for="gradSubjects"
                                    value="Subjects" />

                        <TextInput id="gradSubjects"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.gradSubjects"
                                   required
                                   autofocus
                                   autocomplete="gradSubjects" />

                        <InputError class="mt-2"
                                    :message="form.errors.gradSubjects" />
                    </div>

                </div>
            </fieldset>

            <fieldset>
                <legend>Post Graduation:</legend>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2">

                    <div class="mb-5">
                        <InputLabel for="psGradYearOfPassing"
                                    value="Year Of Passing" />

                        <TextInput id="psGradYearOfPassing"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.psGradYearOfPassing"
                                   required
                                   autofocus
                                   autocomplete="psGradYearOfPassing" />

                        <InputError class="mt-2"
                                    :message="form.errors.psGradYearOfPassing" />
                    </div>
                    <div class="mb-5">
                        <InputLabel for="psGradBoardUniversity"
                                    value="Board/University" />

                        <TextInput id="psGradBoardUniversity"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.psGradBoardUniversity"
                                   required
                                   autofocus
                                   autocomplete="psGradBoardUniversity" />

                        <InputError class="mt-2"
                                    :message="form.errors.psGradBoardUniversity" />
                    </div>
                    <div class="mb-5">
                        <InputLabel for="psGradPercentageCgpa"
                                    value="Percentage/CGPA" />

                        <TextInput id="psGradPercentageCgpa"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.psGradPercentageCgpa"
                                   required
                                   autofocus
                                   autocomplete="psGradPercentageCgpa" />

                        <InputError class="mt-2"
                                    :message="form.errors.psGradPercentageCgpa" />
                    </div>

                    <div class="mb-5">
                        <InputLabel for="psGradSubjects"
                                    value="Subjects" />

                        <TextInput id="psGradSubjects"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.psGradSubjects"
                                   required
                                   autofocus
                                   autocomplete="psGradSubjects" />

                        <InputError class="mt-2"
                                    :message="form.errors.psGradSubjects" />
                    </div>

                </div>
            </fieldset>

            <fieldset>
                <legend>Others</legend>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2">

                    <div class="mb-5">
                        <InputLabel for="othYearOfPassing"
                                    value="Year Of Passing" />

                        <TextInput id="othYearOfPassing"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.othYearOfPassing"
                                   required
                                   autofocus
                                   autocomplete="othYearOfPassing" />

                        <InputError class="mt-2"
                                    :message="form.errors.othYearOfPassing" />
                    </div>
                    <div class="mb-5">
                        <InputLabel for="othBoardUniversity"
                                    value="Board/University" />

                        <TextInput id="othBoardUniversity"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.othBoardUniversity"
                                   required
                                   autofocus
                                   autocomplete="othBoardUniversity" />

                        <InputError class="mt-2"
                                    :message="form.errors.othBoardUniversity" />
                    </div>
                    <div class="mb-5">
                        <InputLabel for="othPercentageCgpa"
                                    value="Percentage/CGPA" />

                        <TextInput id="othPercentageCgpa"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.othPercentageCgpa"
                                   required
                                   autofocus
                                   autocomplete="othPercentageCgpa" />

                        <InputError class="mt-2"
                                    :message="form.errors.othPercentageCgpa" />
                    </div>

                    <div class="mb-5">
                        <InputLabel for="othSubjects"
                                    value="Subjects" />

                        <TextInput id="othSubjects"
                                   type="tel"
                                   class="mt-1 block w-full"
                                   v-model="form.othSubjects"
                                   required
                                   autofocus
                                   autocomplete="othSubjects" />

                        <InputError class="mt-2"
                                    :message="form.errors.othSubjects" />
                    </div>

                </div>
            </fieldset>
            <div class="mb-5">
                <PrimaryButton class="mt-5"
                               type="submit"
                               value="Submit"
                               @click="submitForm">Save and Go to Page 4</PrimaryButton>
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

const props = defineProps(['defaultData'])

const form = useForm({
    candidateId: props.candidateId,

    secYearOfPassing: '2010',
    secBoardUniversity: 'A',
    secPercentageCgpa: '50',
    secSubjects: 'eng',

    srSecYearOfPassing: '2011',
    srSecBoardUniversity: 'B',
    srSecPercentageCgpa: '60',
    srSecSubjects: 'sci',

    gradYearOfPassing: '2012',
    gradBoardUniversity: 'C',
    gradPercentageCgpa: '70',
    gradSubjects: 'his',

    psGradYearOfPassing: '2013',
    psGradBoardUniversity: 'D',
    psGradPercentageCgpa: '80',
    psGradSubjects: 'geog',

    othYearOfPassing: '2014',
    othBoardUniversity: 'E',
    othPercentageCgpa: '90',
    othSubjects: 'maths',
});

const handleSubmit = () => {
    form.patch(route('student.registration.submit2', [
        props.defaultData.mode,
        props.defaultData.university,
    ]),
        {
            onSuccess: () => alert('success'),
            onError: () => {
                // Define the emitted events
                const emits = defineEmits(['next']);

                // Emit the 'next' event
                const nextStep = () => {
                    emits.next();
                };
            },
        }
    )
}
</script>
