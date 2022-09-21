<template>
  <th
    scope="col"
    class="px-4 py-3 text-sm font-medium text-left text-gray-400 uppercase xl:px-6"
  >
    <button
      @click.prevent="handleSort"
      v-if="sortable"
      class="inline-flex items-center group"
    >
      <p class="text-sm font-medium text-left text-gray-400 uppercase">
        <slot />
      </p>
      <span
        class="flex-none ml-2 rounded"
        :class="{
          'bg-gray-200 text-gray-900 group-hover:bg-gray-300':
            filter.sortBy == prop,
          'text-gray-100 group-hover:text-gray-400':
            filter.sortBy != prop || !filter.sortBy,
        }"
      >
        <!-- Heroicon name: solid/chevron-up -->
        <svg
          v-if="filter.order == 'desc' && filter.sortBy == prop"
          class="w-5 h-5"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
          fill="currentColor"
          aria-hidden="true"
        >
          <path
            fill-rule="evenodd"
            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
            clip-rule="evenodd"
          />
        </svg>

        <!-- Heroicon name: solid/chevron-down -->
        <svg
          v-else
          class="w-5 h-5"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 20 20"
          fill="currentColor"
          aria-hidden="true"
        >
          <path
            fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"
          />
        </svg>
      </span>
    </button>
    <slot v-else />
  </th>
</template>

<script>
export default {
  props: {
    prop: {
      type: String,
      default: '',
    },
    sortable: {
      type: Boolean,
      default: false,
    },
    filter: {
      type: Object,
      required: true,
    },
  },

  methods: {
    handleSort() {
      if (this.filter.order.length == 0) {
        this.$emit('sort', { sortBy: this.prop, order: 'asc' });
      } else if (this.filter.order == 'asc') {
        this.$emit('sort', { sortBy: this.prop, order: 'desc' });
      } else if (this.filter.order == 'desc' && this.filter.sortBy == this.prop) {
        this.$emit('sort', { sortBy: '', order: '' });
      } else {
        this.$emit('sort', { sortBy: this.prop, order: '' });
      }
    },
  },
};
</script>
