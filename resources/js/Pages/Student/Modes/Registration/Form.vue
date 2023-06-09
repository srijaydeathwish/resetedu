<template>
    <Head title="Modes" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Modes
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <Part1 v-if="formPart == 'part1'"
                           :defaultData="defaultData" />
                    <Part2 v-if="formPart == 'part2'"
                           :defaultData="defaultData" />
                    <Part3 v-if="formPart == 'part3'"
                           :defaultData="defaultData" />
                    <Part4 v-if="formPart == 'part4'"
                           :defaultData="defaultData" />
                    <Part5 v-if="formPart == 'part5'"
                           :defaultData="defaultData" />
                    <Part6 v-if="formPart == 'part6'"
                           :defaultData="defaultData" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/Student/AuthenticatedLayout.vue';
import { Head } from "@inertiajs/vue3";
import { ref, watch, reactive } from 'vue';
import Part1 from './Partials/Part1.vue';
import Part2 from './Partials/Part2.vue';
import Part3 from './Partials/Part3.vue';
import Part4 from './Partials/Part4.vue';
import Part5 from './Partials/Part5.vue';
import Part6 from './Partials/Part6.vue';

const props = defineProps(['formPart', 'candidateEmail', 'university', 'mode', 'auth', 'courses', 'sessions']);

const defaultData = reactive({
    currentComponent: props.formPart,
    candidateEmail: props.auth.user.email,
    university: props.university,
    mode: props.mode,
    courses: props.courses,
    sessions: props.sessions
})

// const componentMap = {
//     'part1': Part1,
//     'part2': Part2,
//     'part3': Part3,
//     'part4': Part4,
//     'part5': Part5,
// };

// const state = ref({
//     currentComponent: componentMap[props.formPart],
// });

// watch(() => props.formPart, (newValue) => {
//     state.value.currentComponent = componentMap[newValue];
// });

</script>
