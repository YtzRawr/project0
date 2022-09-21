<template>
  <div class="relative flex-shrin-0" v-click-outside="hideDropdown">
    <button
      class="relative text-gray-500 bg-white rounded-full cursor-pointer focus:outline-none"
      :class="{ 'ring-2 ring-offset-2 ring-blue-400': isFocused }"
      @click.prevent="toggleDropdown()"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        fill="none"
      >
        <path
          fill="#9CA3AF"
          fill-rule="evenodd"
          d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2Zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2Zm-8 2c0-1.1.9-2 2-2s2 .9 2 2-.9 2-2 2-2-.9-2-2Z"
          clip-rule="evenodd"
        />
      </svg>
    </button>
    <div
      v-if="showDropdown"
      class="absolute right-0 z-20 w-24 py-2 mt-3 bg-white border-gray-200 rounded-sm shadow outline-none ring-2 ring-offset-2 ring-blue-400 md:w-32"
    >
      <slot />
    </div>
  </div>
</template>

<script>
import vClickOutside from 'click-outside-vue3';
import _ from 'lodash';

export default {
  data() {
    return {
      showDropdown: false,
      isFocused: false,
    };
  },

  mounted() {
    this.popupItem = this.$el;
  },

  directives: {
    clickOutside: vClickOutside.directive,
  },

  methods: {
    toggleDropdown() {
      this.showDropdown = !this.showDropdown;
      this.isFocused = !this.isFocused;
    },
    hideDropdown() {
      this.showDropdown = false;
      this.isFocused = false;
    },
  },
};
</script>
8
