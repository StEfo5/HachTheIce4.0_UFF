<script setup>
import { ref } from "vue";
import { useRouter, useRoute } from "vue-router";
const router = useRouter();
const route = useRoute();
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
// const formCrit = ref({
//     name: "",
//     checkpoint_id: route.params.id
// })
// const formOpt = ref({
//     name: "",
//     score: undefined
// })
const getData = async () => {
  await axios("/api/checkpoints/" + route.params.id + "/criteria/get").then(
    (res) => {
      data.value = res.data;
    }
  );
};
const exp = async () => {
  await axios.post("/api/checkpoints/" + route.params.id + "/team/" + route.params.team_id + "/expertise")
}
getData();
const back = () => {
  router.go(-1);
};
</script>

<template>
  <div class="criteria">
    <div>
      <h1>Критерии</h1>
      <img
        @click.prevent="back"
        class="back-button"
        src="../../../assets/backk.svg"
        alt=""
      />
    </div>

    <div>
      <ul>
        <form @submit.prevent="">
          <li v-for="n in data" :key="n">
            <h1>
              {{ n.name }}
            </h1>

            <span v-for="h in n.options" :key="h"
              >{{ h.name }} - {{ h.score }} баллов <input type="checkbox"
            /></span>

            <!-- <addOptions :id="n.id"></addOptions> -->
            <!-- <form @submit.prevent="setOptions(n.id)">
            <input v-model="formOpt.name" type="text">
            <input v-model="formOpt.score" type="text">
            <input type="submit">
        </form> -->
          </li>
        </form>

        <li>
          <!-- <form @submit.prevent="setCriteria">
<input v-model="formCrit.name" type="text">
<input type="submit">
        </form> -->
        </li>
      </ul>
    </div>
    <!-- <button>Создать критерии</button>
    <table>
        <thead>
            <tr>
                <th>Критерии</th>
                <th>Варианты</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="">

                </td>
            </tr>
        </tbody>
    </table> -->
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