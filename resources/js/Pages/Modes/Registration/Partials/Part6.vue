<template>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Declaration by the Applicant
            </h2>
        </header>
        <form @submit.prevent="form.post(route('registration.submit6', ['distance', 'sgvu']))"
              class="mt-6 space-y-6">
            <div class="mb-5">
                <!-- <InputLabel for="modeOfPayment"
                            value="Mode of Payment" /> -->
                <div>
                    <p class="mb-5">
                        I hereby declare that entries made by me in this admission form and the documents submitted by me
                        along with it, are true to the best of my knowledge, in all respects and in any case, if any
                        information is found to be false, this shall entail automatic cancellation of my admission and
                        forfeiture of all fee deposited, besides rendering me liable to such action as the University may
                        deem proper.
                    </p>

                    <p class="mb-5">I take note that my admission to the University and continuation on its roll are subject
                        to the provisions of rules of the University, issued from time to time. I shall abide by the rules
                        of discipline and proper conduct. I am fully aware of the law regarding ragging as well as the
                        punishment and that if, found guilty on this account I am liable to be punished appropriately. I
                        hereby undertake that I shall not indulge in any act of ragging.</p>

                    <p class="mb-5">In such circumstances, I will have no claim for refund of fees deposited by me the
                        University.</p>
                </div>
                <Checkbox id="declaration"
                          v-model="form.declaration"
                          required
                          autofocus
                          autocomplete="declaration" />
                          <InputLabel value="I Agree" />

                <InputError class="mt-2"
                            :message="form.errors.declaration" />
            </div>

            <div class="mb-5">
                <PrimaryButton class="mt-5"
                               type="submit"
                               value="Submit"
                               @click="submitForm">Submit My Application</PrimaryButton>
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Checkbox from "@/Components/Checkbox.vue";

const props = defineProps({
    candidateId: Number,
});

const form = useForm({
    candidateId: props.candidateId,

    declaration: 0,
});
</script>
