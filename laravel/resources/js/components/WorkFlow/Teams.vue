<script setup>
import { ref } from "vue";
import { useRouter, useRoute } from "vue-router";
import CriteriaVue from "./Criteria.vue";
const router = useRouter()
const route = useRoute()
const data = ref([])
const checkpoint_id = route.params.id;
console.log(checkpoint_id)
for (let i = 1; i <= 6; i++) {
  data.value.push({
    name: "UFF " + i,
    time: "12:00",
    ready: true,
    points: i,
    com: "Комментарии",
  })
}

const back = () => {
  router.go(-1)
}
</script>

<template>
  <div class="teams">
    <h1>Команды</h1>
    <img @click.prevent="back" class="back-button" src="../../../assets/backk.svg" alt="">
    <table>
      <thead>
        <tr>
          <th>Команды</th>
          <th>Время</th>
          <th>Готовность</th>
          <th>Баллы</th>
          <th>Комментарии</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="d in data" :key="d">
          <td><router-link :to="'/checkpoint/' + route.params.id + '/team/' + 1">{{d.name}}</router-link></td>
          <td>{{ d.time }}</td>
          <td><input class="custom-checkbox" type="checkbox" v-model="d.ready"/></td>
          <td>{{ d.points }}</td>
          <td>{{ d.com }}</td>
        </tr>
      </tbody>
    </table>
    <!-- <button class="check-criteria">должен находиться на месте и готов выступить</button>
    <button class="add-criteria">создать критерии</button> -->
  </div>
</template>

<style scoped>


input {
    position: absolute;
  z-index: -1;
  opacity: 0;
}
.back-button {
  cursor: pointer;
}
.custom-checkbox+label {
  display: inline-flex;
  align-items: center;
  user-select: none;
}
.custom-checkbox+label::before {
  content: '';
  display: inline-block;
  width: 1em;
  height: 1em;
  flex-shrink: 0;
  flex-grow: 0;
  border: 1px solid #adb5bd;
  border-radius: 0.25em;
  margin-right: 0.5em;
  background-repeat: no-repeat;
  background-position: center center;
  background-size: 50% 50%;
}
button {
    border: none;
    outline: none;  
    background: none;
    width: 100%;
}
.check-criteria {
    background: linear-gradient(270deg, #936AFF 0.11%, #FFB471 101.19%);
    height: 44px;
    cursor: pointer;
}
.add-criteria {
    border: dashed 2px  ;
    height: 40px;
    cursor: pointer;
}
h1 {
  font-family: "DuskWide";
  font-style: normal;
  font-weight: 500;
  font-size: 36px;
  line-height: 44px;
  background: linear-gradient(270deg, #936aff 70.11%, #ffb471 101.19%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}
table {
  margin-top: 20px;
  width: 1092px;
  height: 308px;
  border-collapse: collapse;
  border: none;
}
thead tr {
  background: #fb923c;
  text-align: left;
  height: calc(308px / 7);
}
thead th {
  font-weight: 700;
  font-size: 12px;
  line-height: 20px;
  /* identical to box height, or 167% */

  letter-spacing: 0.01em;
  text-transform: uppercase;

  /* Slate 50 */

  color: #f8fafc;
}
td,
th {
  padding: 0 16px;
}
tbody tr:nth-child(odd) td:nth-child(1) {
  background: #fdba74;
}
tbody tr:nth-child(even) td:nth-child(1) {
  background: #fed7aa;
}
tbody td:nth-child(1) {
  font-weight: 500;
  font-size: 14px;
  line-height: 20px;
  /* identical to box height, or 143% */

  /* slate 600 */

  color: #334155 !important;
}
tbody td {
  font-weight: 500;
  font-size: 14px;
  line-height: 20px;
  /* identical to box height, or 143% */

  /* Slate 50 */

  color: #f8fafc;
}
tbody tr:nth-child(odd) {
  background-color: #8b5cf6;
}

tbody tr:nth-child(even) {
  background-color: #a78bfa;
}
</style>