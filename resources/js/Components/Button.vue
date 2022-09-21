<template>
  <button
    @click="$emit('click')"
    :type="type"
    class="flex-shrink-0 px-4 text-sm font-bold text-white bg-gray-600 rounded-md h-7 focus:outline-none hover:bg-gray-700 xl:h-8 xl:text-base"
    >
    <slot />
  </button>
</template>

<script>
export default {
  props: {
    theme: {
        type: String,
        default: 'primary',
    },
    type: {
        type: String,
        default: 'submit',
    },
  },
}
</script>
