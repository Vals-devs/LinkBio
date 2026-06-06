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
          <h1 class="text-xl font-bold text-white">{{ langStore.t('manageLinks') }}</h1>
          <button @click="showAddModal = true" class="px-3 py-1 bg-cyan-500/10 hover:bg-cyan-500/20 text-cyan-400 border border-cyan-500/20 text-xs font-bold rounded-lg transition-all flex items-center gap-1.5">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
            {{ langStore.t('addLink') }}
          </button>
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

        <div class="max-w-3xl mx-auto space-y-3 relative z-10">
          <div
            v-for="(link, index) in links"
            :key="link.id"
            draggable="true"
            @dragstart="onDragStart(index)"
            @dragover="onDragOver($event)"
            @drop="onDrop(index)"
            class="bg-white/[0.01] border border-white/[0.05] shadow-lg p-5 rounded-2xl flex items-center gap-4 hover:border-white/[0.08] hover:bg-white/[0.03] transition-all group cursor-move"
          >
            <div class="w-10 h-10 rounded-xl bg-white/[0.02] border border-white/[0.08] flex items-center justify-center text-slate-400 flex-shrink-0">
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" /></svg>
            </div>
            <div class="flex-1 min-w-0">
              <h3 class="font-bold text-white text-sm truncate">{{ link.title }}</h3>
              <p class="text-xs text-slate-400 truncate">{{ link.url }}</p>
            </div>
            <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
              <button class="p-2 rounded-lg hover:bg-white/[0.04] text-slate-400 hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" /></svg>
              </button>
              <button @click="deleteLink(link.id)" class="p-2 rounded-lg hover:bg-red-500/10 text-slate-400 hover:text-red-400 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" /></svg>
              </button>
            </div>
            <div class="flex items-center gap-1.5 text-xs text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 px-2.5 py-1 rounded-lg font-mono">
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.042 21.672L13.684 16.6m0 0l-2.51 2.225.569-9.47 5.227 7.917-3.286-.672zM12 2.25V4.5m5.834.166l-1.591 1.591M20.25 10.5H18M7.757 14.743l-1.59 1.59M6 10.5H3.75m4.007-4.243l-1.59-1.59" /></svg>
              {{ link.click_count }}
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Add Link Modal -->
    <div v-if="showAddModal" @click.self="showAddModal = false" class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4 animate-fade-in">
      <div class="bg-[#0B0F19] border border-white/[0.08] rounded-3xl shadow-2xl w-full max-w-md overflow-hidden animate-scale-in">
        <!-- Modal Header with gradient -->
        <div class="bg-gradient-to-r from-cyan-500/10 via-blue-500/5 to-indigo-500/10 border-b border-white/[0.06] p-6">
          <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-white flex items-center gap-3">
              <div class="w-10 h-10 rounded-xl bg-white/[0.04] border border-white/[0.08] flex items-center justify-center">
                <svg class="w-5 h-5 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
              </div>
              {{ langStore.t('addNewLink') }}
            </h2>
            <button @click="showAddModal = false" class="w-8 h-8 rounded-lg bg-white/[0.04] hover:bg-white/[0.08] flex items-center justify-center text-slate-400 hover:text-white transition-all">
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>

        <!-- Modal Body -->
        <form @submit.prevent="addLink" class="p-6 space-y-5">
          <div>
            <label class="block text-sm font-semibold text-slate-300 mb-2 flex items-center gap-2">
              <svg class="w-4 h-4 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
              </svg>
              {{ langStore.t('title') }}
            </label>
            <input
              v-model="newLink.title"
              type="text"
              required
              placeholder="e.g. My Portfolio"
              class="w-full px-4 py-3 rounded-xl bg-slate-950/40 border border-white/[0.08] text-slate-200 placeholder-slate-600 focus:outline-none focus:border-cyan-500/30 focus:ring-4 focus:ring-cyan-500/10 outline-none transition-all"
            >
          </div>
          <div>
            <label class="block text-sm font-semibold text-slate-300 mb-2 flex items-center gap-2">
              <svg class="w-4 h-4 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
              </svg>
              {{ langStore.t('url') }}
            </label>
            <input
              v-model="newLink.url"
              type="url"
              required
              placeholder="https://example.com"
              class="w-full px-4 py-3 rounded-xl bg-slate-950/40 border border-white/[0.08] text-slate-200 placeholder-slate-600 focus:outline-none focus:border-cyan-500/30 focus:ring-4 focus:ring-cyan-500/10 outline-none transition-all"
            >
          </div>

          <!-- Action Buttons -->
          <div class="flex gap-3 pt-3">
            <button
              type="button"
              @click="showAddModal = false"
              class="flex-1 py-3 bg-white/[0.02] border border-white/[0.08] text-slate-300 font-bold rounded-xl hover:bg-white/[0.06] hover:text-white transition-all"
            >
              {{ langStore.t('cancel') }}
            </button>
            <button
              type="submit"
              class="flex-1 py-3 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-slate-900 font-bold rounded-xl transition-all shadow-lg shadow-cyan-500/10 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-2"
            >
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
              </svg>
              {{ langStore.t('addLink') }}
            </button>
          </div>
        </form>
      </div>
    </div>

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
import { ref, reactive, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '../../stores/auth.js'
import { useLangStore } from '../../stores/lang.js'
import api from '../../services/api.js'

const router = useRouter()
const authStore = useAuthStore()
const langStore = useLangStore()

const showAddModal = ref(false)
const newLink = reactive({ title: '', url: '' })
const links = ref([])
const draggedIndex = ref(null)

const fetchLinks = async () => {
  try {
    const response = await api.get('/links')
    links.value = response.data
  } catch (err) {
    console.error('Failed to fetch links:', err)
  }
}

const onDragStart = (index) => {
  draggedIndex.value = index
}

const onDragOver = (event) => {
  event.preventDefault()
}

const onDrop = async (index) => {
  if (draggedIndex.value === null || draggedIndex.value === index) return

  const item = links.value.splice(draggedIndex.value, 1)[0]
  links.value.splice(index, 0, item)
  draggedIndex.value = null

  await reorderLinks()
}

const reorderLinks = async () => {
  try {
    const ids = links.value.map(link => link.id)
    await api.put('/links/reorder', { ids })
  } catch (err) {
    console.error('Failed to reorder links:', err)
    alert('Failed to save link order.')
    await fetchLinks() // Refresh to restore original order on failure
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
  await fetchLinks()
})

const addLink = async () => {
  try {
    await api.post('/links', newLink)
    newLink.title = ''
    newLink.url = ''
    showAddModal.value = false
    await fetchLinks()
  } catch (err) {
    alert(err.response?.data?.message || 'Failed to add link.')
  }
}

const deleteLink = async (id) => {
  if (confirm(langStore.t('deleteConfirm'))) {
    try {
      await api.delete(`/links/${id}`)
      await fetchLinks()
    } catch (err) {
      alert('Failed to delete link.')
    }
  }
}

const handleLogout = async () => {
  await authStore.logout()
  router.push('/')
}
</script>
