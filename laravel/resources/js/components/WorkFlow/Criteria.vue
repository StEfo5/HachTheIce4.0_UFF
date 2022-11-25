<script setup>
import { ref } from "vue";
import { useRouter, useRoute } from 'vue-router'
const router = useRouter()
const data = ref([]);
for (let i = 1; i <= 6; i++) {
  data.value.push({
    name: "UFF " + i,
    time: "12:00",
    ready: "datatat",
    points: i,
    com: "Комментарии",
  });
}

const back = () => {
  router.go(-1)
}
</script>

<template>
  <div class="criteria">
    <div>
        <h1>Критерии</h1>
        <img @click.prevent="back" class="back-button" src="../../../assets/backk.svg" alt="">
    </div>
    <table>
        <thead>
            <tr>
                <th>Критерии</th>
                <th>Варианты</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan=""></td>
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
.back-button {
  cursor: pointer;
}
table {
    margin-top: 50px;
    width: 1092px;
    height: 308px;
}
thead tr {

}
</style>