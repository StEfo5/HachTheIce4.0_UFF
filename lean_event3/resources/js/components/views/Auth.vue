<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
const form = ref({
  firstname: "",
  lastname: "",
  email: "",
  password: "",
  c_password: "",
});
let date = new Date(Date.now() + 86400e3);
date = date.toUTCString();
document.cookie = "user=John; expires=" + date;
const router = useRouter();
const progress = ref(0);
const maxWidth = 470;
const progressbar = ref({
  width: maxWidth / 3 + "px",
});
const getImageUrl = (name) => {
  return new URL(`../../../assets/${name}`, import.meta.url).href;
};
const images = ref([
  "two-friends-hugging.png",
  "Guy sends a message from phone.png",
  "Woman enters a password on a laptop.png",
]);
const gogo = () => {
  if (!form.value.firstname && !form.value.firstname && progress.value === 0) {
    alert("Введите данные!");
    return;
  } else if (!form.value.email && progress.value === 1) {
    alert("Введите почту!");
    return;
  } else if (!form.value.password && progress.value === 2) {
    alert("Введите пароль!");
    return;
  } else if (form.value.password != form.value.c_password) {
    alert("Пароль не совпадает!");
    return;
  }
  if (progress.value === 2) router.push("/dashboard");

  progress.value++;
  let n = 1;
  let wi = maxWidth / 3 / 30;
  let wiid = (maxWidth / 3) * progress.value;
  let sec = setInterval(() => {
    wiid = wiid + wi;
    n++;
    if (n > 30) clearInterval(sec);
    progressbar.value.width = wiid + "px";
  }, 1);
  // progressbar.value.width = (maxWidth / 3) * (progress.value + 1) + "px";
};
const back = () => {
  if (progress.value === 0) return;
  progress.value--;
  let n = 1;
  let wi = maxWidth / 3 / 30;
  let wiid = (maxWidth / 3) * (progress.value + 2);
  let sec = setInterval(() => {
    wiid = wiid - wi;
    n++;
    if (n > 30) clearInterval(sec);
    progressbar.value.width = wiid + "px";
  }, 1);
  // progressbar.value.width = (maxWidth / 3) * (progress.value + 1) + "px";
};
</script>

<template>
  <div class="auth">
    <!-- <div class="bg-item-1"></div>
    <div class="bg-item-2"></div> -->
    <div class="container auth-container">
      <div class="auth-a">
        <transition mode="out-in">
          <img
            v-if="progress === 0"
            :class="'auth-img' + '-' + progress"
            :src="getImageUrl(images[progress])"
            alt=""
          />
          <img
            v-else-if="progress === 1"
            :class="'auth-img' + '-' + progress"
            :src="getImageUrl(images[progress])"
            alt=""
          />
          <img
            v-else-if="progress === 2"
            :class="'auth-img' + '-' + progress"
            :src="getImageUrl(images[progress])"
            alt=""
          />
        </transition>

        <div class="auth-b">
          <div class="auth-info">
            <div>
              <button @click.prevent="back" class="auth-back">
                <img src="../../../assets/arrow-left.svg" alt="" />
                <span class="auth-back-desc">Назад</span>
              </button>

              <h1>ЛОГО</h1>

              <ul class="auth-info-list">
                <li>
                  <img src="../../../assets/uil_users-alt.svg" alt="" />
                  <span>Знакомьтесь с новыми участниками</span>
                </li>
                <li>
                  <img src="../../../assets/uil_users-alt.svg" alt="" />
                  <span>Создавайте свое портфолио</span>
                </li>
                <li>
                  <img src="../../../assets/uil_users-alt.svg" alt="" />
                  <span>Проходите курсы и прокачивайте навыки</span>
                </li>
              </ul>
            </div>

            <div class="auth-info-progress">
              <span>{{ progress + 1 }}/3 этап регистрации</span>
              <div class="auth-info-progress-bar">
                <div :style="progressbar"></div>
              </div>
            </div>

            <div class="progress-bar"></div>
          </div>
          <div class="auth-form">
            <transition mode="out-in">
              <div v-if="progress === 0" class="auth-form-info">
                <h1>Введите ваше имя</h1>
                <p>Чтобы другие участники могли узнать вас</p>
              </div>
              <div v-else-if="progress === 1" class="auth-form-info">
                <h1>Введите вашу почту</h1>
                <p>Для получения уведомлений и защиты аккаунта</p>
              </div>
              <div v-else-if="progress === 2" class="auth-form-info">
                <h1>Задайте пароль</h1>
                <p>Для безопасности аккаунта, используйте сложный пароль</p>
              </div>
            </transition>
            <transition mode="out-in">
              <form
                class="auth-form-inputs"
                @submit.prevent="gogo"
                v-if="progress === 0"
              >
                <input
                  class="auth-form-input"
                  placeholder="Имя"
                  type="text"
                  v-model="form.firstname"
                /><input
                  class="auth-form-input"
                  placeholder="Фамилия"
                  type="text"
                  v-model="form.lastname"
                />
                <input
                  class="auth-form-inputs-submit"
                  type="submit"
                  value="Далее"
                />
              </form>
              <form
                class="auth-form-inputs"
                style="gap: 65px"
                @submit.prevent="gogo"
                v-else-if="progress === 1"
              >
                <input
                  class="auth-form-input"
                  placeholder="Почта"
                  type="email"
                  v-model="form.email"
                />
                <input
                  class="auth-form-inputs-submit"
                  type="submit"
                  value="Далее"
                />
              </form>
              <form
                class="auth-form-inputs"
                @submit.prevent="gogo"
                v-else-if="progress === 2"
              >
                <input
                  class="auth-form-input"
                  placeholder="Пароль"
                  type="text"
                  v-model="form.password"
                /><input
                  class="auth-form-input"
                  placeholder="Повторите пароль"
                  type="text"
                  v-model="form.c_password"
                />
                <input
                  class="auth-form-inputs-submit"
                  type="submit"
                  value="Отправить"
                />
              </form>
            </transition>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
