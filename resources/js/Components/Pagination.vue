<template>
  <div class="flex items-center justify-center w-full px-2 py-3 mt-4">
    <div class="flex justify-between flex-1 sm:hidden">
      <Link
        :href="prev_page"
        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50"
      >
        Anterior
      </Link>
      <Link
        :href="next_page"
        class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50"
      >
        Siguiente
      </Link>
    </div>

    <div>
      <nav class="relative z-0 inline-flex rounded-md" aria-label="Pagination">
        <Link
          :href="prev_page"
          class="relative inline-flex items-center px-1 py-2 mx-0.5 text-sm font-medium text-gray-300 bg-white border border-gray-200 rounded hover:bg-gray-50"
        >
          <span class="sr-only">Previous</span>
          <!-- Heroicon name: solid/chevron-left -->
          <svg
            class="w-5 h-5"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            aria-hidden="true"
          >
            <path
              fill-rule="evenodd"
              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
              clip-rule="evenodd"
            />
          </svg>
        </Link>

        <span v-for="i in pages">
          <span
            v-if="i == '...'"
            class="relative inline-flex items-center px-3 py-2 mx-0.5 rounded text-sm font-medium text-gray-300 bg-white border border-gray-200"
          >
            ...
          </span>
          <Link
            v-else
            :href="pageUrl(i)"
            aria-current="page"
            class="relative inline-flex items-center px-3 py-2 mx-0.5 rounded text-sm font-medium text-gray-300 bg-white border border-gray-200 hover:bg-gray-50"
            :class="{
              'text-gray-600 border-gray-600 bg-gray-50':
                i == paginationData.current_page,
            }"
          >
            {{ i }}
          </Link>
        </span>

        <Link
          :href="next_page"
          class="relative inline-flex items-center px-1 py-2 mx-0.5 text-sm font-medium text-gray-300 bg-white border border-gray-200 rounded hover:bg-gray-50"
        >
          <span class="sr-only">Next</span>
          <!-- Heroicon name: solid/chevron-right -->
          <svg
            class="w-5 h-5"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            aria-hidden="true"
          >
            <path
              fill-rule="evenodd"
              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
              clip-rule="evenodd"
            />
          </svg>
        </Link>
      </nav>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
  props: {
    paginationData: Object,
  },

  components: {
    Link,
  },

  computed: {
    next_page() {
      if (this.paginationData.next_page_url) {
        let params = this.route().params;
        params.page = this.paginationData.next_page_url.split('=').at(-1);

        return this.route(this.route().current(), params);
      }

      return '#';
    },
    prev_page() {
      if (this.paginationData.prev_page_url) {
        let params = this.route().params;
        params.page = this.paginationData.prev_page_url.split('=').at(-1);

        return this.route(this.route().current(), params);
      }

      return '#';
    },
    pages() {
      let delta = 4;
      let range = {
        start: Math.round(this.paginationData.current_page - delta / 2),
        end: Math.round(this.paginationData.current_page + delta / 2),
      };

      if (
        range.start - 1 === 1 ||
        range.end + 1 === this.paginationData.last_page
      ) {
        range.start += 1;
        range.end += 1;
      }

      let pages =
        this.paginationData.current_page > delta
          ? this.getRange(
              Math.min(range.start, this.paginationData.last_page - delta),
              Math.min(range.end, this.paginationData.last_page)
            )
          : this.getRange(
              1,
              Math.min(this.paginationData.last_page, delta + 1)
            );

      let withDots = (value, pair) =>
        pages.length + 1 !== this.paginationData.last_page ? pair : [value];

      if (pages[0] !== 1) {
        pages = withDots(1, [1, '...']).concat(pages);
      }

      if (pages[pages.length - 1] < this.paginationData.last_page) {
        pages = pages.concat(
          withDots(this.paginationData.last_page, [
            '...',
            this.paginationData.last_page,
          ])
        );
      }

      return pages;
    },
  },

  methods: {
    pageUrl(page) {
      let params = this.route().params;
      params.page = page;

      return this.route(this.route().current(), params);
    },

    getRange(start, end) {
      return Array(end - start + 1)
        .fill()
        .map((v, i) => i + start);
    },
  },
};
</script>
