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
                    <component :is="state.currentComponent"
                               @next="state.currentComponent = $event" :candidateId="props.candidateId"
                               />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, usePage } from "@inertiajs/vue3";
import { ref, watch, reactive } from 'vue';
import Part1 from './Partials/Part1.vue';
import Part2 from './Partials/Part2.vue';
import Part3 from './Partials/Part3.vue';
import Part4 from './Partials/Part4.vue';
import Part5 from './Partials/Part5.vue';
import Part6 from './Partials/Part6.vue';

const componentMap = {
  'showPart1': Part1,
  'showPart2': Part2,
  'showPart3': Part3,
  'showPart4': Part4,
  'showPart5': Part5,
  'showPart6': Part6,
};

const props = defineProps(['currentComponent', 'candidateId']);

const state = ref({
  currentComponent: componentMap[props.currentComponent],
});

watch(() => props.currentComponent, (newValue) => {
  state.value.currentComponent = componentMap[newValue];
});
</script>
