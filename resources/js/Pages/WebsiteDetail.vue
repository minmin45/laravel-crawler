<template>
    <div class="flex justify-center" @click="showDetail(site.id)">
    <div class="block p-6 rounded-lg shadow-lg bg-white w-full">
        <a :href="site.url" class="text-blue-500 text-xl leading-tight font-medium mb-2">{{site.title}}</a>
        <p class="font-bold">Description:</p>
        <p class="text-gray-700 text-base mb-4 w-full">
        {{ site.description }}
        </p>
        <p class="font-bold">Body:</p>
        <p class="text-gray-700 text-base mb-4 w-full">
        {{ site.body }}
        </p>
    </div>
    </div>
</template>

<script>
export default {
    props: {
        site: Object
    },
    data() {
        return {
        }
    },
    methods: {
        showDetail(website) {
            this.$inertia.get(`/site/${website}`);
        }
    }
}
</script>