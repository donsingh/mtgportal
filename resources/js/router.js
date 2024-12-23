import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: "/",
      name: "home",
      component: () => import("./Pages/Home.vue"),
    },
    {
        path: "/sets",
        name: "sets",
        component: () => import("./Pages/Sets.vue"),
      },
  ],
});

export default router;