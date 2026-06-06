<template>
  <div class="flex h-screen bg-[#0B0F19] text-[#E2E8F0] font-sans antialiased">
    <!-- Sidebar Navigation -->
    <aside class="hidden md:flex w-64 bg-[#0B0F19] text-slate-400 flex flex-col flex-shrink-0 border-r border-white/[0.06] overflow-hidden">
      <div class="p-6 border-b border-white/[0.06]">
        <div class="flex items-center gap-3">
          <img src="/logo.png" class="w-9 h-9 rounded-xl object-cover shadow-lg shadow-cyan-500/20">
          <div class="text-white font-semibold text-sm leading-tight">LinkBio <span class="text-cyan-400 font-bold">AI</span></div>
        </div>
      </div>
      <nav class="flex-1 p-4 space-y-1.5 overflow-y-auto">
        <router-link to="/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all" :class="$route.path === '/dashboard' ? 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 font-bold' : 'text-slate-400 hover:bg-white/[0.03] hover:text-white'">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
          {{ langStore.t('dashboard') }}
        </router-link>
        <router-link to="/dashboard/profile" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all" :class="$route.path === '/dashboard/profile' ? 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 font-bold' : 'text-slate-400 hover:bg-white/[0.03] hover:text-white'">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
          {{ langStore.t('profile') }}
        </router-link>
        <router-link to="/dashboard/links" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all" :class="$route.path === '/dashboard/links' ? 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 font-bold' : 'text-slate-400 hover:bg-white/[0.03] hover:text-white'">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" /></svg>
          {{ langStore.t('links') }}
        </router-link>
        <router-link to="/dashboard/analytics" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all" :class="$route.path === '/dashboard/analytics' ? 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 font-bold' : 'text-slate-400 hover:bg-white/[0.03] hover:text-white'">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
          {{ langStore.t('analytics') }}
        </router-link>
        <router-link to="/dashboard/ai-tools" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all" :class="$route.path === '/dashboard/ai-tools' ? 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 font-bold' : 'text-slate-400 hover:bg-white/[0.03] hover:text-white'">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>
          {{ langStore.t('aiTools') }}
        </router-link>
        <router-link to="/dashboard/theme" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all" :class="$route.path === '/dashboard/theme' ? 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 font-bold' : 'text-slate-400 hover:bg-white/[0.03] hover:text-white'">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-2.414-2.414A1 1 0 0015.586 6H7a2 2 0 00-2 2v11a2 2 0 002 2z" /></svg>
          {{ langStore.t('themeEditor') }}
        </router-link>
      </nav>
      <div class="p-4 border-t border-white/[0.06]">
        <button @click="handleLogout" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all hover:bg-white/[0.04] hover:text-white text-slate-400">
          <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" /></svg>
          {{ langStore.t('logout') }}
        </button>
      </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col min-w-0 overflow-hidden bg-[#0B0F19]">
      <!-- Top Header -->
      <header class="bg-[#0B0F19]/40 backdrop-blur-md border-b border-white/[0.05] px-4 md:px-8 py-4 flex items-center justify-between flex-shrink-0 relative z-10">
        <div class="flex items-center gap-4">
          <h1 class="text-xl font-extrabold text-white tracking-tight font-display">{{ langStore.t('themeEditor') }}</h1>
        </div>
        <div class="flex items-center gap-6">
          <span class="hidden sm:inline text-sm text-slate-300">{{ langStore.t('welcome') }}, <span class="font-semibold text-slate-100">{{ authStore.user?.name || 'User' }}</span></span>
          <a :href="'/' + authStore.user?.username" target="_blank" class="hidden sm:flex text-sm text-cyan-400 hover:text-cyan-300 font-medium items-center gap-1.5 transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
            </svg>
            {{ langStore.t('publicPage') }}: /{{ authStore.user?.username || 'user' }}
          </a>
          <!-- Language Capsule Switcher -->
          <div class="flex items-center gap-1 bg-white/[0.02] border border-white/[0.08] rounded-xl p-0.5">
            <button 
              @click="langStore.setLanguage('en')" 
              :class="langStore.locale === 'en' ? 'bg-white/[0.04] text-cyan-400 border border-white/[0.08] font-bold shadow' : 'text-slate-400 hover:text-white border-transparent'" 
              class="px-2 py-0.5 text-[9px] rounded-lg transition-all"
            >
              EN
            </button>
            <button 
              @click="langStore.setLanguage('id')" 
              :class="langStore.locale === 'id' ? 'bg-white/[0.04] text-cyan-400 border border-white/[0.08] font-bold shadow' : 'text-slate-400 hover:text-white border-transparent'" 
              class="px-2 py-0.5 text-[9px] rounded-lg transition-all"
            >
              ID
            </button>
          </div>
          <!-- Mobile Logout Button -->
          <button @click="handleLogout" class="md:hidden p-2 bg-red-500/10 hover:bg-red-500/20 border border-red-500/20 rounded-xl text-red-400 transition-all flex items-center justify-center" :title="langStore.t('logout')">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
            </svg>
          </button>
          <img :src="'https://ui-avatars.com/api/?name=' + encodeURIComponent(authStore.user?.name || 'User') + '&background=0D8ABC&color=fff&size=128'" class="w-9 h-9 rounded-full border-2 border-white/[0.08]">
        </div>
      </header>

      <div class="flex-1 overflow-y-auto p-4 md:p-6 lg:p-8 pb-24 md:pb-8 relative">
        <!-- Background glows -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
          <div class="absolute top-[20%] left-[10%] w-[300px] h-[300px] bg-blue-500/[0.02] rounded-full blur-[100px]"></div>
          <div class="absolute bottom-[10%] right-[20%] w-[400px] h-[400px] bg-purple-500/[0.02] rounded-full blur-[120px]"></div>
        </div>

        <div class="max-w-4xl mx-auto space-y-8 relative z-10">
          <!-- Theme Editor Form -->
          <div class="bg-white/[0.01] border border-white/[0.05] shadow-lg rounded-3xl p-6 lg:p-8">
            <h2 class="text-2xl font-extrabold text-white tracking-tight font-display mb-6">{{ langStore.t('customizeTheme') }}</h2>
            <form @submit.prevent="saveTheme" class="space-y-6">
              <!-- Layout Style -->
              <div>
                <label class="block text-sm font-semibold text-slate-300 mb-2">{{ langStore.t('layoutStyle') }}</label>
                <select
                  v-model="themeForm.layout_style"
                  class="w-full px-4 py-2.5 rounded-xl border border-white/[0.08] bg-slate-950/40 text-slate-200 focus:outline-none focus:border-cyan-500/30 focus:ring-4 focus:ring-cyan-500/10 outline-none transition-all"
                >
                  <option value="minimal" class="bg-slate-900 text-slate-200">Minimal</option>
                  <option value="card" class="bg-slate-900 text-slate-200">Card</option>
                  <option value="gradient" class="bg-slate-900 text-slate-200">Gradient</option>
                  <option value="glassmorphism" class="bg-slate-900 text-slate-200">Glassmorphism</option>
                  <option value="neo-brutalism" class="bg-slate-900 text-slate-200">Neo-brutalism</option>
                </select>
              </div>

              <!-- Primary Color -->
              <div>
                <label class="block text-sm font-semibold text-slate-300 mb-2">{{ langStore.t('primaryColor') }}</label>
                <input
                  type="color"
                  v-model="themeForm.primary_color"
                  class="w-full h-12 rounded-xl border border-white/[0.08] bg-slate-950/40 cursor-pointer p-1"
                />
              </div>

              <!-- Background Color -->
              <div>
                <label class="block text-sm font-semibold text-slate-300 mb-2">{{ langStore.t('backgroundColor') }}</label>
                <input
                  type="color"
                  v-model="themeForm.background_color"
                  class="w-full h-12 rounded-xl border border-white/[0.08] bg-slate-950/40 cursor-pointer p-1"
                />
              </div>

              <!-- Font Family -->
              <div>
                <label class="block text-sm font-semibold text-slate-300 mb-2">{{ langStore.t('fontFamily') }}</label>
                <input
                  type="text"
                  v-model="themeForm.font_family"
                  :placeholder="langStore.t('fontFamilyPlaceholder')"
                  class="w-full px-4 py-2.5 rounded-xl border border-white/[0.08] bg-slate-950/40 text-slate-200 placeholder-slate-600 focus:outline-none focus:border-cyan-500/30 focus:ring-4 focus:ring-cyan-500/10 outline-none transition-all"
                />
              </div>

              <button
                type="submit"
                :disabled="loading"
                class="w-full py-3.5 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 active:scale-[0.98] disabled:opacity-50 text-slate-900 font-bold rounded-xl transition-all shadow-lg shadow-cyan-500/10 flex items-center justify-center gap-2"
              >
                <svg v-if="loading" class="animate-spin w-5 h-5 text-slate-900" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                </svg>
                <span v-else>{{ langStore.t('saveTheme') }}</span>
              </button>
            </form>
          </div>

          <!-- Theme Preview -->
          <div class="bg-white/[0.01] border border-white/[0.05] shadow-lg rounded-3xl p-6 lg:p-8">
            <h2 class="text-2xl font-extrabold text-white tracking-tight font-display mb-6">{{ langStore.t('themePreview') }}</h2>
            <div
              class="w-full rounded-2xl flex flex-col items-center justify-center p-8 transition-all relative overflow-hidden"
              :class="{
                'bg-transparent': themeForm.layout_style === 'minimal',
                'bg-slate-900/90 border border-slate-800/80 shadow-2xl': themeForm.layout_style === 'card' && isDarkBg,
                'bg-white border border-slate-100 shadow-2xl': themeForm.layout_style === 'card' && !isDarkBg,
                'bg-white/10 backdrop-blur-xl border border-white/20 shadow-2xl': themeForm.layout_style === 'gradient' || themeForm.layout_style === 'glassmorphism',
                'bg-[#FFFDF4] border-4 border-black shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] rounded-none': themeForm.layout_style === 'neo-brutalism'
              }"
              :style="themeForm.layout_style === 'gradient' ? {
                background: `linear-gradient(135deg, ${themeForm.background_color}, ${adjustColorBrightness(themeForm.background_color, -30)})`,
                fontFamily: themeForm.font_family
              } : {
                backgroundColor: themeForm.layout_style === 'minimal' ? 'transparent' : undefined,
                fontFamily: themeForm.font_family
              }"
            >
              <!-- Avatar -->
              <div 
                class="w-16 h-16 mb-3 flex items-center justify-center font-bold text-xl border-2" 
                :class="{
                  'rounded-full': themeForm.layout_style !== 'neo-brutalism',
                  'border-4 border-black rounded-none bg-white': themeForm.layout_style === 'neo-brutalism'
                }"
                :style="themeForm.layout_style === 'neo-brutalism' ? {} : { 
                  background: `linear-gradient(135deg, ${themeForm.primary_color}, ${adjustColorBrightness(themeForm.primary_color, 40)})`, 
                  borderColor: '#fff' 
                }"
              >
                <span :style="{ color: themeForm.layout_style === 'neo-brutalism' ? '#000' : '#fff' }">U</span>
              </div>
              
              <!-- Name & Profession -->
              <h3 
                class="font-extrabold text-lg mb-1 tracking-tight"
                :class="{
                  'text-white': (themeForm.layout_style !== 'neo-brutalism' && isDarkBg) || themeForm.layout_style === 'gradient' || themeForm.layout_style === 'glassmorphism',
                  'text-slate-800': themeForm.layout_style !== 'neo-brutalism' && !isDarkBg,
                  'text-black': themeForm.layout_style === 'neo-brutalism'
                }"
              >
                @{{ authStore.user?.username || 'username' }}
              </h3>
              <p 
                class="text-xs font-semibold mb-4 uppercase tracking-wider"
                :class="{
                  'text-slate-400': (themeForm.layout_style !== 'neo-brutalism' && isDarkBg) || themeForm.layout_style === 'gradient' || themeForm.layout_style === 'glassmorphism',
                  'text-slate-500': themeForm.layout_style !== 'neo-brutalism' && !isDarkBg,
                  'text-black border-2 border-black bg-white px-2 py-0.5 font-bold rounded-none': themeForm.layout_style === 'neo-brutalism'
                }"
              >
                {{ authStore.user?.profession || 'Profession' }}
              </p>
              
              <!-- Simulated button -->
              <div class="w-full max-w-xs">
                <div 
                  class="py-3 text-center text-xs font-bold transition-all"
                  :class="{
                    'bg-white/5 border border-white/10 text-white rounded-xl': themeForm.layout_style === 'minimal' && isDarkBg,
                    'bg-white border border-slate-200/80 text-slate-700 rounded-xl': themeForm.layout_style === 'minimal' && !isDarkBg,
                    'bg-slate-800/60 border border-slate-700/50 text-slate-200 rounded-xl': themeForm.layout_style === 'card' && isDarkBg,
                    'bg-slate-50 border border-slate-100 text-slate-700 rounded-xl': themeForm.layout_style === 'card' && !isDarkBg,
                    'bg-white/10 backdrop-blur-sm border border-white/15 text-white rounded-xl': themeForm.layout_style === 'gradient' || themeForm.layout_style === 'glassmorphism',
                    'bg-white border-2 border-black text-black shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] rounded-none font-extrabold': themeForm.layout_style === 'neo-brutalism'
                  }"
                  :style="{
                    borderColor: themeForm.layout_style === 'neo-brutalism' ? undefined : themeForm.primary_color + '40',
                    color: themeForm.layout_style === 'neo-brutalism' ? undefined : themeForm.primary_color
                  }"
                >
                  {{ langStore.t('previewText') }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Mobile Bottom Navigation Bar -->
    <nav class="md:hidden fixed bottom-0 left-0 right-0 bg-[#0B0F19]/80 backdrop-blur-xl border-t border-white/[0.06] z-50 px-4 py-2 flex items-center justify-around">
      <router-link to="/dashboard" class="flex flex-col items-center gap-1 py-1" :class="$route.path === '/dashboard' ? 'text-cyan-400 font-bold' : 'text-slate-400'">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
        <span class="text-[9px] font-medium">{{ langStore.t('dashboard') }}</span>
      </router-link>
      <router-link to="/dashboard/links" class="flex flex-col items-center gap-1 py-1" :class="$route.path === '/dashboard/links' ? 'text-cyan-400 font-bold' : 'text-slate-400'">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" /></svg>
        <span class="text-[9px] font-medium">{{ langStore.t('links') }}</span>
      </router-link>
      <router-link to="/dashboard/profile" class="flex flex-col items-center gap-1 py-1" :class="$route.path === '/dashboard/profile' ? 'text-cyan-400 font-bold' : 'text-slate-400'">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
        <span class="text-[9px] font-medium">{{ langStore.t('profile') }}</span>
      </router-link>
      <router-link to="/dashboard/ai-tools" class="flex flex-col items-center gap-1 py-1" :class="$route.path === '/dashboard/ai-tools' ? 'text-cyan-400 font-bold' : 'text-slate-400'">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>
        <span class="text-[9px] font-medium">AI</span>
      </router-link>
      <router-link to="/dashboard/analytics" class="flex flex-col items-center gap-1 py-1" :class="$route.path === '/dashboard/analytics' ? 'text-cyan-400 font-bold' : 'text-slate-400'">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
        <span class="text-[9px] font-medium">{{ langStore.t('analytics') }}</span>
      </router-link>
      <router-link to="/dashboard/theme" class="flex flex-col items-center gap-1 py-1" :class="$route.path === '/dashboard/theme' ? 'text-cyan-400 font-bold' : 'text-slate-400'">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-2.414-2.414A1 1 0 0015.586 6H7a2 2 0 00-2 2v11a2 2 0 002 2z" /></svg>
        <span class="text-[9px] font-medium">{{ langStore.t('themeEditor') }}</span>
      </router-link>
    </nav>
  </div>
</template>

<script setup>
import { ref, reactive, onMounted, watch, computed } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '../../stores/auth.js'
import { useLangStore } from '../../stores/lang.js'
import api from '../../services/api.js'
import { useThemeStore } from '../../stores/theme.js'

const router = useRouter()
const authStore = useAuthStore()
const langStore = useLangStore()
const themeStore = useThemeStore()

const loading = ref(false)

const themeForm = reactive({
  primary_color: '#3b82f6',
  background_color: '#f8fafc',
  font_family: 'Inter, sans-serif',
  layout_style: 'minimal',
})

const isDarkBg = computed(() => {
  const hex = themeForm.background_color || '#f8fafc'
  const cleanHex = hex.replace('#', '')
  if (cleanHex.length !== 6) return false
  const r = parseInt(cleanHex.substring(0, 2), 16)
  const g = parseInt(cleanHex.substring(2, 4), 16)
  const b = parseInt(cleanHex.substring(4, 6), 16)
  const yiq = (r * 299 + g * 587 + b * 114) / 1000
  return yiq < 128
})

// Helper function to adjust color brightness for gradient preview
const adjustColorBrightness = (hex, percent) => {
  const num = parseInt(hex.replace('#', ''), 16)
  const r = Math.min(255, Math.max(0, (num >> 16) + percent))
  const g = Math.min(255, Math.max(0, ((num >> 8) & 0x00FF) + percent))
  const b = Math.min(255, Math.max(0, (num & 0x0000FF) + percent))
  return '#' + ((r << 16) | (g << 8) | b).toString(16).padStart(6, '0')
}

const fetchTheme = async () => {
  try {
    await themeStore.fetchTheme()
    if (themeStore.currentTheme) {
      Object.assign(themeForm, themeStore.currentTheme)
    }
  } catch (err) {
    console.error('Failed to fetch theme:', err)
  }
}

onMounted(fetchTheme)

const saveTheme = async () => {
  loading.value = true
  try {
    await themeStore.applyTheme(themeForm)
    alert(langStore.t('themeSaved'))
  } catch (err) {
    alert(langStore.locale === 'id' ? 'Gagal menyimpan tema.' : 'Failed to save theme.')
  } finally {
    loading.value = false
  }
}

// Watch for changes in themeStore.currentTheme to update the form
watch(() => themeStore.currentTheme, (newTheme) => {
  if (newTheme) {
    Object.assign(themeForm, newTheme);
  }
}, { deep: true });

const handleLogout = async () => {
  await authStore.logout()
  router.push('/')
}
</script>
