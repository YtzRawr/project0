<template>
  <div class="w-full mt-6 md:mt-10">
    <div v-if="toggle" class="flex items-center justify-end w-full">
      <button
        class="flex items-center px-2 py-1 text-xs font-semibold text-gray-500 rounded-sm select-none focus:outline-none md:text-sm"
        @click.prevent="toggleFilters()"
      >
        <p v-if="!showFilters">Mostrar Filtros</p>
        <p v-else>Ocultar Filtros</p>
        <svg
          :class="{ 'rotate-180': showFilters }"
          class="ml-1 md:ml-2"
          width="20"
          height="20"
          fill="none"
        >
          <path
            stroke="#6B7280"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="m5 7.5 5 5 5-5"
          />
        </svg>
      </button>
    </div>
    <div class="flex flex-wrap" v-if="showFilters">
      <div class="w-full grid grid-cols-12 gap-4 md:gap-6">
        <slot />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    toggle: {
      type: Boolean,
      default: false,
    },
  },

  data() {
    return {
      showFilters: true,
    };
  },

  methods: {
    toggleFilters() {
      this.showFilters = !this.showFilters;
    },
  },
};
</script>
