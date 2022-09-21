<template>
  <div v-show="message">
    <p class="mt-1 text-xs text-red-500 md:text-sm">{{ message }}</p>
  </div>
</template>

<script>
export default {
  props: {
    message: {
      type: String,
      default: '',
      required: false,
    },
  },
};
</script>
