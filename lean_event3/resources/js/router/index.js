import { createRouter, createWebHistory } from 'vue-router'
const routes = [
    {
        path: '/',
        component: () => import('../components/views/Landing.vue')
    },
    {
        path: '/workflow',
        component: () => import('../components/views/WorkFLow.vue')
    }, 
    {
        path: '/profile',
        component: () => import('../components/views/Profile.vue')
    },
    {
        path: '/checkpoint/:id',
        component: () => import('../components/views/CheckpointPage.vue')
    },
    {
        path: '/checkpoint/:id/team/:team_id',
        component: () => import('../components/views/TeamCriteriaPage.vue')
    }
]
const router = createRouter({ history: createWebHistory(), routes })
export default router