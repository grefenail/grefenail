<template>
    <div>
        <hr class="my-4" />
        <div class="text-md text-neutral-600">Pet Age: {{ props.listing.petAge }}</div>
        <hr class="my-4" />
        <div class="text-md text-neutral-600">Address</div>
        <br />
        <div class="text-md text-neutral-600">{{ props.listing.address }}</div>
        <hr class="my-4" />
        <div class="text-md text-neutral-600">Description</div>
        <br />
        <div class="text-md text-neutral-600">{{ props.listing.description }}</div>
        <hr class="my-4" />
    </div>
  </template>
  
  <script setup>
    const props = defineProps({
    listing: {
        type: Object,
        required: true,
    },
    });
  </script>
  