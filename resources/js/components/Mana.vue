<template>
    <div>
        <img :src="icon" :alt="cost" class="icon" />
    </div>
</template>

<script>
export default {
    data() {
        return {
            icon: '',
        };
    },
    props: {
        width: {
            type: Number,
            default: 50,
        },
        height: {
            type: Number,
            default: 50,
        },
        cost: {
            type: String,
            default: '0',
        },
    },
    created() {
        import(`../../assets/mana/mana-${this.cost}.png`).then((icon) => {
            this.icon = icon.default;
        });
    },
};
</script>
<style>
.icon {
    width: 20px;
    height: 20px;
    fill: #000;
}
</style>
