<template>
    <AppLayout title="Add Your Pet">
        <Container>
            <ToastList />
            <div :class="{ 'height': !showFormListing }">
                <div class="flex justify-center items-center ">
                    <div class="text-center ">
                        <div v-show="!showFormListing" class="slider">
                            <h1 class="text-4xl sm:text-6xl font-bold" :style="{ color: COLORS.brightred }">
                                Petty
                            </h1>
                            <p class="text-xl sm:text-3xl font-bold mt-5" :style="{ color: COLORS.red }">Find Your Pet a Loving Home</p> 
                            <div class="mt-8">
                                <div class="font-bold">{{ currentValue }} pets</div>
                                <div class="text-sm sm:text-base mt-1">are currently listed on the site</div> 
                            </div>
                            <br>
                            <button @click="showFormListing = true" class="my-4 rounded-lg bg-gradient-to-r from-[#e61e4d] via-[#d70466] to-[#bd1e59] text-white px-4 py-3">
                                <p class="font-semibold">
                                    <font-awesome-icon icon="fa-solid fa-house" /> Start
                                </p>
                            </button>
                        </div>  
                    </div>
                </div>
            </div>
            <transition>
                <CreateListingForm v-if="showFormListing" />
            </transition>
        </Container>

    </AppLayout>
</template>


<script setup>
    import moment from 'moment';
    import { computed, ref } from 'vue';
    
    import AppLayout from '@/Layouts/AppLayout.vue';
    import CreateListingForm from '@/Components/listing/CreateListingForm.vue'
    import Container from '@/Components/Container.vue';
    import ToastList from '@/Components/ToastList.vue';
    import { COLORS } from '../../Components/constants/themes';

    const currentValue = ref(7);
    const showFormListing = ref(false);

</script>

<style scoped>
    .v-enter-active,
    .v-leave-active {
        transition: opacity 0.5s ease;
    }

    .v-enter-from,
    .v-leave-to {
        opacity: 0;
    }

    .height {
        height: 75vh;
        display: flex;
        justify-content: center; 
        align-items: center; 
    }

</style>
