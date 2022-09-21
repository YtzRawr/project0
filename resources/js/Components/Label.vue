<template>
  <div class="mb-1.5 block text-xs text-gray-500 truncate md:text-sm">{{ value }}</div>
</template>

<script>
export default {
  props: {
    value: {
      type: String,
      default: '',
    },
  },
};
</script>
