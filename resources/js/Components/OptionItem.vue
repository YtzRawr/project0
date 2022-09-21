<template>
  <div @click="$emit('click')" class="w-full px-3 py-1 cursor-pointer group hover:bg-gray-100">
    <span
      class="text-xs font-normal text-gray-500 group-hover:text-gray-900 md:text-sm"
    >
      <slot />
    </span>
  </div>
</template>

<script>
export default {
  emits: ['click'],
};
</script>
