import { createRouter, createWebHistory } from 'vue-router'
const routes = [
    {
        path: '/',
        component: () => import('../components/views/Auth.vue')
    },
    {
        path: '/dashboard',
        component: () => import('../components/views/Dashboard.vue')
    },
]
const router = createRouter({ history: createWebHistory(), routes })
export default router