.auth {
  height: 100vh;
  width: 100vw;
  /* overflow: hidden; */
  background: url("../../../assets/auth-bg.svg") no-repeat;
  background-size: 100%;
  background-position: center;
}
.auth-container {
  height: 100vh;
  display: flex;
  align-items: center;
}
input::-moz-placeholder,
input::-webkit-input-placeholder {
  color: #c4b5fd;
}
.auth-b {
  background: #8b5cf6;
  height: 530px;
  width: 100%;
  border-radius: 24px;
  display: flex;
  justify-content: space-between;
  padding: 92px 121px 72px 121px;
}
.auth-back {
  border: none;
  outline: none;
  background: none;
  cursor: pointer;
  display: flex;
  gap: 15px;
}
.auth-back-desc {
  font-size: 15px;
  line-height: 24px;
  letter-spacing: -0.025em;
  text-align: center;
  color: #f0f0ff;
}
.auth-a > img {
  position: relative;
}
.auth-img-0 {
  top: 31px;
}
.auth-img-1 {
  top: 15px;
  height: 256px;
}
.auth-img-2 {
  top: 35px;
  height: 256px;
}
.auth-a {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100%;
  margin-bottom: 40px;
}
.auth-info {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.auth-info h1 {
  color: #f8fafc;
  font-family: "DuskWide";
  font-size: 31.82px;
  line-height: 150%;
  letter-spacing: -0.023em;
}
.auth-info-list {
  display: flex;
  flex-direction: column;
  gap: 10px;
  color: #f0f0ff;
  margin-top: 30px;
}
.auth-info-list li {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 25px;
  line-height: 30px;
}
.auth-info-progress {
  display: flex;
  gap: 10px;
  flex-direction: column;
}
.auth-info-progress span {
  font-weight: 400;
  font-size: 25px;
  line-height: 30px;
  letter-spacing: -0.025em;
  color: #f5f3ff;
}
.auth-info-progress-bar {
  width: 469px;
  height: 10px;
  background: #f8fafc;
  border-radius: 12px;
}
.auth-info-progress-bar div {
  height: 10px;
  background: linear-gradient(270deg, #936aff 0.11%, #ffb471 101.19%);
  border-radius: 12px;
}

.auth-form {
  font-family: "Inter";
  display: flex;
  flex-direction: column;
  gap: 54px;
  width: 483px;
}
.auth-form-info h1 {
  font-weight: 500;
  font-size: 35px;
  line-height: 42px;
  color: #f5f3ff;
}
.auth-form-info p {
  font-size: 25px;
  line-height: 30px;
  color: #ddd6fe;
}
.auth-form-inputs {
  display: flex;
  flex-direction: column;
  gap: 27px;
}
.auth-form-input {
  font-family: "Inter";
  width: 100%;
  height: 39px;
  font-size: 16px;
  line-height: 19px;
  display: flex;
  text-align: center;
  justify-content: center;
  letter-spacing: -0.025em;
  padding: 10px 15px;
  background: #f8fafc;
  border-radius: 12px;
  outline: none;
  border: none;
}
.auth-form-inputs-submit {
  height: 70px !important;
  background: linear-gradient(270deg, #936aff 0.11%, #ffb471 101.19%);
  border-radius: 18.9px;
  outline: none;
  border: none;
  font-weight: 500;
  font-size: 25.2px;
  line-height: 30px;
  color: #f5f3ff;
}
.v-enter-active,
.v-leave-active {
  transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0;
}

@media screen and (max-width: 1500px) {
  .auth-b {
    /* background: #8b5cf6;
  height: 530px;
  width: 100%;
  border-radius: 24px;
  display: flex; */
    height: 100%;
    width: 600px;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 100px;
  }
  .auth {
    height: 100%;
    background: none;
  }
  .auth-container {
    height: 100%;
    display: flex;
    align-items: center;
  }
}
</style>