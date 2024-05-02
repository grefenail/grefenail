<template>
    <DialogModal :show="showModal" @close="$emit('closeReservationForm')" maxWidth="xl">
        <template #content>
            <h3 class="font-bold text-lg mb-1">Fill in the Form to Adopt Now!</h3>
            <h3 class="font-bold mb-10">Your application will be processed in a case by case basis.</h3>
            <form @submit.prevent="submit">
                <div v-for="(question, index) in props.questions" :key="index" class="col-span-6 sm:col-span-4 mt-3">
                    <InputLabel :class="'mb-3'">
                        {{ index + 1 }}. {{ question.question_prompt }}
                    </InputLabel>
                    <TextInput
                        type="text"
                        :id="'question_' + index"
                        v-model="form['answer' + index]"
                        autocomplete="off"
                        class="mt-1 block w-full"
                    />
                    <InputError :message="form.errors['question_' + index]" class="mt-2" />
                </div>
                <button :disabled="form.processing" class="mt-8 w-full bg-[#DB0C63] border-[#243c5a] text-white py-2 px-4 rounded-lg">
                    <div class="text-lg font-semibold">
                        Continue
                    </div>
                </button>
            </form>
        </template>
    </DialogModal>
</template>

<script setup>
    import { defineProps, ref } from 'vue';
    import DialogModal from '@/Components/DialogModal.vue';
    import TextInput from '@/Components/TextInput.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import { router, useForm } from '@inertiajs/vue3';
    import InputError from '../InputError.vue';

    import { useNotification } from '@/Stores/notification.js';

    const store = useNotification();

    const emit = defineEmits(['closeReservationForm'])

    const props = defineProps({
        showModal: { default: false, type: Boolean},
        listing: { type: Object },
        questions: { type: Object },
        errors: { type : Object }
    });

    const form = useForm(
    {
        listing_id: props.listing.id,
        user_id: props.listing.user_id,
        answer0: '',
        answer1: '',
        answer2: '',
        answer3: '',
        answer4: '',
    });

    const submit = () =>
    {
        let url = route('reservation.store');

        form.post(url, {
            onSuccess: (res) => {
                router.visit(route('home'))
                emit('closeReservationForm');
                store.addToast({message: 'Adoption request successfully sent!'});
            },
            onError : (err) => {
                errorToast({message: 'Please try again', type: 'error'});
            }
        });
    };

</script>