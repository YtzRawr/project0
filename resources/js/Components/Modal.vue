<template>
    <div
        class="fixed inset-0 z-10 overflow-y-auto"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true"
    >
        <div
            class="flex items-start justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0 sm:items-end"
        >
            <div
                class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                aria-hidden="true"
                @click="$emit('hide')"
            ></div>
            <span
                class="hidden sm:inline-block sm:align-middle sm:h-screen"
                aria-hidden="true"
                >&#8203;</span
            >
            <div
                class="inline-block w-full px-4 pt-5 pb-4 overflow-y-visible text-left align-bottom bg-white rounded-lg shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6 md:max-w-2xl md:p-8"
            >
                <div>
                    <slot />
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    emits: ["hide"],
};
</script>
