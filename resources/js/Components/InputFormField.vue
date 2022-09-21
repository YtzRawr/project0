<template>
  <div class="w-full">
    <Label :value="label" />
    <Input
      :type="type"
      :placeholder="placeholder"
      :theme="theme"
      v-model="modelValue"
    />
    <Error :message="error" />
  </div>
</template>

<script>
import Label from '@/Components/Label.vue';
import Input from '@/Components/Input.vue';
import Error from '@/Components/FormError.vue';

export default {
  components: {
    Label,
    Input,
    Error,
  },

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
    error: {
      type: String,
      default: '',
    },
    label: {
      type: String,
      default: '',
    },
    type: {
      type: String,
      default: 'text',
    },
  },

  emits: ['update:modelValue'],

  watch: {
    modelValue(newText, oldText) {
      this.$emit('update:modelValue', newText);
    }
  },
};
</script>
