<template>
    <div class="">
        <div class="flex flex-row items-center gap-3">
          <div class="
            flex
            justify-between
            align-middle
            sm:rounded-full
            sm:shadow-md
            sm:border-[1px]
            border-neutral-200
            sm:px-2
            py-1
         
          ">
            <div class="
              px-2.5
              py-2
              flex
              items-center
              gap-3
              rounded-full
              cursor-pointer
              transition              
            ">
              <font-awesome-icon class="font-sm text-[#595959]" icon="fa-solid fa-bars" />
            </div>
            <div>
              <Avatar @toggleUserMenu="showUserMenu = !showUserMenu" />
            </div>
          </div>
        </div>
      </div>
    <transition name="dropdown" class="dropdown">
        <div v-if="showUserMenu" class="
                absolute
                rounded-xl
                shadow-lg
                bg-white
                lg:w-[13vw]
                overflow-hidden
                top-14
                right-4
                sm:top-24
                lg:right-20
                text-sm
                z-10
            ">
            <div class="flex flex-col cursor-pointer" v-if="!user">
                <menu-item @click="toggleLoginForm">Login</menu-item>
                <menu-item @click="toggleRegisterForm">Sign up</menu-item>
            </div>
            <div class="flex flex-col cursor-pointer border" v-else>

                <div
                    class="text-sm font-semibold py-3 px-4 hover:bg-neutral-100 transition cursor-pointer text-center border-b-2 border-neutral-200">
                    <template v-if="user">
                      <div :style="{ color: COLORS.primary }">
                        {{ user.first_name }} {{ user.last_name }}
                      </div>
                    </template>
                </div>

                <menu-item @click="logOut" >Log Out</menu-item>
                <menu-item @click="router.visit(route('listing.index'))">Add Your Pet</menu-item>
                <menu-item @click="router.visit(route('profile.index'))">Edit Your Profile</menu-item>
            </div>
        </div>
    </transition>

    <LoginForm :showModal="showLoginForm" @closeLoginForm="closeLoginForm"/>

    <RegisterForm :showModal="showRegisterForm" @closeRegisterForm="closeRegisterForm"/>

</template>

<script setup>

    import { onMounted, onUnmounted, ref } from 'vue';
    import { router, usePage } from '@inertiajs/vue3'
    import { useNotification } from '@/Stores/notification.js';

    import Avatar from '@/Components/Avatar.vue'
    import MenuItem from '@/Components/navbar/MenuItem.vue'
    import LoginForm from '../auth/LoginForm.vue';
    import RegisterForm from '../auth/RegisterForm.vue';
  import { COLORS } from '../constants/themes';

    const store = useNotification();

    const user = usePage().props.auth.user;

    const showUserMenu = ref(false);
    const showLoginForm = ref(false);
    const showRegisterForm = ref(false);

    function toggleLoginForm()
    {
        showLoginForm.value = true;
        showUserMenu.value = false;
    }

    const closeLoginForm = () => showLoginForm.value = false;

    function toggleRegisterForm()
    {
        showRegisterForm.value = true;
        showUserMenu.value = false;
    }

    const closeRegisterForm = () => showRegisterForm.value = false;

    function logOut()
    {
        router.visit(route('app.logout'), { method: 'post' });
        store.addToast({message: 'Successfully logged out!'})
    }

    onMounted(() => {
        window.addEventListener("click", closeDropdown);
    });

    onUnmounted(() => {
        window.removeEventListener("click", closeDropdown);
    });

    function closeDropdown(e)
    {
        if (!document.getElementById('dropdown-user-menu').contains(e.target))
        {
            showUserMenu.value = false;
        }
    }

</script>

<style scoped>
  .dropdown-enter-active, .dropdown-leave-active {
    transition: opacity 0.3s ease-out;
  }
  
  .dropdown-enter-from, .dropdown-leave-to {
    opacity: 0;
  }
  
  .dropdown-enter-to, .dropdown-leave {
    opacity: 1;
  }

</style>
