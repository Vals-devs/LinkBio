import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from '../stores/auth.js'

const routes = [
  {
    path: '/login',
    name: 'Login',
    component: () => import('../views/auth/Login.vue'),
    meta: { guest: true }
  },
  {
    path: '/register',
    name: 'Register',
    component: () => import('../views/auth/Register.vue'),
    meta: { guest: true }
  },
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: () => import('../views/dashboard/Home.vue'),
    meta: { requiresAuth: true }
  },
  {
    path: '/dashboard/profile',
    name: 'DashboardProfile',
    component: () => import('../views/dashboard/Profile.vue'),
    meta: { requiresAuth: true }
  },
  {
    path: '/dashboard/links',
    name: 'DashboardLinks',
    component: () => import('../views/dashboard/Links.vue'),
    meta: { requiresAuth: true }
  },
  {
    path: '/dashboard/analytics',
    name: 'DashboardAnalytics',
    component: () => import('../views/dashboard/Analytics.vue'),
    meta: { requiresAuth: true }
  },
  {
    path: '/dashboard/ai-tools',
    name: 'DashboardAITools',
    component: () => import('../views/dashboard/AITools.vue'),
    meta: { requiresAuth: true }
  },
  {
    path: '/dashboard/theme',
    name: 'DashboardThemeEditor',
    component: () => import('../views/dashboard/ThemeEditor.vue'),
    meta: { requiresAuth: true }
  },
  {
    path: '/',
    name: 'Landing',
    component: () => import('../views/Landing.vue')
  },
  {
    path: '/:username',
    name: 'PublicPage',
    component: () => import('../views/public/PublicPage.vue')
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  const authStore = useAuthStore()
  if (to.meta.requiresAuth && !authStore.isAuthenticated) {
    next('/login')
  } else if (to.meta.guest && authStore.isAuthenticated) {
    next('/dashboard')
  } else {
    next()
  }
})

export default router
