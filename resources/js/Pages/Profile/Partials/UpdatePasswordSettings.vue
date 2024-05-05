<script setup>
import { ref } from 'vue';
import { useForm  } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useNotification } from '../../../Stores/notification.js';

const store = useNotification();

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.post(route('update.password.post'), {
        // errorBag: 'updatePassword',
        // preserveScroll: true,
        onSuccess: (suc) => {
            console.log(suc,"sccccccccc");
            // form.reset()
            store.addToast({message: 'Profile successfully updated!'});
        },
       
        onError: (err) => { 
            console.log(err,"errrrrrrrrrrrrrrrr");
            store.addToast({ message: 'Please try again', type: 'error' });
            // form.reset();
        },
    });
    console.log(form,"formmmmmmmmmm")
};
</script>

<template>
    <form @submit.prevent="updatePassword">
        <div class="bg-white shadow-md px-2 lg:px-0 lg:p-2 rounded-md">
            <div class="md:p-3 lg:py-3 py-2">
                <h4 class="sm:text-xl ft mb-2 sm:mb-3 font-bold">Update Password</h4>
                <p class="text-xs sm:text-base block font-medium text-gray-700">
                    Ensure your account is using a long, random password to stay secure.
                </p>
                <hr className="my-2 sm:my-5 border-solid border-blue-gray-50" />   

                <div class="col-span-6 sm:col-span-4 mb-2 sm:mb-5">
                    <InputLabel for="current_password" value="Current Password" />
                    <TextInput
                        id="current_password"
                        ref="currentPasswordInput"
                        v-model="form.current_password"
                        type="password"
                        class="mt-1 block w-full"
                        autocomplete="current-password"
                    />
                    <InputError :message="form.errors.current_password" class="mt-2" />          
                </div>

                <div class="col-span-6 sm:col-span-4 mb-2 sm:mb-5">
                    <InputLabel for="password" value="New Password" />
                    <TextInput
                        id="password"
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full"
                        autocomplete="new-password"
                    />
                    <InputError :message="form.errors.password" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mb-4 sm:mb-0">
                    <InputLabel for="password_confirmation" value="Confirm Password" />
                    <TextInput
                        id="password_confirmation"
                        v-model="form.password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        autocomplete="new-password"
                    />
                    <InputError :message="form.errors.password_confirmation" class="mt-2" />
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
