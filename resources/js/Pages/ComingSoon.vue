
<template>
    <div class="text-center border h-screen pt-5">
        <svg
            width="100%"
            height="80%"
            viewBox="0 0 100 35"
            class="hidden md:block cursor-pointer text-[#FF5171] font-bold"
            preserveAspectRatio="xMidYMid meet"
        >
            <image
                :xlink:href="comingSoonBanner"
                width="100%"
                height="100%"        
            />
        </svg>
        <div class="flex flex-row items-center justify-center">
            <p class="mr-6 font-bold" style="color: #C75859; ">FOLLOW US ON</p>
            <a href="#" class="mr-4"><FontAwesomeIcon :icon="facebookIcon" class="text-[24px]" style="color: #1877F2" /></a>
            <a href="#" class=""><FontAwesomeIcon :icon="instagramIcon" class="instagram text-[19px] text-white p-[3px] rounded-lg" /></a>  
        </div>
    </div>
</template>

<script setup>
    const comingSoonBanner = "../images/ComingSoonBanner.png";
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
    import { faFacebook, faInstagram } from '@fortawesome/free-brands-svg-icons'

    const facebookIcon = faFacebook;
    const instagramIcon = faInstagram;
</script>

<style>
    .instagram {
        background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%); 
        background: -webkit-radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);    
    }
</style>