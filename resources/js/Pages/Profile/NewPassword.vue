
<template>
    <!-- USE FOR FORGOT PASSWORD EMAIL VERIFICATION FEATURE  -->
    <Layout title="Edit Your Profile">
        <form @submit.prevent="submit">
            <h4 class="text-lg text-left mb-3 font-bold">Login Credentials</h4>
            <div>
                <InputLabel for="email" class="labels" v-model="form.email">Email</InputLabel>
                <input type="email" class="form_control" name="email" v-model="form.email" autocomplete="email">
                <InputLabel for="password" class="labels" v-model="form.password"  autocomplete="new-password">Password</InputLabel>
                <input type="password" class="form_control" name="password" v-model="form.password">
                <InputLabel for="password_confirmation" class="labels" v-model="form.password_confirmation"  autocomplete="new-password">Confirm</InputLabel>
                <input type="password" class="form_control" name="password_confirmation" v-model="form.password_confirmation">
            </div>
            <div class="sm:mt-5 text-center mb-10 lg:mb-0">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </Layout>
</template>

<script setup>
     import { useForm } from '@inertiajs/vue3';
    import Layout from '@/Layouts/Layout.vue';
    import InputLabel from '@/Components/InputLabel.vue';

    const props = defineProps(['token']);

    const form = useForm({
        email: "",
        password:"",
        password_confirmation:"",
        token: props.token,
    });

    const submit = () => {
        console.log(form.email);
        console.log(form.password);
        console.log(form.password_confirmation);
        console.log(form.token);
        let url = route('reset.password.post');
        form.post(url);
    };
</script>