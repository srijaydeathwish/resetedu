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
                        <div class="mt-6 space-y-6 text-center">
                            <img src="https://img.icons8.com/?size=512&id=13902&format=png" alt="" width="100" class="inline">
                            You have successfully applied. We will get back to you as soon as possible!
                            <br>
                            <Link class="mt-5" href="/dashboard">Go Home</Link>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/Student/AuthenticatedLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import { reactive } from 'vue';

</script>
