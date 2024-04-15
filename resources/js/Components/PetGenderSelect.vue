<template>
    <select v-model="petGender" :class="inputClass" @change="$emit('change', petGender)">
      <option value="" disabled>Pet Gender</option>
      <option v-for="(gender, index) in genders" :key="index" :value="gender">{{ gender }}</option>
    </select>
  </template>
  
  <script setup>
  const props = defineProps({
    initialGender: {
      type: String,
      required: true
    }
  });
  
  const genders = ['Male', 'Female'];
  
  let petGender = props.initialGender || ''; 
  
  const inputClass = 'my-2 block w-full border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500';
  </script>
  