<template>
    <Layout>
        <Container>
            <header class="max-w-2xl">
                <h1 class="text-4xl font-bold tracking-tight text-zinc-800 dark:text-zinc-100 sm:text-5xl">
                    {{ $t('pages.projects.title') }}
                </h1>
                <p class="mt-6 text-base text-zinc-600 dark:text-zinc-400">
                    {{ $t('pages.projects.description') }}
                </p>
            </header>
            <div class="mt-16 sm:mt-20">
                <div class="md:border-l md:border-zinc-100 md:pl-6 md:dark:border-zinc-700/40">
                    <div class="flex max-w-3xl flex-col space-y-16">
                        <ProjectRow v-for="project in projects" :project="project" :key="project.id"/>
                    </div>
                </div>
            </div>
        </Container>
    </Layout>
</template>

<script>
import Layout from "../Layout.vue";
import ProjectRow from "../components/Projects/ProjectRow.vue";
import Container from "../components/Layout/Container.vue";

export default {
    name: "Projects",
    components: {Container, ProjectRow, Layout},
    props: {
        projects: Array,
    }
}
</script>

<style scoped>

</style>
