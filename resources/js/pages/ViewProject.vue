<template>
    <Layout>
        <Container>
            <div class="xl:relative">
                <div class="mx-auto max-w-2xl">
                    <Link as="button" :href="route('projects', {language: route().params.language})" type="button"
                          :aria-label="$t('pages.project.back')"
                          class="group mb-8 flex h-10 w-10 items-center justify-center rounded-full bg-white shadow-md shadow-zinc-800/5 ring-1 ring-zinc-900/5 transition dark:border dark:border-zinc-700/50 dark:bg-zinc-800 dark:ring-0 dark:ring-white/10 dark:hover:border-zinc-700 dark:hover:ring-white/20 lg:absolute lg:-left-5 lg:mb-0 lg:-mt-2 xl:-top-1.5 xl:left-0 xl:mt-0">
                        <svg viewBox="0 0 16 16" fill="none" aria-hidden="true"
                             class="h-4 w-4 stroke-zinc-500 transition group-hover:stroke-zinc-700 dark:stroke-zinc-500 dark:group-hover:stroke-zinc-400">
                            <path d="M7.25 11.25 3.75 8m0 0 3.5-3.25M3.75 8h8.5" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </link>
                    <article>
                        <header class="flex flex-col">
                            <div class="flex gap-4">
                                <h1 class="mt-6 text-4xl font-bold tracking-tight text-zinc-800 dark:text-zinc-100 sm:text-5xl">
                                    {{ project.name }}
                                </h1>
                                <p v-if="project.client" class="italic z-10 text-zinc-400 dark:text-zinc-400 mt-12">
                                    {{ $t('labels.ordered_by') }} {{ project.client }}
                                </p>
                            </div>

                            <time :datetime="project.completed_at"
                                  class="order-first flex items-center text-base text-zinc-400 dark:text-zinc-500">
                                <span class="h-4 w-0.5 rounded-full bg-zinc-200 dark:bg-zinc-500"></span>
                                <span class="ml-3">
                                    {{ completionDate }}
                                </span>
                            </time>
                        </header>
                        <div class="mt-8 prose dark:prose-invert" v-html="project.content">
                        </div>
                        <div v-if="project.media.length > 0">
                            <h3 class="mt-6 mb-4 text-xl font-semibold tracking-tight text-zinc-800 dark:text-zinc-100 sm:text-2xl">
                                {{ $t('pages.project.media') }}
                            </h3>
                            <carousel :items-to-show="3" :wrapAround="true" :autoplay="5000"
                                      :pauseAutoplayOnHover="true">
                                <slide v-for="medium in project.media" :key="medium.id" :class="{'dark:hidden': medium.pivot.theme_availability === 'white', 'hidden dark:block': medium.pivot.theme_availability === 'dark'}">
                                    <img :src="medium.url" :alt="medium.alt"

                                         class="w-full h-full object-cover p-2 rounded-xl">
                                </slide>

                                <template #addons>
                                    <pagination/>
                                </template>
                            </carousel>
                        </div>
                    </article>
                </div>
            </div>
        </Container>
    </Layout>
</template>

<script>
import Layout from "../Layout.vue";
import Container from "../components/Layout/Container.vue";
import {Link} from '@inertiajs/vue3'
import {DateTime} from "luxon";
import 'vue3-carousel/dist/carousel.css'
import {Carousel, Slide, Pagination, Navigation} from 'vue3-carousel'

export default {
    name: "ViewProject",
    components: {
        Container, Layout, Link, Carousel, Slide, Pagination, Navigation,
    },
    mounted() {
        console.log("darkmode: " + this.isDarkModeToggled)
    },
    props: {
        project: Object,
    },
    computed: {
        completionDate() {
            return this.project.completed_at == null ? this.$t('labels.not_completed_yet') : DateTime.fromISO(this.project.completed_at).toLocaleString(DateTime.DATE_FULL);
        },


    }
}
</script>

<style scoped>
</style>
