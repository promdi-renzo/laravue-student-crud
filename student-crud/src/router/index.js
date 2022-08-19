import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "students",
      component: () => import("../views/StudentsView.vue"),
    },
    {
    {
      path: "/add",
      name: "add",
      component: () => import("../views/Addview.vue"),
    },
  ],
});

export default router;
