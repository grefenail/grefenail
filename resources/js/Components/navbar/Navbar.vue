<template>
    <div class="w-full z-10 shadow-sm">
        <div class="md:py-4 py-2 border-b-[1px]">
            <Container>

                <!-- //if windowWidth>500 -->
                <div v-if="isWideScreen" class="sm:my-6 flex flex-row items-center justify-between gap-3 md:gap-0">
                    <Logo :source='"../images/petty-logo.png"'/>
                    <Search />
                    <MenuUser/>
                </div>
                <!-- //else -->
                <div v-else class="sm:my-6 flex flex-row items-center justify-between md:gap-0">
                    <div>
                        <Logo :source='"../images/petty-logo.png"'/>
                    </div>
                    <div class="flex flex-row justify-end">
                        <Search />
                        <MenuUser/>
                    </div>
                </div>
            </Container>
        </div>

        <Container>
            <Categories/>
        </Container>
    </div>
</template>

<script setup>

    import Container from "@/Components/Container.vue";
    import Logo from "@/Components/navbar/Logo.vue";
    import Search from "@/Components/navbar/Search.vue";
    import MenuUser from "@/Components/navbar/MenuUser.vue";
    import Categories from "@/Components/navbar/Categories.vue";

    import { ref, onMounted, onUnmounted, computed } from 'vue';

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
    const isWideScreen = computed(() => {
        return windowWidth.value > 500; // Set the desired width threshold
    });

</script>
