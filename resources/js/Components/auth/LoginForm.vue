<template>
    <DialogModal :show="showModal" @close="$emit('closeLoginForm')" maxWidth="xl">
        <template #title>
            <div class="font-bold">
                Login
            </div>
            
        </template>

        <template #content>
            <h3 class="font-bold text-base sm:text-lg mb-3">Welcome to Petty</h3>
            <form @submit.prevent="submit">
                <div class="col-span-6 sm:col-span-4">
                    <TextInput
                        id="email"
                        v-model="form.email"
                        placeholder="Enter your email"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError :message="form.errors.email" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4 mt-3">
                    <TextInput
                        type="password"
                        id="password"
                        v-model="form.password"
                        placeholder="Password"
                        class="mt-1 block w-full"
                    />

                    <InputError :message="form.errors.password" class="mt-2" />
                </div>

                <button :disabled="form.processing" class="mt-4 sm:mt-8 w-full bg-[#DB0C63] border-[#243c5a] text-white py-2 px-4 rounded-lg">
                    <div class="sm:text-lg font-semibold">
                        Continue
                    </div>
                </button>
                <!-- USE FOR FORGOT PASSWORD EMAIL VERIFICATION FEATURE  -->
                <!-- <a :href="route('forget.password')">Forget Password</a> -->
            </form>

            <!-- <a :href="route('login.redirect', 'github')" :disabled="form.processing" as="button" class="w-full rounded-lg flex justify-between align-middle px-6 py-2.5 bg-white border border-black hover:bg-black hover:text-white transition duration-500 ">
                <font-awesome-icon class="text-lg" icon="fa-brands fa-github" />
                <p class="font-semibold text-md">Continue with Github</p>
                <p></p>
            </a> -->

        </template>

    </DialogModal>
</template>

<script setup>
    import { defineProps } from 'vue';
    import DialogModal from '@/Components/DialogModal.vue';
    import TextInput from '@/Components/TextInput.vue';
    import { router, useForm } from '@inertiajs/vue3';
    import InputError from '../InputError.vue';

    import { useNotification } from '@/Stores/notification.js';

    const store = useNotification();

    const emit = defineEmits(['closeLoginForm'])

    const props = defineProps({
        showModal: { default: false, type: Boolean},
        errors: Object
    });

    const form = useForm({email: "", password: ""});

    const submit = () =>
    {
        let url = route('app.login');

        form.post(url, {
            onSuccess: (res) => {
                router.visit(route('home'))
                emit('closeLoginForm');
                store.addToast({message: 'Login successfull'});
            },
            onError : (err) => {
                console.log(err);
                store.addToast({message: 'Please try again', type: 'error'});
            }
        });

    };

</script>

