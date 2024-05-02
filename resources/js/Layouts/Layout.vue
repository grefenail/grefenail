<template>
    <Head :title="props.title"/>
    <ToastList />
    <NavBar></NavBar>
    <Container>
        <slot />
    </Container>
    <Footer></Footer>
</template>

<script setup>
    import { Head } from '@inertiajs/vue3';
    import { defineProps } from 'vue';
    import NavBar from '@/Components/navbar/Navbar.vue'
    import ToastList from '@/Components/ToastList.vue';
    import Container from '../Components/Container.vue';
    import Footer from '@/Components/Footer.vue'

    const props = defineProps({
        title: {
            type: String,
            required: true
        },
    });

</script>
