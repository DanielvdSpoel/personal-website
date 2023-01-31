<template>
    <div class="pointer-events-auto md:hidden">
        <Popover v-slot="{ open }">
            <PopoverButton
                class="group flex items-center rounded-full bg-white/90 px-4 py-2 text-sm font-medium text-zinc-800 shadow-lg shadow-zinc-800/5 ring-1 ring-zinc-900/5 backdrop-blur dark:bg-zinc-800/90 dark:text-zinc-200 dark:ring-white/10 dark:hover:ring-white/20">
                Menu
                <svg viewBox="0 0 8 6" aria-hidden="true"
                     class="ml-3 h-auto w-2 stroke-zinc-500 group-hover:stroke-zinc-700 dark:group-hover:stroke-zinc-400">
                    <path d="M1.75 1.75 4 4.25l2.25-2.5" fill="none" stroke-width="1.5" stroke-linecap="round"
                          stroke-linejoin="round"></path>
                </svg>
            </PopoverButton>
            <transition
                enter-active-class="transition duration-200 ease-out"
                enter-from-class="translate-y-1 opacity-0"
                enter-to-class="translate-y-0 opacity-100"
                leave-active-class="transition duration-150 ease-in"
                leave-from-class="translate-y-0 opacity-100"
                leave-to-class="translate-y-1 opacity-0"
            >
                <PopoverOverlay
                    class="fixed inset-0 z-50 bg-zinc-800/40 backdrop-blur-sm dark:bg-black/80 opacity-100"/>
            </transition>
            <transition
                enter-active-class="transition duration-200 ease-out"
                enter-from-class="translate-y-1 opacity-0"
                enter-to-class="translate-y-0 opacity-100"
                leave-active-class="transition duration-150 ease-in"
                leave-from-class="translate-y-0 opacity-100"
                leave-to-class="translate-y-1 opacity-0"
            >
                <PopoverPanel
                    class="fixed inset-x-4 top-8 z-50 origin-top rounded-3xl bg-white p-8 ring-1 ring-zinc-900/5 dark:bg-zinc-900 dark:ring-zinc-800 opacity-100 scale-100">
                    <div class="flex flex-row-reverse items-center justify-between">
                        <PopoverButton aria-label="Close menu" class="-m-1 p-1" type="button">
                            <svg viewBox="0 0 24 24" aria-hidden="true"
                                 class="h-6 w-6 text-zinc-500 dark:text-zinc-400">
                                <path d="m17.25 6.75-10.5 10.5M6.75 6.75l10.5 10.5" fill="none" stroke="currentColor"
                                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </PopoverButton>
                        <h2 class="text-sm font-medium text-zinc-600 dark:text-zinc-400">Navigation</h2>
                    </div>
                    <nav class="mt-6">
                        <ul class="-my-2 divide-y divide-zinc-100 text-base text-zinc-800 dark:divide-zinc-100/5 dark:text-zinc-300">
                            <li>
                                <Link class="block py-2" :href="route('about', {language: route().params.language})">
                                    {{ $t('pages.navigation.about') }}

                                </Link>
                            </li>
                            <li>
                                <Link class="block py-2" :href="route('projects', {language: route().params.language})">
                                    {{ $t('pages.navigation.projects') }}
                                </Link>
                            </li>
                            <li>
                                <Link class="block py-2" :href="route('skills', {language: route().params.language})">
                                    {{ $t('pages.navigation.skills') }}
                                </Link>
                            </li>
                        </ul>
                    </nav>
                </PopoverPanel>
            </transition>
        </Popover>

    </div>

</template>

<script>
import {
    Popover,
    PopoverOverlay,
    PopoverButton,
    PopoverPanel, TransitionRoot, TransitionChild,
} from '@headlessui/vue'
import {Link} from '@inertiajs/vue3'

export default {
    name: "MobileNavigation",
    components: {
        Link,
        TransitionChild,
        TransitionRoot,
        Popover, PopoverOverlay, PopoverButton, PopoverPanel

    }
}
</script>

<style scoped>

</style>
