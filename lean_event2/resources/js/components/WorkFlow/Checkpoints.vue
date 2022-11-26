<script setup>
import { ref } from "vue";

const data = ref([]);

const getData = async () => {
  await axios('/api/checkpoints').then(res => {
    data.value = res.data;
    console.log(res.data);
  })
}
getData();
</script>

<template>
  <div class="checkpoints">
    <h1>Чекпоинты</h1>
    <table>
      <thead>
        <tr>
          <th>Чекпоинты</th>
          <th>Роль</th>
          <th>Начало</th>
          <th>Регламент</th>
          <th>Описание</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(d,index) in data" :key="d">
          <td><router-link :to="'/checkpoint/' + (index + 1)" >{{d.name}}</router-link></td>
          <td>{{ d.role }}</td>
          <td>{{ d.start }}</td>
          <td>{{ d.time }}</td>
          <td>{{ d.description }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<style scoped>
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
  margin-top: 50px;
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