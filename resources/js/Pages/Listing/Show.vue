<template>

    <Layout title="Add Your Pet">
        <div class="mt-5 sm:mt-8 w-full lg:w-4/6 mx-auto lg:mb-0 mb-10">
            
            <div class="text-2xl font-bold capitalize mb-2 sm:mb-0">
                {{ props.listing.pet_name }}
            </div>
            
            <div class="sm:block hidden">
                <br>
            </div>

            <Carousel class="relative w-full sm:h-[500px] h-[250px]" v-slot="{currentSlide}">
                <Slide v-for="(image, index) in props.listing.images" :key="image.id">
                    <div v-show="currentSlide === index + 1" class="absolute top-0 left-0 w-full max-h-full h-full ">
                        <img class="object-cover w-full h-full" :src="image.url" alt="image" />
                    </div>
                </Slide>
            </Carousel>

            <div class="grid grid-cols-1 lg:grid-cols-3 md:gap-6 md:mt-6 mt-3 ">
                <div class="col-span-1 lg:col-span-2">
                    <div class="col-span-4 flex flex-col gap-4">
                        <div class="flex flex-col gap-2">
                            <div class="flex gap-2 text-base sm:text-xl font-semibold">
                                Owned by {{ props.listing.user.first_name }} {{ props.listing.user.last_name }}
                            </div>
                        </div>
                        <div class="flex flex-row items-center gap-4 text-neutral-600">
                            <div> 
                                <font-awesome-icon class="font-sm text-[#595959]" :icon="props.listing.category.icon" />
                            </div>
                        </div>
                    </div>
                    <ListingDetail :listing="props.listing"/>
                </div>
                <div class="shadow p-4">
                    <DangerButton @click="toggleReservationForm" :class="{ 'opacity-25': btnDisabled }" class="w-full" :disabled=btnDisabled v-if="$page.props.auth.user">
                        Adopt
                    </DangerButton>
                    <DangerButton class="w-full opacity-25 cursor-not-allowed" v-else>Log in to Adopt</DangerButton>
                </div>
                
            </div>

        </div>

        <ReservationForm :showModal="showReservationForm" @closeReservationForm="closeReservationForm"/>

    </Layout>
</template>

<script setup>

    import { defineProps, ref } from 'vue';
    import { useNotification } from '@/Stores/notification.js';
    import DangerButton from '@/Components/DangerButton.vue';
    import Layout from '@/Layouts/Layout.vue';
    import ListingDetail from '@/Components/ListingDetail.vue'
    import ReservationForm from '../../Components/reservation/ReservationForm.vue';

    import 'air-datepicker/air-datepicker.css';
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
    const btnDisabled = ref(false);

    const showReservationForm = ref(false);

    const closeReservationForm = () => showReservationForm.value = false;

    function toggleReservationForm()
    {
        showReservationForm.value = true;
    }


    // function submit()
    // {
    //     btnDisabled.value = true;

    //     router.visit(route('reservation.store'),
    //     {
    //         method: 'post',
    //         data: {
    //             startDate: startDate.value,
    //             endDate: endDate.value,
    //             listingId: props.listing.id,
    //         },
    //         preserveScroll: true,
    //         onSuccess: (res) => {
    //             store.addToast({ message: res.props?.flash?.toast});
    //         },
    //         onError : (err) =>
    //         {
    //             for (let key in err)
    //             {
    //                 store.addToast({message: err[key], type: 'error'});
    //             }
    //         },
    //         onFinish: visit => {
    //             btnDisabled.value = false;
    //         },
    //     })
    // }
</script>
