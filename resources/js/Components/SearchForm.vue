<template>
    <p class="text-xl">Filters</p>
    <form @submit.prevent="filter">
        <InputLabel for="title" value="Title:" />
        <TextInput
            id="title"
            type="text"
            class="mt-1 block w-full"
            v-model="form.title"
        />
        <InputLabel for="description" value="Description:" />
        <TextInput
            id="description"
            type="text"
            class="mt-1 block w-full"
            v-model="form.description"
        />
        <InputLabel for="created_at" value="Created At:" />
        Start:
        <TextInput
            id="title"
            type="datetime-local"
            class="mt-1 block "
            v-model="form.created_at_st"
        />
        End:
        <TextInput
            id="title"
            type="datetime-local"
            class="mt-1 block"
            v-model="form.created_at_et"
        />
        <PrimaryButton class="mt-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
            Filter
        </PrimaryButton>
    </form>
</template>

<script>
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

export default {
    components: {
        InputLabel,
        PrimaryButton,
        TextInput,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: '',
                description: '',
                created_at_st: '',
                created_at_et: '',
            })
        }
    },
    methods: {
        async filter() {
            await this.form.get('/');
        }
    }
}
</script>