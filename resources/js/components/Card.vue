<template>
    <div class="max-w-xs bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="relative">
            <img
                :src="imageUrl"
                :alt="name"
                class="w-full h-auto object-cover"
                style="max-width: 226px; max-height: 311px; margin: 0 auto"
            />
        </div>

        <div class="p-4 flex justify-between items-center">
            <div class="font-bold text-lg text-gray-800">{{ name }}</div>
            <button
                @click="onViewClick"
                class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-500 transition"
            >
                View
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Card',
    props: {
        id: {
            type: String,
            required: true,
        },
        name: {
            type: String,
            required: true,
        },
        imageUrl: {
            type: String,
            required: true,
        },
    },
    methods: {
        onViewClick() {
            this.$emit('view', this.id);
        },
    },
};
</script>
