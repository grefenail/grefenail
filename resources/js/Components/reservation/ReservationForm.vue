<template>
    <DialogModal :show="showModal" @close="$emit('closeReservationForm')" maxWidth="xl">
        <template #content>
            <h3 class="font-bold text-lg mb-1">Fill in the Form to Adopt Now!</h3>
            <h3 class="font-bold mb-10">Your application will be processed in a case by case basis.</h3>
            <div class="scrollbar"> <!-- Scrollable container with max height -->
                <form @submit.prevent="submit">
                    <div v-for="(question, index) in props.questions" :key="index" class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3 mt-3">
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
                        <InputError :message="form.errors['answer' + index]" class="mt-2" />
                    </div>
                    <button :disabled="form.processing" class="button mt-8 w-full bg-[#DB0C63] border-[#243c5a] text-white py-2 px-4 rounded-lg">
                        <div class="text-lg font-semibold">
                            Continue
                        </div>
                    </button>
                </form>
            </div>
        </template>
    </DialogModal>
</template>

<script setup>
    import { defineProps } from 'vue';
    import DialogModal from '@/Components/DialogModal.vue';
    import TextInput from '@/Components/TextInput.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import { useForm } from '@inertiajs/vue3';
    import InputError from '../InputError.vue';

    import { useNotification } from '@/Stores/notification.js';

    const store = useNotification();

    const emit = defineEmits(['closeReservationForm'])

    const props = defineProps({
        showModal: { default: false, type: Boolean},
        listing: { type: Object },
        questions: { type: Object },
        errors: { type: Object }
    });

    const form = useForm({
        listing_id: props.listing.id,
        user_id: props.listing.user_id,
        answer0: '',
        answer1: '',
        answer2: '',
        answer3: '',
        answer4: '',
    });

    const submit = () => {
        let url = route('reservation.store');

        form.post(url, {
            onSuccess: (res) => {
                emit('closeReservationForm');
                store.addToast({ message: 'Your adoption request was successfully sent!' });
            },
            onError: (err) => {
                errorToast({ message: 'Please try again', type: 'error' });
            }
        });
    };
</script>

<style>
    .scrollbar {
        overflow-y: auto; /* Enable vertical scrollbar */
        max-height: 55vh; /* Limit height to 60% of viewport height */
        padding-right: 3%; /* Add padding to the right side */
    }

    /* Track */
    .scrollbar::-webkit-scrollbar {
        width: 5px; /* Set the width of the scrollbar */
    }

    /* Handle */
    .scrollbar::-webkit-scrollbar-thumb {
        background: #4a5568; /* Set the color of the scrollbar handle */
        border-radius: 20px; /* Set border radius for the scrollbar track */
    }

    /* Handle on hover */
    .scrollbar::-webkit-scrollbar-thumb:hover {
        background: #6b7280; /* Darker color on hover */
        border-radius: 20px; /* Set border radius for the scrollbar track */
    }
</style>