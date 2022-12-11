<template>
    <div class="grid grid-cols-1 gap-4">
        <WebsiteCard v-for="site in websites.data" :key="site.id" :site="site"></WebsiteCard>
    </div>
</template>

<script>
import WebsiteCard from '@/Components/WebsiteCard.vue'

export default {
    props: {
        websites: Object
    },
    components: {
        WebsiteCard
    },
    data() {
        return {
        }
    },
}
</script>