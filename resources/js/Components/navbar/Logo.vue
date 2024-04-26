<template>
    <center id="container">
        <Link class="link" :href="route('home')">
            <center>
                <svg
                width="80%"
                height="80%"
                viewBox="0 0 102 32"
                class="hidden md:block cursor-pointer text-[#FF5171] font-bold"
            >
                <image
                    :xlink:href="props.source"
                    width="100%"
                    height="100%"
                />
            </svg>
        </center>  
        </Link>
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
