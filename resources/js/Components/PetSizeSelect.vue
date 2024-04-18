    <template>
        <select v-model="petSize" :class="inputClass" @change="$emit('change', petSize)">
            <option value="" disabled >Pet Size</option>
            <option v-for="(size, index) in sizes" :key="index" :value="size">{{ size }}</option>
        </select>
    </template>
  
    <script setup>
    const props = defineProps({
      initialSize: {
        type: String,
        required: true
      }
    });
  
    const sizes = [
        'Less than 5 kg',
        '5 kg - 10 kg',
        '10 kg - 15 kg',
        '15 kg - 20 kg',
        'More than 20 kg'
    ];
  
    let petSize = props.initialSize || ''; 
  
    const inputClass = 'mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500';
  </script>
  
  