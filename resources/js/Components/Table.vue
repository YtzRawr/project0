<template>
  <div class="w-full mt-6 md:mt-8 xl:mt-12">
    <div class="flex flex-col">
      <div class="-my-2 sm:-mx-6 lg:-mx-8">
        <div class="min-w-full py-2 align-middle rounded-md sm:px-6 lg:px-8">
          <table
            class="min-w-full border border-gray-200 divide-y divide-gray-200"
          >
            <thead class="bg-gray-100">
              <tr>
                <TableHeader
                  v-for="column in columns"
                  :prop="column.props.prop"
                  :sortable="column.props.sortable"
                  :filter="filters.sort"
                  @sort="handleSort"
                >
                  {{ column.props.label }}
                </TableHeader>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="(item, index) in dataTable" :key="index">
                <TableData
                  v-for="column in columns"
                  :item="item"
                  :column="column"
                />
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <TableFooter v-if="paginable" :pages="data" />
    <div v-show="false">
      <slot />
    </div>
  </div>
</template>

<script>
import TableHeader from '@/Components/TableHeader';
import TableFooter from '@/Components/TableFooter';
import TableData from '@/Components/TableData';

export default {
  props: {
    data: {
      type: [Array, Object],
      required: true,
    },
    paginable: {
      type: Boolean,
      default: false,
    },
  },

  components: {
    TableData,
    TableHeader,
    TableFooter,
  },

  computed: {
    dataTable() {
      if (this.paginable) {
        return this.data.data;
      }
      return this.data;
    },
  },

  data() {
    return {
      filters: {
        sort: this.route().params.sort ?? { sortBy: '', order: '' },
      },
      columns: this.$slots.default().map((col) => {
        return { props: col.props ?? {}, children: col.children };
      }),
    };
  },

  methods: {
    handleSort(filterState) {
      if (
        filterState.sortBy.length > 0 &&
        this.filters.sort.sortBy != filterState.sortBy
      ) {
        this.filters.sort.sortBy = filterState.sortBy;
        this.filters.sort.order = 'asc';
      } else {
        this.filters.sort.sortBy = filterState.sortBy;
        this.filters.sort.order = filterState.order;
      }
      this.$emit('onSort', this.filters.sort);
    },
  },
};
</script>
