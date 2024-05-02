<script setup>
import { onMounted, ref } from 'vue';
import { router, useForm } from '@inertiajs/vue3';
import Layout from '@/Layouts/Layout.vue';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useNotification } from '@/Stores/notification.js';

const store = useNotification();

const props = defineProps({
    user: Object,
});

const { user } = props;

const user_id = ref(user.id);
const first_name = ref(user.first_name);
const last_name = ref(user.last_name);
const email = ref(user.email);
const contact = ref(user.contact);
const address = ref(user.address);

const form = useForm({
    user_id: user_id.value,
    first_name: first_name.value, 
    last_name: last_name.value,
    email: email.value, 
    contact: contact.value, 
    address: address.value, 
});

const submit = () =>
{
    let url = route('profile.update');

    form.put(url, {
        onSuccess: (res) => {
            router.visit(route('profile.index'));
            store.addToast({message: 'Profile successfully updated!'});
        },
        onError : (err) => {
            errorToast({message: 'Please try again', type: 'error'});
        }
    });

};
</script>

<template>
    <form @submit.prevent="submit">
        <div class="bg-white shadow-md px-2 lg:px-0 lg:p-2 rounded-md">
            <div class="md:p-3 lg:py-3 py-2">
                <h4 class="sm:text-xl text-left mb-1 sm:mb-3 font-bold">Profile Settings</h4>
                <p class="text-xs sm:text-base block font-medium text-gray-700">
                    Manage and protect your account
                </p>      
                <hr className="my-2 sm:my-5 border-solid border-blue-gray-50" />
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-5 mb-2 sm:mb-5">
                    <div>
                        <InputLabel for="first_name" class="labels">First Name</InputLabel>
                        <TextInput  id="first_name" type="text" :placeholder=user.first_name v-model="form.first_name" class="input mt-1 w-full" autocomplete="first_name"></TextInput>
                        <InputError class="mt-2" />
                    </div>
                    <div>
                        <InputLabel for="last_name" class="labels">Last Name</InputLabel>
                        <TextInput id="last_name" type="text" :placeholder=user.last_name v-model="form.last_name" class="input mt-1 w-full" autocomplete="last_name"></TextInput>
                        <InputError class="mt-2" />
                    </div>
                    <div>
                        <InputLabel for="address" class="labels">Address</InputLabel>
                        <TextInput id="address" type="text" :placeholder=user.address v-model="form.address" class="input mt-1 w-full" autocomplete="address"></TextInput>
                        <InputError class="mt-2" />
                    </div>
                    <div>
                        <InputLabel for="contact_number" class="labels">Contact No.</InputLabel>
                        <TextInput id="contact_number" :placeholder=user.contact v-model="form.contact" type="text" class="input mt-1 w-full" autocomplete="contact"></TextInput>
                        <InputError class="mt-2" />
                    </div>
                </div>           
                <div class="mb-4 sm:mb-0">
                    <InputLabel for="email" class="labels">Email</InputLabel>
                    <TextInput id="email" :placeholder=user.email v-model="form.email" type="text" class="input mt-1 w-full" autocomplete="email"></TextInput>
                    <InputError class="mt-2" />
                </div>
                <div class="sm:mt-5 text-center">
                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                      Save
                    </PrimaryButton>
                </div>             
            </div>                         
            
        </div>
    </form>
</template>
