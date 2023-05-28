<template>
    <input type="file" @change="handleFileChange" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" />
  </template>

  <script setup>
  import { defineProps, defineEmits } from 'vue';

  const emit = defineEmits(['update:modelValue']);

  const props = defineProps({
    modelValue: {
      type: File,
      default: null,
      required: false
    }
  });

  const handleFileChange = (event) => {
    const file = event.target.files[0];
    emit('update:modelValue', file);
  };
  </script>
