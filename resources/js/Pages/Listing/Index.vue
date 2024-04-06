<template>
    <Layout title="Share Your Space">
        <Container>

            <ToastList />

            <div class="text-center mt-20 flex justify-center w-full lg:w-3/6 mx-auto">
                <div class="w-full lg:w-7/12 mt-12">
                    <div v-show="!showFormListing">
                        <h1 class="text-6xl font-bold text-[#FF385C]">
                            Petty
                        </h1>

                        <p class="text-7xl font-bold mt-5">${{ totalPrice }}</p>
                        <p class="mt-8">
                            <div class="font-bold">{{ currentValue }} nights</div>
                            <div>Earn an estimated ${{ totalPrice / currentValue}} per night</div>
                        </p>

                        <input id="minmax-range" type="range" min="1" :max="lastDayOfMonth" v-model="currentValue"
                            @input="updateCurrentValue" @change="showcurrentValue = false"
                            class="w-full mt-8 h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">

                        <button @click="showFormListing = true"
                            class="my-4 rounded-lg bg-gradient-to-r from-[#e61e4d] via-[#d70466] to-[#bd1e59] text-white px-4 py-3">
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
    const price = ref(181);
    const showcurrentValue = ref(false);
    const showFormListing = ref(false);
    const lastDayOfMonth = ref(moment().endOf('month').format('D'));

    const totalPrice = computed(() => {
        return price.value * currentValue.value
    });
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
</style>
