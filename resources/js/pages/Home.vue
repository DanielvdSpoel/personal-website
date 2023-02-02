<template>
    <Layout>
        <div class="sm:px-8 mt-9">
            <div class="mx-auto max-w-7xl lg:px-8">
                <div class="relative px-4 sm:px-8 lg:px-12">
                    <div class="mx-auto max-w-2xl lg:max-w-5xl">
                        <div class="max-w-2xl">
                            <h1 class="text-4xl font-bold tracking-tight text-zinc-800 dark:text-zinc-100 sm:text-5xl">
                                {{ $t('pages.home.header') }}
                            </h1>
                            <p class="mt-6 text-base text-zinc-600 dark:text-zinc-400">
                                {{ $t('pages.home.description') }}
                            </p>
                            <div class="mt-6 flex gap-6">
                                <a class="group -m-1 p-1" aria-label="Follow on Github"
                                   href="https://github.com/DanielvdSpoel">
                                    <i class="fa-brands fa-github fa-lg h-6 w-6 text-zinc-500 transition group-hover:text-zinc-600 dark:text-zinc-400 dark:group-hover:text-zinc-300"></i>
                                </a>
                                <a class="group -m-1 p-1" aria-label="Follow on Linkedin"
                                   href="https://www.linkedin.com/in/dani%C3%ABl-v-770092185/">
                                    <i class="fa-brands fa-linkedin fa-lg h-6 w-6 text-zinc-500 transition group-hover:text-zinc-600 dark:text-zinc-400 dark:group-hover:text-zinc-300"></i>
                                </a>
                                <a class="group -m-1 p-1" aria-label="Send me an email"
                                   href="mailto:contact@danielvdspoel.nl">
                                    <i class="fa-solid fa-envelope fa-lg h-6 w-6 text-zinc-500 transition group-hover:text-zinc-600 dark:text-zinc-400 dark:group-hover:text-zinc-300"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-16 sm:mt-20">
            <div class="-my-4 flex justify-center gap-5 overflow-hidden py-4 sm:gap-8">
                <div v-for="medium in media" :key="medium.id" :class="{'dark:hidden': medium.pivot.theme_availability === 'white', 'hidden dark:block': medium.pivot.theme_availability === 'dark'}"
                    class="relative aspect-[16/9] w-44 flex-none overflow-hidden rounded-xl bg-zinc-100 dark:bg-zinc-800 sm:w-72 sm:rounded-2xl rotate-2">
                    <img :alt="medium.alt" sizes="(min-width: 640px) 18rem, 11rem"
                         :src="medium.url"
                         class="absolute inset-0 h-full w-full object-cover" loading="lazy"
                         style="color:transparent">
                </div>
            </div>
        </div>
        <div class="sm:px-8 mt-24 md:mt-28">
            <div class="mx-auto max-w-7xl lg:px-8">
                <div class="relative px-4 sm:px-8 lg:px-12">
                    <div class="mx-auto max-w-2xl lg:max-w-5xl">
                        <div class="mx-auto grid max-w-xl grid-cols-1 gap-y-20 lg:max-w-none lg:grid-cols-2">
                            <div>
                                <div class="flex pb-2 gap-2">
                                    <h1 class="text-lg sm:text-xl font-bold tracking-tight text-zinc-800 dark:text-zinc-100">
                                        {{ $t('pages.home.projects.title') }}
                                    </h1>
                                    <Link aria-hidden="true" :href="route('projects', {language: route().params.language})"
                                         class="flex items-center text-sm font-medium text-teal-500 hover:text-teal-600 cursor-pointer">
                                        <svg viewBox="0 0 16 16" fill="none" aria-hidden="true"
                                             class="ml-1 h-4 w-4 stroke-current">
                                            <path d="M6.75 5.75 9.25 8l-2.5 2.25" stroke-width="1.5"
                                                  stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        {{ $t('pages.home.projects.view_all')}}
                                    </Link>
                                </div>

                                <div class="flex flex-col mt-6 gap-16">
                                    <ProjectRow v-for="project in projects" :key="project.id" :project="project"/>
                                </div>

                            </div>
                            <div class="space-y-10 lg:pl-16 xl:pl-24">
                                <ContactForm/>
                                <div class="rounded-2xl border border-zinc-100 p-6 dark:border-zinc-700/40">
                                    <h2 class="flex text-sm font-semibold text-zinc-900 dark:text-zinc-100">
                                        <svg viewBox="0 0 24 24" fill="none" stroke-width="1.5"
                                             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"
                                             class="h-6 w-6 flex-none">
                                            <path
                                                d="M2.75 9.75a3 3 0 0 1 3-3h12.5a3 3 0 0 1 3 3v8.5a3 3 0 0 1-3 3H5.75a3 3 0 0 1-3-3v-8.5Z"
                                                class="fill-zinc-100 stroke-zinc-400 dark:fill-zinc-100/10 dark:stroke-zinc-500"></path>
                                            <path
                                                d="M3 14.25h6.249c.484 0 .952-.002 1.316.319l.777.682a.996.996 0 0 0 1.316 0l.777-.682c.364-.32.832-.319 1.316-.319H21M8.75 6.5V4.75a2 2 0 0 1 2-2h2.5a2 2 0 0 1 2 2V6.5"
                                                class="stroke-zinc-400 dark:stroke-zinc-500"></path>
                                        </svg>
                                        <span class="ml-3"> {{ $t('pages.home.employers.title')}} </span>
                                    </h2>
                                    <ol class="mt-6 space-y-4">
                                        <EmployerRow v-for="employer in employers" :key="employer.id"
                                                     :employer="employer"/>
                                    </ol>
                                    <!--<a class="inline-flex items-center gap-2 justify-center rounded-md py-2 px-3 text-sm outline-offset-2 transition active:transition-none bg-zinc-50 font-medium text-zinc-900 hover:bg-zinc-100 active:bg-zinc-100 active:text-zinc-900/60 dark:bg-zinc-800/50 dark:text-zinc-300 dark:hover:bg-zinc-800 dark:hover:text-zinc-50 dark:active:bg-zinc-800/50 dark:active:text-zinc-50/70 group mt-6 w-full"
                                       href="/#">
                                        {{ $t('pages.home.employers.download_cv')}}
                                        <svg viewBox="0 0 16 16" fill="none" aria-hidden="true"
                                             class="h-4 w-4 stroke-zinc-400 transition group-active:stroke-zinc-600 dark:group-hover:stroke-zinc-50 dark:group-active:stroke-zinc-50">
                                            <path d="M4.75 8.75 8 12.25m0 0 3.25-3.5M8 12.25v-8.5"
                                                  stroke-width="1.5" stroke-linecap="round"
                                                  stroke-linejoin="round"></path>
                                        </svg>
                                    </a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from "../Layout.vue";
import ContactForm from "../components/Home/ContactForm.vue";
import EmployerRow from "../components/Home/EmployerRow.vue";
import {Link} from '@inertiajs/vue3'
import ProjectRow from "../components/Home/ProjectRow.vue";

export default {
    name: "Home",
    components: {ProjectRow, EmployerRow, ContactForm, Layout, Link},
    props: {
        employers: Array,
        projects: Array,
        media: Array,
    }
}
</script>

<style scoped>

</style>
