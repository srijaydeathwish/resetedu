<template>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Programme Details
            </h2>
        </header>
        <form @submit.prevent="form.post(route('registration.submit4', ['distance', 'sgvu']))"
              class="mt-6 space-y-6">
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
                           type="number"
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
                <InputLabel for="modeOfStudy"
                            value="Mode of Study (Distance/Regular/F-Tel)" />

                <TextInput id="modeOfStudy"
                           type="text"
                           class="mt-1 block w-full"
                           v-model="form.modeOfStudy"
                           required
                           autofocus
                           autocomplete="modeOfStudy" />

                <InputError class="mt-2"
                            :message="form.errors.modeOfStudy" />
            </div>
            <div class="mb-5">
                <PrimaryButton class="mt-5"
                               type="submit"
                               value="Submit"
                               @click="submitForm">Save and Go to Page 3</PrimaryButton>
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

const props = defineProps({
    candidateId: Number,
});

const form = useForm({
    candidateId: props.candidateId,

    course: 'BSC',
    year: '2015',
    session: 'July-2023',
    modeOfStudy: 'Distance'
});
</script>
