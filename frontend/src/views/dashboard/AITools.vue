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
          <h1 class="text-xl font-extrabold text-white tracking-tight font-display">{{ langStore.t('aiTools') }}</h1>
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

      <!-- Scrollable Dashboard Content -->
      <div class="flex-1 overflow-y-auto p-4 md:p-6 lg:p-8 pb-24 md:pb-8 relative">
        <!-- Background glows -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
          <div class="absolute top-[20%] left-[10%] w-[300px] h-[300px] bg-blue-500/[0.02] rounded-full blur-[100px]"></div>
          <div class="absolute bottom-[10%] right-[20%] w-[400px] h-[400px] bg-purple-500/[0.02] rounded-full blur-[120px]"></div>
        </div>

        <div class="max-w-7xl mx-auto relative z-10">
          <div class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-5 gap-6 items-start">

            <!-- LEFT COLUMN: AI Bio Generator Form -->
            <div class="xl:col-span-3 bg-white/[0.01] border border-white/[0.05] shadow-lg rounded-3xl p-6 lg:p-8">
              <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-3">
                  <h2 class="text-2xl font-extrabold text-white tracking-tight font-display">{{ langStore.t('aiBioGenerator') }}</h2>
                  <div class="w-8 h-8 rounded-lg bg-purple-500/10 border border-purple-500/20 flex items-center justify-center">
                    <svg class="w-5 h-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 00-2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                    </svg>
                  </div>
                </div>
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center shadow-lg shadow-emerald-500/20">
                  <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                  </svg>
                </div>
              </div>

              <form @submit.prevent="generateBio" class="space-y-5">
                <!-- Name Input -->
                <div>
                  <label class="block text-sm font-semibold text-slate-300 mb-2">{{ langStore.t('fullName') }}</label>
                  <input 
                    v-model="form.name" 
                    type="text" 
                    class="w-full px-4 py-2.5 rounded-xl border border-white/[0.08] bg-slate-950/40 text-slate-200 placeholder-slate-600 focus:outline-none focus:border-cyan-500/30 focus:ring-4 focus:ring-cyan-500/10 outline-none transition-all"
                  >
                </div>

                <!-- Profession Input -->
                <div>
                  <label class="block text-sm font-semibold text-slate-300 mb-2">{{ langStore.t('profession') }}</label>
                  <input 
                    v-model="form.profession" 
                    type="text" 
                    :placeholder="langStore.t('profession')"
                    class="w-full px-4 py-2.5 rounded-xl border border-white/[0.08] bg-slate-950/40 text-slate-200 placeholder-slate-600 focus:outline-none focus:border-cyan-500/30 focus:ring-4 focus:ring-cyan-500/10 outline-none transition-all"
                  >
                </div>

                <!-- Key Skills Input -->
                <div>
                  <label class="block text-sm font-semibold text-slate-300 mb-2">{{ langStore.t('keySkills') }}</label>
                  <div class="flex flex-wrap gap-2 mb-3">
                    <span 
                      v-for="(skill, index) in form.skills" 
                      :key="index"
                      class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white/[0.02] border border-white/[0.08] rounded-lg text-sm text-slate-300 font-medium"
                    >
                      {{ skill }}
                      <button 
                        type="button"
                        @click="removeSkill(index)" 
                        class="w-4 h-4 rounded-full hover:bg-white/[0.06] flex items-center justify-center text-slate-400 hover:text-red-400 transition-colors"
                      >
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                      </button>
                    </span>
                  </div>
                  <div class="relative">
                    <input 
                      v-model="skillInput" 
                      @keydown.enter.prevent="addSkill"
                      type="text" 
                      :placeholder="langStore.t('addSkillPlaceholder')"
                      class="w-full px-4 py-2.5 pr-10 rounded-xl border border-white/[0.08] bg-slate-950/40 text-slate-200 placeholder-slate-600 focus:outline-none focus:border-cyan-500/30 focus:ring-4 focus:ring-cyan-500/10 outline-none transition-all"
                    >
                    <button 
                      type="button"
                      @click="addSkill"
                      class="absolute right-2.5 top-1/2 -translate-y-1/2 p-1.5 rounded-lg bg-white/[0.04] hover:bg-white/[0.08] text-slate-300 transition-colors"
                    >
                      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                      </svg>
                    </button>
                  </div>
                </div>

                <!-- Tone Selector -->
                <div>
                  <label class="block text-sm font-semibold text-slate-300 mb-2">{{ langStore.t('tone') }}</label>
                  <div class="flex flex-wrap gap-2">
                    <button 
                      v-for="tone in tones" 
                      :key="tone"
                      type="button"
                      @click="form.tone = tone"
                      :class="form.tone === tone ? 'bg-gradient-to-r from-cyan-500 to-blue-600 text-slate-900 font-bold shadow' : 'bg-white/[0.02] border border-white/[0.08] text-slate-300 hover:bg-white/[0.06] hover:text-white'"
                      class="px-5 py-2 rounded-lg text-sm font-medium transition-all"
                    >
                      {{ tone === 'Professional' ? (langStore.locale === 'id' ? 'Profesional' : 'Professional') : tone === 'Creative' ? (langStore.locale === 'id' ? 'Kreatif' : 'Creative') : (langStore.locale === 'id' ? 'Santai' : 'Casual') }}
                    </button>
                  </div>
                </div>

                <!-- Generate Button -->
                <button 
                  type="submit"
                  :disabled="loading"
                  class="w-full py-3.5 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 active:scale-[0.98] disabled:opacity-50 text-slate-900 font-bold rounded-xl transition-all shadow-lg shadow-cyan-500/10 flex items-center justify-center gap-2"
                >
                  <svg v-if="loading" class="animate-spin w-5 h-5 text-slate-900" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                  </svg>
                  <svg v-else class="w-5 h-5 text-slate-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                  </svg>
                  {{ loading ? langStore.t('generating') : langStore.t('generateBio') }}
                </button>
              </form>
            </div>

            <!-- RIGHT COLUMN: AI-Generated Suggestions -->
            <div class="xl:col-span-2 space-y-4">
              <!-- AI Bio Suggestions Section -->
              <div>
                <h3 class="text-lg font-bold text-white flex items-center gap-2 mb-3 px-1 font-display tracking-tight">
                  <svg class="w-5 h-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                  </svg>
                  {{ langStore.t('aiSuggestions') }}
                </h3>

                <div
                  v-for="(bio, index) in generatedBios"
                  :key="index"
                  class="bg-white/[0.01] border border-white/[0.05] shadow-lg rounded-3xl p-5 hover:border-white/[0.08] hover:bg-white/[0.02] transition-all mb-4 animate-scale-in"
                >
                  <div class="mb-3">
                    <h4 class="font-bold text-white text-sm">
                      Bio {{ index + 1 }} ({{ bio.tone === 'Professional' ? (langStore.locale === 'id' ? 'Profesional' : 'Professional') : bio.tone === 'Creative' ? (langStore.locale === 'id' ? 'Kreatif' : 'Creative') : (langStore.locale === 'id' ? 'Santai' : 'Casual') }}):
                    </h4>
                  </div>
                  <p class="text-slate-300 text-sm leading-relaxed mb-5">{{ bio.text }}</p>
                  <div class="flex items-center justify-between">
                    <button
                      @click="useBio(bio.text)"
                      class="px-5 py-2.5 bg-emerald-500 hover:bg-emerald-400 text-slate-900 text-sm font-bold rounded-lg transition-all shadow-md shadow-emerald-500/20 flex items-center gap-2"
                    >
                      <svg class="w-4 h-4 text-slate-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                      </svg>
                      {{ langStore.t('useThisBio') }}
                    </button>
                    <button
                      @click="regenerateBio(index)"
                      class="flex items-center gap-1.5 text-sm text-slate-400 hover:text-cyan-400 font-medium transition-colors"
                    >
                      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                      </svg>
                      {{ langStore.t('regenerate') }}
                    </button>
                  </div>
                </div>
              </div>

              <!-- AI Layout Suggestion Section -->
              <div class="bg-white/[0.01] border border-white/[0.05] shadow-lg rounded-3xl p-5 hover:border-white/[0.08] hover:bg-white/[0.02] transition-all">
                <div class="mb-4 flex items-center justify-between">
                  <h3 class="text-lg font-bold text-white flex items-center gap-2 font-display tracking-tight">
                    <svg class="w-5 h-5 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                    </svg>
                    {{ langStore.t('layoutSuggestion') }}
                  </h3>
                </div>

                <button v-if="!suggestedLayout" @click="suggestLayout" :disabled="layoutLoading" class="w-full py-3 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 active:scale-[0.98] disabled:opacity-50 text-slate-900 font-bold rounded-lg transition-all flex items-center justify-center gap-2">
                  <svg v-if="layoutLoading" class="animate-spin w-5 h-5 text-slate-900" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                  </svg>
                  <svg v-else class="w-5 h-5 text-slate-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                  </svg>
                  {{ layoutLoading ? langStore.t('generating') : langStore.t('suggestLayout') }}
                </button>

                <div v-else class="space-y-4">
                  <div class="bg-slate-950/40 border border-white/[0.05] rounded-xl p-4 space-y-3">
                    <div class="text-sm">
                      <p class="text-slate-400 font-medium mb-1">{{ langStore.t('layout') }}</p>
                      <p class="text-white font-bold">{{ suggestedLayout.layout_style }}</p>
                    </div>
                    <div class="text-sm">
                      <p class="text-slate-400 font-medium mb-2">{{ langStore.t('primaryColor') }}</p>
                      <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg border border-white/[0.08]" :style="{ backgroundColor: suggestedLayout.primary_color }"></div>
                        <span class="text-white font-bold">{{ suggestedLayout.primary_color }}</span>
                      </div>
                    </div>
                    <div class="text-sm">
                      <p class="text-slate-400 font-medium mb-2">{{ langStore.t('backgroundColor') }}</p>
                      <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg border border-white/[0.08]" :style="{ backgroundColor: suggestedLayout.background_color }"></div>
                        <span class="text-white font-bold">{{ suggestedLayout.background_color }}</span>
                      </div>
                    </div>
                  </div>

                  <button @click="applyLayoutSuggestion" class="w-full py-2.5 bg-emerald-500 hover:bg-emerald-400 text-slate-900 text-sm font-bold rounded-lg transition-all">{{ langStore.t('applySuggestion') }}</button>
                  <button @click="suggestLayout" class="w-full py-2.5 bg-white/[0.02] border border-white/[0.08] hover:bg-white/[0.06] text-slate-300 text-sm font-bold rounded-lg transition-all">{{ langStore.t('regenerate') }}</button>
                </div>
              </div>

              <!-- AI SEO Analyzer Section -->
              <div class="bg-white/[0.01] border border-white/[0.05] shadow-lg rounded-3xl p-5 hover:border-white/[0.08] hover:bg-white/[0.02] transition-all">
                <div class="mb-4 flex items-center justify-between">
                  <h3 class="text-lg font-bold text-white flex items-center gap-2 font-display tracking-tight">
                    <svg class="w-5 h-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ langStore.t('seoAnalyzer') }}
                  </h3>
                </div>

                <button v-if="!seoResult" @click="analyzeSeo" :disabled="seoLoading" class="w-full py-3 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-400 hover:to-teal-500 active:scale-[0.98] disabled:opacity-50 text-slate-900 font-bold rounded-lg transition-all flex items-center justify-center gap-2">
                  <svg v-if="seoLoading" class="animate-spin w-5 h-5 text-slate-900" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                  </svg>
                  <svg v-else class="w-5 h-5 text-slate-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  {{ seoLoading ? langStore.t('analyzing') : langStore.t('analyzeSeo') }}
                </button>

                <div v-else class="space-y-4">
                  <div class="bg-slate-950/40 border border-white/[0.05] rounded-xl p-4 space-y-4">
                    <div class="flex items-center justify-between">
                      <span class="text-sm font-medium text-slate-400">{{ langStore.t('seoScore') }}</span>
                      <span class="text-2xl font-bold" :class="seoResult.score >= 80 ? 'text-green-400' : seoResult.score >= 60 ? 'text-yellow-400' : 'text-red-400'">{{ seoResult.score }}/100</span>
                    </div>
                    <div class="w-full bg-white/[0.04] rounded-full h-2">
                      <div class="h-2 rounded-full transition-all" :class="seoResult.score >= 80 ? 'bg-green-500' : seoResult.score >= 60 ? 'bg-yellow-500' : 'bg-red-500'" :style="{ width: seoResult.score + '%' }"></div>
                    </div>
                    <p class="text-sm text-slate-300">{{ seoResult.summary }}</p>
                  </div>

                  <div v-if="seoResult.suggestions && seoResult.suggestions.length > 0">
                    <p class="text-sm font-bold text-white mb-2">{{ langStore.t('suggestions') }}</p>
                    <ul class="space-y-2">
                      <li v-for="(suggestion, index) in seoResult.suggestions" :key="index" class="flex items-start gap-2 text-sm text-slate-300">
                        <svg class="w-4 h-4 text-emerald-400 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ suggestion }}</span>
                      </li>
                    </ul>
                  </div>

                  <button @click="analyzeSeo" class="w-full py-2.5 bg-white/[0.02] border border-white/[0.08] hover:bg-white/[0.06] text-slate-300 text-sm font-bold rounded-lg transition-all">{{ langStore.t('reanalyze') }}</button>
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
import { ref, reactive, onMounted } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '../../stores/auth.js'
import { useLangStore } from '../../stores/lang.js'
import api from '../../services/api.js'
import { useThemeStore } from '../../stores/theme.js'

