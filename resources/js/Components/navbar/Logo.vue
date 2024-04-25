<template>
   <Link :href="route('home')">
        <svg
            width="70%"
            height="70%"
            viewBox="0 0 102 32"
            class="hidden md:block cursor-pointer text-[#FF5171] font-bold"
            preserveAspectRatio="xMidYMid meet"
        >
            <image
                :xlink:href="imageLogo"
                width="70%"
                height="70%"
                :x="((100 - 70) / 2) + '%'" 
                :y="((100 - 70) / 2) + '%'" 
            />
        </svg>
    </Link>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

import { defineProps } from 'vue';

const props = defineProps({
    imageLogo: {
        type: String,
        required: true,
    },
});

</script>

<style scoped>
    * {
        padding: 0;
    }
    
    .link {
        padding: 0;
        margin: 0;
        text-align: center;
    }

    #container {
        width: 10%;
    }
    
</style>
