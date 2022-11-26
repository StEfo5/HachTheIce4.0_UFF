<script setup>
</script>

<template>
  <div class="main">
    <!-- <header class="main-header">
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
    </header> -->
    <div class="sidebar">
      <div class="main-logo">
        <img src="../../../assets/main-logo.svg" alt="" />
      </div>
      <nav class="sidebar-menu">
        <ul class="sidebar-menu-list">
          <!-- <li class="active">
            <img src="../../../assets/dots-circle-horizontal.svg" alt="" />
            <span> Главное </span>
          </li> -->
          <li>
            <router-link to="/workflow">
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M9 20L3.55279 17.2764C3.214 17.107 3 16.7607 3 16.382V5.61803C3 4.87465 3.78231 4.39116 4.44721 4.72361L9 7M9 20L15 17M9 20V7M15 17L19.5528 19.2764C20.2177 19.6088 21 19.1253 21 18.382V7.61803C21 7.23926 20.786 6.893 20.4472 6.72361L15 4M15 17V4M15 4L9 7"
                  stroke="#A78BFA"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              <span> WorkFlow </span>
            </router-link>
          </li>
          <!-- <li>
            <router-link to="/profile">
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                  stroke="#A78BFA"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
                <path
                  d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z"
                  stroke="#A78BFA"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              <span> Профиль команды </span>
            </router-link>
          </li> -->
        </ul>
      </nav>
    </div>
    <div class="main-content">
      <router-view></router-view>
    </div>
  </div>
</template>

<style>
input::-moz-placeholder,
input::-webkit-input-placeholder {
  color: #c4b5fd;
  font-weight: medium;
}
.main {
  display: flex;
  /* background: url('../../../assets/ContourLines.svg') no-repeat; */
  /* background-size: 120%; */
  /* background-size: 3000px 1400px; */
  background-size: cover;
  /* background-position-x: -200px;
  background-position-y: 250px; */
  background-position-x: -300px;
  background-position-y: 200px;
  /* transform: rotate(30deg); */
}
.main-content {
  margin-top: 72px;
  padding: 16px;
  margin-left: 227px;
  
}
.main-header {
  height: 72px;
  display: flex;
}
.main-logo {
  width: 227px;
  height: 72px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.main-header-content {
  /* width: 85vw; */
  display: flex;
  justify-content: space-between;
  padding: 14px 16px;
  /* background: #f5f3ff; */
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
.sidebar-menu-list a {
  height: 48px;
  display: flex;
  padding: 12px 16px;
  align-items: center;
  gap: 16px;
}
.sidebar-menu-list span {
  font-weight: 500 !important;
  font-size: 16px;
  line-height: 19px;
  letter-spacing: -0.025em;

  /* Slate 50 */

  color: #a78bfa;
}
/* .sidebar-menu-list .active {
  background: #a78bfa;
  border-radius: 12px;
} */
.sidebar-menu-list .active span {
  color: #f8fafc;
}

.sidebar {
  width: 227px;
  background: #fff;
  height: 100vh;
  position: fixed;
}

.router-link-active {
  background: #a78bfa;
  border-radius: 12px;
}
.router-link-active span {
  color: #f8fafc;
}
.router-link-active path {
  stroke: #f8fafc;
}
</style>