const router = useRouter()
const authStore = useAuthStore()
const langStore = useLangStore()
const themeStore = useThemeStore()

const skillInput = ref('')
const loading = ref(false)

const form = reactive({
  name: '',
  profession: '',
  skills: ['Vue.js', 'Laravel', 'AI Integration'],
  tone: 'Creative'
})

const tones = ['Professional', 'Creative', 'Casual']

const generatedBios = ref([
  {
    tone: 'Professional',
    text: 'Please input your details and generate a bio to get started.'
  }
])

const layoutLoading = ref(false)
const suggestedLayout = ref(null)

const seoLoading = ref(false)
const seoResult = ref(null)

const fetchProfile = async () => {
  try {
    const response = await api.get('/auth/me')
    authStore.user = response.data
    form.name = response.data.name || ''
    form.profession = response.data.profession || ''
  } catch (err) {
    console.error('Failed to fetch profile:', err)
  }
}

onMounted(async () => {
  await fetchProfile()
  await themeStore.fetchTheme()
})

const suggestLayout = async () => {
  if (!form.profession) {
    alert(langStore.t('enterProfession'))
    return
  }
  layoutLoading.value = true
  suggestedLayout.value = null
  try {
    const response = await api.post('/ai/suggest-layout', { profession: form.profession, locale: langStore.locale })
    suggestedLayout.value = response.data
  } catch (err) {
    alert(err.response?.data?.message || 'Failed to generate layout suggestion.')
  } finally {
    layoutLoading.value = false
  }
}

