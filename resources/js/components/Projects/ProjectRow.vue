<template>
    <article class="md:grid md:grid-cols-4 md:items-baseline">
        <div class="md:col-span-3 group relative flex flex-col items-start">
            <h2 class="text-base font-semibold tracking-tight text-zinc-800 dark:text-zinc-100">
                <div class="absolute -inset-y-6 -inset-x-4 z-0 scale-95 bg-zinc-50 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 dark:bg-zinc-800/50 sm:-inset-x-6 sm:rounded-2xl">
                </div>
                <Link
                    :href="route('projects.show', {language: route().params.language, project: project.id, slug: project.slug})">
                    <span class="absolute -inset-y-6 -inset-x-4 z-20 sm:-inset-x-6 sm:rounded-2xl"></span>
                    <span class="relative z-10">{{ project.name }}</span>
                </Link>
            </h2>
            <time class="md:hidden relative z-10 order-first mb-3 flex items-center text-sm text-zinc-400 dark:text-zinc-500 pl-3.5"
                :datetime="project.completed_at">
                <span class="absolute inset-y-0 left-0 flex items-center" aria-hidden="true">
                    <span class="h-4 w-0.5 rounded-full bg-zinc-200 dark:bg-zinc-500"></span>
                </span>
                {{ completionDate }}
            </time>
            <p class="relative z-10 mt-2 text-sm text-zinc-600 dark:text-zinc-400">
                {{ project.description }}
            </p>
            <div aria-hidden="true" class="relative z-10 mt-4 flex items-center text-sm font-medium text-teal-500">
                {{  $t('pages.projects.view_project') }}
                <svg viewBox="0 0 16 16" fill="none" aria-hidden="true"
                     class="ml-1 h-4 w-4 stroke-current">
                    <path d="M6.75 5.75 9.25 8l-2.5 2.25" stroke-width="1.5"
                          stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
        </div>
        <time
            class="mt-1 hidden md:block relative z-10 order-first mb-3 flex items-center text-sm text-zinc-400 dark:text-zinc-500"
            :datetime="project.completed_at">
            {{ completionDate }}
        </time>
    </article>

</template>

<script>
import {Link} from "@inertiajs/vue3";
import {DateTime} from "luxon";

export default {
    name: "ProjectRow",
    props: {
        project: Object,
    },
    components: {
        Link
    },
    computed: {
        completionDate() {
            return this.project.completed_at == null ? this.$t('labels.not_completed_yet') : DateTime.fromISO(this.project.completed_at).toLocaleString({month: 'long', year: 'numeric'});
        }
    }
}
</script>

<style scoped>

</style>
