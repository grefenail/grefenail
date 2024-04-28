<template>

    <Head :title="title" />

    <ToastList />

    <NavBar></NavBar>

    <Container style="min-height: 100vh">
        <slot />
    </Container>
    <Footer style="margin-top: auto"></Footer>
    
</template>

<script setup>

    import { Head } from '@inertiajs/vue3';

    import NavBar from '@/Components/navbar/Navbar.vue'
    import ToastList from '@/Components/ToastList.vue';
    import Container from '../Components/Container.vue';
    import Footer from '@/Components/footer/Footer.vue'

    defineProps({
        title: {
            type: String,
            required: true
        },
    });

</script>



