<template>
  <form @submit.prevent="setOptions">
    <input v-model="form.name" type="text" />
    <input v-model="form.score" type="number" />
    <input type="submit" />
  </form>
</template>

<script setup>
import { ref } from "vue";
import { useRoute } from 'vue-router'
const route = useRoute();
const props = defineProps(["id"]);
const form = ref({
  name: "",
  score: undefined,
});
const setOptions = async () => {
    // form.value.score = Number(form.value.score)
    console.log(form.value.score)
    console.log(props.id)
  await axios.post(
    "/api/checkpoints/" + route.params.id + "/criteria/" + Number(props.id),
    form.value
  )
};
</script>

<style>
input {
    border: solid 1px;
}
</style>