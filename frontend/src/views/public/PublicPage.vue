<template>
  <div :style="pageBackgroundStyle" class="min-h-screen flex sm:items-center justify-center p-0 sm:p-4 md:p-8 antialiased transition-all duration-300">
    <!-- Decorative ambient background blobs (only for gradient layout) -->
    <div v-if="effectiveTheme.layout_style === 'gradient'" class="fixed inset-0 overflow-hidden pointer-events-none">
      <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-200/40 rounded-full blur-3xl"></div>
      <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-200/40 rounded-full blur-3xl"></div>
      <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-80 h-80 bg-pink-200/30 rounded-full blur-3xl"></div>
    </div>

    <!-- Phone Mockup Container -->
    <div class="relative w-full max-w-md sm:my-8">
      <!-- Phone Frame with Layout Styles -->
      <div 
        class="relative overflow-hidden transition-all duration-300 min-h-screen sm:min-h-0 w-full"
        :class="{
          'bg-transparent shadow-none border-none': effectiveTheme.layout_style === 'minimal',
          'bg-slate-900/90 sm:border border-slate-800/80 shadow-none sm:shadow-2xl shadow-black/40 rounded-none sm:rounded-[40px]': effectiveTheme.layout_style === 'card' && isDarkBg,
          'bg-white sm:border border-slate-100 shadow-none sm:shadow-2xl shadow-slate-900/5 rounded-none sm:rounded-[40px]': effectiveTheme.layout_style === 'card' && !isDarkBg,
          'bg-white/10 backdrop-blur-xl sm:border border-white/20 shadow-none sm:shadow-2xl rounded-none sm:rounded-[40px]': effectiveTheme.layout_style === 'gradient' || effectiveTheme.layout_style === 'glassmorphism',
          'bg-[#FFFDF4] border-0 sm:border-4 border-black shadow-none sm:shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] rounded-none': effectiveTheme.layout_style === 'neo-brutalism'
        }"
      >

        <!-- Dynamic Island / Notch Area (hidden for minimal / neo-brutalism and on mobile viewports for native look) -->
        <div v-if="effectiveTheme.layout_style !== 'minimal' && effectiveTheme.layout_style !== 'neo-brutalism'" class="hidden sm:flex h-7 bg-transparent items-end justify-center pb-1">
          <div class="w-24 h-5 bg-black/90 rounded-full flex items-center justify-center gap-2">
            <div class="w-1.5 h-1.5 rounded-full bg-slate-700"></div>
            <div class="w-10 h-1 rounded-full bg-slate-800"></div>
          </div>
        </div>

        <!-- Main Content -->
        <div 
          class="px-6 pb-10"
          :class="{
            'pt-8 sm:pt-8': effectiveTheme.layout_style === 'minimal' || effectiveTheme.layout_style === 'neo-brutalism',
            'pt-8 sm:pt-3': effectiveTheme.layout_style !== 'minimal' && effectiveTheme.layout_style !== 'neo-brutalism'
          }"
        >

          <!-- Profile Header -->
          <div class="flex flex-col items-center text-center mb-8">
            <!-- Avatar with gradient ring -->
            <div class="relative mb-4">
              <div 
                :style="effectiveTheme.layout_style === 'neo-brutalism' ? {} : { background: `linear-gradient(135deg, ${effectiveTheme.primary_color}, ${adjustColorBrightness(effectiveTheme.primary_color, 40)})` }" 
                class="w-24 h-24 p-1 transition-all duration-300"
                :class="{
                  'rounded-full': effectiveTheme.layout_style !== 'neo-brutalism',
                  'border-4 border-black rounded-none bg-white': effectiveTheme.layout_style === 'neo-brutalism'
                }"
              >
                <img
                  :src="'https://ui-avatars.com/api/?name=' + encodeURIComponent(user?.name || 'User') + '&background=0D8ABC&color=fff&size=256'"
                  :alt="user?.name"
                  class="w-full h-full object-cover"
                  :class="{
                    'rounded-full border-2 border-white': effectiveTheme.layout_style !== 'neo-brutalism'
                  }"
                >
              </div>
              <!-- Verified badge -->
              <div 
                :style="{ backgroundColor: effectiveTheme.primary_color }" 
                class="absolute bottom-0 right-0 w-7 h-7 flex items-center justify-center shadow-sm"
                :class="{
                  'rounded-full border-[2.5px] border-white': effectiveTheme.layout_style !== 'neo-brutalism',
                  'border-2 border-black rounded-none': effectiveTheme.layout_style === 'neo-brutalism'
                }"
              >
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
              </div>
            </div>

            <!-- Name & Profession -->
            <h1 
              class="text-[22px] font-bold mb-1 tracking-tight"
              :class="{
                'text-white': (effectiveTheme.layout_style !== 'neo-brutalism' && isDarkBg) || effectiveTheme.layout_style === 'gradient' || effectiveTheme.layout_style === 'glassmorphism',
                'text-slate-800': effectiveTheme.layout_style !== 'neo-brutalism' && !isDarkBg,
                'text-black font-black font-display uppercase': effectiveTheme.layout_style === 'neo-brutalism'
              }"
            >
              {{ user?.name }}
            </h1>
            <p 
              class="text-[13px] font-semibold mb-3 uppercase tracking-wide"
              :class="{
                'text-slate-400': (effectiveTheme.layout_style !== 'neo-brutalism' && isDarkBg) || effectiveTheme.layout_style === 'gradient' || effectiveTheme.layout_style === 'glassmorphism',
                'text-slate-500': effectiveTheme.layout_style !== 'neo-brutalism' && !isDarkBg,
                'text-black border-2 border-black bg-white px-2 py-0.5 font-bold rounded-none': effectiveTheme.layout_style === 'neo-brutalism'
              }"
            >
              {{ user?.profession }}
            </p>

            <!-- Bio -->
            <p 
              class="text-sm leading-relaxed max-w-[280px]"
              :class="{
                'text-slate-300': (effectiveTheme.layout_style !== 'neo-brutalism' && isDarkBg) || effectiveTheme.layout_style === 'gradient' || effectiveTheme.layout_style === 'glassmorphism',
                'text-slate-600': effectiveTheme.layout_style !== 'neo-brutalism' && !isDarkBg,
                'text-black font-medium border border-black bg-[#FFFDF4] p-3 shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] rounded-none': effectiveTheme.layout_style === 'neo-brutalism'
              }"
            >
              {{ user?.bio || fallbackBio }}
            </p>

            <!-- Social Links -->
            <div v-if="user?.github_url || user?.linkedin_url || user?.twitter_url || user?.instagram_url" class="flex items-center gap-3 mt-5">
              <a 
                v-if="user?.github_url" 
                :href="user.github_url" 
                target="_blank" 
                class="w-11 h-11 flex items-center justify-center transition-all duration-200"
                :class="{
                  'bg-white/5 border border-white/10 text-white hover:bg-white/10 hover:scale-110': (effectiveTheme.layout_style !== 'neo-brutalism' && isDarkBg) || effectiveTheme.layout_style === 'gradient' || effectiveTheme.layout_style === 'glassmorphism',
                  'bg-white/70 border border-slate-200/70 text-slate-700 hover:bg-white hover:text-slate-900 hover:scale-110 hover:shadow-md': effectiveTheme.layout_style !== 'neo-brutalism' && !isDarkBg,
                  'bg-white border-2 border-black text-black shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] rounded-none hover:translate-x-[-2px] hover:translate-y-[-2px] hover:shadow-[5px_5px_0px_0px_rgba(0,0,0,1)]': effectiveTheme.layout_style === 'neo-brutalism'
                }"
              >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                </svg>
              </a>
              <a 
                v-if="user?.linkedin_url" 
                :href="user.linkedin_url" 
                target="_blank" 
                class="w-11 h-11 flex items-center justify-center transition-all duration-200"
                :class="{
                  'bg-white/5 border border-white/10 text-white hover:bg-white/10 hover:scale-110': (effectiveTheme.layout_style !== 'neo-brutalism' && isDarkBg) || effectiveTheme.layout_style === 'gradient' || effectiveTheme.layout_style === 'glassmorphism',
                  'bg-white/70 border border-slate-200/70 text-slate-700 hover:bg-white hover:text-blue-700 hover:scale-110 hover:shadow-md': effectiveTheme.layout_style !== 'neo-brutalism' && !isDarkBg,
                  'bg-white border-2 border-black text-black shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] rounded-none hover:translate-x-[-2px] hover:translate-y-[-2px] hover:shadow-[5px_5px_0px_0px_rgba(0,0,0,1)]': effectiveTheme.layout_style === 'neo-brutalism'
                }"
              >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                </svg>
              </a>
              <a 
                v-if="user?.twitter_url" 
                :href="user.twitter_url" 
                target="_blank" 
                class="w-11 h-11 flex items-center justify-center transition-all duration-200"
                :class="{
                  'bg-white/5 border border-white/10 text-white hover:bg-white/10 hover:scale-110': (effectiveTheme.layout_style !== 'neo-brutalism' && isDarkBg) || effectiveTheme.layout_style === 'gradient' || effectiveTheme.layout_style === 'glassmorphism',
                  'bg-white/70 border border-slate-200/70 text-slate-700 hover:bg-white hover:text-sky-500 hover:scale-110 hover:shadow-md': effectiveTheme.layout_style !== 'neo-brutalism' && !isDarkBg,
                  'bg-white border-2 border-black text-black shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] rounded-none hover:translate-x-[-2px] hover:translate-y-[-2px] hover:shadow-[5px_5px_0px_0px_rgba(0,0,0,1)]': effectiveTheme.layout_style === 'neo-brutalism'
                }"
              >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                </svg>
              </a>
              <a 
                v-if="user?.instagram_url" 
                :href="user.instagram_url" 
                target="_blank" 
                class="w-11 h-11 flex items-center justify-center transition-all duration-200"
                :class="{
                  'bg-white/5 border border-white/10 text-white hover:bg-white/10 hover:scale-110': (effectiveTheme.layout_style !== 'neo-brutalism' && isDarkBg) || effectiveTheme.layout_style === 'gradient' || effectiveTheme.layout_style === 'glassmorphism',
                  'bg-white/70 border border-slate-200/70 text-slate-700 hover:bg-white hover:text-pink-600 hover:scale-110 hover:shadow-md': effectiveTheme.layout_style !== 'neo-brutalism' && !isDarkBg,
                  'bg-white border-2 border-black text-black shadow-[3px_3px_0px_0px_rgba(0,0,0,1)] rounded-none hover:translate-x-[-2px] hover:translate-y-[-2px] hover:shadow-[5px_5px_0px_0px_rgba(0,0,0,1)]': effectiveTheme.layout_style === 'neo-brutalism'
                }"
              >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                </svg>
              </a>
            </div>
          </div>

          <!-- Link Buttons -->
          <div class="space-y-3">
            <a 
              v-for="(link, index) in links"
              :key="index"
              :href="link.url"
              @click="handleLinkClick(link.id)"
              target="_blank"
              :style="effectiveTheme.layout_style === 'neo-brutalism' ? {} : { borderColor: effectiveTheme.primary_color + '40' }"
              class="group flex items-center gap-4 w-full p-4 transition-all duration-200"
              :class="{
                'bg-white/5 border border-white/10 hover:bg-white/10 hover:scale-[1.02] active:scale-[0.98] rounded-2xl shadow-sm': effectiveTheme.layout_style === 'minimal' && isDarkBg,
                'bg-white/70 hover:bg-white border border-slate-200/80 hover:border-slate-300 hover:scale-[1.02] active:scale-[0.98] rounded-2xl shadow-sm': effectiveTheme.layout_style === 'minimal' && !isDarkBg,
                'bg-slate-800/60 border border-slate-700/50 hover:bg-slate-800 hover:scale-[1.02] active:scale-[0.98] rounded-2xl shadow-md shadow-black/10': effectiveTheme.layout_style === 'card' && isDarkBg,
                'bg-white hover:bg-slate-50 border border-slate-100 hover:border-slate-200 hover:scale-[1.02] active:scale-[0.98] rounded-2xl shadow-md shadow-slate-900/5': effectiveTheme.layout_style === 'card' && !isDarkBg,
                'bg-white/10 backdrop-blur-sm border border-white/15 hover:bg-white/20 hover:border-white/30 hover:scale-[1.02] active:scale-[0.98] rounded-2xl shadow-lg': effectiveTheme.layout_style === 'gradient' || effectiveTheme.layout_style === 'glassmorphism',
                'bg-white border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] rounded-none hover:translate-x-[-2px] hover:translate-y-[-2px] hover:shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] active:translate-x-[2px] active:translate-y-[2px] active:shadow-[2px_2px_0px_0px_rgba(0,0,0,1)]': effectiveTheme.layout_style === 'neo-brutalism'
              }"
            >
              <!-- Left Functional Icon -->
              <div 
                class="w-11 h-11 flex items-center justify-center flex-shrink-0 transition-all duration-200"
                :class="{
                  'rounded-xl': effectiveTheme.layout_style !== 'neo-brutalism',
                  'border-2 border-black rounded-none bg-white': effectiveTheme.layout_style === 'neo-brutalism'
                }"
                :style="effectiveTheme.layout_style === 'neo-brutalism' ? {} : { backgroundColor: effectiveTheme.primary_color + '15' }"
              >
                <svg 
                  :style="effectiveTheme.layout_style === 'neo-brutalism' ? {} : { color: effectiveTheme.primary_color }" 
                  class="w-5 h-5" 
                  fill="none" 
                  viewBox="0 0 24 24" 
                  stroke="currentColor" 
                  stroke-width="1.5"
                  :class="{ 'text-black': effectiveTheme.layout_style === 'neo-brutalism' }"
                >
                  <path v-if="link.icon === 'clock'" stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  <path v-else-if="link.icon === 'pencil'" stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                  <path v-else-if="link.icon === 'document'" stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                  <path v-else-if="link.icon === 'mail'" stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.772a2.25 2.25 0 01-1.07-1.916V6.75" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                </svg>
              </div>

              <!-- Label -->
              <span 
                class="flex-1 text-left text-sm"
                :class="{
                  'font-extrabold text-black': effectiveTheme.layout_style === 'neo-brutalism',
                  'font-bold': effectiveTheme.layout_style !== 'neo-brutalism',
                  'text-slate-200 group-hover:text-white': (effectiveTheme.layout_style !== 'neo-brutalism' && isDarkBg) || effectiveTheme.layout_style === 'gradient' || effectiveTheme.layout_style === 'glassmorphism',
                  'text-slate-700 group-hover:text-slate-900': effectiveTheme.layout_style !== 'neo-brutalism' && !isDarkBg
                }"
              >
                {{ link.title }}
              </span>

              <!-- Right Indicator Icon (Chevron) -->
              <svg 
                :style="effectiveTheme.layout_style === 'neo-brutalism' ? {} : { color: effectiveTheme.primary_color }" 
                class="w-5 h-5 group-hover:translate-x-1 transition-all duration-200 flex-shrink-0" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke="currentColor" 
                stroke-width="2.5"
                :class="{ 'text-black': effectiveTheme.layout_style === 'neo-brutalism' }"
              >
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
              </svg>
            </a>
          </div>

          <!-- Footer -->
          <div class="mt-8 text-center">
            <p 
              class="text-[11px] font-semibold tracking-wide uppercase"
              :class="{
                'text-slate-400': isDarkBg || effectiveTheme.layout_style === 'gradient' || effectiveTheme.layout_style === 'glassmorphism',
                'text-slate-500': !isDarkBg && effectiveTheme.layout_style !== 'neo-brutalism',
                'text-black border-2 border-black bg-white px-3 py-1 inline-block shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] rounded-none font-bold': effectiveTheme.layout_style === 'neo-brutalism'
              }"
            >
              {{ poweredByText }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'
import { useRoute } from 'vue-router'
import api from '../../services/api.js'

const route = useRoute()
const username = route.params.username

const user = ref(null)
const links = ref([])
const theme = ref(null)
const loading = ref(true)
const error = ref(false)

// Auto-detect browser default language for public page falls
const detectLanguage = () => {
  const browserLang = navigator.language || navigator.userLanguage || 'en'
  return browserLang.toLowerCase().startsWith('id') ? 'id' : 'en'
}

const isIndonesian = computed(() => detectLanguage() === 'id')

const fallbackBio = computed(() => {
  return isIndonesian.value
    ? 'Selamat datang di halaman link-in-bio saya!'
    : 'Welcome to my link-in-bio page!'
})

const poweredByText = computed(() => {
  return isIndonesian.value
    ? "Didukung oleh AI Link-in-Bio Ival"
    : "Powered by Ival's AI Link-in-Bio"
})

const effectiveTheme = computed(() => {
  return theme.value || {
    primary_color: '#3b82f6',
    background_color: '#f8fafc',
    font_family: 'Inter, sans-serif',
    layout_style: 'minimal'
  }
})

const isDarkBg = computed(() => {
  const hex = effectiveTheme.value.background_color || '#f8fafc'
  const cleanHex = hex.replace('#', '')
  if (cleanHex.length !== 6) return false
  const r = parseInt(cleanHex.substring(0, 2), 16)
  const g = parseInt(cleanHex.substring(2, 4), 16)
  const b = parseInt(cleanHex.substring(4, 6), 16)
  const yiq = (r * 299 + g * 587 + b * 114) / 1000
  return yiq < 128
})

const pageBackgroundStyle = computed(() => {
  const themeVal = effectiveTheme.value
  if (themeVal.layout_style === 'gradient') {
    return {
      background: `linear-gradient(135deg, ${themeVal.background_color}, ${adjustColorBrightness(themeVal.background_color, -30)})`,
      fontFamily: themeVal.font_family
    }
  }
  return {
    backgroundColor: themeVal.background_color,
    fontFamily: themeVal.font_family
  }
})

const fetchPublicPage = async () => {
  try {
    loading.value = true
    error.value = false
    const response = await api.get(`/public/${username}`)
    user.value = response.data.user
    links.value = response.data.links
    theme.value = response.data.theme

    // Track page visit
    api.post(`/public/${username}/visit`, { referrer: document.referrer })
  } catch (err) {
    error.value = true
    console.error('Failed to load public page:', err)
  } finally {
    loading.value = false
  }
}

onMounted(fetchPublicPage)

const handleLinkClick = (linkId) => {
  api.post(`/public/click/${linkId}`).catch(err => console.error('Failed to track link click:', err))
}

// Helper function to adjust color brightness for gradient
const adjustColorBrightness = (hex, percent) => {
  const num = parseInt(hex.replace('#', ''), 16)
  const r = Math.min(255, Math.max(0, (num >> 16) + percent))
  const g = Math.min(255, Math.max(0, ((num >> 8) & 0x00FF) + percent))
  const b = Math.min(255, Math.max(0, (num & 0x0000FF) + percent))
  return '#' + ((r << 16) | (g << 8) | b).toString(16).padStart(6, '0')
}
</script>
