<template>
    <footer class="bg-footer-color text-gray-200 py-5 mt-10">
        <div class="container mx-auto flex flex-wrap justify-center items-center text-sm lg:text-base">
            <div class="w-full md:w-1/5 mb-5 md:mb-0 text-center align-center justify-center">
              <div class="sm:block hidden">
                <Logo :source='"../images/petty-logo2.png"' />
              </div>    
              <p>&copy; 2024 Petty. All rights reserved. </p>
            </div>
            <div class="w-full md:w-1/5 text-center">
              <a href="#" class="block hover:text-white hover:text-lg transition">About Us</a>
              <!-- route not work -->
              <a href="#" class="block hover:text-white hover:text-lg mt-2 transition">Terms and Service</a>
            </div>
            <div class="w-full md:w-1/5 text-center">
              <a href="#" class="block hover:text-white hover:text-lg mt-2 md:mt-2">Collaboration</a>
              <a href="#" class="block hover:text-white hover:text-lg mt-2">Contact Us</a>
            </div>
            <div class="w-full h-full md:w-1/5 flex flex-col items-center mt-8 md:mt-0">          
                <div class="flex flex-col">
                    <p class="mb-2 text-center">Follow Us</p>
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
    import Logo from "@/Components/navbar/Logo.vue";
    import { router } from '@inertiajs/vue3';
    const facebookIcon = faFacebookF;
    const instagramIcon = faInstagram;
    const emailIcon = faEnvelope;
  </script>
  
  <style scoped>
    * {
      text-decoration: none;
    }

    .bg-footer-color {
        background-color: #C75859;
    }
  </style>