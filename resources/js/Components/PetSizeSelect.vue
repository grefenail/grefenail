    <template>
        <select v-model="pet_size" :class="inputClass" @change="$emit('change', pet_size)">
            <option value="" disabled >Pet Size</option>
            <option v-for="(size, index) in $page.props.pet_sizes" :key="index" :value="size.id">{{ size.size }}</option>
        </select>
    </template>
  
    <script setup>
    const props = defineProps({
      size: {
        type: String,
        required: true
      }
    });
  
    let pet_size = props.size || ''; 
  
    const inputClass = 'shadow mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500';
  </script>
  
  