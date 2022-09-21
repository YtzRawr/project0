<template>
  <div class="w-full">
    <Label class="mb-1.5" :value="label" />
    <Dropdown
      v-model="value"
      :type="type"
      :placeholder="placeholder"
      :absolute="absolute"
      :items="items"
      :itemKey="itemKey"
      :itemLabel="itemLabel"
      @update:modelValue="$emit('update:value', $event)"
    />
    <InputError class="mt-1" :message="error" />
  </div>
</template>

<script>
import Label from '@/Components/Label.vue';
import Dropdown from '@/Components/Dropdown.vue';
import InputError from '@/Components/FormError';

export default {
  components: {
    Label,
    Dropdown,
    InputError,
  },

  props: [
    'type',
    'label',
    'items',
    'itemKey',
    'value',
    'placeholder',
    'error',
    'absolute',
    'nullable',
    'itemLabel',
  ],

  emits: ['update:value'],
};
</script>

