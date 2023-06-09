<template>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Basic Details
            </h2>
        </header>
        <form @submit.prevent="handleSubmit"
              class="mt-6 space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                <div class="mb-5">
                    <InputLabel for="emailAddress"
                                value="Email Address" />

                    <TextInput id="emailAddress"
                               type="email"
                               class="mt-1 block w-full"
                               :value="props.defaultData.candidateEmail"
                               required
                               autofocus
                               autocomplete="emailAddress"
                               readonly
                               disabled />

                    <InputError class="mt-2"
                                :message="form.errors.emailAddress" />
                </div>

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
                    <InputLabel for="country"
                                value="Country" />

                    <SelectInput id="country"
                                 class="mt-1 block w-full"
                                 v-model="form.country"
                                 :options="countries"
                                 required
                                 autofocus />

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

                <div class="mb-5">
                    <InputLabel for="candidateName"
                                value="Name of the candidate" />
                    <TextInput id="candidateName"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.candidateName"
                               required
                               autofocus
                               autocomplete="candidateName" />
                    <InputError class="mt-2"
                                :message="form.errors.candidateName" />
                </div>
                <div class="mb-5">
                    <InputLabel for="fatherName"
                                value="Father's Name" />
                    <TextInput id="fatherName"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.fatherName"
                               required
                               autofocus
                               autocomplete="fatherName" />
                    <InputError class="mt-2"
                                :message="form.errors.fatherName" />
                </div>
                <div class="mb-5">
                    <InputLabel for="motherName"
                                value="Mother's Name" />
                    <TextInput id="motherName"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.motherName"
                               required
                               autofocus
                               autocomplete="motherName" />
                    <InputError class="mt-2"
                                :message="form.errors.motherName" />
                </div>
                <div class="mb-5">
                    <InputLabel for="universityName"
                                value="Name of the University" />
                    <TextInput id="universityName"
                               type="text"
                               class="mt-1 block w-full"
                               :value="props.defaultData.university"
                               required
                               autofocus
                               disabled
                               autocomplete="universityName" />
                    <InputError class="mt-2"
                                :message="form.errors.universityName" />
                </div>
                <div class="mb-5">
                    <InputLabel for="dateOfBirth"
                                value="Date of Birth" />
                    <TextInput id="dateOfBirth"
                               type="date"
                               class="mt-1 block w-full"
                               v-model="form.dateOfBirth"
                               required
                               autofocus
                               autocomplete="dateOfBirth" />
                    <InputError class="mt-2"
                                :message="form.errors.dateOfBirth" />
                </div>
                <div class="mb-5">
                    <InputLabel for="gender"
                                value="Gender" />
                    <SelectInput id="gender"
                                 class="mt-1 block w-full"
                                 v-model="form.gender"
                                 :options="genderOptions"
                                 required
                                 autofocus />
                    <InputError class="mt-2"
                                :message="form.errors.gender" />
                </div>
                <div class="mb-5">
                    <InputLabel for="category"
                                value="Category" />
                    <SelectInput id="category"
                                 class="mt-1 block w-full"
                                 v-model="form.category"
                                 :options="categoryOptions"
                                 required
                                 autofocus />
                    <InputError class="mt-2"
                                :message="form.errors.category" />
                </div>
                <div class="mb-5">
                    <InputLabel for="aadhaarNumber"
                                value="Aadhaar Number" />
                    <TextInput id="aadhaarNumber"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.aadhaarNumber"
                               required
                               autofocus
                               autocomplete="aadhaarNumber" />
                    <InputError class="mt-2"
                                :message="form.errors.aadhaarNumber" />
                </div>
                <div class="mb-5">
                    <InputLabel for="passportNumber"
                                value="Passport Number" />
                    <TextInput id="passportNumber"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.passportNumber"
                               required
                               autofocus
                               autocomplete="passportNumber" />
                    <InputError class="mt-2"
                                :message="form.errors.passportNumber" />
                </div>
                <div class="mb-5">
                    <InputLabel for="employed"
                                value="Are you Employed" />
                    <SelectInput id="employed"
                                 class="mt-1 block w-full"
                                 v-model="form.employed"
                                 :options="employedOptions"
                                 required
                                 autofocus />
                    <InputError class="mt-2"
                                :message="form.errors.employed" />
                </div>
                <div class="mb-5"
                     v-if="form.employed === 'yes'">
                    <InputLabel for="employerName"
                                value="Employer Name" />
                    <TextInput id="employerName"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.employerName"
                               :disabled="form.employed === 'no'"
                               required
                               autofocus
                               autocomplete="employerName" />
                    <InputError class="mt-2"
                                :message="form.errors.employerName" />
                </div>
                <div class="mb-5"
                     v-if="form.employed === 'yes'">
                    <InputLabel for="designation"
                                value="Designation" />
                    <TextInput id="designation"
                               type="text"
                               class="mt-1 block w-full"
                               v-model="form.designation"
                               :disabled="form.employed === 'no'"
                               required
                               autofocus
                               autocomplete="designation" />
                    <InputError class="mt-2"
                                :message="form.errors.designation" />
                </div>

            </div>
            <div class="mb-5">
                <PrimaryButton class="mt-5"
                               type="submit"
                               value="Submit">Save and Go to Page 2</PrimaryButton>
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
import TextareaInput from "@/Components/TextareaInput.vue";

