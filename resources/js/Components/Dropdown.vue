<template>
  <div
    :class="[showDropdown ? 'relative w-full' : 'w-full']"
    v-click-outside="hideDropdown"
    >
    <div :class="inputClass" @click.prevent="toggleDropdown()">
      <p
        v-if="modelValue == null || modelValue.length < 1"
        class="pr-4 text-xs text-gray-400 truncate md:text-sm"
      >
        {{ placeholder }}
      </p>
      <p v-else class="truncate md:text-sm">{{ selectedItem }}</p>
      <svg class="right-0 m-3" width="20" height="20" fill="none">
        <path
          stroke="#6B7280"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="m5 7.5 5 5 5-5"
        />
      </svg>
    </div>
    <div
      v-if="showDropdown"
      class="z-50 w-full py-2 mt-3 bg-white border-gray-200 rounded-sm shadow outline-none cursor-pointer select-none ring-2 ring-offset-2 ring-blue-400"
      :class="[absolute ? 'absolute' : 'relative']"
    >
      <div
        class="flex justify-between px-3 py-2 group hover:bg-gray-100"
        v-for="(item, itemIndex) in items"
        :key="'dropdownItem' + itemIndex"
        @click.prevent="selectItem(item[this.itemKey])"
      >
        <p
          class="text-xs text-gray-500 group-hover:text-gray-900"
          :class="[
              item[itemKey] == selected
              ? 'text-blue-700 font-bold group-hover:text-blue-700'
              : '',
          ]"
        >
          {{ item[itemLabel] }}
        </p>
        <span
          v-if="item[itemKey] == selected"
          class="inset-y-0 right-0 pr-4 text-blue-700"
        >
          <!-- Heroicon name: solid/check -->
          <svg
            class="w-5 h-5"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            aria-hidden="true"
          >
            <path
              fill-rule="evenodd"
              d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
              clip-rule="evenodd"
            />
          </svg>
        </span>
      </div>
    </div>
  </div>
</template>

<script>
import vClickOutside from 'click-outside-vue3';

export default {
  props: {
    modelValue: {
      type: [Number, String],
    },
    items: {
      type: Array,
      default: [],
    },
    itemKey: {
      type: String,
      default: 'id',
    },
    itemLabel: {
      type: String,
      default: 'nombre',
    },
    placeholder: {
      type: String,
      default: 'Seleccione',
    },
    type: {
      type: String,
      default: 'large',
    },
    absolute: {
      type: Boolean,
      default: true,
    },
    nullable: {
      type: Boolean,
      default: false,
    }
  },

  data() {
    return {
      showDropdown: false,
      isFocussed: false,
      selected: '',
    };
  },

  mounted() {
    this.popupItem = this.$el;
  },

  directives: {
    clickOutside: vClickOutside.directive,
  },

  emits: ['update:modelValue'],

  computed: {
    selectedItem() {
      let item = this.$_.find(this.items, [this.itemKey, this.modelValue]);
      return this.$_.has(item, this.itemLabel) ? item[this.itemLabel] : '--';
    },
    inputClass() {
      let diff = '';
      this.type == 'small' ? (diff = ' h-8') : (diff = ' h-10');

      if (this.items.length == 0) {
        return (
          'w-full flex justify-between items-center bg-gray-100 cursor-not-allowed px-3 cursor-pointer text-xs text-gray-900 rounded border border-gray-200 outline-none' +
          diff
        );
      }

      this.isFocussed
        ? (diff +=
            ' border-gray-200 outline-none ring-2 ring-offset-2 ring-blue-400')
        : (diff += '');
      return (
        'w-full flex justify-between items-center pl-3 cursor-pointer text-xs text-gray-900 rounded border border-gray-200 outline-none md:text-sm' +
        diff
      );
    },
  },

  methods: {
    toggleDropdown() {
      if (this.items.length == 0) return;
      this.isFocussed = !this.isFocussed;
      this.showDropdown = !this.showDropdown;
    },
    hideDropdown() {
      this.isFocussed = false;
      this.showDropdown = false;
    },
    selectItem(selected) {
      if (this.nullable && this.selected == selected) {
        this.selected = null;
      } else {
        this.selected = selected;
      }
      this.$emit('update:modelValue', this.selected);
      this.hideDropdown();
    },
  },
};
</script>
