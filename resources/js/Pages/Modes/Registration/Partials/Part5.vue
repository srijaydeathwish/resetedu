<template>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Programme Details
            </h2>
        </header>
        <form @submit.prevent="form.post(route('registration.submit5', ['distance', 'sgvu']))"
              class="mt-6 space-y-6">
            <div class="mb-5">
                <InputLabel for="modeOfPayment"
                            value="Mode of Payment" />

                <TextInput id="modeOfPayment"
                           type="text"
                           class="mt-1 block w-full"
                           v-model="form.modeOfPayment"
                           required
                           autofocus
                           autocomplete="modeOfPayment" />

                <InputError class="mt-2"
                            :message="form.errors.modeOfPayment" />
            </div>

            <div class="mb-5">
                <InputLabel for="bankAccount"
                            value="Bank Account" />

                <TextInput id="bankAccount"
                           type="text"
                           class="mt-1 block w-full"
                           v-model="form.bankAccount"
                           required
                           autofocus
                           autocomplete="bankAccount" />

                <InputError class="mt-2"
                            :message="form.errors.bankAccount" />
            </div>

            <div class="mb-5">
                <InputLabel for="depositDate"
                            value="Deposit Date" />

                <TextInput id="depositDate"
                           type="date"
                           class="mt-1 block w-full"
                           v-model="form.depositDate"
                           required
                           autofocus
                           autocomplete="depositDate" />

                <InputError class="mt-2"
                            :message="form.errors.depositDate" />
            </div>
            <div class="mb-5">
                <PrimaryButton class="mt-5"
                               type="submit"
                               value="Submit"
                               @click="submitForm">Save and Go to Page 5</PrimaryButton>
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

const props = defineProps({
    candidateId: Number,
});

const form = useForm({
    candidateId: props.candidateId,

    modeOfPayment: 'cash',
    bankAccount: 'sbi',
    depositDate: '',
});
</script>
