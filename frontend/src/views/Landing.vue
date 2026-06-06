<template>
  <div class="min-h-screen bg-[#0B0F19] text-[#E2E8F0] font-sans antialiased selection:bg-cyan-500 selection:text-slate-900 relative overflow-hidden">
    <!-- Soft, slow floating background blurs (minimalist) -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none z-0">
      <div class="absolute top-[-20%] left-[-10%] w-[600px] h-[600px] bg-blue-500/[0.04] rounded-full blur-[160px]"></div>
      <div class="absolute bottom-[-20%] right-[-10%] w-[700px] h-[700px] bg-purple-500/[0.04] rounded-full blur-[180px]"></div>
      
      <!-- Slow-moving elegant ambient dusts -->
      <div class="absolute inset-0">
        <div v-for="n in 6" :key="n" :class="`particle particle-${n}`"></div>
      </div>
    </div>

    <!-- Navigation Header -->
    <header class="relative z-10 border-b border-white/[0.04] bg-[#0B0F19]/40 backdrop-blur-md animate-fade-in-down">
      <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
        <!-- Brand -->
        <router-link to="/" class="flex items-center gap-3 group">
          <img src="/logo.png" class="w-8 h-8 rounded-xl object-cover shadow-lg shadow-cyan-500/10 group-hover:scale-105 transition-transform duration-300">
          <span class="text-white font-bold text-base leading-tight tracking-tight">LinkBio <span class="text-cyan-400">AI</span></span>
        </router-link>

        <!-- Right Side Navbar Tools -->
        <div class="flex items-center gap-6">
          <!-- Language Capsule Switcher -->
          <div class="flex items-center gap-1 bg-white/[0.03] border border-white/[0.08] rounded-xl p-0.5">
            <button 
              @click="langStore.setLanguage('en')" 
              :class="langStore.locale === 'en' ? 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 font-bold' : 'text-slate-400 hover:text-white border border-transparent'" 
              class="px-2 py-0.5 text-[10px] rounded-lg transition-all duration-300"
            >
              EN
            </button>
            <button 
              @click="langStore.setLanguage('id')" 
              :class="langStore.locale === 'id' ? 'bg-cyan-500/10 text-cyan-400 border border-cyan-500/20 font-bold' : 'text-slate-400 hover:text-white border border-transparent'" 
              class="px-2 py-0.5 text-[10px] rounded-lg transition-all duration-300"
            >
              ID
            </button>
          </div>

          <!-- Dynamic Auth Navigation Buttons -->
          <div class="flex items-center gap-4">
            <template v-if="authStore.isAuthenticated">
              <span class="hidden sm:inline text-xs text-slate-400">
                {{ langStore.t('welcome') }}, <span class="text-slate-200 font-semibold">{{ authStore.user?.name || 'User' }}</span>
              </span>
              <router-link 
                to="/dashboard" 
                class="px-4 py-2 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-slate-900 font-bold text-xs transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center gap-1"
              >
                {{ langStore.t('landingGoDashboard') }}
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
              </router-link>
            </template>
            
            <template v-else>
              <router-link to="/login" class="text-xs font-semibold text-slate-400 hover:text-white transition-colors duration-300">
                {{ langStore.t('landingLogin') }}
              </router-link>
              <router-link 
                to="/register" 
                class="px-4 py-2 rounded-xl bg-white/[0.04] hover:bg-white/[0.08] text-white font-semibold text-xs border border-white/[0.08] transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]"
              >
                {{ langStore.t('landingReg') }}
              </router-link>
            </template>
          </div>
        </div>
      </div>
    </header>

    <!-- Hero Section -->
    <main class="relative z-10 max-w-6xl mx-auto px-6 pt-16 pb-24">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
        
        <!-- Left Hero Details -->
        <div class="lg:col-span-7 space-y-8 text-center lg:text-left">
          <div class="space-y-4">
            <h1 class="text-4xl sm:text-5xl lg:text-[52px] font-bold text-white leading-[1.15] tracking-tight animate-fade-in-up" style="animation-delay: 0.1s;">
              {{ langStore.t('landingHeroTitle') }} <br class="hidden lg:inline">
              <span class="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">{{ langStore.t('landingHeroTitleHighlight') }}</span>
            </h1>
            <p class="text-slate-400 text-sm sm:text-base leading-relaxed max-w-xl animate-fade-in-up" style="animation-delay: 0.25s;">
              {{ langStore.t('landingHeroSub') }}
            </p>
          </div>

          <!-- CTAs -->
          <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 animate-fade-in-up" style="animation-delay: 0.4s;">
            <template v-if="authStore.isAuthenticated">
              <router-link 
                to="/dashboard" 
                class="w-full sm:w-auto px-6 py-3.5 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-slate-900 font-bold rounded-xl shadow-lg shadow-cyan-500/5 hover:shadow-cyan-500/10 transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-2"
              >
                {{ langStore.t('landingGoDashboard') }}
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
              </router-link>
            </template>
            <template v-else>
              <router-link 
                to="/register" 
                class="w-full sm:w-auto px-6 py-3.5 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-slate-900 font-bold rounded-xl shadow-lg shadow-cyan-500/5 hover:shadow-cyan-500/10 transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] text-center"
              >
                {{ langStore.t('landingGetStarted') }}
              </router-link>
              <router-link 
                to="/login" 
                class="w-full sm:w-auto px-6 py-3.5 bg-white/[0.03] hover:bg-white/[0.06] border border-white/[0.08] hover:border-white/[0.12] rounded-xl font-bold transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] text-center"
              >
                {{ langStore.t('landingLoginDashboard') }}
              </router-link>
            </template>
          </div>

          <!-- Demo Generator Card -->
          <div class="p-6 rounded-2xl bg-white/[0.02] border border-white/[0.05] backdrop-blur-sm space-y-4 text-left shadow-xl animate-fade-in-up" style="animation-delay: 0.55s;">
            <h3 class="text-xs font-bold text-white flex items-center gap-2">
              <span class="w-2 h-2 rounded-full bg-cyan-400 animate-pulse"></span>
              {{ langStore.t('tryDemoTitle') }}
            </h3>
            <p class="text-[11px] text-slate-400 leading-relaxed">
              {{ langStore.t('tryDemoSub') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-3">
              <input 
                v-model="aiPrompt"
                type="text"
                :placeholder="langStore.t('demoPlaceholder')"
                class="flex-1 bg-slate-950/20 border border-white/[0.08] rounded-xl px-4 py-2.5 text-xs text-slate-200 placeholder-slate-500 focus:outline-none focus:border-cyan-500/30 transition-all duration-300"
                @keyup.enter="runDemoGeneration"
              >
              <button 
                @click="runDemoGeneration"
                :disabled="isGenerating || !aiPrompt.trim()"
                class="px-4 py-2.5 rounded-xl bg-cyan-500 hover:bg-cyan-400 text-slate-900 font-bold text-xs disabled:opacity-50 transition-all duration-300 flex items-center justify-center gap-1.5 whitespace-nowrap hover:scale-[1.02] active:scale-[0.98]"
              >
                <span v-if="isGenerating" class="w-3 h-3 border-2 border-slate-900 border-t-transparent rounded-full animate-spin"></span>
                {{ isGenerating ? langStore.t('generatingDemo') : langStore.t('generateDemoBtn') }}
              </button>
            </div>
          </div>
        </div>

        <!-- Right Hero Mockup -->
        <div class="lg:col-span-5 flex flex-col items-center animate-fade-in-up" style="animation-delay: 0.35s;">
          <div class="relative w-full max-w-[290px] group">
            <!-- Subtle backdrop glow reflection -->
            <div 
              class="absolute -inset-1 rounded-[42px] blur-lg opacity-10 group-hover:opacity-20 transition-all duration-500 pointer-events-none"
              :class="{
                'bg-cyan-500': selectedTheme === 'glass',
                'bg-pink-500': selectedTheme === 'cyberpunk',
                'bg-slate-300': selectedTheme === 'minimalist'
              }"
            ></div>
            
            <!-- Mock Phone Body -->
            <div 
              class="relative border rounded-[38px] shadow-2xl p-4 overflow-hidden transition-all duration-500"
              :class="{
                'bg-[#0F172A]/80 backdrop-blur-xl border-white/[0.06] text-slate-200': selectedTheme === 'glass',
                'bg-black border-pink-500/30 shadow-md shadow-pink-500/5 text-pink-500': selectedTheme === 'cyberpunk',
                'bg-white border-slate-200 text-slate-800 shadow-xl': selectedTheme === 'minimalist'
              }"
            >
              <!-- Phone Notch / Top pill bar -->
              <div class="h-5 flex items-end justify-center pb-1">
                <div 
                  class="w-16 h-3 rounded-full flex items-center justify-center gap-1 transition-colors duration-500"
                  :class="selectedTheme === 'minimalist' ? 'bg-slate-100' : 'bg-slate-950'"
                >
                  <div class="w-1 h-1 rounded-full bg-slate-700"></div>
                  <div class="w-6 h-0.5 rounded-full bg-slate-700"></div>
                </div>
              </div>
              
              <!-- Mock Content -->
              <div class="px-3 pb-5 pt-1 text-center space-y-5">
                <!-- Avatar & Name -->
                <div class="flex flex-col items-center">
                  <div 
                    class="w-14 h-14 rounded-full p-0.5 mb-2.5 transition-all duration-500"
                    :class="{
                      'bg-gradient-to-br from-cyan-400 to-purple-500': selectedTheme === 'glass',
                      'bg-pink-500': selectedTheme === 'cyberpunk',
                      'bg-slate-200': selectedTheme === 'minimalist'
                    }"
                  >
                    <img :src="previewAvatar" class="w-full h-full rounded-full object-cover border-2" :class="selectedTheme === 'minimalist' ? 'border-white' : 'border-slate-950'">
                  </div>
                  <h3 
                    class="text-xs font-bold leading-none transition-all duration-500"
                    :class="{
                      'text-white': selectedTheme === 'glass',
                      'text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-cyan-400 font-extrabold tracking-wider uppercase': selectedTheme === 'cyberpunk',
                      'text-slate-800': selectedTheme === 'minimalist'
                    }"
                  >
                    {{ previewName }}
                  </h3>
                  <p 
                    class="text-[8px] mt-1 uppercase tracking-wider font-bold transition-all duration-500"
                    :class="{
                      'text-slate-400': selectedTheme === 'glass',
                      'text-cyan-400 font-mono': selectedTheme === 'cyberpunk',
                      'text-slate-500': selectedTheme === 'minimalist'
                    }"
                  >
                    {{ previewProfession || (selectedTheme === 'cyberpunk' ? 'CORE_DEV' : 'Web Developer') }}
                  </p>
                </div>
                
                <!-- Mock Bio (Typewriter output) -->
                <div 
                  class="text-[9px] py-2 border-t border-b leading-relaxed transition-all duration-500 min-h-[48px] flex items-center justify-center"
                  :class="{
                    'text-slate-300 border-white/[0.04]': selectedTheme === 'glass',
                    'text-cyan-300 border-pink-500/15 font-mono': selectedTheme === 'cyberpunk',
                    'text-slate-500 border-slate-100': selectedTheme === 'minimalist'
                  }"
                >
                  {{ mockBio }}
                </div>
 
                <!-- Links Buttons -->
                <div class="space-y-2">
                  <div 
                    v-for="(btn, index) in mockLinks"
                    :key="index"
                    @click="incrementSimulatedClick(index)"
                    class="relative p-2.5 border rounded-xl text-[9px] font-bold transition-all duration-500 cursor-pointer select-none flex items-center justify-between group"
                    :class="{
                      'bg-white/[0.03] border-white/[0.06] hover:bg-white/[0.06] text-slate-200': selectedTheme === 'glass',
                      'bg-black border border-cyan-500/50 text-cyan-400 hover:bg-cyan-500/10 font-mono': selectedTheme === 'cyberpunk',
                      'bg-slate-50 border-slate-200 text-slate-600 hover:bg-slate-100 hover:text-slate-800': selectedTheme === 'minimalist'
                    }"
                  >
                    <span>{{ btn.emoji }} {{ btn.label }}</span>
                    <div class="flex items-center gap-1.5">
                      <span class="text-[7.5px] opacity-65 font-mono">{{ btn.clicks }} clicks</span>
                      <span v-if="btn.showPlusOne" class="absolute -right-2 -top-2 px-1 py-0.5 rounded bg-cyan-500 text-slate-900 font-extrabold text-[8px] tracking-tight leading-none shadow shadow-cyan-500/30 animate-bounce-fade">+1</span>
                    </div>
                  </div>
                </div>

                <!-- Footer -->
                <p 
                  class="text-[6px] font-bold uppercase tracking-widest pt-1 transition-all duration-500"
                  :class="{
                    'text-slate-500': selectedTheme === 'glass',
                    'text-pink-500/50 font-mono': selectedTheme === 'cyberpunk',
                    'text-slate-400': selectedTheme === 'minimalist'
                  }"
                >
                  Powered by LinkBio AI
                </p>
              </div>
            </div>
          </div>

          <!-- Theme switcher labels/buttons (minimalist pill switcher) -->
          <div class="mt-5 flex flex-col items-center gap-1.5 relative z-20">
            <span class="text-[8px] uppercase tracking-widest text-slate-500 font-bold">
              {{ langStore.t('activeThemeLabel') }}
            </span>
            <div class="flex items-center bg-white/[0.02] border border-white/[0.06] rounded-xl p-0.5 shadow-md">
              <button 
                @click="selectedTheme = 'glass'"
                :class="selectedTheme === 'glass' ? 'bg-white/[0.04] text-cyan-400 border-white/[0.08] font-bold shadow' : 'border-transparent text-slate-400 hover:text-white'"
                class="px-2.5 py-1 text-[9px] rounded-lg border transition-all duration-300"
              >
                Glass
              </button>
              <button 
                @click="selectedTheme = 'cyberpunk'"
                :class="selectedTheme === 'cyberpunk' ? 'bg-white/[0.04] text-pink-400 border-white/[0.08] font-bold shadow' : 'border-transparent text-slate-400 hover:text-white'"
                class="px-2.5 py-1 text-[9px] rounded-lg border transition-all duration-300"
              >
                Cyber
              </button>
              <button 
                @click="selectedTheme = 'minimalist'"
                :class="selectedTheme === 'minimalist' ? 'bg-white/[0.04] text-white border-white/[0.08] font-bold shadow' : 'border-transparent text-slate-400 hover:text-white'"
                class="px-2.5 py-1 text-[9px] rounded-lg border transition-all duration-300"
              >
                Minimal
              </button>
            </div>
          </div>

          <!-- Interactive Mockup Link Adder -->
          <div class="mt-4 w-full max-w-[270px] bg-white/[0.01] border border-white/[0.05] p-3 rounded-2xl space-y-2 relative z-20 animate-fade-in-up" style="animation-delay: 0.45s;">
            <div class="flex items-center justify-between">
              <span class="text-[9px] uppercase tracking-wider text-slate-400 font-bold">
                {{ langStore.locale === 'id' ? 'Tambah Link Kustom' : 'Add Custom Link' }}
              </span>
              <span class="text-[8px] px-1.5 py-0.5 rounded bg-cyan-500/10 text-cyan-400 font-medium">Demo</span>
            </div>
            <div class="flex gap-2">
              <input 
                v-model="newLinkTitle"
                type="text" 
                :placeholder="langStore.locale === 'id' ? 'Nama Link (cth: YouTube)' : 'Link Name (e.g. YouTube)'"
                class="flex-1 bg-slate-950/40 border border-white/[0.08] rounded-xl px-3 py-1.5 text-[10px] text-slate-200 placeholder-slate-600 focus:outline-none focus:border-cyan-500/30 transition-all duration-300"
                @keyup.enter="addNewMockLink"
              />
              <button 
                @click="addNewMockLink"
                class="px-3 py-1.5 bg-cyan-500 hover:bg-cyan-400 text-slate-900 font-bold text-[10px] rounded-xl transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]"
              >
                +
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Bento Grid Features Section -->
      <section class="mt-32 border-t border-white/[0.04] pt-20 animate-fade-in-up" style="animation-delay: 0.65s;">
        <h2 class="text-xl sm:text-2xl font-bold text-white text-center mb-16 tracking-tight">{{ langStore.t('landingFeaturesTitle') }}</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
          
          <!-- AI Co-Writer (Spans 2 Columns) -->
          <div class="md:col-span-2 p-8 rounded-3xl bg-white/[0.01] border border-white/[0.04] hover:border-white/[0.08] hover:bg-white/[0.02] transition-all duration-500 flex flex-col justify-between group space-y-6">
            <div class="space-y-3">
              <div class="w-10 h-10 rounded-xl bg-cyan-500/[0.03] text-cyan-400 flex items-center justify-center border border-cyan-500/10 group-hover:border-cyan-500/20 transition-all duration-500">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                </svg>
              </div>
              <h3 class="text-lg font-bold text-white">{{ langStore.t('feat3Title') }}</h3>
              <p class="text-slate-400 text-xs sm:text-sm leading-relaxed max-w-lg">
                {{ langStore.t('feat3Desc') }}
              </p>
            </div>
            
            <!-- Interactive tone bio demo inside Bento Card -->
            <div class="p-5 rounded-2xl bg-slate-950/40 border border-white/[0.05] space-y-4">
              <div class="flex flex-wrap gap-2 items-center justify-between">
                <span class="text-[9px] uppercase tracking-wider text-slate-500 font-bold">Try Tone Switcher:</span>
                <div class="flex bg-white/[0.02] border border-white/[0.06] rounded-xl p-0.5">
                  <button 
                    v-for="tone in ['professional', 'casual', 'cyberpunk']" 
                    :key="tone"
                    @click="bentoActiveTone = tone"
                    :class="bentoActiveTone === tone ? 'bg-cyan-500/10 text-cyan-400 font-bold border-cyan-500/20' : 'text-slate-400 hover:text-white border-transparent'"
                    class="px-2.5 py-1 text-[9px] uppercase tracking-wider rounded-lg border transition-all duration-300"
                  >
                    {{ tone }}
                  </button>
                </div>
              </div>
              <div class="text-xs text-slate-300 min-h-[48px] bg-slate-950/20 p-3.5 rounded-xl border border-white/[0.02] leading-relaxed font-sans transition-all duration-500">
                <span class="text-cyan-400 font-mono select-none mr-1.5">&gt;</span>
                {{ bentoBios[bentoActiveTone] }}
              </div>
            </div>
          </div>

          <!-- Device Analytics (Spans 1 Column) -->
          <div class="p-8 rounded-3xl bg-white/[0.01] border border-white/[0.04] hover:border-white/[0.08] hover:bg-white/[0.02] transition-all duration-500 flex flex-col justify-between group space-y-6">
            <div class="space-y-3">
              <div class="w-10 h-10 rounded-xl bg-blue-500/[0.03] text-blue-400 flex items-center justify-center border border-blue-500/10 group-hover:border-blue-500/20 transition-all duration-500">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
              </div>
              <h3 class="text-lg font-bold text-white">{{ langStore.t('feat2Title') }}</h3>
              <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">
                {{ langStore.t('feat2Desc') }}
              </p>
            </div>
            
            <!-- Device Traffic Mini Mockup Visualizer -->
            <div class="space-y-2.5 p-4 rounded-2xl bg-slate-950/40 border border-white/[0.05]">
              <div class="text-[9px] uppercase tracking-wider text-slate-500 font-bold block mb-1">Device Telemetry:</div>
              <div v-for="device in [
                { name: 'Mobile', pct: 62, color: 'bg-cyan-500' },
                { name: 'Desktop', pct: 31, color: 'bg-blue-500' },
                { name: 'Tablet', pct: 7, color: 'bg-slate-500' }
              ]" :key="device.name" class="space-y-1">
                <div class="flex justify-between text-[10px] font-mono">
                  <span class="text-slate-400">{{ device.name }}</span>
                  <span class="text-slate-200 font-bold">{{ device.pct }}%</span>
                </div>
                <div class="w-full bg-white/[0.04] h-1.5 rounded-full overflow-hidden">
                  <div :class="[device.color]" class="h-full rounded-full transition-all duration-1000" :style="{ width: device.pct + '%' }"></div>
                </div>
              </div>
            </div>
          </div>

          <!-- Click Telemetry Heatmap (Spans 1 Column) -->
          <div class="p-8 rounded-3xl bg-white/[0.01] border border-white/[0.04] hover:border-white/[0.08] hover:bg-white/[0.02] transition-all duration-500 flex flex-col justify-between group space-y-6">
            <div class="space-y-3">
              <div class="w-10 h-10 rounded-xl bg-emerald-500/[0.03] text-emerald-400 flex items-center justify-center border border-emerald-500/10 group-hover:border-emerald-500/20 transition-all duration-500">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                </svg>
              </div>
              <h3 class="text-lg font-bold text-white">{{ langStore.locale === 'id' ? 'Pelacakan Klik Real-Time' : 'Real-Time Click Analytics' }}</h3>
              <p class="text-slate-400 text-xs sm:text-sm leading-relaxed">
                {{ langStore.locale === 'id' ? 'Setiap klik di halaman publik Anda dilacak secara instan. Ketahui link mana yang berkinerja paling optimal.' : 'Every click on your public bio page is tracked instantly. Visualize click performance and CTR ratios instantly.' }}
              </p>
            </div>
            
            <!-- Link click breakdown visualizer -->
            <div class="space-y-2 p-4 rounded-2xl bg-slate-950/40 border border-white/[0.05]">
              <div class="text-[9px] uppercase tracking-wider text-slate-500 font-bold block mb-1">Top Links & CTR:</div>
              <div v-for="link in [
                { title: 'My Portfolio 🔗', clicks: 582, ctr: '18.4%' },
                { title: 'Store Discount 🏷️', clicks: 312, ctr: '12.1%' }
              ]" :key="link.title" class="flex items-center justify-between text-[10px] bg-white/[0.02] border border-white/[0.04] p-2 rounded-xl">
                <span class="text-slate-300 font-bold">{{ link.title }}</span>
                <div class="flex gap-2 font-mono text-[9px]">
                  <span class="text-cyan-400">{{ link.clicks }} clicks</span>
                  <span class="text-slate-500">|</span>
                  <span class="text-emerald-400">{{ link.ctr }} CTR</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Customizable Themes & Fonts (Spans 2 Columns) -->
          <div class="md:col-span-2 p-8 rounded-3xl bg-white/[0.01] border border-white/[0.04] hover:border-white/[0.08] hover:bg-white/[0.02] transition-all duration-500 flex flex-col justify-between group space-y-6">
            <div class="space-y-3">
              <div class="w-10 h-10 rounded-xl bg-purple-500/[0.03] text-purple-400 flex items-center justify-center border border-purple-500/10 group-hover:border-purple-500/20 transition-all duration-500">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
              </div>
              <h3 class="text-lg font-bold text-white">{{ langStore.locale === 'id' ? 'Desain Minimalis & Tema Estetik' : 'Aesthetic Themes & Custom Styling' }}</h3>
              <p class="text-slate-400 text-xs sm:text-sm leading-relaxed max-w-lg">
                {{ langStore.locale === 'id' ? 'Pilih dari berbagai kombinasi warna dan gaya minimalis, glassmorphism, atau dark mode premium agar sesuai dengan brand personal Anda.' : 'Choose from curated combinations of fine glassmorphism, cyberpunk neon, or paper-white minimal aesthetics to fit your personal brand.' }}
              </p>
            </div>
            
            <!-- Themes cards display inside Bento Card -->
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
              <div v-for="theme in [
                { name: 'Glassmorphism', desc: 'Modern & Soft Blurs', styleClass: 'bg-[#0F172A]/60 border-white/[0.08] text-slate-200' },
                { name: 'Cyberpunk', desc: 'Glowing Neon Styles', styleClass: 'bg-black border-pink-500/40 text-pink-400' },
                { name: 'Pure Minimalist', desc: 'Clean & Paper White', styleClass: 'bg-white border-slate-200 text-slate-800' }
              ]" :key="theme.name" :class="[theme.styleClass]" class="p-3.5 border rounded-2xl text-center space-y-1.5 transition-transform duration-500 hover:scale-[1.03] select-none shadow-md">
                <div class="text-[10px] font-extrabold uppercase tracking-wide leading-none">{{ theme.name }}</div>
                <div class="text-[8px] opacity-60 font-medium leading-none">{{ theme.desc }}</div>
              </div>
            </div>
          </div>

        </div>
      </section>

      <!-- FAQ Section -->
      <section class="mt-32 border-t border-white/[0.04] pt-20 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 0.75s;">
        <h2 class="text-xl sm:text-2xl font-bold text-white text-center mb-16 tracking-tight">
          {{ langStore.t('faqTitle') }}
        </h2>
        
        <div class="space-y-3">
          <div 
            v-for="i in [1, 2, 3, 4]" 
            :key="i"
            class="rounded-xl border transition-all duration-300 overflow-hidden"
            :class="faqOpenIndex === i ? 'bg-white/[0.01] border-cyan-500/20' : 'bg-slate-950/[0.05] border-white/[0.04] hover:border-white/[0.08]'"
          >
            <!-- Accordion Header -->
            <button 
              @click="toggleFaq(i)"
              class="w-full px-5 py-4.5 flex items-center justify-between text-left focus:outline-none"
            >
              <span class="font-semibold text-xs sm:text-sm text-white">
                {{ langStore.t(`faq${i}Q`) }}
              </span>
              <span class="ml-4 flex-shrink-0 text-slate-500 transition-transform duration-300" :class="{ 'rotate-180 text-cyan-400': faqOpenIndex === i }">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
              </span>
            </button>
            
            <!-- Accordion Content -->
            <div 
              class="transition-all duration-300 ease-in-out"
              :style="{ maxHeight: faqOpenIndex === i ? '200px' : '0px' }"
            >
              <div class="px-5 pb-4 text-xs text-slate-400 leading-relaxed border-t border-white/[0.04] pt-2.5">
                {{ langStore.t(`faq${i}A`) }}
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <footer class="relative z-10 border-t border-white/[0.04] py-8 text-center text-xs text-slate-500 bg-slate-950/20 animate-fade-in-up" style="animation-delay: 0.8s;">
      <p>&copy; 2026 LinkBio AI. Created by Ival Permana. All rights reserved.</p>
    </footer>
  </div>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue'
