<script setup>
import { RouterView } from "vue-router";
import Navbar from "./components/Navbar.vue";
</script>

<template>
  <Navbar />
  <div class="body">
    <RouterView />
  </div>
</template>

<style scoped>
.body {
  margin: 1rem;
}
</style>
