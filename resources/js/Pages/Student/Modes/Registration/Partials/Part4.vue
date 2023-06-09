<template>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Programme Details
            </h2>
        </header>
        <form @submit.prevent="handleSubmit"
              class="mt-6 space-y-6">
            <div class="mb-5">
                <InputLabel for="modeOfPayment"
                            value="Mode of Payment" />

                <SelectInput id="modeOfPayment"
                             class="mt-1 block w-full"
                             v-model="form.modeOfPayment"
                             :options="paymentOptions"
                             required
                             autofocus />

                <InputError class="mt-2"
                            :message="form.errors.modeOfPayment" />
            </div>

            <div class="mb-5">
                <InputLabel for="bankAccount"
                            value="Bank Account" />

                <SelectInput id="bankAccount"
                             class="mt-1 block w-full"
                             v-model="form.bankAccount"
                             :options="bankOptions"
                             required
                             autofocus />

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
import SelectInput from "@/Components/SelectInput.vue";
import { markRaw } from "vue";

const props = defineProps(['defaultData'])

const form = useForm({
    modeOfPayment: '',
    bankAccount: '',
    depositDate: '',
});

const paymentOptions = markRaw([
    { label: "Cash", value: "cash" },
    { label: "Cheque", value: "cheque" },
    { label: "Online", value: "online" }
]);

const bankOptions = markRaw([
    { label: "SBI - 35468747485", value: "sbi" },
    { label: "PNB - 35468747485", value: "pnb" },
    { label: "Kotak - 35468747485", value: "kotak" }
]);

const handleSubmit = () => {
    form.patch(route('student.registration.submit4', [
        props.defaultData.mode,
        props.defaultData.university,
    ]),
        {
            onSuccess: () => alert('success'),
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
