<script setup>
</script>

<template>
  <div class="main">
    <header class="main-header">
      <div class="main-logo">
        <img src="../../../assets/main-logo.svg" alt="" />
      </div>
      <div class="main-header-content">
        <div class="search">
          <img src="../../../assets/search.svg" alt="" />
          <input placeholder="Search" type="text" class="search-input" />
        </div>
        <nav class="main-header-menu">
          <ul class="main-header-menu__list">
            <li>
              <button><img src="../../../assets/bell.svg" alt="" /></button>
            </li>
            <li>
              <button><img src="../../../assets/moon.svg" alt="" /></button>
            </li>
            <li>
              <button class="profile-button"><img src="" alt="" /></button>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    <div class="sidebar">
      <nav class="sidebar-menu">
        <ul class="sidebar-menu-list">
          <li>Главное</li>
          <li>WorkFlow</li>
          <li>Профиль команды</li>
        </ul>
      </nav>
    </div>
    <div class="main-content">



    </div>
  </div>
</template>

<style>
input::-moz-placeholder,
input::-webkit-input-placeholder {
  color: #c4b5fd; font-weight: medium;
}

.main-header {
  height: 72px;
  display: flex;
}
.main-logo {
  width: 15vw;
  display: flex;
  align-items: center;
  justify-content: center;
}
.main-header-content {
  width: 85vw;
  display: flex;
  justify-content: space-between;
  padding: 14px 16px;
  background: #F5F3FF;
}
.main-header-menu__list {
  display: flex;
  gap: 8px;
}
.search {
  background: #f8fafc;
  border-radius: 12px;
  width: 364px;
  height: 44px;
  padding: 12px 16px;
  display: flex;
  gap: 8px;
  align-items: center;
}
.search input {
  outline: none;
  border: none;
  background: none;
  font-weight: medium;
  font-size: 14px;
  line-height: 20px;
}
.main-header-menu__list button {
  width: 44px;
  height: 44px;
  border: none;
  outline: none;
  background: #a78bfa;
  border-radius: 8px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
}
.profile-button {
  background: none !important;
}
.sidebar-menu-list li {
  height: 48px;
  display: flex;
  
}

.sidebar {
  width: 15vw;
  background: #F5F3FF;
  height: calc(100vh - 72px);
}
</style>