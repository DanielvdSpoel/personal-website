<template>
    <div>
        <div class="fixed inset-0 flex justify-center sm:px-8">
            <div class="flex w-full max-w-7xl lg:px-8">
                <div class="w-full bg-white ring-1 ring-zinc-100 dark:bg-zinc-900 dark:ring-zinc-300/20"></div>
            </div>
        </div>
        <div class="relative">
            <NavigationHeader/>
            <main>
                <slot/>
            </main>
            <FooterNavigation/>
        </div>
    </div>
</template>

<script>
import Navbar from "./components/Layout/NavigationHeader.vue";
import FooterNavigation from "./components/Layout/FooterNavigation.vue";
import DarkModeButton from "./components/Layout/DarkModeButton.vue";
import NavigationHeader from "./components/Layout/NavigationHeader.vue";
export default {
name: "Layout",
    components: {NavigationHeader, DarkModeButton, FooterNavigation, Navbar}
}
</script>

<style scoped>

</style>
