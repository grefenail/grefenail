

<template>
    <div
        class="md:border-[1px] py-2 md:m-auto md:rounded-full md:shadow-md hover:shadow-md transition cursor-pointer"
    >
        <div class="flex flex-row items-center justify-between">
            <div class="hidden sm:block text-sm font-semibold px-6">Anywhere</div>
            <div
                class="hidden sm:block text-sm font-semibold px-6 border-x-[1px] text-center"
            >
                Any time
            </div>
            <div
                class="text-sm pl-2 sm:pl-6 pr-2 text-gray-600 gap-3 flex items-center"
            >
                <div class="hidden sm:block">Add Listing</div>
                <div class="px-2 py-1 sm:py-1.5 rounded-full text-white" :style="{ 'background-color': COLORS.brightred }">
                    <font-awesome-icon
                        class="text-sm"
                        icon="fa-solid fa-magnifying-glass"
                    />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { COLORS } from '../constants/themes';


</script>
