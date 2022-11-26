<script setup>
import { ref } from 'vue'
import { useRoute } from 'vue-router'
import addOptions from './AddOptions.vue'
const route = useRoute()
const data = ref([])
const formCrit = ref({
    name: "",
    checkpoint_id: route.params.id
})
const formOpt = ref({
    name: "",
    score: undefined
})
const getData = async() =>{
    await axios('/api/checkpoints/' + route.params.id + '/criteria/get').then(res => {
        data.value = res.data;
    })
}
const setCriteria = async() => {
    await axios.post('/api/checkpoints/' + route.params.id + '/criteria/create', formCrit.value).then(res => {
        getData();
    }) //
}
const setOptions = async (id) => {
    await axios.post('/api/checkpoints/' + route.params.id + '/criteria/' + id, formCrit.value).then(res => {
        getData();
    })
}
</script>

<template>
    <div class="criteria">
        <h1 @click="getData">Критерии</h1>
        <div class="add">
<ul>
    <li v-for="n in data" :key="n">
        <h1>
            {{ n.name }} 
        </h1>
        
        <span v-for="h in n.options" :key="h">{{h.name}} - {{h.score}} баллов</span>

        <addOptions :id="n.id"></addOptions>
        <!-- <form @submit.prevent="setOptions(n.id)">
            <input v-model="formOpt.name" type="text">
            <input v-model="formOpt.score" type="text">
            <input type="submit">
        </form> -->
    </li>
    <li>
        <form @submit.prevent="setCriteria">
<input v-model="formCrit.name" type="text">
<input type="submit">
        </form>
        
    </li>
</ul>
        </div>

        <!-- <table>
            <thead>
                <tr>
                    <th>Критерии</th>
                    <th>Варианты</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text">
                    </td>
                    <td>
                        
                    </td>
                </tr>
            </tbody>
        </table> -->
    </div>
</template>

<style scoped>
input {
    border: solid 1px;
}
.criteria {
    margin-top: 40px;
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
    width: 1024px;
    height: 500px;
}
li {
    display: flex;
    flex-direction: column;
}
</style>