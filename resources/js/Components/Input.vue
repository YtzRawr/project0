<template>
  <input
    :class="inputClass"
    :type="type"
    :placeholder="placeholder"
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
  />
</template>

<script>
export default {
  props: {
    modelValue: {
      type: String,
      default: '',
    },
    placeholder: {
      type: String,
      default: '',
    },
    theme: {
      type: String,
      defatul: 'large',
    },
    type: {
      type: String,
      default: 'text',
    },
  },

  emits: ['update:modelValue'],

  computed: {
    inputClass() {
      let diff = '';
      this.theme == 'small' ? (diff = ' h-8') : (diff = ' h-10');

      return (
        'w-full text-xs text-gray-900 placeholder-gray-400 rounded border border-gray-200 outline-none focus:border-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 md:text-sm' +
        diff
      );
    }
  },

};
</script>
