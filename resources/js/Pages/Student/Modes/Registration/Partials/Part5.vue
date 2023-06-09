<template>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                File Uploads
            </h2>
        </header>
        <form class="mt-6 space-y-6">
            <div class="mb-5">
                <InputLabel value="Passport Size Photo" />
                <file-pond name="pphoto"
                           ref="pphoto"
                           v-bind='filePondOptions'
                           :server="serverOptions1"
                           v-bind:files="myFiles"
                           v-on:processfile="handleUploadSuccess1"
                           v-on:init="handleFilePondInit" />
            </div>
            <div class="mb-5">
                <InputLabel value="Signature" />
                <file-pond name="sphoto"
                           ref="sphoto"
                           v-bind='filePondOptions'
                           :server="serverOptions2"
                           v-bind:files="myFiles"
                           v-on:processfile="handleUploadSuccess2"
                           v-on:init="handleFilePondInit" />
            </div>
            <Link v-show="isDone.file1 && isDone.file2"
                  class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                  :href="route('student.registration.showForm', {
                      mode: props.defaultData.mode,
                      university: props.defaultData.university,
                      formPart: 'part6'
                  })">Submit and got to page 6</Link>
        </form>
    </div>
</template>

<script setup>
// Import Vue FilePond
import vueFilePond from "vue-filepond";

// Import FilePond styles
import "filepond/dist/filepond.min.css";

// Import FilePond plugins
// Please note that you need to install these plugins separately

// Import image preview plugin styles
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

// Import image preview and file type validation plugins
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
import { markRaw } from "vue";
import { usePage, Link } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import { ref } from "vue";
import { reactive } from "vue";

// Create component
const FilePond = vueFilePond(
    FilePondPluginFileValidateType,
    FilePondPluginImagePreview
);

const props = defineProps(['defaultData'])

const isDone = reactive({
    file1: false,
    file2: false
})

const serverOptions1 = markRaw({
    url: route('student.registration.pphoto', [props.defaultData.mode, props.defaultData.university]),
    headers: {
        'X-CSRF-TOKEN': usePage().props.csrf_token,
    }
})

const serverOptions2 = markRaw({
    url: route('student.registration.sphoto', [props.defaultData.mode, props.defaultData.university]),
    headers: {
        'X-CSRF-TOKEN': usePage().props.csrf_token,
    }
})

const filePondOptions = markRaw({
    allowMultiple: false,
    allowRevert: false,
    allowProcess: true,
    instantUpload: false,
    acceptedFileTypes: "image/jpeg, image/png, image/webp",
    labelIdle: "Drop files here...",
    allowImagePreview: true,
    allowRemove: true,
    labelInvalidField: 'hi'
})

const handleFilePondInit = () => {
    console.log('FilePond has initialized', ref.pphoto)
}

const handleUploadSuccess1 = () => {
    isDone.file1 = true
}

const handleUploadSuccess2 = () => {
    isDone.file2 = true
}

</script>

<style lang="scss" scoped>
</style>
