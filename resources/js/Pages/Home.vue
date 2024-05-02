
<template>
    <Layout title="Home">
        <main class="py-5">
            <NoResults v-if="props.listings.data && props.listings.data.length <= 0" />
            <transition-group tag="div" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-4 md:gap-8 mb-10"
                appear
                @before-enter="beforeEnter"
                @enter="enter">            
                        <Listing v-for="(listing, index) in props.listings.data" :key="listing.id" :listing="listing" class="listing-item" :data-index="index"/>    
            </transition-group>
        </main>
    </Layout>
</template>

<script setup>
    import { defineProps } from 'vue';
    import Layout from '@/Layouts/Layout.vue';
    import Listing from '@/Components/listing/Listing.vue';
    import NoResults from '@/Components/listing/NoResults.vue';
    import gsap from 'gsap';

    const props = defineProps({
        listings: {
            type: Object,
            required: false,
            default: [],
        }
    });

    const beforeEnter = (el) => {
        el.style.opacity = 0;
        el.style.transform = 'translateY(100px)'

    }

    const enter = (el, done) => {
        gsap.to(el,{
            opacity: 1,
            y:0,
            duration:0.8,
            onComplete: done,
            delay: el.dataset.index * 0.05
        })
    }
</script>

<style scoped>
    * {
        text-decoration: none;
    }
</style>
