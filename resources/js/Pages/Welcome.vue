<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import ResultComponent from '@/Components/Websites.vue';
import Pagination from '@/Components/Pagination.vue';
import SearchForm from '@/Components/SearchForm.vue';

defineProps({
    websites: Object
});

const form = useForm({
    url: '',
});

const submit = () => {
  form.post('/api/crawler', {
    onFinish: () => console.log('finish')
  });
};


</script>

<template>
  <Head title="Welcome" />

  <div
    class="items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0"
  >
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <form @submit.prevent="submit">
            <InputLabel for="url" value="URL input:" />
            <TextInput
                id="url"
                type="text"
                class="mt-1 block w-full"
                v-model="form.url"
            />
            <PrimaryButton class="mt-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Submit
            </PrimaryButton>
        </form>

        <SearchForm />

        <div class="mt-4">
          <ResultComponent :websites="websites" />
        </div>
        <pagination class="mt-6" v-if="websites" :links="websites.links" />
    </div>
  </div>
</template>
