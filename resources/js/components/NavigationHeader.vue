<template>
    <header class="pointer-events-none relative z-50 flex flex-col">
        <div class="order-last mt-[calc(theme(spacing.16)-theme(spacing.3))]"></div>
        <div class="sm:px-8 top-0 order-last -mb-3 pt-3">
            <div class="mx-auto max-w-7xl lg:px-8">
                <div class="relative px-4 sm:px-8 lg:px-12">
                    <div class="mx-auto max-w-2xl lg:max-w-5xl">
                        <div class="top-[var(--avatar-top,theme(spacing.3))] w-full">
                            <div class="relative">
                                <div
                                    class="absolute opacity-0 left-0 top-3 origin-left transition-opacity h-10 w-10 rounded-full bg-white/90 p-0.5 shadow-lg shadow-zinc-800/5 ring-1 ring-zinc-900/5 backdrop-blur dark:bg-zinc-800/90 dark:ring-white/10">
                                </div>
                                <Link v-if="route().current('home')" :href="route('home', {language: route().params.language})" aria-label="Home"
                                      class="block h-16 w-16 origin-left pointer-events-auto">
                                    <img sizes="4rem" alt="A picture of me" src="/img/me.jpg" width="512" height="512"
                                         class="rounded-full bg-zinc-100 object-cover dark:bg-zinc-800 h-16 w-16"
                                         style="color: transparent;">
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-0 z-10 h-16 pt-6">
            <div class="sm:px-8 top-[var(--header-top,theme(spacing.6))] w-full">
                <div class="mx-auto max-w-7xl lg:px-8">
                    <div class="relative px-4 sm:px-8 lg:px-12">
                        <div class="mx-auto max-w-2xl lg:max-w-5xl">
                            <div class="relative flex gap-4">
                                <div class="flex flex-1">
                                    <div v-if="!route().current('home')"
                                         class="h-10 w-10 rounded-full bg-white/90 p-0.5 shadow-lg shadow-zinc-800/5 ring-1 ring-zinc-900/5 backdrop-blur dark:bg-zinc-800/90 dark:ring-white/10">
                                        <Link :href="route('home', {language: route().params.language})" aria-label="Home" class="pointer-events-auto">
                                            <img alt="A picture of me" src="/img/me.jpg"
                                                 sizes="2.25rem" width="512" height="512"
                                                 class="rounded-full bg-zinc-100 object-cover dark:bg-zinc-800 h-9 w-9">
                                        </Link>
                                    </div>
                                </div>
                                <div class="flex flex-1 justify-end md:justify-center">
                                    <MobileNavigation/>
                                    <nav class="pointer-events-auto hidden md:block">
                                        <ul class="flex rounded-full bg-white/90 px-3 text-sm font-medium text-zinc-800 shadow-lg shadow-zinc-800/5 ring-1 ring-zinc-900/5 backdrop-blur dark:bg-zinc-800/90 dark:text-zinc-200 dark:ring-white/10">
                                            <NavLink route-name="about" :label="$t('pages.navigation.about')"/>
                                            <NavLink route-name="projects" :label="$t('pages.navigation.projects')"/>
                                            <NavLink route-name="uses" :label="$t('pages.navigation.uses')"/>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="flex justify-end md:flex-1 gap-4">
                                    <DarkModeButton/>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
import DarkModeButton from "./DarkModeButton.vue";
import MobileNavigation from "./MobileNavigation.vue";
import {Link} from '@inertiajs/vue3'
import NavLink from "./NavLink.vue";
import LanguageButton from "./LanguageButton.vue";

export default {
    name: "NavigationHeader",
    components: {LanguageButton, NavLink, MobileNavigation, DarkModeButton, Link}
}
</script>

<style scoped>

</style>
