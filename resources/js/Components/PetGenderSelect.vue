<template>
    <select v-model="pet_gender" :class="inputClass" @change="$emit('change', pet_gender)">
      <option value="" disabled>Pet Gender</option>
      <option v-for="(gender, index) in genders" :key="index" :value="gender">{{ gender }}</option>
    </select>
  </template>
  
  <script setup>
  const props = defineProps({
    pet_gender: {
      type: String,
      required: true
    }
  });
  
  const genders = ['Male', 'Female'];
  
  let pet_gender = props.pet_gender || ''; 
  
  const inputClass = 'my-2 block w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500';
  </script>
  