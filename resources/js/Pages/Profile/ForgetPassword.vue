<template>
    <!-- USE FOR FORGOT PASSWORD EMAIL VERIFICATION FEATURE  -->
    <Layout title="Edit Your Profile">
        <form @submit.prevent="submit">
            <h4 class="text-lg text-left mb-3 font-bold">Login Credentials</h4>
            <div>
                <InputLabel for="email" class="labels">Email</InputLabel>
                <input type="email" class="form_control" name="email" v-model="form.email">
                <!-- Bind the input field to the form.email using v-model -->
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

    const form = useForm({
        email: '' // Initialize form.email
    });

    const submit = () => {
        let url = route('forget.password.post');
        form.post(url);
    };
</script>