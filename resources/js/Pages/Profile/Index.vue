<template>
    <Layout title="Edit Your Profile">
      <form action="">
        <div class="container rounded bg-white mt-5 mb-5">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="md:col-span-1">
              <div class="flex flex-col items-center p-3 py-5">
                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" id="dropdown-user-menu" width="100" height="100" aria-hidden="true" role="presentation" class="rounded cursor-pointer" focusable="false">
                  <path d="m16 .7c-8.437 0-15.3 6.863-15.3 15.3s6.863 15.3 15.3 15.3 15.3-6.863 15.3-15.3-6.863-15.3-15.3-15.3zm0 28c-4.021 0-7.605-1.884-9.933-4.81a12.425 12.425 0 0 1 6.451-4.4 6.507 6.507 0 0 1 -3.018-5.49c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5a6.513 6.513 0 0 1 -3.019 5.491 12.42 12.42 0 0 1 6.452 4.4c-2.328 2.925-5.912 4.809-9.933 4.809z" fill="#717171"></path>
                </svg>
                <br>
                <span class="font-bold">Edogaru</span>
                <br>
                <span class="text-gray-500">ganrongshen@gmail.com</span>
              </div>
            </div>
            <div class="md:col-span-2">
              <div class="p-3 py-5">
                <h4 class="text-left mb-3">Profile Settings</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <InputLabel for="first_name" class="labels">First Name</InputLabel>
                    <TextInput id="first_name" type="text" class="input mt-1 w-full" autocomplete="first_name"></TextInput>
                    <InputError class="mt-2" />
                  </div>
                  <div>
                    <InputLabel for="last_name" class="labels">Last Name</InputLabel>
                    <TextInput id="last_name" type="text" class="input mt-1 w-full" autocomplete="last_name"></TextInput>
                    <InputError class="mt-2" />
                  </div>
                  <div>
                    <InputLabel for="address" class="labels">Address</InputLabel>
                    <TextInput id="address" type="text" class="input mt-1 w-full" autocomplete="address"></TextInput>
                    <InputError class="mt-2" />
                  </div>
                  <div>
                    <InputLabel for="contact_number" class="labels">Contact No.</InputLabel>
                    <TextInput id="contact_number" type="text" class="input mt-1 w-full" autocomplete="contact_number"></TextInput>
                    <InputError class="mt-2" />
                  </div>
                </div>
              </div>
              <div class="p-3 py-5 grid gap-4">
                <h4 class="text-left mb-3">Login Credentials</h4>
                <div>
                  <InputLabel for="email" class="labels">Email</InputLabel>
                  <TextInput id="email" type="text" class="input mt-1 w-full" autocomplete="email"></TextInput>
                  <InputError class="mt-2" />
                </div>
                <div>
                  <InputLabel for="new_password" class="labels">New Password</InputLabel>
                  <TextInput id="new_password" type="text" class="input mt-1 w-full" autocomplete="new_password"></TextInput>
                  <InputError class="mt-2" />
                </div>
                <div>
                  <InputLabel for="confirm_password" class="labels">Confirm Password</InputLabel>
                  <TextInput id="confirm_password" type="text" class="input mt-1 w-full" autocomplete="confirm_password"></TextInput>
                  <InputError class="mt-2" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-5 text-center">
          <button class="btn-primary profile-button" type="button">Save</button>
        </div>
      </form>
    </Layout>
  </template>

<script setup>
    import { onMounted, ref } from 'vue';
    import { useForm } from '@inertiajs/vue3';
    import Layout from '@/Layouts/Layout.vue';
    import ActionMessage from '@/Components/ActionMessage.vue';
    import FormSection from '@/Components/FormSection.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import SecondaryButton from '@/Components/SecondaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';


    onMounted(() => {
        const bootstrapCSS = document.createElement('link');
        bootstrapCSS.rel = 'stylesheet';
        bootstrapCSS.href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css';


    });

    const props = defineProps({
        user: Object,
    });

    // const form = useForm({
    //     first_name: props.user.first_name,
    //     last_name: props.user.last_name,
    //     email: props.user.email,
    //     photo: null,
    // });

</script>


<style scoped>
    .labels {
        font-size: 11px
    }
</style>