import { markRaw, reactive } from "vue";
import { ref } from "vue";

const props = defineProps(['defaultData'])

const form = useForm({
    candidateName: "srijay",
    fatherName: "father",
    motherName: "mother",
    universityName: props.defaultData.university,
    dateOfBirth: "19-06-1992",
    gender: "male",
    category: "SC",
    aadhaarNumber: "123123123",
    passportNumber: "123123123",
    employed: 0,
    employerName: "",
    designation: "",
    contactNumber: "9876543210",
    country: "India",
    nationality: "Indian",
    state: "WB",
    district: 'Darj',
    address: "Medical",
    pinCode: "734012",
});

const employedOptions = markRaw([
    { label: "Yes", value: 1 },
    { label: "No", value: 0 },
]);

const genderOptions = markRaw([
    { label: "Male", value: "male" },
    { label: "Female", value: "female" },
    { label: "Other", value: "others" }
]);

const categoryOptions = markRaw([
    { label: "General", value: "General" },
    { label: "SC", value: "SC" },
    { label: "ST", value: "ST" },
    { label: "BC", value: "BC" },
    { label: "SBC", value: "SBC" },
    { label: "OBC", value: "OBC" },
    { label: "PH", value: "PH" },
    { label: "Ex-Servicemen", value: "Ex-Servicemen" }
]);

