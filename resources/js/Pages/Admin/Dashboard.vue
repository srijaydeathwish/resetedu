<script setup>
import AuthenticatedLayout from '@/Layouts/Admin/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

</script>

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
                        <div class="flex items-center justify-center flex-col">
                            <!-- main card -->
                            <div class="bg-[#F4F5FA] p-10 rounded-xl">
                                <!-- headers content-->
                                <div class="flex flex-col justify-center items-center text-center">
                                    <div class="max-w-sm font-bold font-sans">
                                        Get Started
                                    </div>
                                </div>

                                <!-- subscriptions -->
                                <Link
                                :href="route('admin.courses')"
                                     class="flex flex-col md:flex-row space-x-0 md:space-x-8 space-y-12  md:space-y-0 justify-center items-center mt-10">
                                    <div class="bg-[#FFFBEC] rounded-xl">
                                        <div
                                             class="flex flex-col p-8 rounded-xl bg-white shadow-xl translate-x-4 translate-y-4 w-96 md:w-auto">
                                            <div class="mt-3 font-semibold text-lg">Courses</div>
                                        </div>
                                    </div>

                                </Link>

                                <Link
                                :href="route('admin.students')"
                                     class="flex flex-col md:flex-row space-x-0 md:space-x-8 space-y-12  md:space-y-0 justify-center items-center mt-10">
                                    <div class="bg-[#FFFBEC] rounded-xl">
                                        <div
                                             class="flex flex-col p-8 rounded-xl bg-white shadow-xl translate-x-4 translate-y-4 w-96 md:w-auto">
                                            <div class="mt-3 font-semibold text-lg">Students</div>
                                        </div>
                                    </div>

                                </Link>

                                <Link
                                :href="route('admin.session')"
                                     class="flex flex-col md:flex-row space-x-0 md:space-x-8 space-y-12  md:space-y-0 justify-center items-center mt-10">
                                    <div class="bg-[#FFFBEC] rounded-xl">
                                        <div
                                             class="flex flex-col p-8 rounded-xl bg-white shadow-xl translate-x-4 translate-y-4 w-96 md:w-auto">
                                            <div class="mt-3 font-semibold text-lg">Session</div>
                                        </div>
                                    </div>

                                </Link>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</AuthenticatedLayout>
</template>
