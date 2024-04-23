<template>
    <footer class="bg-footer-color text-gray-200 py-10 mt-12">
        <div class="container mx-auto flex flex-wrap justify-center items-center ">
            <div class="w-full md:w-1/5 mb-8 md:mb-0 ">
              <Logo />
              <p>&copy; 2024 Petty. All rights reserved. </p>
            </div>
            <div class="w-full md:w-1/5 text-center mb-8 md:mb-0 ">
              <a href="#" class="block hover:text-white hover:text-lg transition">About Us</a>
              <!-- route not work -->
              <a href="{{ route('terms_and_service') }}" class="block hover:text-white hover:text-lg mt-2 transition">Terms and Service</a>
            </div>
            <div class="w-full md:w-1/5 text-center mb-8 md:mb-0">
              <a href="#" class="block hover:text-white hover:text-lg">Collaboration</a>
              <a href="#" class="block hover:text-white hover:text-lg mt-2">Contact Us</a>
            </div>
            <div class="w-full h-full md:w-1/5 mb-8 md:mb-0 flex flex-col items-center">          
                <div class="flex flex-col">
                    <p class="mb-2 underline">Follow Us</p>
                  <a href="#" class="mb-2 hover:text-white"><FontAwesomeIcon :icon="facebookIcon" /> Facebook</a>
                  <a href="#" class=" mb-2 hover:text-white"><FontAwesomeIcon :icon="instagramIcon" /> Instagram</a>
                  <a href="mailto:Petty@gmail.com" class=" hover:text-white"><FontAwesomeIcon :icon="emailIcon" /> Email</a>
                </div>
            </div>
          </div>
    </footer>
  </template>
  
  <script setup>
    // import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
    // import { faFacebook, faInstagram, faEnvelope } from '@fortawesome/free-brands-svg-icons';
    import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
    import { faFacebookF, faInstagram } from '@fortawesome/free-brands-svg-icons'
    import { faEnvelope } from '@fortawesome/free-solid-svg-icons'
    import { router } from '@inertiajs/vue3';
    import Logo from "@/Components/navbar/Logo.vue";

    const facebookIcon = faFacebookF;
    const instagramIcon = faInstagram;
    const emailIcon = faEnvelope
  </script>
  
  <style scoped>
    .bg-footer-color {
        background-color: #C75859;
    }
  </style>