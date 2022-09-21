<template>
  <div class="table-footer">
    <Pagination :paginationData="pages" />
  </div>
</template>

<script>
import Pagination from '@/Components/Pagination';

export default {
  name: 'table-footer',

  props: {
    pages: {
      type: [Object, Array],
      required: true,
    },
  },

  components: {
    Pagination,
  },
};
</script>
