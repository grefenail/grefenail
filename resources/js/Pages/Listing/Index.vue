<template>
    <Layout title="Add Your Pet">
        <Container>

            <ToastList />
            <div class="flex justify-center items-center height">
                <div class="text-center ">
                    <div v-show="!showFormListing" class="slider">
                        <h1 class="text-6xl font-bold text-[#FF385C]">
                            Petty
                        </h1>
                        <p class="text-3xl font-bold mt-5">Find Your Pet a Loving Home</p> 
                        <div class="mt-8">
                            <div class="font-bold">{{ currentValue }} pets</div>
                            <div>are currently listed on the site</div> 
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
            
            

            <transition>
                <CreateListingForm v-if="showFormListing" />
            </transition>

        </Container>
    </Layout>
</template>


<script setup>
    import moment from 'moment';
    import { computed, ref } from 'vue';

    import Layout from '@/Layouts/Layout.vue';
    import CreateListingForm from '@/Components/listing/CreateListingForm.vue'
    import Container from '@/Components/Container.vue';
    import ToastList from '@/Components/ToastList.vue';

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
    }

</style>
