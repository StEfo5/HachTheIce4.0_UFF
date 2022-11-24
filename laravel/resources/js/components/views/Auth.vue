<script setup>
</script>

<template>
  <div class="auth">
    <div class="bg-item-1"></div>
    <div class="bg-item-2"></div>
    <div class="container auth-container">
      <div class="auth-a">
        <img
          class="auth-img"
          src="../../../assets/two friends hugging.png"
          alt=""
        />
        <div class="auth-b">
          <div class="auth-info">
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
            <div class="auth-info-progress">
              <span>1/3 этап регистрации</span>
              <div class="auth-info-progress-bar"><div></div></div>
            </div>

            <div class="progress-bar"></div>
          </div>
          <div class="auth-form">
            <div class="auth-form-info">
              <h1>Введите ваше имя</h1>
              <p>Чтобы другие участники могли узнать вас</p>
            </div>

            <div class="auth-form-inputs">
              <input
                class="auth-form-input"
                placeholder="Имя"
                type="text"
              /><input
                class="auth-form-input"
                placeholder="Фамилия"
                type="text"
              />
              <input
                class="auth-form-inputs-submit"
                type="submit"
                value="Далее"
              />
            </div>
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
.auth-img {
  position: relative;
  top: 31px;
}
.auth-a {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100%;
  margin-bottom: 40px;
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
  padding-top: 85px;
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
  width: 235px;
  height: 10px;
  background: linear-gradient(270deg, #936AFF 0.11%, #FFB471 101.19%);
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
</style>