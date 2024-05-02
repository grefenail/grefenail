<template>
    <Layout title="Edit Your Profile">
      
        <div class="container rounded bg-white mt-3 sm:mt-5 sm:mb-5 ">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4 ">

            <div class="md:col-span-1">
              <div class="bg-white shadow-md lg:p-2 rounded-md sm:mb-6">
                <div class="flex flex-col items-center lg:py-5 py-3">
                  <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" id="dropdown-user-menu" aria-hidden="true" role="presentation" class="w-[75px] h-[75px] sm:w-[100px] sm:h-[100px] rounded cursor-pointer" focusable="false">
                    <path d="m16 .7c-8.437 0-15.3 6.863-15.3 15.3s6.863 15.3 15.3 15.3 15.3-6.863 15.3-15.3-6.863-15.3-15.3-15.3zm0 28c-4.021 0-7.605-1.884-9.933-4.81a12.425 12.425 0 0 1 6.451-4.4 6.507 6.507 0 0 1 -3.018-5.49c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5a6.513 6.513 0 0 1 -3.019 5.491 12.42 12.42 0 0 1 6.452 4.4c-2.328 2.925-5.912 4.809-9.933 4.809z" fill="#717171"></path>
                  </svg>
              
                  <span class="font-bold pt-3 sm:pt-5 sm:text-xl">{{ user.first_name }} {{ user.last_name }}</span>
              
                  <span class="font-bold pt-2 sm:pt-3 sm:text-md text-sm">{{ user.email }}</span>
                </div>
              </div>
         
              <div class="hidden md:block bg-white shadow-md p-2 rounded-md mb-8">          
                <div class="flex flex-row text-center justify-center gap-3 items-center">
                  <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" id="dropdown-user-menu" width="25" height="25" aria-hidden="true" role="presentation" class="rounded cursor-pointer" focusable="false">
                    <path d="m16 .7c-8.437 0-15.3 6.863-15.3 15.3s6.863 15.3 15.3 15.3 15.3-6.863 15.3-15.3-6.863-15.3-15.3-15.3zm0 28c-4.021 0-7.605-1.884-9.933-4.81a12.425 12.425 0 0 1 6.451-4.4 6.507 6.507 0 0 1 -3.018-5.49c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5a6.513 6.513 0 0 1 -3.019 5.491 12.42 12.42 0 0 1 6.452 4.4c-2.328 2.925-5.912 4.809-9.933 4.809z" fill="#717171"></path>
                  </svg>
                  <div class="font-bold text-lg lg:text-xl">Edit Account</div>
                </div>
                
                <div class="flex flex-col items-center sm:py-5">
                  <button 
                    :class="[
                      'btn',
                      'w-full',
                      'py-2',
                      'lg:text-lg',
                      'rounded-xl',
                      {'hover:bg-gray-100': activeSection !== 'profileSettings'},
                      {'hover:text-red-500': activeSection !== 'profileSettings'},
                      {'bg-gray-100': activeSection === 'profileSettings' || hover === 'profileSettings'},
                      {'text-red-500': activeSection === 'profileSettings' || hover === 'profileSettings'},
                      'transition-colors',
                      'duration-300',
                      'ease-in-out',
                      'mb-1'
                    ]" 
                    @click="activeSection = 'profileSettings'"
                    @mouseover="hover = 'profileSettings'"
                    @mouseleave="hover = ''"
                  >
                    Profile
                  </button>
                  <button 
                    :class="[
                      'btn',
                      'w-full',
                      'py-2',
                      'lg:text-lg',
                      'rounded-xl',
                      {'hover:bg-gray-100': activeSection !== 'updatePasswordSettings'},
                      {'hover:text-red-500': activeSection !== 'updatePasswordSettings'},
                      {'bg-gray-100': activeSection === 'updatePasswordSettings' || hover === 'updatePasswordSettings'},
                      {'text-red-500': activeSection === 'updatePasswordSettings' || hover === 'updatePasswordSettings'},
                      'transition-colors',
                      'duration-300',
                      'ease-in-out'
                    ]" 
                    @click="activeSection = 'updatePasswordSettings'"
                    @mouseover="hover = 'updatePasswordSettings'"
                    @mouseleave="hover = ''"
                  >
                    Change Password
                  </button>
                </div>
              </div>                   
            </div>

            <div v-if="isSmallScreen || activeSection === 'profileSettings'" class="md:col-span-2 ">
              <ProfileSettings :user="user"/>
            </div>

            <div v-if="isSmallScreen || activeSection === 'updatePasswordSettings'" class="md:col-span-2 ">
                <UpdatePasswordSettings/>  
            </div>

          </div>
        </div>
    </Layout>
    
  </template>

<script setup>
    import { onMounted, ref, onUnmounted, computed } from 'vue';
    import { router, useForm } from '@inertiajs/vue3';
    import Layout from '@/Layouts/Layout.vue';
    import ActionMessage from '@/Components/ActionMessage.vue';
    import FormSection from '@/Components/FormSection.vue';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import SecondaryButton from '@/Components/SecondaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import { useNotification } from '@/Stores/notification.js';
    import ProfileSettings from './Partials/ProfileSettings.vue';
    import UpdatePasswordSettings from './Partials/UpdatePasswordSettings.vue';


    const activeSection = ref('profileSettings');

    const props = defineProps({
        user: Object,
        listing: Object,
    });

    const { user } = props;

    const windowWidth = ref(0);

    const handleResize = () => {
        windowWidth.value = window.innerWidth;
    };
    onMounted(() => {
        handleResize();
        window.addEventListener('resize', handleResize);
    });
    onUnmounted(() => {
        window.removeEventListener('resize', handleResize);
    });
    const isSmallScreen = computed(() => {
        return windowWidth.value < 640; 
    });

</script>

