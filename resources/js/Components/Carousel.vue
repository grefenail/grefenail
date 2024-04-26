<template>
    <div class="border">
        <slot :currentSlide="currentSlide"/>

        <!-- navigation -->
        <div >
            <div @click="prevSlide" class="absolute top-1/2 left-5 cursor-pointer flex w-12 h-12 rounded-full  text-white text-xl bg-gray-400 bg-opacity-50 hover:bg-gray-500 items-center justify-center">
                <font-awesome-icon :icon="chevronLeftIcon"/>
            </div>
            <div @click="nextSlide" class="absolute top-1/2 right-5 cursor-pointer flex w-12 h-12 rounded-full  text-white text-xl bg-gray-400 bg-opacity-50 hover:bg-gray-500 items-center justify-center">
                <font-awesome-icon :icon="chevronRightIcon" />
            </div>
        </div>

        <!-- pagination -->
        <div class="absolute bottom-5 transform -translate-x-1/2 left-1/2 flex space-x-2">
            <span v-for="(slide, index) in getSlideCount" :key="slide.id" @click="goToSlide(index)" :class="{'bg-gray-100 bg-opacity-50': index + 1 !== currentSlide, 'pagination-highlight': index + 1 === currentSlide }" class="cursor-pointer inline-block w-3 h-3 rounded-full shadow-md transition-colors duration-300">
            </span>
        </div>
    </div>
</template>

<script setup>
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
    import { faChevronLeft, faChevronRight } from '@fortawesome/free-solid-svg-icons'
    import { defineProps, ref, onMounted } from 'vue';

    const chevronLeftIcon = faChevronLeft;
    const chevronRightIcon = faChevronRight;

    const currentSlide = ref(1);
    const getSlideCount = ref(null);

    //next slide
    const nextSlide = () => {
        if (currentSlide.value === getSlideCount.value){
            currentSlide.value = 1;
            return;
        }
        currentSlide.value +=1
    }

    //prev slide
    const prevSlide = () => {
        if(currentSlide.value === 1){
            currentSlide.value = 1;
            return;
        }
        currentSlide.value-=1
    }

    const goToSlide = (index) => {
        currentSlide.value = index+1
    }

    onMounted(() => {
        getSlideCount.value = document.querySelectorAll(".slide").length;
        
    })
</script>

<style>
    .pagination-highlight{
        background-color: #C75959
    }
</style>