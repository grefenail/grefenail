<template>
    <div>
        <hr class="my-4" />
        <div class="text-md text-neutral-600">Age: {{ props.listing.pet_age }} year old</div>

        <hr class="my-4" />
        <div class="text-md text-neutral-600">Gender: {{ props.listing.gender.gender }} </div>

        <hr class="my-4" />
        <div class="text-md text-neutral-600">Size: {{ props.listing.size.size }} </div>

        <hr class="my-4" />
        <div class="text-md text-neutral-600">Sterile: {{ props.listing.is_sterile ? 'Yes' : 'No'}} </div>

        <hr class="my-4" />
        <div class="text-md text-neutral-600">Address: {{ props.listing.user.address }} </div>

        <hr class="my-4" />
        <div class="text-md text-neutral-600">Contact Number: {{ props.listing.user.contact }} </div>

        <hr class="my-4" />
        <div class="text-md text-neutral-600">Description</div>
        <br>
        <div class="text-sm sm:text-md text-neutral-600">{{ props.listing.description }}</div>

        <!-- <hr class="my-4" />
        <div class="text-md text-neutral-600">Vaccinations</div>
        <br>
        <li class="list-group-item"> {{props.listing.vaccinations.vaccine.name }} </li> -->

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
  