import { useAuthStore } from '../stores/auth.js'
import { useLangStore } from '../stores/lang.js'

const authStore = useAuthStore()
const langStore = useLangStore()

// Theme state
const selectedTheme = ref('glass')

// FAQ state
const faqOpenIndex = ref(null)
const toggleFaq = (index) => {
  faqOpenIndex.value = faqOpenIndex.value === index ? null : index
}

// AI Bio Demo state
const aiPrompt = ref('')
const isGenerating = ref(false)

// Set default initial bio based on language
const getDefaultBio = () => {
  return langStore.locale === 'id' 
    ? 'Bikin bio profil keren dalam berbagai gaya bahasa sesuai keahlian kamu...'
    : 'Generate engaging profile bios in different tones based on your skills...'
}

const mockBio = ref(getDefaultBio())

const previewName = ref('Ival Permana')
const previewAvatar = ref('https://ui-avatars.com/api/?name=Ival+Permana&background=0D8ABC&color=fff&size=128')
const previewProfession = ref('')

// Bento Grid States
const bentoActiveTone = ref('professional')
const bentoBios = {
  professional: 'Experienced Developer specializing in building scalable web apps and clean, modular systems. Let\'s collaborate!',
  casual: 'Just a tech enthusiast who loves building neat websites, drinking coffee, and playing video games. Let\'s connect! ☕🎮',
  cyberpunk: 'SYNTAX_WARRIOR // Building the digital matrix with modern code stack. Neon lights & cyber grids. Enter the portal. ⚡🌌'
}

