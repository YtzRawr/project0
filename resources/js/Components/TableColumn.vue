<template>
  <div class="hello">
    <slot :row="row" />
  </div>
</template>

<script>
export default {
  name: 'table-column',

  props: {
    label: {
      type: String,
      default: '',
    },
    prop: {
      type: String,
      default: '',
    },
    sortable: {
      type: Boolean,
      default: false,
    },
  },

  data() {
    return {
      row: 'row',
    };
  },
};
</script>
