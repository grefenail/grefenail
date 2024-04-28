<template>
    <center>
    <svg
        viewBox="0 0 140 50"
        class="block cursor-pointer text-[#FF5171] font-bold w-[90px] sm:w-[150px]"
    >
        <Link class="link" :href="route('home')">
            <image
                :xlink:href="props.source"
                width="100%"
                height="100%"
            />
        </Link>
    </svg>
    </center>

    
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

import { defineProps } from 'vue';

const props = defineProps({
    source: {
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