const mockLinks = ref([
  { emoji: '🔗', label: 'Personal Portfolio', clicks: 142, showPlusOne: false },
  { emoji: '💼', label: 'LinkedIn Profile', clicks: 88, showPlusOne: false },
  { emoji: '💻', label: 'GitHub Projects', clicks: 215, showPlusOne: false }
])

const newLinkTitle = ref('')

const addNewMockLink = () => {
  if (!newLinkTitle.value.trim()) return
  const emojis = ['🔗', '✨', '🚀', '🔥', '📌', '🌟', '⚡']
  const randomEmoji = emojis[Math.floor(Math.random() * emojis.length)]
  mockLinks.value.push({
    emoji: randomEmoji,
    label: newLinkTitle.value.trim(),
    clicks: 0,
    showPlusOne: false
  })
  newLinkTitle.value = ''
}

const incrementSimulatedClick = (index) => {
  mockLinks.value[index].clicks++
  mockLinks.value[index].showPlusOne = true
  setTimeout(() => {
    mockLinks.value[index].showPlusOne = false
  }, 800)
}

// Keep mockup default bio updated if language is changed manually
watch(() => langStore.locale, () => {
  if (!aiPrompt.value.trim() && !isGenerating.value) {
    mockBio.value = getDefaultBio()
  }
})

