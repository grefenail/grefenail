

<template>
    <button :type="type" class="inline-flex items-center justify-center px-6 sm:px-10 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest bg-[#DB0C63] hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
        <slot />
    </button>
</template>

<script setup>
import { COLORS } from '../Components/constants/themes';
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>
