<template>
   <button class="
        flex
        flex-col
        items-center
        gap-2
        py-1
        sm:py-3
        px-6
        sm:px-0
        border-b-2
        hover:text-neutral-800
        transition
   "
   :disabled="$page.props.filters?.search === name"
   :class="$page.props.filters?.search == name ? 'border-b-neutral-800 text-neutral-800 cursor-not-allowed' : 'border-transparent text-neutral-500'"
   @click.stop.prevent="$emit('querySearch', { id, name })"
   >
       <font-awesome-icon class="text-xs sm:text-sm" :icon="icon" disabled />
        <div class="font-medium text-xs sm:text-sm">
            {{ name }}s
        </div>
   </button>

</template>

<script setup>
    const props = defineProps({
        id: {
            required: true
        },
        name: {
            type: String,
            required: true
        },
        icon: {
            type: String,
            required: true
        },
    });
</script>
