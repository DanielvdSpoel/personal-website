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

                            <div v-if="timeString"
                                  class="order-first flex items-center text-base text-zinc-400 dark:text-zinc-500">
                                <span class="h-4 w-0.5 rounded-full bg-zinc-200 dark:bg-zinc-500"></span>
                                <span class="ml-3">
                                    {{ timeString }}
                                </span>
                            </div>
                        </header>
                        <div class="mt-8 prose dark:prose-invert" v-html="project.content">
                        </div>
                        <div v-if="project.skills.length > 0">
                            <h3 class="mt-6 mb-4 text-xl font-semibold tracking-tight text-zinc-800 dark:text-zinc-100 sm:text-2xl">
                                {{ $t('pages.project.skills') }}
                                <ul role="list" class="my-8 grid grid-cols-1 gap-x-12 gap-y-16 sm:grid-cols-2 lg:grid-cols-3">
                                    <SkillRow v-for="skill in project.skills" :key="skill.id" :skill="skill"/>
                                </ul>
                            </h3>
                        </div>


                        <div v-if="project.media.length > 0">
                            <h3 class="mt-6 mb-4 text-xl font-semibold tracking-tight text-zinc-800 dark:text-zinc-100 sm:text-2xl">
                                {{ $t('pages.project.media') }}
                            </h3>
                            <carousel :items-to-show="3" :wrapAround="true" :autoplay="5000"
                                      :pauseAutoplayOnHover="true">
                                <MediaSlide v-for="media in project.media" :key="media.id" :media="media"/>

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
import SkillRow from "../components/Skills/SkillRow.vue";
import MediaSlide from "../components/Project/MediaSlide.vue";

export default {
    name: "ViewProject",
    components: {
        MediaSlide,
        SkillRow,
        Container, Layout, Link, Carousel, Slide, Pagination, Navigation,
    },
    props: {
        project: Object,
    },
    computed: {
        timeString() {
            if (this.project.completed_at === null && this.project.started_at !== null) {
                return this.$t('labels.ongoing_project', {date: this.getTimeString(this.project.started_at)});
            }
            if (this.project.completed_at && this.project.started_at) {
                return this.$t('labels.finished_project', {
                    date: this.getTimeString(this.project.completed_at)
                });
            }
            return null;
        }
    }
}
</script>

<style scoped>
</style>
