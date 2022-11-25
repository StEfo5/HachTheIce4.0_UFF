<script setup>
import CheckpointsVue from "../WorkFlow/Checkpoints.vue";
import TeamsVue from "../WorkFlow/Teams.vue";
</script>

<template>
  <div class="workflow">
    <!-- <h1>WorkFlow</h1> -->
    <CheckpointsVue></CheckpointsVue>
  </div>
</template>

<style scoped>
h1 {
  font-family: "DuskWide" !important;
  font-size: 36px;
  line-height: 44px;
  /* identical to box height */

  /* slate 600 */

  color: #334155;
  margin-bottom: 20px;
}
</style>