<template>
    <div class="flex justify-center">
    <div class="block p-6 rounded-lg shadow-lg bg-white w-full">
        <a :href="site.url" class="text-blue-500 text-xl leading-tight font-medium mb-2">{{site.title}}</a>
        <p class="font-bold">Description:</p>
        <p class="text-gray-700 text-base mb-4 w-full">
        {{ site.description }}
        </p>
        <p class="font-bold">Created At:</p>
        <p class="text-gray-700 text-base mb-4 w-full">
        {{ changeTimeFormat(site.created_at) }}
        </p>
        <button @click="showDetail(site.id)" class="text-red-500">show detail ></button>
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
        showDetail(site) {
            this.$inertia.get(`/site/${site}`);
        },
        changeTimeFormat(dt) {
            let date = new Date(dt);
            return date.toLocaleString();
        }
    }
}
</script>