// Simulated AI response typewriter effect
const runDemoGeneration = () => {
  if (isGenerating.value || !aiPrompt.value.trim()) return
  
  isGenerating.value = true
  mockBio.value = ''
  
  const promptText = aiPrompt.value.trim()
  const promptLower = promptText.toLowerCase()
  const locale = langStore.locale
  
  // Clean prefix filler words to extract the profession
  let parsedJob = promptText
  if (locale === 'id') {
    parsedJob = parsedJob.replace(/^(saya seorang|saya sebagai|pekerjaan saya|sebagai|saya)\s+/i, '')
    // Remove some suffix qualifiers like "yang..." or "di..."
    parsedJob = parsedJob.replace(/\s+(yang|dengan|dan|di)\s+.*$/i, '')
  } else {
    parsedJob = parsedJob.replace(/^(i am a|i am an|i'm a|i'm an|i work as a|i work as an|i work as|my job is a|my job is an|my job is|i)\s+/i, '')
    parsedJob = parsedJob.replace(/\s+(who|with|and|at|in)\s+.*$/i, '')
  }
  
  // Clean trailing and special chars
  parsedJob = parsedJob.replace(/[.,\/#!$%\^&\*;:{}=\-_`~()]/g, "").trim()
  
  // Capitalize each word
  if (parsedJob.length > 0) {
    parsedJob = parsedJob.split(' ').map(w => w.charAt(0).toUpperCase() + w.slice(1)).join(' ')
  } else {
    parsedJob = locale === 'id' ? 'Kreator Keren' : 'Creative Mind'
  }
  
  // Determine categories/emojis
  let category = 'default'
  let emoji = '✨'
  
  if (promptLower.includes('dev') || promptLower.includes('code') || promptLower.includes('program') || promptLower.includes('web') || promptLower.includes('rekayasa') || promptLower.includes('ngoding') || promptLower.includes('engineer') || promptLower.includes('it')) {
    category = 'developer'
    emoji = '💻'
  } else if (promptLower.includes('design') || promptLower.includes('desain') || promptLower.includes('ui') || promptLower.includes('ux') || promptLower.includes('artist') || promptLower.includes('gambar') || promptLower.includes('art') || promptLower.includes('lukis') || promptLower.includes('ilustrator')) {
    category = 'designer'
    emoji = '🎨'
  } else if (promptLower.includes('create') || promptLower.includes('konten') || promptLower.includes('video') || promptLower.includes('youtube') || promptLower.includes('tiktok') || promptLower.includes('pembuat konten') || promptLower.includes('influencer') || promptLower.includes('editor')) {
    category = 'creator'
    emoji = '📹'
  } else if (promptLower.includes('game') || promptLower.includes('main') || promptLower.includes('stream') || promptLower.includes('pubg') || promptLower.includes('ml') || promptLower.includes('gaming')) {
    category = 'gamer'
    emoji = '🎮'
  } else if (promptLower.includes('dokter') || promptLower.includes('perawat') || promptLower.includes('medis') || promptLower.includes('doctor') || promptLower.includes('nurse') || promptLower.includes('medical') || promptLower.includes('dentist') || promptLower.includes('bidan') || promptLower.includes('hospital') || promptLower.includes('klinik') || promptLower.includes('kesehatan') || promptLower.includes('sakit')) {
    category = 'medical'
    emoji = '🩺'
  } else if (promptLower.includes('foto') || promptLower.includes('photo') || promptLower.includes('kamera') || promptLower.includes('camera') || promptLower.includes('fotografer') || promptLower.includes('photographer') || promptLower.includes('shot')) {
    category = 'photo'
    emoji = '📸'
  } else if (promptLower.includes('marketing') || promptLower.includes('sales') || promptLower.includes('bisnis') || promptLower.includes('business') || promptLower.includes('manager') || promptLower.includes('kelola') || promptLower.includes('manajemen') || promptLower.includes('startup') || promptLower.includes('ceo') || promptLower.includes('jual')) {
    category = 'business'
    emoji = '💼'
  } else if (promptLower.includes('guru') || promptLower.includes('dosen') || promptLower.includes('mengajar') || promptLower.includes('edukasi') || promptLower.includes('teacher') || promptLower.includes('tutor') || promptLower.includes('lecturer') || promptLower.includes('educator') || promptLower.includes('sekolah') || promptLower.includes('ajar')) {
    category = 'education'
    emoji = '🧑‍🏫'
  } else if (promptLower.includes('koki') || promptLower.includes('chef') || promptLower.includes('masak') || promptLower.includes('culinary') || promptLower.includes('kuliner') || promptLower.includes('makanan') || promptLower.includes('restoran')) {
    category = 'culinary'
    emoji = '🍳'
  } else if (promptLower.includes('penulis') || promptLower.includes('writer') || promptLower.includes('blogger') || promptLower.includes('journalist') || promptLower.includes('wartawan') || promptLower.includes('cerita') || promptLower.includes('novel')) {
    category = 'writer'
    emoji = '✍️'
  }

  // Set preview name based on category
  let dynamicName = 'Ival Permana'
  let avatarName = 'Ival+Permana'
  let avatarBg = '0D8ABC'
  let jobTitle = parsedJob

  if (category === 'developer') {
    dynamicName = locale === 'id' ? 'Devi Ristiana (Dev)' : 'Alex Coder (Dev)'
    avatarName = 'Dev'
    avatarBg = '1E293B'
  } else if (category === 'designer') {
    dynamicName = locale === 'id' ? 'Aris Estetik' : 'Aria Creative'
    avatarName = 'Art'
    avatarBg = 'EC4899'
  } else if (category === 'creator') {
    dynamicName = locale === 'id' ? 'Vlogger Santai' : 'Vlog Star'
    avatarName = 'Vlog'
    avatarBg = 'F59E0B'
  } else if (category === 'gamer') {
    dynamicName = locale === 'id' ? 'Pro Gamer ID' : 'Pixel Warrior'
    avatarName = 'Game'
    avatarBg = '10B981'
  } else if (category === 'medical') {
    dynamicName = locale === 'id' ? 'dr. Andi Sehat' : 'Dr. Hope'
    avatarName = 'Doc'
    avatarBg = 'EF4444'
  } else if (category === 'photo') {
    dynamicName = locale === 'id' ? 'Roni Lensa' : 'Lense Master'
    avatarName = 'Lens'
    avatarBg = '6366F1'
  } else if (category === 'business') {
    dynamicName = locale === 'id' ? 'Budi Marketer' : 'Boss Mind'
    avatarName = 'Biz'
    avatarBg = '3B82F6'
  } else if (category === 'education') {
    dynamicName = locale === 'id' ? 'Bu Guru Pintar' : 'Edu Guide'
    avatarName = 'Edu'
    avatarBg = '8B5CF6'
  } else if (category === 'culinary') {
    dynamicName = locale === 'id' ? 'Chef Makan' : 'Master Chef'
    avatarName = 'Chef'
    avatarBg = '14B8A6'
  } else if (category === 'writer') {
    dynamicName = locale === 'id' ? 'Pena Pujangga' : 'Ink Flow'
    avatarName = 'Ink'
    avatarBg = '6B7280'
  }

  previewName.value = dynamicName
  previewProfession.value = jobTitle
  previewAvatar.value = `https://ui-avatars.com/api/?name=${avatarName}&background=${avatarBg}&color=fff&size=128`

  let responseText = ''
  
  if (locale === 'id') {
    switch(category) {
      case 'developer':
        responseText = `${emoji} ${parsedJob} | Suka memecahkan masalah & membangun aplikasi keren | Berinovasi dengan teknologi 🚀`
        break
      case 'designer':
        responseText = `${emoji} ${parsedJob} | Suka mengeksplorasi ide kreatif & menyajikan visual estetik yang fungsional ✨`
        break
      case 'creator':
        responseText = `${emoji} ${parsedJob} | Kreator konten kreatif | Berbagi tips seru tiap minggu | Yuk kolaborasi! 🤝`
        break
      case 'gamer':
        responseText = `${emoji} ${parsedJob} | Menikmati tantangan kompetitif & menjelajahi dunia virtual baru 🎮`
        break
      case 'medical':
        responseText = `${emoji} ${parsedJob} | Berdedikasi penuh untuk kesehatan pasien & melayani sesama ✨`
        break
      case 'photo':
        responseText = `${emoji} ${parsedJob} | Mengabadikan setiap momen penting menjadi kenangan abadi 🌟`
        break
      case 'business':
        responseText = `${emoji} ${parsedJob} | Fokus pada inovasi, pertumbuhan bisnis, dan hasil optimal 🚀`
        break
      case 'education':
        responseText = `${emoji} ${parsedJob} | Berbagi ilmu dan membentuk masa depan generasi penerus 📚`
        break
      case 'culinary':
        responseText = `${emoji} ${parsedJob} | Meracik cita rasa terbaik dan menghadirkan kebahagiaan kuliner ✨`
        break
      case 'writer':
        responseText = `${emoji} ${parsedJob} | Menulis cerita bermakna dan membagikan gagasan inspiratif 📝`
        break
      default:
        responseText = `${emoji} ${parsedJob} | Selalu berdedikasi tinggi dan bersemangat untuk terus berkembang! 🚀`
    }
  } else {
    switch(category) {
      case 'developer':
        responseText = `${emoji} ${parsedJob} | Passionate about building apps, writing clean code, and leveraging tech 🚀`
        break
      case 'designer':
        responseText = `${emoji} ${parsedJob} | Exploring creative concepts and crafting elegant, user-focused designs ✨`
        break
      case 'creator':
        responseText = `${emoji} ${parsedJob} | Content Creator sharing chill coding tips weekly | Let's build together! 🤝`
        break
      case 'gamer':
        responseText = `${emoji} ${parsedJob} | Thriving in competitive challenges and exploring virtual worlds 🎮`
        break
      case 'medical':
        responseText = `${emoji} ${parsedJob} | Dedicated to patient care, medical excellence, and health advocacy ✨`
        break
      case 'photo':
        responseText = `${emoji} ${parsedJob} | Capturing precious moments and turning them into timeless stories 🌟`
        break
      case 'business':
        responseText = `${emoji} ${parsedJob} | Driven by strategy, innovation, and scaling successful operations 🚀`
        break
      case 'education':
        responseText = `${emoji} ${parsedJob} | Empowering minds and sharing knowledge to shape a better future 📚`
        break
      case 'culinary':
        responseText = `${emoji} ${parsedJob} | Combining fine ingredients to deliver memorable dining experiences ✨`
        break
      case 'writer':
        responseText = `${emoji} ${parsedJob} | Crafting narratives, sharing perspectives, and engaging readers 📝`
        break
      default:
        responseText = `${emoji} ${parsedJob} | Passionate professional focused on delivering excellence and constant growth! 🚀`
    }
  }
  
  let charIndex = 0
  const typingInterval = setInterval(() => {
    if (charIndex < responseText.length) {
      mockBio.value += responseText.charAt(charIndex)
      charIndex++
    } else {
      clearInterval(typingInterval)
      isGenerating.value = false
    }
  }, 30)
}

onMounted(async () => {
  if (authStore.isAuthenticated && !authStore.user) {
    try {
      await authStore.fetchUser()
    } catch (err) {
      console.error('Failed to fetch user:', err)
    }
  }
})
</script>

<style scoped>
.particle {
  position: absolute;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(6, 182, 212, 0.08) 0%, rgba(59, 130, 246, 0) 70%);
  filter: blur(5px);
  pointer-events: none;
  animation: float 25s infinite linear;
  opacity: 0.4;
}

/* Minimalist slow particle movements */
.particle-1 { width: 180px; height: 180px; top: 10%; left: 8%; animation-duration: 28s; }
.particle-2 { width: 140px; height: 140px; top: 55%; left: 82%; animation-duration: 22s; animation-delay: -4s; background: radial-gradient(circle, rgba(168, 85, 247, 0.06) 0%, rgba(168, 85, 247, 0) 70%); }
.particle-3 { width: 220px; height: 220px; top: 80%; left: 15%; animation-duration: 35s; animation-delay: -8s; }
.particle-4 { width: 160px; height: 160px; top: 22%; left: 72%; animation-duration: 26s; animation-delay: -12s; }
.particle-5 { width: 150px; height: 150px; top: 45%; left: 12%; animation-duration: 30s; animation-delay: -2s; background: radial-gradient(circle, rgba(168, 85, 247, 0.07) 0%, rgba(168, 85, 247, 0) 70%); }
.particle-6 { width: 130px; height: 130px; top: 88%; left: 60%; animation-duration: 24s; animation-delay: -15s; }

/* Entry animations styling */
.animate-fade-in-down {
  opacity: 0;
  animation: fadeInDown 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}

.animate-fade-in-up {
  opacity: 0;
  animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-16px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(24px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes float {
  0% {
    transform: translateY(0) translateX(0) rotate(0deg);
  }
  33% {
    transform: translateY(-20px) translateX(15px) rotate(120deg);
  }
  66% {
    transform: translateY(10px) translateX(-10px) rotate(240deg);
  }
  100% {
    transform: translateY(0) translateX(0) rotate(360deg);
  }
}

.animate-bounce-fade {
  animation: bounceFade 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}

@keyframes bounceFade {
  0% {
    opacity: 0;
    transform: translateY(0) scale(0.6);
  }
  20% {
    opacity: 1;
    transform: translateY(-8px) scale(1.1);
  }
  100% {
    opacity: 0;
    transform: translateY(-24px) scale(0.9);
  }
}
</style>
