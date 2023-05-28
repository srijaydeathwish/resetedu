<template>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Contact and Residential Details
            </h2>
        </header>
        <form @submit.prevent="form.post(route('registration.submit2', ['distance', 'sgvu']))"
              class="mt-6 space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                <!-- <TextInput id="candidateId"
                               type="hidden"
                               v-model="form.candidateId"
                               :model-value="props.candidateId"
                               required
                               /> -->
                <div class="mb-5">
                    <InputLabel for="contactNumber"
                                value="Contact Number" />

                    <TextInput id="contactNumber"
                               type="tel"
                               class="mt-1 block w-full"
                               v-model="form.contactNumber"
                               required
                               autofocus
                               autocomplete="contactNumber" />

                    <InputError class="mt-2"
                                :message="form.errors.contactNumber" />
                </div>



                <div class="mb-5">
                    <InputLabel for="emailAddress"
                                value="Email Address" />

                    <TextInput id="emailAddress"
                               type="email"
                               class="mt-1 block w-full"
                               v-model="form.emailAddress"
                               required
                               autofocus
                               autocomplete="emailAddress" />

                    <InputError class="mt-2"
                                :message="form.errors.emailAddress" />
                </div>

                <div class="mb-5">
                    <InputLabel for="country"
                                value="Country" />

                    <TextInput id="country"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.country"
                               required
                               autofocus
                               autocomplete="country" />

                    <InputError class="mt-2"
                                :message="form.errors.country" />
                </div>

                <div class="mb-5">
                    <InputLabel for="nationality"
                                value="Nationality" />

                    <TextInput id="nationality"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.nationality"
                               required
                               autofocus
                               autocomplete="nationality" />

                    <InputError class="mt-2"
                                :message="form.errors.nationality" />
                </div>


                <div class="mb-5">
                    <InputLabel for="state"
                                value="State" />

                    <TextInput id="state"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.state"
                               required
                               autofocus
                               autocomplete="state" />

                    <InputError class="mt-2"
                                :message="form.errors.state" />
                </div>


                <div class="mb-5">
                    <InputLabel for="district"
                                value="District" />

                    <TextInput id="district"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.district"
                               required
                               autofocus
                               autocomplete="district" />

                    <InputError class="mt-2"
                                :message="form.errors.district" />
                </div>


                <div class="mb-5">
                    <InputLabel for="address"
                                value="Address" />

                    <TextareaInput id="address"
                                   class="mt-1 block w-full"
                                   v-model="form.address"
                                   required
                                   autofocus
                                   autocomplete="address" />

                    <InputError class="mt-2"
                                :message="form.errors.address" />
                </div>


                <div class="mb-5">
                    <InputLabel for="pinCode"
                                value="Pin Code" />

                    <TextInput id="pinCode"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.pinCode"
                               required
                               autofocus
                               autocomplete="pinCode" />

                    <InputError class="mt-2"
                                :message="form.errors.pinCode" />
                </div>

            </div>
            <div class="mb-5">
                <PrimaryButton class="mt-5"
                               type="submit"
                               value="Submit">Save and Go to Page 3</PrimaryButton>
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
import TextareaInput from "@/Components/TextareaInput.vue";

const props = defineProps('candidateId');

const form = useForm({
    candidateId: props.candidateId,
    contactNumber: "9876543210",
    emailAddress: "srijay@gmail.com",
    country: "India",
    nationality: "Indian",
    state: "WB",
    district: 'Darj',
    address: "Medical",
    pinCode: "734012",
});
</script>
