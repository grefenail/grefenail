<template>
    <div class="flex justify-center">
        <form @submit.prevent="submit" class="w-4/5">
            <div v-if="currentStep == steps.CATEGORY">
                <div class="flex flex-col mt-20">
                    <Heading title="What is your pet?" subtitle="Pick a category" />
                    <div class="grid grid-cols-5 gap-4 mt-4">
                        <template v-for="cat in $page.props.categories">
                            <div class="border rounded-xl border-gray-400">
                                <div :class="{ 'border-black': cat.id === category }" @click="category = cat.id"
                                    class="shadow rounded-xl border  p-4 transition cursor-pointer hover:border-black justify-between">
                                    <font-awesome-icon class="text-sm" :icon="cat.icon" disabled />
                                    <div class="font-semibold">{{ cat.name }}</div>
                                </div>
                            </div> 
                        </template>
                    </div>
                </div>
            </div>

            <!-- <div v-if="currentStep == steps.LOCATION">
                <Heading title="Where is your place located?" subtitle="Help guest find you!" />

                <v-select
                    v-model="location"
                    placeholder="Select a location"
                    label="label" :options="getAll()"
                    value="label"
                    :reduce="country => `${country.id}`" class=""
                />

                <Map :latlng="location" />
            </div> -->

            <!-- <div v-show="currentStep == steps.DETAIL_LIVING">
                <div class="flex flex-col mt-5  ">
                    <Heading title="Share some basics about your place?" subtitle="What amenities do you have?" />

                    <br>

                    <Counter title="Rooms" subtitle="How many rooms do you have?" 
                    @countChange="(n) => roomCount = n.value" />

                    <Counter title="Pets" subtitle="How many pets do you allow?"
                        @countChange="(n) => guestCount = n.value" />

                    <Counter title="Food" subtitle="How many times do you feed the pet?"
                        @countChange="(n) => bathroomCount = n.value" />

                    <Counter title="Walks" subtitle="How many times do you walk the pet?"
                    @countChange="(n) => bathroomCount = n.value" />
                </div>
            </div> -->

            <div v-if="currentStep == steps.DESCRIPTION">
                <div class="flex flex-col ">
                    <Heading title="Enter the Essentials" subtitle="Short and sweet works best!" />

                    <TextInput id="petName" v-model="petName" placeholder="Pet Name" type="text" class="my-2 block w-full" />
                    <TextInput id="ownerName" v-model="ownerName" placeholder="Owner Name" type="text" class="my-2 block w-full" />
                    <TextInput id="address" v-model="address" placeholder="Address" type="text" class="my-2 block w-full" />
                    <TextInput id="email" v-model="email" placeholder="Email" type="text" class="my-2 block w-full" />
                    <div class="flex">
                        <div class="w-1/2 mr-2">
                            <TextInput
                                id="petAge"
                                v-model="petAge"
                                placeholder="Pet Age"
                                type="number"
                                class="my-2 block w-full"
                                inputmode="numeric"
                                @input="validatePetAge($event)"
                            />
                          </div>
                        <div class="w-1/2 ml-2">
                          <TextInput
                            id="contact"
                            v-model="contact"
                            placeholder="Contact No."
                            type="text"
                            class="my-2 block w-full"
                            inputmode="tel"
                          />
                        </div>
                      </div>
                    <TextArea id="description" v-model="description" placeholder="Description" type="text"
                        class="my-2 block w-full" />
                </div>
            </div>

            <div v-show="currentStep == steps.IMAGES">
                <div class="flex flex-col mt-20">
                    <Heading title="Add photos of your pet" subtitle="Show people what your pet looks like!" />

                    <div id="my-dropzone" class="dropzone mt-10"></div>
                    <div id="previews" class="flex justify-center mt-2"></div>
                </div>
            </div>

            <!-- <div v-if="currentStep == steps.PRICES">
                <div class="flex flex-col mt-20">
                    <Heading title="Now, set your price" subtitle="How much do you charge per night?" />

                    <TextArea id="price" v-model="price" placeholder="Price:" type="number" class="my-2 block w-full" />
                </div>
            </div> -->

            <br>
            <div class="flex align-middle mt-2" :class="{'justify-end': currentStep === steps.CATEGORY, 'justify-between': currentStep > steps.CATEGORY}">
                <PrimaryButton type="button" v-if="currentStep > steps.CATEGORY" @click="previousStep">
                    Back
                </PrimaryButton>
                
                <DangerButton 
                    type="button" 
                    @click="nextStep" 
                    v-if="currentStep < totalSteps"
                    :class="{'mt-12': currentStep === steps.CATEGORY}">
                    Continue
                </DangerButton>

                <DangerButton type="submit" v-if="currentStep === totalSteps" :class="{ 'bg-red-300' : processingForm }">
                    Save
                </DangerButton>
            </div>

        </form>
    </div>
</template>

