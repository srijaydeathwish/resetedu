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
                        <PrimaryButton @click="addCourse">Add Course</PrimaryButton>
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full text-left text-sm font-light">
                                            <thead class="border-b font-medium dark:border-neutral-500">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-4">Course Name</th>
                                                    <th scope="col"
                                                        class="px-6 py-4">Code</th>
                                                    <th scope="col"
                                                        class="px-6 py-4">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="border-b dark:border-neutral-500"
                                                    v-for="c in courses"
                                                    :key="c.index">
                                                    <td class="whitespace-nowrap px-6 py-4">{{ c.title }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">{{ c.code }}</td>
                                                    <td class="whitespace-nowrap px-6 py-4">
                                                        <PrimaryButton @click="editCourse(c.id)">Edit</PrimaryButton>
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
        <Modal :show="showAddCourse">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Add Course
                </h2>

                <p class="mt-1 text-sm text-gray-600">

                </p>

                <div class="mt-6">
                    <form @submit.prevent="handleSubmitAddCourse">
                        <div class="mb-5">
                            <InputLabel for="title"
                                        value="Course Title" />
                            <TextInput id="title"
                                       type="text"
                                       class="mt-1 block w-full"
                                       v-model="formToAdd.title"
                                       required
                                       autofocus
                                       autocomplete="title" />
                            <InputError class="mt-2"
                                        :message="formToAdd.errors.title" />
                        </div>
                        <div class="mb-5">
                            <InputLabel for="code"
                                        value="Course Code" />
                            <TextInput id="code"
                                       type="text"
                                       class="mt-1 block w-full"
                                       v-model="formToAdd.code"
                                       required
                                       autofocus
                                       autocomplete="code" />
                            <InputError class="mt-2"
                                        :message="formToAdd.errors.code" />
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

        <Modal :show="showEditCourse">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900">
                    Edit Course
                </h2>

                <p class="mt-1 text-sm text-gray-600">

                </p>
                <div class="mt-6">
                    <form @submit.prevent="handleSubmitEditCourse">
                        <div class="mb-5">
                            <InputLabel for="title"
                                        value="Course Title" />
                            <TextInput id="title"
                                       type="text"
                                       class="mt-1 block w-full"
                                       v-model="formToEdit.title"
                                       required
                                       autofocus
                                       autocomplete="title" />
                            <InputError class="mt-2"
                                        :message="formToEdit.errors.title" />
                        </div>
                        <div class="mb-5">
                            <InputLabel for="code"
                                        value="Course Code" />
                            <TextInput id="code"
                                       type="text"
                                       class="mt-1 block w-full"
                                       v-model="formToEdit.code"
                                       required
                                       autofocus
                                       autocomplete="code" />
                            <InputError class="mt-2"
                                        :message="formToEdit.errors.code" />
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

const props = defineProps(['courses']);

const allCourses = toRef(props, 'courses');

// Add Course
const formToAdd = useForm({
    title: '',
    code: ''
})

const showAddCourse = ref(false);

function addCourse () {
    showAddCourse.value = true;
}
function closeAddModal () {
    showAddCourse.value = false;
}

function handleSubmitAddCourse () {
    formToAdd.post(route('admin.courses'),
        {
            onSuccess: () => {
                showAddCourse.value = false;
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
    title: '',
    code: ''
})

const showEditCourse = ref(false);
const modalCourseId = ref(null);

function editCourse (id) {
    showEditCourse.value = true;
    modalCourseId.value = id;
    formToEdit.title = singleCourse.value.title
    formToEdit.code = singleCourse.value.code
}

function closeEditModal () {
    showEditCourse.value = false;
    modalCourseId.value = null;
    formToEdit.title = null
    formToEdit.code = null
}

const singleCourse = computed(() => {
        return allCourses.value.find((singleCourse) => singleCourse.id === modalCourseId.value);
});

function handleSubmitEditCourse () {
    formToEdit.patch(route('admin.courses.edit', singleCourse.value.id),
        {
            onSuccess: () => {
                showEditCourse.value = false;
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
