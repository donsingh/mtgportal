<template>
    <div class="flex flex-col gap-4">
        <h1 class="text-4xl font-bold text-center">
            Welcome to Magic the Gathering: Portal
        </h1>
        <div
            class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 p-4"
            v-if="!selectedCard"
        >
            <Card
                @view="onViewCard"
                v-for="card in cards"
                :key="card.id"
                :id="card.id"
                :name="card.name"
                :imageUrl="card.image_url"
            />
        </div>
        <div v-if="selectedCard" class="flex gap-12 justify-center">
            <div class="flex">
                <img
                    :src="selectedCard.image_url"
                    :alt="selectedCard.name"
                    class="h-auto object-cover"
                    style="width: 400px"
                />
            </div>

            <div class="space-y-4">
                <h2 class="text-2xl font-bold">{{ selectedCard.name }}</h2>
                <p><strong>Set:</strong> {{ set.name }}</p>
                <p>
                    <strong>Mana Cost:</strong>
                    <span class="flex gap-1">
                        <Mana v-for="cost in manaCost" :key="cost" :cost="cost" />
                    </span>
                </p>
                <p><strong>Rarity:</strong> {{ selectedCard.rarity }}</p>
                <button
                    @click="goBack"
                    class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-500"
                >
                    Go Back
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import Card from '../components/Card.vue';
import Mana from '../components/Mana.vue';
export default {
    components: {
        Card,
        Mana,
    },
    data() {
        return {
            cards: [],
            set: {},
            selectedCard: null,
        };
    },
    created() {
        this.loadcards();
    },
    methods: {
        async loadcards() {
            await this.axios.get('/cards').then((response) => {
                this.cards = response.data.cards;
                this.set = response.data.set;
            });
        },
        onViewCard(id) {
            this.selectedCard = this.cards.find((card) => card.id === id);
        },
        goBack() {
            this.selectedCard = null;
        },
    },
    computed: {
        manaCost() {
            return this.selectedCard.mana_cost
                .match(/{([^}]+)}/g)
                .map((item) => item.replace(/[{}]/g, '').toLowerCase());
        },
    },
};
</script>
