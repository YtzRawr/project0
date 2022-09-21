<script>
import { h } from 'vue';

export default {
  props: {
    item: {
      type: Object,
      default: {},
    },
    column: {
      type: Object,
      default: {},
    },
  },

  data() {
    return {
      row: 'hello from table-data',
    };
  },

  render() {
    if (this.column.children) {
      return h(
        'td',
        {
          class:
            'hidden px-4 py-3 text-sm font-medium text-gray-700 whitespace-nowrap xl:table-cell xl:px-6',
        },
        this.column.children.default({
          row: this.item,
        })
      );
    }

    return h('td', {
      class:
        'hidden px-4 py-3 text-sm font-medium text-gray-700 whitespace-nowrap xl:table-cell xl:px-6',
      innerHTML: this.$_.get(this.item, this.column.props.prop, ''),
    });
  },
};
</script>
