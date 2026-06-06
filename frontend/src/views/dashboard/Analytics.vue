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
        <div class="flex items-center gap-4">
          <h1 class="text-xl font-bold text-white">{{ langStore.t('analytics') }}</h1>
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

        <div class="max-w-6xl mx-auto space-y-8 relative z-10">
          <!-- Stats Cards -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Views -->
            <div class="bg-white/[0.01] border border-white/[0.05] shadow-lg rounded-2xl p-6 hover:border-white/[0.08] hover:bg-white/[0.02] transition-all">
              <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center text-blue-400">
                  <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                </div>
              </div>
              <h3 class="text-3xl font-extrabold text-white">{{ stats.views }}</h3>
              <p class="text-sm text-slate-400 mt-1">{{ langStore.t('totalViews') }}</p>
            </div>

            <!-- Unique Visitors -->
            <div class="bg-white/[0.01] border border-white/[0.05] shadow-lg rounded-2xl p-6 hover:border-white/[0.08] hover:bg-white/[0.02] transition-all">
              <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400">
                  <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                </div>
              </div>
              <h3 class="text-3xl font-extrabold text-white">{{ stats.visitors }}</h3>
              <p class="text-sm text-slate-400 mt-1">{{ langStore.t('uniqueVisitors') }}</p>
            </div>

            <!-- Total Clicks -->
            <div class="bg-white/[0.01] border border-white/[0.05] shadow-lg rounded-2xl p-6 hover:border-white/[0.08] hover:bg-white/[0.02] transition-all">
              <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-purple-500/10 border border-purple-500/20 flex items-center justify-center text-purple-400">
                  <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" /></svg>
                </div>
              </div>
              <h3 class="text-3xl font-extrabold text-white">{{ stats.clicks }}</h3>
              <p class="text-sm text-slate-400 mt-1">{{ langStore.t('linkClicks') }}</p>
            </div>

            <!-- Mobile Traffic -->
            <div class="bg-white/[0.01] border border-white/[0.05] shadow-lg rounded-2xl p-6 hover:border-white/[0.08] hover:bg-white/[0.02] transition-all">
              <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 rounded-xl bg-orange-500/10 border border-orange-500/20 flex items-center justify-center text-orange-400">
                  <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 0h3m-3 0h3m-3 18.75v-1.5m0 0h3m-3 0h3" /></svg>
                </div>
              </div>
              <h3 class="text-3xl font-extrabold text-white">{{ stats.mobile_percentage }}%</h3>
              <p class="text-sm text-slate-400 mt-1">{{ langStore.t('mobileTraffic') }}</p>
            </div>
          </div>

          <!-- AI Visitor Insights -->
          <div class="bg-white/[0.01] border border-white/[0.05] shadow-lg rounded-2xl p-6 relative overflow-hidden">
            <!-- Decorative gradient top line -->
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-purple-500 via-pink-500 to-cyan-500"></div>
            
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4">
              <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-purple-500/10 border border-purple-500/20 flex items-center justify-center text-purple-400 shadow-sm">
                  <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                  </svg>
                </div>
                <div>
                  <h2 class="text-lg font-bold text-white flex items-center gap-2">
                    {{ langStore.t('aiVisitorIntelligence') }}
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-purple-500/10 text-purple-400 border border-purple-500/20">
                      <span class="w-1.5 h-1.5 rounded-full bg-purple-400 animate-pulse mr-1.5"></span>
                      {{ langStore.t('aiActive') }}
                    </span>
                  </h2>
                  <p class="text-xs text-slate-400">{{ langStore.t('aiInsightSub') }}</p>
                </div>
              </div>
              
              <button 
                @click="fetchInsight" 
                :disabled="loadingInsight"
                class="flex items-center gap-1.5 text-xs font-semibold text-purple-400 hover:text-purple-300 bg-purple-500/10 hover:bg-purple-500/20 px-3.5 py-2 rounded-xl border border-purple-500/20 transition-all active:scale-95 disabled:opacity-50"
              >
                <svg :class="{'animate-spin': loadingInsight}" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                {{ loadingInsight ? langStore.t('analyzing') : langStore.t('regenerate') }}
              </button>
            </div>

            <!-- Insight text box -->
            <div class="bg-slate-950/40 border border-white/[0.05] rounded-xl p-5 relative">
              <div v-if="loadingInsight" class="flex flex-col items-center justify-center py-6">
                <svg class="animate-spin w-8 h-8 text-purple-400 mb-2" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                </svg>
                <span class="text-xs text-slate-400 font-medium animate-pulse">{{ langStore.t('analyzing') }}</span>
              </div>
              
              <div v-else class="flex gap-3 items-start">
                <span class="text-3xl text-purple-400/30 font-serif leading-none">“</span>
                <p class="text-sm md:text-base text-slate-300 font-medium leading-relaxed italic flex-1">
                  {{ insightText || langStore.t('noInsightsYet') }}
                </p>
                <span class="text-3xl text-purple-400/30 font-serif leading-none align-bottom self-end">”</span>
              </div>
            </div>
          </div>

          <!-- Top Links Table -->
          <div class="bg-white/[0.01] border border-white/[0.05] shadow-lg rounded-2xl p-6 hover:border-white/[0.08] hover:bg-white/[0.02] transition-all">
            <h2 class="text-lg font-bold text-white mb-5">{{ langStore.t('topPerforming') }}</h2>
            <div class="overflow-x-auto">
              <table class="w-full">
                <thead>
                  <tr class="border-b border-white/[0.05]">
                    <th class="text-left text-xs font-semibold text-slate-400 uppercase tracking-wider pb-3">{{ langStore.t('linkColumn') }}</th>
                    <th class="text-right text-xs font-semibold text-slate-400 uppercase tracking-wider pb-3">{{ langStore.t('clicksColumn') }}</th>
                    <th class="text-right text-xs font-semibold text-slate-400 uppercase tracking-wider pb-3">CTR</th>
                    <th class="text-right text-xs font-semibold text-slate-400 uppercase tracking-wider pb-3">{{ langStore.t('trend') }}</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-white/[0.05]">
                  <tr v-for="(link, index) in topLinks" :key="index" class="hover:bg-white/[0.02] transition-colors">
                    <td class="py-4">
                      <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-white/[0.02] border border-white/[0.08] flex items-center justify-center text-slate-400">
                          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" /></svg>
                        </div>
                        <span class="text-sm font-medium text-slate-300">{{ link.title }}</span>
                      </div>
                    </td>
                    <td class="py-4 text-right text-sm font-semibold text-white">{{ link.clicks.toLocaleString() }}</td>
                    <td class="py-4 text-right text-sm text-slate-400">{{ link.ctr }}%</td>
                    <td class="py-4 text-right">
                      <div class="inline-flex items-center gap-1 text-xs font-medium text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-2 py-1 rounded-lg">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" /></svg>
                        {{ link.trend }}%
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
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
import { ref, onMounted } from 'vue'
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
  mobile_percentage: 0
})

