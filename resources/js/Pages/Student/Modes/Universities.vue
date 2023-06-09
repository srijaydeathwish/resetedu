<script setup>
import AuthenticatedLayout from '@/Layouts/Student/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps ({
    universities: Object
})

</script>

<template>
    <Head title="Modes" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ universities.mode }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ universities.heading }}</h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Choose the university you want to apply to.
                            </p>
                        </header>

                        <div class="mt-6 space-y-6">
                            <div class="grid grid-cols-3 gap-3">
                                <div class="col-span-1" v-for="item in universities.list" :key="item.index">
                                    <Link :href="route('student.registration.showForm', [universities.mode, item.slug])"
                                          class="p-6 max-w-sm mx-auto bg-white rounded-xl shadow-lg  ease-in-out duration-300 hover:shadow-2xl flex items-center space-x-4">
                                    <img :src="item.media"
                                         alt=""
                                         class="mx-auto">
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

