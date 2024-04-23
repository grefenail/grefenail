<template>

    <Layout title="Add Your Pet">
        <form @submit.prevent="submit">
            <div class="mt-8 w-4/6 mx-auto">
                
                <div class="text-2xl font-bold capitalize">
                    {{ props.listing.pet_name }}
                </div>
                <br>

                <!-- <Swiper 
                :modules='[EffectCube, Pagination]'
                :effect="cube"
                :grabCursor="true"
                :pagination="{ 
                    bulletClass: 'custom-bullet-class',
                    bulletElement: 'button',
                    type: 'bullets',
                 }"
                >
                    <SwiperSlide v-for="image in props.listing.images">
                        <img class="object-cover w-full h-[500px]" :src="image.url" alt="image" />
                    </SwiperSlide>
                </Swiper> -->

                <Carousel class="relative w-full h-[500px]" v-slot="{currentSlide}">
                    <Slide v-for="(image, index) in props.listing.images" :key="image.id">
                        <div v-show="currentSlide === index + 1" class="absolute top-0 left-0 w-full max-h-full h-full ">
                            <img class="object-cover w-full h-full" :src="image.url" alt="image" />
                        </div>
                    </Slide>
                </Carousel>

                <div class="grid grid-cols-1 lg:grid-cols-3 md:gap-6 mt-6 mb-">
                    <div class="col-span-1 lg:col-span-2">
                        <div class="col-span-4 flex flex-col gap-4">
                            <div class="flex flex-col gap-2">
                                <div class="flex gap-2 text-xl font-semibold">
                                    Owned by {{ props.listing.user.first_name }}
                                </div>
                            </div>
                            <div class="flex flex-row items-center gap-4 text-neutral-600">
                                <div> <font-awesome-icon class="font-sm text-[#595959]" :icon="props.listing.category.icon" />
                                </div>
                            </div>
                        </div>
                        <ListingDetail :listing="props.listing"/>

                    </div>
                    <div class="shadow p-4">
                        <DangerButton type="submit" :class="{ 'opacity-25': btnDisabled }" class="w-full" :disabled=btnDisabled v-if="$page.props.auth.user">
                            Adopt
                        </DangerButton>
                        <DangerButton class="w-full opacity-25 cursor-not-allowed" v-else>Log in to Adopt</DangerButton>
                    </div>
                    
                </div>

            </div>
            
        </form>
    </Layout>
</template>

<script setup>

    import { defineProps, onMounted, ref, watch } from 'vue';
    import { router } from '@inertiajs/vue3';
    import moment from 'moment';
    import { useNotification } from '@/Stores/notification.js';
    import DangerButton from '@/Components/DangerButton.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import Layout from '@/Layouts/Layout.vue';
    import Map from '@/Components/Map.vue'
    import ListingDetail from '@/Components/ListingDetail.vue'

    import AirDatepicker from 'air-datepicker';
    import 'air-datepicker/air-datepicker.css';
    import localeEn from 'air-datepicker/locale/en';
    import { Swiper, SwiperSlide } from "swiper/vue";
    import { EffectCube, Pagination } from "swiper";
    import 'swiper/swiper-bundle.min.css'
    import 'swiper/swiper.min.css'

    import Carousel from '@/Components/Carousel.vue'
    import Slide from '@/Components/Slide.vue'

    const props = defineProps({
        listing: {
            type: Object,
            required: true, 
        }
    });

    const store = useNotification();
    const startDate = ref(moment().format("DD/MM/YYYY"));
    const endDate = ref(moment().add(2, 'days').format("DD/MM/YYYY"));
    const btnDisabled = ref(false);


    watch(endDate,  (endNewValue, endOldValue) =>
    {
        let start = moment(startDate.value, "DD/MM/YYYY").toDate();
        let end = moment(endNewValue, "DD/MM/YYYY").toDate();

        const test1 = new Date(start).getTime();
        const test2 = new Date(end).getTime();

        const diffInMs = test2 - test1

        let total = Math.floor(diffInMs / 86400000) * props.normalPrice;

        console.log(total);

        if (total <= 0)
        {
            store.addToast({ message: 'Please select a correct date range', type: 'error' });

            totalAmount.value = 0;

            return false;
        }

        totalAmount.value = Math.round(total);
    });

    function submit()
    {
        btnDisabled.value = true;

        router.visit(route('reservation.store'),
        {
            method: 'post',
            data: {
                startDate: startDate.value,
                endDate: endDate.value,
                listingId: props.listing.id,
            },
            preserveScroll: true,
            onSuccess: (res) => {
                store.addToast({ message: res.props?.flash?.toast});
                // form.reset('');
            },
            onError : (err) =>
            {
                for (let key in err)
                {
                    store.addToast({message: err[key], type: 'error'});
                }
            },
            onFinish: visit => {
                btnDisabled.value = false;
            },
        })
    }
</script>

<style>
    .swiper {
        overflow: visible;
    }
</style>