const topLinks = ref([])
const insightText = ref('')
const loadingInsight = ref(false)

const fetchAnalytics = async () => {
  try {
    const response = await api.get('/analytics/summary')
    stats.value = {
      views: response.data.views,
      visitors: response.data.visitors,
      clicks: response.data.clicks,
      mobile_percentage: response.data.mobile_percentage
    }
    topLinks.value = response.data.top_links
  } catch (err) {
    console.error('Failed to fetch analytics:', err)
  }
}

const fetchInsight = async () => {
  loadingInsight.value = true
  try {
    const response = await api.get('/ai/visitor-insight', {
      params: { locale: langStore.locale }
    })
    insightText.value = response.data.insight
  } catch (err) {
    console.error('Failed to fetch AI insights:', err)
    insightText.value = langStore.locale === 'id'
      ? 'Tidak dapat membuat ulasan AI saat ini. Silakan periksa konfigurasi API key Anda.'
      : 'Could not generate AI insights at this time. Please check your API key configuration.'
  } finally {
    loadingInsight.value = false
  }
}

const fetchProfile = async () => {
  try {
    await authStore.fetchUser()
  } catch (err) {
    console.error('Failed to fetch user profile:', err)
  }
}

onMounted(async () => {
  await fetchProfile()
  await fetchAnalytics()
  await fetchInsight()
})

const handleLogout = async () => {
  await authStore.logout()
  router.push('/')
}
</script>
