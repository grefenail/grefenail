<template>

    <Head :title="title" />

    <ToastList />

    <NavBar></NavBar>

    <Container>
        <slot />
    </Container>
    
</template>

<script setup>

    import { Head } from '@inertiajs/vue3';

    import NavBar from '@/Components/navbar/Navbar.vue'
    import ToastList from '@/Components/ToastList.vue';
    import Container from '../Components/Container.vue';

    defineProps({
        title: {
            type: String,
            required: true
        },
    });

</script>



