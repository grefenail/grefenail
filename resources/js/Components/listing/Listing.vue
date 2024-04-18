<template>
    <Link :href="route('listing.show', props.listing.slug)">
    <div class="col-span-1 cursor-pointer">
        <div class="flex gap-2 w-full">
            <div class="aspect-square w-full relative overflow-hidden rounded-xl">
                <img class="object-cover h-full w-full hover:scale-110 transition"
                    rel="preload"
                    as="image"
                    :src="props.listing.image"
                    alt="Image living"
                    height="400"
                    width="400"
                />
                <font-awesome-icon icon="fa-solid fa-heart" class="fill-white absolute -top[2px] -right-[2px]" />
            </div>
        </div>
        <br>
        <div class="font-light text-neutral-500">
            {{ props.listing.pet_name }}
        </div>
        <div class="font-light text-neutral-500">
            {{ props.listing.address}}
        </div>
    </div>
</Link>
</template>

<script setup>
    import { Link } from '@inertiajs/vue3';

    const props = defineProps({
        listing: {
            type: Object,
            required: true, 
        }
    });

</script>

