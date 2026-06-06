<template>
  <div class="min-h-screen bg-gradient-to-br from-slate-900 via-[#0A192F] to-indigo-950 text-slate-100 font-sans antialiased selection:bg-cyan-500 selection:text-slate-900 relative overflow-hidden flex items-center justify-center p-4">
    <!-- Ambient background blobs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
      <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-emerald-500/5 rounded-full blur-[120px]"></div>
      <div class="absolute bottom-[-10%] right-[-10%] w-[600px] h-[600px] bg-teal-500/10 rounded-full blur-[150px]"></div>
    </div>

    <!-- Language Capsule Switcher (Absolute top-right) -->
    <div class="absolute top-4 sm:top-6 right-4 sm:right-6 z-10 flex items-center gap-1 bg-white/5 border border-white/10 rounded-xl p-1">
      <button 
        @click="langStore.setLanguage('en')" 
        :class="langStore.locale === 'en' ? 'bg-cyan-500 text-slate-900 font-bold' : 'text-slate-400 hover:text-white'" 
        class="px-2.5 py-1 text-[10px] rounded-lg transition-all"
      >
        EN
      </button>
      <button 
        @click="langStore.setLanguage('id')" 
        :class="langStore.locale === 'id' ? 'bg-cyan-500 text-slate-900 font-bold' : 'text-slate-400 hover:text-white'" 
        class="px-2.5 py-1 text-[10px] rounded-lg transition-all"
      >
        ID
      </button>
    </div>
 
    <!-- Back to Landing Link -->
    <div class="absolute top-4 sm:top-6 left-4 sm:left-6 z-10">
      <router-link to="/" class="flex items-center gap-2 text-slate-400 hover:text-white text-xs font-semibold transition-colors bg-white/5 px-2.5 sm:px-3 py-1.5 rounded-xl border border-white/5">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        <span class="hidden sm:inline">LinkBio AI</span>
      </router-link>
    </div>

    <div class="w-full max-w-md relative z-10">
      <div class="bg-slate-900/40 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/5 p-8 sm:p-10 relative overflow-hidden">
        <!-- Inner ambient overlay -->
        <div class="absolute top-0 right-0 w-24 h-24 rounded-full bg-emerald-500/5 blur-2xl pointer-events-none"></div>

        <div class="text-center mb-6">
          <router-link to="/" class="inline-flex w-14 h-14 mb-4 rounded-2xl bg-gradient-to-br from-emerald-400 to-teal-600 items-center justify-center shadow-lg shadow-emerald-500/20 active:scale-95 transition-all">
            <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
            </svg>
          </router-link>
          <h1 class="text-2xl font-bold text-white tracking-tight">{{ langStore.t('registerTitle') }}</h1>
          <p class="text-xs text-slate-400 mt-2 max-w-sm mx-auto leading-relaxed">{{ langStore.t('registerSub') }}</p>
        </div>

        <form @submit.prevent="handleRegister" class="space-y-4">
          <div>
            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2.5">{{ langStore.t('fullName') }}</label>
            <input
              v-model="form.name"
              type="text"
              required
              class="w-full px-4 py-3 rounded-xl border border-white/10 bg-slate-950/40 text-slate-100 placeholder-slate-500 focus:border-emerald-500/80 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all text-sm"
              :placeholder="langStore.t('namePlaceholder')"
            >
          </div>
          <div>
            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2.5">{{ langStore.t('username') }}</label>
            <input
              v-model="form.username"
              type="text"
              required
              class="w-full px-4 py-3 rounded-xl border border-white/10 bg-slate-950/40 text-slate-100 placeholder-slate-500 focus:border-emerald-500/80 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all text-sm"
              :placeholder="langStore.t('usernamePlaceholder')"
            >
          </div>
          <div>
            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2.5">{{ langStore.t('email') }}</label>
            <input
              v-model="form.email"
              type="email"
              required
              class="w-full px-4 py-3 rounded-xl border border-white/10 bg-slate-950/40 text-slate-100 placeholder-slate-500 focus:border-emerald-500/80 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all text-sm"
              :placeholder="langStore.t('emailPlaceholder')"
            >
          </div>
          <div>
            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-2.5">{{ langStore.t('password') }}</label>
            <input
              v-model="form.password"
              type="password"
              required
              minlength="8"
              class="w-full px-4 py-3 rounded-xl border border-white/10 bg-slate-950/40 text-slate-100 placeholder-slate-500 focus:border-emerald-500/80 focus:ring-4 focus:ring-emerald-500/10 outline-none transition-all text-sm"
              placeholder="••••••••"
            >
          </div>
          <div class="pt-2">
            <button
              type="submit"
              :disabled="loading"
              class="w-full py-3.5 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 disabled:from-emerald-800 disabled:to-teal-800 text-slate-900 font-extrabold rounded-xl transition-all shadow-lg shadow-emerald-500/10 hover:shadow-emerald-500/20 flex items-center justify-center gap-2 active:scale-[0.98]"
            >
              <svg v-if="loading" class="animate-spin w-5 h-5 text-slate-900" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
              </svg>
              <span>{{ loading ? langStore.t('creatingAccount') : langStore.t('createAccount') }}</span>
            </button>
          </div>
        </form>

        <p class="text-center text-xs text-slate-400 mt-8">
          {{ langStore.t('alreadyHaveAccount') }}
          <router-link to="/login" class="text-cyan-400 hover:text-cyan-300 font-bold ml-1 transition-colors">{{ langStore.t('loginNow') }}</router-link>
        </p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '../../stores/auth.js'
import { useLangStore } from '../../stores/lang.js'

const router = useRouter()
const authStore = useAuthStore()
const langStore = useLangStore()

const form = reactive({
  name: '',
  username: '',
  email: '',
  password: ''
})

const loading = ref(false)

const handleRegister = async () => {
  loading.value = true
  try {
    await authStore.register(form)
    router.push('/dashboard')
  } catch (err) {
    alert(err)
  } finally {
    loading.value = false
  }
}
</script>