const applyLayoutSuggestion = async () => {
  if (!suggestedLayout.value) return
  await themeStore.applyTheme({
    layout_style: suggestedLayout.value.layout_style,
    primary_color: suggestedLayout.value.primary_color,
    background_color: suggestedLayout.value.background_color,
    font_family: suggestedLayout.value.font_family,
  })
  themeStore.currentTheme = suggestedLayout.value
}

const analyzeSeo = async () => {
  if (!authStore.user?.bio || !authStore.user?.username) {
    alert(langStore.t('needBioUsername'))
    return
  }

  seoLoading.value = true
  seoResult.value = null

  try {
    const linksResponse = await api.get('/links')
    const linkTitles = linksResponse.data.map(link => link.title)

    const response = await api.post('/ai/analyze-seo', {
      bio: authStore.user.bio,
      username: authStore.user.username,
      link_titles: linkTitles.length > 0 ? linkTitles : ['No links yet'],
      locale: langStore.locale
    })
    seoResult.value = response.data
  } catch (err) {
    alert(err.response?.data?.message || 'Failed to analyze SEO.')
  } finally {
    seoLoading.value = false
  }
}

const addSkill = () => {
  const trimmed = skillInput.value.trim()
  if (trimmed && !form.skills.includes(trimmed)) {
    form.skills.push(trimmed)
  }
  skillInput.value = ''
}

const removeSkill = (index) => {
  form.skills.splice(index, 1)
}

const generateBio = async () => {
  loading.value = true
  try {
    const response = await api.post('/ai/generate-bio', { ...form, locale: langStore.locale })
    generatedBios.value = response.data
  } catch (err) {
    alert(err.response?.data?.message || 'Failed to generate bios.')
  } finally {
    loading.value = false
  }
}

const useBio = async (text) => {
  try {
    await api.put('/profile', {
      name: authStore.user?.name,
      profession: authStore.user?.profession,
      bio: text,
      email: authStore.user?.email,
      username: authStore.user?.username,
      github_url: authStore.user?.github_url,
      linkedin_url: authStore.user?.linkedin_url,
      twitter_url: authStore.user?.twitter_url,
      instagram_url: authStore.user?.instagram_url,
    })
    alert(langStore.t('bioApplied'))
  } catch (err) {
    alert(langStore.locale === 'id' ? 'Gagal menyimpan bio hasil AI.' : 'Failed to save generated bio.')
  }
}

const regenerateBio = async (index) => {
  await generateBio()
}

const handleLogout = async () => {
  await authStore.logout()
  router.push('/')
}
</script>
