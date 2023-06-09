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
                        <PrimaryButton @click="addSession">Add Session</PrimaryButton>
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full text-left text-sm font-light">
                                            <thead class="border-b font-medium dark:border-neutral-500">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-4">Month</th>
                                                    <th scope="col"
                                                        class="px-6 py-4">Year</th>
                                                    <th scope="col"
                                                        class="px-6 py-4">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="border-b dark:border-neutral-500"
                                                    v-for="c in courseSession"
                                                    :key="c.index">
                                                    <td class="whitespace-nowrap px-6 py-4">{{ c.month }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">{{ c.year }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        <PrimaryButton @click="editSession(c.id)">Edit</PrimaryButton>
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
        <!-- Add Course -->
        <Modal :show="showAddSession">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Add Session
                </h2>

                <p class="mt-1 text-sm text-gray-600">

                </p>

                <div class="mt-6">
                    <form @submit.prevent="handleSubmitAddSession">
                        <div class="mb-5">
                            <InputLabel for="month"
                                        value="Month" />
                            <TextInput id="month"
                                       type="text"
                                       class="mt-1 block w-full"
                                       v-model="formToAdd.month"
                                       required
                                       autofocus
                                       autocomplete="month" />
                            <InputError class="mt-2"
                                        :message="formToAdd.errors.month" />
                        </div>
                        <div class="mb-5">
                            <InputLabel for="year"
                                        value="Year" />
                            <TextInput id="year"
                                       type="text"
                                       class="mt-1 block w-full"
                                       v-model="formToAdd.year"
                                       required
                                       autofocus
                                       autocomplete="year" />
                            <InputError class="mt-2"
                                        :message="formToAdd.errors.year" />
                        </div>
                        <PrimaryButton class="mt-5"
                                       type="submit"
                                       value="Submit">Save</PrimaryButton>
                    </form>
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeAddModal"> Cancel </SecondaryButton>
                </div>
            </div>
        </Modal>

        <Modal :show="showEditSession">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Edit Session
                </h2>

                <p class="mt-1 text-sm text-gray-600">

                </p>
                <div class="mt-6">
                    <form @submit.prevent="handleSubmitEditSession">
                        <div class="mb-5">
                            <InputLabel for="month"
                                        value="Month" />
                            <TextInput id="month"
                                       type="text"
                                       class="mt-1 block w-full"
                                       v-model="formToEdit.month"
                                       required
                                       autofocus
                                       autocomplete="month" />
                            <InputError class="mt-2"
                                        :message="formToEdit.errors.month" />
                        </div>
                        <div class="mb-5">
                            <InputLabel for="year"
                                        value="Year" />
                            <TextInput id="year"
                                       type="text"
                                       class="mt-1 block w-full"
                                       v-model="formToEdit.year"
                                       required
                                       autofocus
                                       autocomplete="year" />
                            <InputError class="mt-2"
                                        :message="formToEdit.errors.year" />
                        </div>
                        <PrimaryButton class="mt-5"
                                       type="submit"
                                       value="Submit">Save</PrimaryButton>
                    </form>
                </div>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeEditModal"> Cancel </SecondaryButton>
                </div>
            </div>
        </Modal>

    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/Admin/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import Modal from '@/Components/Modal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import { ref, computed, toRef } from 'vue';

const props = defineProps(['courseSession']);

const allCourseSession = toRef(props, 'courseSession');

// Add Course
const formToAdd = useForm({
    month: '',
    year: ''
})

const showAddSession = ref(false);

function addSession () {
    showAddSession.value = true;
}
function closeAddModal () {
    showAddSession.value = false;
}

function handleSubmitAddSession () {
    formToAdd.post(route('admin.session'),
        {
            onSuccess: () => {
                showAddSession.value = false;
                formToAdd.reset()
            },
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


// Edit Course

const formToEdit = useForm({
    month: '',
    year: ''
})

const showEditSession = ref(false);
const modalSessionId = ref(null);

function editSession (id) {
    showEditSession.value = true;
    modalSessionId.value = id;
    formToEdit.month = singleSession.value.month
    formToEdit.year = singleSession.value.year
}

function closeEditModal () {
    showEditSession.value = false;
    modalSessionId.value = null;
    formToEdit.month = null
    formToEdit.year = null
}

const singleSession = computed(() => {
        return allCourseSession.value.find((singleSession) => singleSession.id === modalSessionId.value);
});

function handleSubmitEditSession () {
    formToEdit.patch(route('admin.session.edit', singleSession.value.id),
        {
            onSuccess: () => {
                showEditSession.value = false;
                formToEdit.reset()
            },
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