<script setup>
    import { computed, onMounted, reactive, ref } from 'vue';
    import { useForm, router } from "@inertiajs/vue3";
    import { useCountries } from '@/Composables/countries.js';
    import { useNotification } from '@/Stores/notification.js';
    import Dropzone from "dropzone";

    import Counter from '@/Components/Counter.vue';
    import DangerButton from '@/Components/DangerButton.vue';
    import Heading from '@/Components/Heading.vue';
    import Map from '@/Components/Map.vue'
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import TextArea from '@/Components/TextArea.vue';

    const processingForm = ref(false);

    const currentStep = ref(1);
    const category = ref('');
    // const location = ref([]);
    // const guestCount = ref(1);
    // const roomCount = ref(1);
    // const bathroomCount = ref(1);
    const petName = ref('');
    const ownerName = ref('');
    const address = ref('');
    const email = ref('');
    const petAge = ref('');
    const contact = ref('');
    const description = ref('');

    const store = useNotification();

    const steps = reactive({
        "CATEGORY": 1,
        "DESCRIPTION": 2,
        "IMAGES": 3,
        // "PRICES": 4,
        // "LOCATION": 2,
        // "DETAIL_LIVING": 2,
    });

    const { getAll } = useCountries();

    const totalSteps = computed(() =>
    {
        return Object.keys(steps).length;
    });

    let myDropzone = '';

    onMounted(() => {
        myDropzone = new Dropzone("div.dropzone", {
            autoProcessQueue: false,
            thumbnailWidth: 100,
            thumbnailHeight: 100,
            previewsContainer: "#previews",
            paramName: "file",
            maxFilesize: 4,
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png",
            url: "/listing",
            addRemoveLinks: true,
            clickable: true,
            dictDefaultMessage: "Drag your files here",
            dictFallbackMessage: "Your browser does not support drag'n'drop file uploads.",
            dictInvalidFileType: "You can't upload files of this type.",
        });
        myDropzone.on("addedfile", function (file) {
            // console.log("Archivo agregado: ", file.name);
        });
    })

    const validatePetAge = (event) => {
        let newValue = event.target.value;

        // Check if newValue contains only numeric characters
        if (/^\d+$/.test(newValue)) {
            newValue = parseInt(newValue); // Parse the value to an integer
            newValue = Math.max(0, newValue); // Ensure value is not negative
            petAge.value = newValue; // Update the pet age value
        } else {
            // If newValue contains non-numeric characters, prevent it from being added to the input
            event.target.value = ''; // Clear the input value
            petAge.value = ''; // Update the pet age value to an empty string or any default value as needed
        }
    };

    // const validateContact = (event) => {
    //     let newValue = event.target.value;

    //     // Check if newValue contains only numeric characters
    //     if (/^\d+$/.test(newValue)) {
    //         contact.value = newValue; // Update the contact value with the cleaned value
    //     } else {
    //         // If newValue contains non-numeric characters, prevent it from being added to the input
    //         event.target.value = ''; // Clear the input value
    //         contact.value = ''; // Update the contact value to an empty string or any default value as needed
    //     }
    // };

    const nextStep = () => {
    // Add validation checks based on the current step
    switch (currentStep.value) {
        case steps.CATEGORY:
            if (!category.value) {
                store.addToast({ message: 'Please select a category', type: 'error' });
                return; // Stop the function execution if validation fails
            }
            break;
        // case steps.LOCATION:
        //     if (!location.value.length) {
        //         store.addToast({ message: 'Please select a location', type: 'error' });
        //         return; // Stop the function execution if validation fails
        //     }
        //     break;
        // case steps.DETAIL_LIVING:
        //     // Add validation for detail living step if needed
        //     break;
        case steps.DESCRIPTION:
            if (!petName.value || !ownerName.value || !address.value || !email.value || !petAge.value || !contact.value || !description.value) {
                store.addToast({ message: 'Please fill in all fields', type: 'error' });
                return; // Stop the function execution if validation fails
            }
            break;
        case steps.IMAGES:
            if (!myDropzone.files.length) {
                store.addToast({ message: 'Please upload at least one image', type: 'error' });
                return; // Stop the function execution if validation fails
            }
            break;
        // case steps.PRICES:
        //     if (!price.value) {
        //         store.addToast({ message: 'Please enter a price', type: 'error' });
        //         return; // Stop the function execution if validation fails
        //     }
        //     break;
        default:
            break;
    }

    // If validation passes, proceed to the next step
    currentStep.value++;
};
    const previousStep = () =>  currentStep.value--;

    function submit()
    {
        processingForm.value = true;

        const form = useForm({
            category: category.value,
            description: description.value,
            petName: petName.value,
            ownerName: ownerName.value,
            address: address.value,
            email: email.value,
            petAge: petAge.value,
            contact: contact.value,
            image: myDropzone.files,
        });


        form.post(route('listing.store'), {
            preserveScroll: true,
            onSuccess: (res) => {
                console.log("Res", res);
                store.addToast({message: res.props.flash.toast});
                router.visit(route('home'));
            },
            onError: (err) => {
                for (let key in err)
                {
                    store.addToast({message: err[key], type: 'error'});
                }
            },
            onFinish: visit => processingForm.value = false
        });
    }
</script>
