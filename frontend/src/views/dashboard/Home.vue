<template>
  <div class="flex h-screen bg-[#0B0F19] text-[#E2E8F0] font-sans antialiased">
    <!-- Sidebar -->
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

    <!-- Main Content -->
    <main class="flex-1 flex flex-col min-w-0 overflow-hidden bg-[#0B0F19]">
      <!-- Top Header -->
      <header class="bg-[#0B0F19]/40 backdrop-blur-md border-b border-white/[0.05] px-4 md:px-8 py-4 flex items-center justify-between flex-shrink-0 relative z-10">
        <h1 class="text-xl font-bold text-white">{{ langStore.t('dashboard') }}</h1>
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

      <!-- Scrollable Dashboard Content -->
      <div class="flex-1 overflow-y-auto p-4 md:p-8 pb-24 md:pb-8 relative">
        <!-- Background glows -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
          <div class="absolute top-[10%] left-[20%] w-[300px] h-[300px] bg-blue-500/[0.02] rounded-full blur-[100px]"></div>
          <div class="absolute bottom-[20%] right-[10%] w-[400px] h-[400px] bg-purple-500/[0.02] rounded-full blur-[120px]"></div>
        </div>

        <div class="max-w-6xl mx-auto space-y-8 relative z-10">
          
          <!-- Welcome Greeting Banner -->
          <div class="bg-gradient-to-r from-cyan-500/10 via-blue-600/[0.08] to-indigo-700/10 border border-white/[0.05] rounded-3xl p-8 text-white relative overflow-hidden">
            <!-- Decorative circle overlay -->
            <div class="absolute right-0 bottom-0 translate-x-1/4 translate-y-1/4 w-80 h-80 rounded-full bg-cyan-500/[0.04] blur-[80px] pointer-events-none"></div>
            
            <div class="relative z-10 max-w-2xl">
              <span class="text-xs font-bold uppercase tracking-wider bg-cyan-500/10 border border-cyan-500/20 text-cyan-400 px-3 py-1 rounded-full">{{ greetingText }}</span>
              <h2 class="text-3xl font-extrabold mt-4 mb-2">{{ langStore.t('welcome') }}, {{ authStore.user?.name || 'User' }}! 👋</h2>
              <p class="text-slate-300 text-sm leading-relaxed mb-6">
                {{ langStore.t('dashHomeSub') }}
              </p>
              <div class="flex flex-wrap gap-3">
                <a :href="'/' + authStore.user?.username" target="_blank" class="px-5 py-2.5 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-slate-900 font-bold rounded-xl text-sm transition-all shadow-lg shadow-cyan-500/5 hover:scale-[1.02] active:scale-[0.98] flex items-center gap-2">
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                  {{ langStore.t('viewPublicPage') }}
                </a>
                <button @click="copyPublicLink" class="px-5 py-2.5 bg-white/[0.02] hover:bg-white/[0.06] text-white font-semibold rounded-xl text-sm transition-all border border-white/[0.08] hover:scale-[1.02] active:scale-[0.98] flex items-center gap-2">
                  <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" /></svg>
                  {{ copied ? langStore.t('copied') : langStore.t('copyLink') }}
                </button>
              </div>
            </div>
          </div>

          <!-- Quick Statistics & AI Insights Grid -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Page Views -->
            <div class="bg-white/[0.01] border border-white/[0.05] rounded-2xl shadow-sm p-5 flex items-center gap-4 hover:border-white/[0.08] hover:bg-[#131b2e]/30 transition-all">
              <div class="w-11 h-11 rounded-xl bg-blue-500/10 text-blue-400 border border-blue-500/25 flex items-center justify-center flex-shrink-0">
                <svg class="w-5.5 h-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
              </div>
              <div>
                <h3 class="text-xl font-bold text-white">{{ stats.views }}</h3>
                <p class="text-[10px] text-slate-400 font-bold uppercase mt-0.5 tracking-wider">{{ langStore.t('totalViews') }}</p>
              </div>
            </div>

            <!-- Unique Visitors -->
            <div class="bg-white/[0.01] border border-white/[0.05] rounded-2xl shadow-sm p-5 flex items-center gap-4 hover:border-white/[0.08] hover:bg-[#131b2e]/30 transition-all">
              <div class="w-11 h-11 rounded-xl bg-teal-500/10 text-teal-400 border border-teal-500/25 flex items-center justify-center flex-shrink-0">
                <svg class="w-5.5 h-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
              </div>
              <div>
                <h3 class="text-xl font-bold text-white">{{ stats.visitors }}</h3>
                <p class="text-[10px] text-slate-400 font-bold uppercase mt-0.5 tracking-wider">{{ langStore.t('uniqueVisitors') }}</p>
              </div>
            </div>

            <!-- Total Link Clicks -->
            <div class="bg-white/[0.01] border border-white/[0.05] rounded-2xl shadow-sm p-5 flex items-center gap-4 hover:border-white/[0.08] hover:bg-[#131b2e]/30 transition-all">
              <div class="w-11 h-11 rounded-xl bg-purple-500/10 text-purple-400 border border-purple-500/25 flex items-center justify-center flex-shrink-0">
                <svg class="w-5.5 h-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" /></svg>
              </div>
              <div>
                <h3 class="text-xl font-bold text-white">{{ stats.clicks }}</h3>
                <p class="text-[10px] text-slate-400 font-bold uppercase mt-0.5 tracking-wider">{{ langStore.t('linkClicks') }}</p>
              </div>
            </div>

            <!-- Average Click Through Rate -->
            <div class="bg-white/[0.01] border border-white/[0.05] rounded-2xl shadow-sm p-5 flex items-center gap-4 hover:border-white/[0.08] hover:bg-[#131b2e]/30 transition-all">
              <div class="w-11 h-11 rounded-xl bg-emerald-500/10 text-emerald-400 border border-emerald-500/25 flex items-center justify-center flex-shrink-0">
                <svg class="w-5.5 h-5.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
              </div>
              <div>
                <h3 class="text-xl font-bold text-white">{{ clickThroughRate }}%</h3>
                <p class="text-[10px] text-slate-400 font-bold uppercase mt-0.5 tracking-wider">{{ langStore.t('clickThroughRate') }}</p>
              </div>
            </div>
          </div>

          <!-- Main Dashboard Split Content -->
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Column 1 & 2: Quick Links & Actions -->
            <div class="lg:col-span-2 space-y-6">
              
              <!-- Quick Navigation Menu -->
              <div class="bg-white/[0.01] border border-white/[0.05] backdrop-blur-sm rounded-2xl p-6 shadow-xl">
                <h3 class="text-lg font-bold text-white mb-5">{{ langStore.t('quickActions') }}</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <!-- Add new Link -->
                  <router-link to="/dashboard/links" class="p-4 rounded-xl border border-white/[0.04] bg-white/[0.01] hover:bg-white/[0.02] hover:border-white/[0.08] transition-all group flex items-start gap-4">
                    <div class="w-10 h-10 rounded-lg bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                      <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                    </div>
                    <div>
                      <h4 class="font-bold text-white text-sm">{{ langStore.t('addLinksTitle') }}</h4>
                      <p class="text-xs text-slate-400 mt-1">{{ langStore.t('addLinksDesc') }}</p>
                    </div>
                  </router-link>

                  <!-- Update Profile -->
                  <router-link to="/dashboard/profile" class="p-4 rounded-xl border border-white/[0.04] bg-white/[0.01] hover:bg-white/[0.02] hover:border-white/[0.08] transition-all group flex items-start gap-4">
                    <div class="w-10 h-10 rounded-lg bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                      <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    </div>
                    <div>
                      <h4 class="font-bold text-white text-sm">{{ langStore.t('profile') }}</h4>
                      <p class="text-xs text-slate-400 mt-1">{{ langStore.t('editProfileDesc') }}</p>
                    </div>
                  </router-link>

                  <!-- AI Bio Generator -->
                  <router-link to="/dashboard/ai-tools" class="p-4 rounded-xl border border-white/[0.04] bg-white/[0.01] hover:bg-white/[0.02] hover:border-white/[0.08] transition-all group flex items-start gap-4">
                    <div class="w-10 h-10 rounded-lg bg-purple-500/10 text-purple-400 border border-purple-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                      <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>
                    </div>
                    <div>
                      <h4 class="font-bold text-white text-sm">{{ langStore.t('aiBioGenerator') }}</h4>
                      <p class="text-xs text-slate-400 mt-1">{{ langStore.t('aiGenDesc') }}</p>
                    </div>
                  </router-link>

                  <!-- View Reports -->
                  <router-link to="/dashboard/analytics" class="p-4 rounded-xl border border-white/[0.04] bg-white/[0.01] hover:bg-white/[0.02] hover:border-white/[0.08] transition-all group flex items-start gap-4">
                    <div class="w-10 h-10 rounded-lg bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 flex items-center justify-center group-hover:scale-110 transition-transform">
                      <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                    </div>
                    <div>
                      <h4 class="font-bold text-white text-sm">{{ langStore.t('analytics') }}</h4>
                      <p class="text-xs text-slate-400 mt-1">{{ langStore.t('fullReportsDesc') }}</p>
                    </div>
                  </router-link>
                </div>
              </div>

              <!-- Top Links Table -->
              <div class="bg-white/[0.01] border border-white/[0.05] backdrop-blur-sm rounded-2xl p-6 shadow-xl">
                <div class="flex items-center justify-between mb-5">
                  <h3 class="text-lg font-bold text-white">{{ langStore.t('linksOverview') }}</h3>
                  <router-link to="/dashboard/links" class="text-xs font-semibold text-cyan-400 hover:text-cyan-300">{{ langStore.t('links') }} &rarr;</router-link>
                </div>
                <div v-if="links.length === 0" class="text-center py-8 text-slate-500 text-sm">
                  No links added yet. Add links to get started!
                </div>
                <div v-else class="space-y-3">
                  <div v-for="(link, index) in links.slice(0, 3)" :key="index" class="flex items-center justify-between p-4 rounded-xl border border-white/[0.04] bg-white/[0.01] hover:bg-white/[0.02] transition-colors">
                    <div class="flex items-center gap-3 min-w-0">
                      <div class="w-8 h-8 rounded-lg bg-white/[0.02] border border-white/[0.08] flex items-center justify-center text-slate-400 flex-shrink-0">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" /></svg>
                      </div>
                      <div class="min-w-0">
                        <h4 class="font-bold text-white text-sm truncate">{{ link.title }}</h4>
                        <p class="text-xs text-slate-400 truncate">{{ link.url }}</p>
                      </div>
                    </div>
                    <div class="flex items-center gap-1.5 text-xs font-semibold text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 px-2.5 py-1 rounded-lg font-mono">
                      {{ link.click_count }} clicks
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Column 3: Profile Preview Widget -->
            <div class="bg-white/[0.01] border border-white/[0.05] backdrop-blur-sm rounded-2xl p-6 flex flex-col items-center text-center shadow-xl">
              <h3 class="text-md font-bold text-white self-start mb-6">{{ langStore.t('profileCard') }}</h3>
              
              <!-- Avatar -->
              <div class="relative mb-4">
                <div class="w-20 h-20 rounded-full p-0.5 bg-gradient-to-br from-cyan-400 via-purple-400 to-pink-400">
                  <img :src="'https://ui-avatars.com/api/?name=' + encodeURIComponent(authStore.user?.name || 'User') + '&background=0D8ABC&color=fff&size=256'" class="w-full h-full rounded-full object-cover border-2 border-slate-900">
                </div>
              </div>

              <!-- Name & Handles -->
              <h4 class="text-lg font-bold text-white">{{ authStore.user?.name || 'User Name' }}</h4>
              <p class="text-xs text-slate-400 font-semibold uppercase mt-0.5">@{{ authStore.user?.username || 'username' }}</p>
              <p class="text-xs font-bold text-cyan-400 mt-2 bg-cyan-500/10 border border-cyan-500/20 px-2.5 py-1 rounded-full">{{ authStore.user?.profession || langStore.t('professionNotSet') }}</p>

              <!-- Bio -->
              <p class="text-xs text-slate-300 mt-4 leading-relaxed line-clamp-3 italic">
                "{{ authStore.user?.bio || langStore.t('bioNotSet') }}"
              </p>

              <!-- Social links overview -->
              <div class="flex items-center gap-2.5 mt-6 border-t border-white/[0.04] pt-6 w-full justify-center">
                <span v-if="authStore.user?.github_url" class="w-8 h-8 rounded-full bg-white/[0.02] border border-white/[0.08] flex items-center justify-center text-slate-300 hover:text-white"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg></span>
                <span v-if="authStore.user?.linkedin_url" class="w-8 h-8 rounded-full bg-white/[0.02] border border-white/[0.08] flex items-center justify-center text-slate-300 hover:text-white"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></span>
                <span v-if="authStore.user?.twitter_url" class="w-8 h-8 rounded-full bg-white/[0.02] border border-white/[0.08] flex items-center justify-center text-slate-300 hover:text-white"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg></span>
                <span v-if="authStore.user?.instagram_url" class="w-8 h-8 rounded-full bg-white/[0.02] border border-white/[0.08] flex items-center justify-center text-slate-300 hover:text-white"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg></span>
              </div>
              
              <router-link to="/dashboard/profile" class="mt-6 w-full py-2.5 bg-white/[0.04] border border-white/[0.08] text-white hover:bg-white/[0.08] font-semibold text-xs rounded-xl hover:scale-[1.02] transition-all text-center">
                {{ langStore.t('editProfileSettings') }}
              </router-link>
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
import { ref, computed, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '../../stores/auth.js'
import { useLangStore } from '../../stores/lang.js'
import api from '../../services/api.js'

const router = useRouter()
const authStore = useAuthStore()
const langStore = useLangStore()

const stats = ref({
  views: 0,
  visitors: 0,
  clicks: 0,
})
const links = ref([])
const copied = ref(false)

const greetingText = computed(() => {
  const hr = new Date().getHours()
  if (hr < 12) return langStore.t('greetMorning')
  if (hr < 17) return langStore.t('greetAfternoon')
  return langStore.t('greetEvening')
})

const clickThroughRate = computed(() => {
  if (stats.value.views === 0) return 0
  return ((stats.value.clicks / stats.value.views) * 100).toFixed(1)
})

const fetchDashboardData = async () => {
  try {
    // Fetch user details
    await authStore.fetchUser()
    
    // Fetch analytics summary
    const analyticsResponse = await api.get('/analytics/summary')
    stats.value = {
      views: analyticsResponse.data.views || 0,
      visitors: analyticsResponse.data.visitors || 0,
      clicks: analyticsResponse.data.clicks || 0,
    }
    
    // Fetch links list
    const linksResponse = await api.get('/links')
    links.value = linksResponse.data || []
  } catch (err) {
    console.error('Failed to load dashboard data:', err)
  }
}

const copyPublicLink = async () => {
  if (!authStore.user?.username) return
  const fullUrl = window.location.origin + '/' + authStore.user.username
  try {
    await navigator.clipboard.writeText(fullUrl)
    copied.value = true
    setTimeout(() => {
      copied.value = false
    }, 2000)
  } catch (err) {
    console.error('Failed to copy public URL:', err)
  }
}

onMounted(fetchDashboardData)

const handleLogout = async () => {
  await authStore.logout()
  router.push('/')
}
</script>