const countries = ref([
        { label: "Afghanistan", value: "afghanistan" },
        { label: "Albania", value: "albania" },
        { label: "Algeria", value: "algeria" },
        { label: "Andorra", value: "andorra" },
        { label: "Angola", value: "angola" },
        { label: "Antigua and Barbuda", value: "antigua_and_barbuda" },
        { label: "Argentina", value: "argentina" },
        { label: "Armenia", value: "armenia" },
        { label: "Australia", value: "australia" },
        { label: "Austria", value: "austria" },
        { label: "Azerbaijan", value: "azerbaijan" },
        { label: "Bahamas", value: "bahamas" },
        { label: "Bahrain", value: "bahrain" },
        { label: "Bangladesh", value: "bangladesh" },
        { label: "Barbados", value: "barbados" },
        { label: "Belarus", value: "belarus" },
        { label: "Belgium", value: "belgium" },
        { label: "Belize", value: "belize" },
        { label: "Benin", value: "benin" },
        { label: "Bhutan", value: "bhutan" },
        { label: "Bolivia", value: "bolivia" },
        { label: "Bosnia and Herzegovina", value: "bosnia_and_herzegovina" },
        { label: "Botswana", value: "botswana" },
        { label: "Brazil", value: "brazil" },
        { label: "Brunei", value: "brunei" },
        { label: "Bulgaria", value: "bulgaria" },
        { label: "Burkina Faso", value: "burkina_faso" },
        { label: "Burundi", value: "burundi" },
        { label: "Cabo Verde", value: "cabo_verde" },
        { label: "Cambodia", value: "cambodia" },
        { label: "Cameroon", value: "cameroon" },
        { label: "Canada", value: "canada" },
        { label: "Central African Republic", value: "central_african_republic"},
        { label: "Chad", value: "chad" },
        { label: "Chile", value: "chile" },
        { label: "China", value: "china" },
        { label: "Colombia", value: "colombia" },
        { label: "Comoros", value: "comoros" },
        { label: "Congo (Congo-Brazzaville)", value: "congo_congo_brazzaville" },
        { label: "Costa Rica", value: "costa_rica" },
        { label: "Croatia", value: "croatia" },
        { label: "Cuba", value: "cuba" },
        { label: "Cyprus", value: "cyprus" },
        { label: "Czechia (Czech Republic)", value: "czechia_czech_republic" },
        { label: "Denmark", value: "denmark" },
        { label: "Djibouti", value: "djibouti" },
        { label: "Dominica", value: "dominica" },
        { label: "Dominican Republic", value: "dominican_republic" },
        { label: "Ecuador", value: "ecuador" },
        { label: "Egypt", value: "egypt" },
        { label: "El Salvador", value: "el_salvador" },
        { label: "Equatorial Guinea", value: "equatorial_guinea" },
        { label: "Eritrea", value: "eritrea" },
        { label: "Estonia", value: "estonia" },
        { label: "Eswatini (fmr. Swaziland)", value: "eswatini_fmr_swaziland" },
        { label: "Ethiopia", value: "ethiopia" },
        { label: "Fiji", value: "fiji" },
        { label: "Finland", value: "finland" },
        { label: "France", value: "france" },
        { label: "Gabon", value: "gabon" },
        { label: "Gambia", value: "gambia" },
        { label: "Georgia", value: "georgia" },
        { label: "Germany", value: "germany" },
        { label: "Ghana", value: "ghana" },
        { label: "Greece", value: "greece" },
        { label: "Grenada", value: "grenada" },
        { label: "Guatemala", value: "guatemala" },
        { label: "Guinea", value: "guinea" },
        { label: "Guinea-Bissau", value: "guinea_bissau" },
        { label: "Guyana", value: "guyana" },
        { label: "Haiti", value: "haiti" },
        { label: "Holy See", value: "holy_see" },
        { label: "Honduras", value: "honduras" },
        { label: "Hungary", value: "hungary" },
        { label: "Iceland", value: "iceland" },
        { label: "India", value: "india" },
        { label: "Indonesia", value: "indonesia" },
        { label: "Iran", value: "iran" },
        { label: "Iraq", value: "iraq" },
        { label: "Ireland", value: "ireland" },
        { label: "Israel", value: "israel" },
        { label: "Italy", value: "italy" },
        { label: "Jamaica", value: "jamaica" },
        { label: "Japan", value: "japan" },
        { label: "Jordan", value: "jordan" },
        { label: "Kazakhstan", value: "kazakhstan" },
        { label: "Kenya", value: "kenya" },
        { label: "Kiribati", value: "kiribati" },
        { label: "Korea, South", value: "korea_south" },
        { label: "Kosovo", value: "kosovo" },
        { label: "Kuwait", value: "kuwait" },
        { label: "Kyrgyzstan", value: "kyrgyzstan" },
        { label: "Laos", value: "laos" },
        { label: "Latvia", value: "latvia" },
        { label: "Lebanon", value: "lebanon" },
        { label: "Lesotho", value: "lesotho" },
        { label: "Liberia", value: "liberia" },
        { label: "Libya", value: "libya" },
        { label: "Liechtenstein", value: "liechtenstein" },
        { label: "Lithuania", value: "lithuania" },
        { label: "Luxembourg", value: "luxembourg" },
        { label: "Madagascar", value: "madagascar" },
        { label: "Malawi", value: "malawi" },
        { label: "Malaysia", value: "malaysia" },
        { label: "Maldives", value: "maldives" },
        { label: "Mali", value: "mali" },
        { label: "Malta", value: "malta" },
        { label: "Marshall Islands", value: "marshall_islands" },
        { label: "Mauritania", value: "mauritania" },
        { label: "Mauritius", value: "mauritius" },
        { label: "Mexico", value: "mexico" },
        { label: "Micronesia", value: "micronesia" },
        { label: "Moldova", value: "moldova" },
        { label: "Monaco", value: "monaco" },
        { label: "Mongolia", value: "mongolia" },
        { label: "Montenegro", value: "montenegro" },
        { label: "Morocco", value: "morocco" },
        { label: "Mozambique", value: "mozambique" },
        { label: "Myanmar (formerly Burma)", value: "myanmar_formerly_burma" },
        { label: "Namibia", value: "namibia" },
        { label: "Nauru", value: "nauru" },
        { label: "Nepal", value: "nepal" },
        { label: "Netherlands", value: "netherlands" },
        { label: "New Zealand", value: "new_zealand" },
        { label: "Nicaragua", value: "nicaragua" },
        { label: "Niger", value: "niger" },
        { label: "Nigeria", value: "nigeria" },
        { label: "North Korea", value: "north_korea" },
        { label: "North Macedonia (formerly Macedonia)", value: "north_macedonia_formerly_macedonia" },
        { label: "Norway", value: "norway" },
        { label: "Oman", value: "oman" },
        { label: "Pakistan", value: "pakistan" },
        { label: "Palau", value: "palau" },
        { label: "Palestine State", value: "palestine_state" },
        { label: "Panama", value: "panama" },
        { label: "Papua New Guinea", value: "papua_new_guinea" },
        { label: "Paraguay", value: "paraguay" },
        { label: "Peru", value: "peru" },
        { label: "Philippines", value: "philippines" },
        { label: "Poland", value: "poland" },
        { label: "Portugal", value: "portugal" },
        { label: "Qatar", value: "qatar" },
        { label: "Romania", value: "romania" },
        { label: "Russia", value: "russia" },
        { label: "Rwanda", value: "rwanda" },
        { label: "Saint Kitts and Nevis", value: "saint_kitts_and_nevis" },
        { label: "Saint Lucia", value: "saint_lucia" },
        { label: "Saint Vincent and the Grenadines", value: "saint_vincent_and_the_grenadines"},
        { label: "Samoa", value: "samoa" },
        { label: "San Marino", value: "san_marino" },
        { label: "Sao Tome and Principe", value: "sao_tome_and_principe" },
        { label: "Saudi Arabia", value: "saudi_arabia" },
        { label: "Senegal", value: "senegal" },
        { label: "Serbia", value: "serbia" },
        { label: "Seychelles", value: "seychelles" },
        { label: "Sierra Leone", value: "sierra_leone" },
        { label: "Singapore", value: "singapore" },
        { label: "Slovakia", value: "slovakia" },
        { label: "Slovenia", value: "slovenia" },
        { label: "Solomon Islands", value: "solomon_islands" },
        { label: "Somalia", value: "somalia" },
        { label: "South Africa", value: "south_africa" },
        { label: "South Sudan", value: "south_sudan" },
        { label: "Spain", value: "spain" },
        { label: "Sri Lanka", value: "sri_lanka" },
        { label: "Sudan", value: "sudan" },
        { label: "Suriname", value: "suriname" },
        { label: "Sweden", value: "sweden" },
        { label: "Switzerland", value: "switzerland" },
        { label: "Syria", value: "syria" },
        { label: "Tajikistan", value: "tajikistan" },
        { label: "Tanzania", value: "tanzania" },
        { label: "Thailand", value: "thailand" },
        { label: "Timor-Leste", value: "timor_leste" },
        { label: "Togo", value: "togo" },
        { label: "Tonga", value: "tonga" },
        { label: "Trinidad and Tobago", value: "trinidad_and_tobago" },
        { label: "Tunisia", value: "tunisia" },
        { label: "Turkey", value: "turkey" },
        { label: "Turkmenistan", value: "turkmenistan" },
        { label: "Tuvalu", value: "tuvalu" },
        { label: "Uganda", value: "uganda" },
        { label: "Ukraine", value: "ukraine" },
        { label: "United Arab Emirates", value: "united_arab_emirates" },
        { label: "United Kingdom", value: "united_kingdom" },
        { label: "United States of America", value: "united_states_of_america"},
        { label: "Uruguay", value: "uruguay" },
        { label: "Uzbekistan", value: "uzbekistan" },
        { label: "Vanuatu", value: "vanuatu" },
        { label: "Venezuela", value: "venezuela" },
        { label: "Vietnam", value: "vietnam" },
        { label: "Yemen", value: "yemen" },
        { label: "Zambia", value: "zambia" },
        { label: "Zimbabwe", value: "zimbabwe" },
]);

const handleSubmit = () => {
    form.post(route('student.registration.submit1', [
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
