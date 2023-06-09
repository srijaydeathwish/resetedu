<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
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
                                    <div class="font-light max-w-lg mt-5 text-sm">
                                        All devices come with free delivery or pickup as standard. See information on
                                        available shopping
                                        options for your location.
                                    </div>
                                </div>

                                <!-- subscriptions -->
                                <div
                                     class="flex flex-col md:flex-row space-x-0 md:space-x-8 space-y-12  md:space-y-0 justify-center items-center mt-10">
                                    <Link :href="route('student.mode.choose')" class="bg-[#FFFBEC] rounded-xl">
                                        <div
                                             class="flex flex-col p-8 rounded-xl bg-white shadow-xl translate-x-4 translate-y-4 w-96 md:w-auto">
                                            <div class="mt-3 font-semibold text-lg">Registration</div>
                                        </div>
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

<script setup>
import AuthenticatedLayout from '@/Layouts/Student/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

</script>
