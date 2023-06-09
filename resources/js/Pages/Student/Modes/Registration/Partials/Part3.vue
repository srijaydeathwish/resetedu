<template>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Programme Details
            </h2>
        </header>
        <form @submit.prevent="handleSubmit"
              class="mt-6 space-y-6">
            <div class="mb-5">
                <InputLabel for="course"
                            value="Course" />

                <SelectInput id="course"
                                 class="mt-1 block w-full"
                                 v-model="form.course"
                                 :options="courseOptions"
                                 required
                                 autofocus />

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

                            <SelectInput id="session"
                                 class="mt-1 block w-full"
                                 v-model="form.session"
                                 :options="sessionOptions"
                                 required
                                 autofocus />

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
import SelectInput from "@/Components/SelectInput.vue";
import { computed, markRaw } from "vue";

const props = defineProps(['defaultData'])

const form = useForm({
    course: '',
    year: '',
    session: '',
    modeOfStudy: props.defaultData.mode
});

const courseOptions = computed(() => {
  return props.defaultData.courses.map(course => {
    return {
      label: course.title,
      value: course.code
    };
  });
});

const sessionOptions = computed(() => {
  return props.defaultData.sessions.map(session => {
    return {
      label: `${session.month} - ${session.year}`,
      value: `${session.month} - ${session.year}`
    };
  });
});

const handleSubmit = () => {
    form.patch(route('student.registration.submit3', [
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
