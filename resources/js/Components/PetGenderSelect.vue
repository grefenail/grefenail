<template>
    <select v-model="pet_gender" :class="inputClass" @change="$emit('change', pet_gender)">
      <option value="" disabled >Pet Gender</option>
      <option v-for="(gender, index) in $page.props.pet_genders" :key="index" :value="gender.id">{{ gender.gender }}</option>
    </select>
  </template>
  
  <script setup>
  const props = defineProps({
    pet_gender: {
      type: String,
      required: true
    }
  });
  
  let pet_gender = props.pet_gender || ''; 
  
  const inputClass = 'shadow my-2 block w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500';
  </script>
  