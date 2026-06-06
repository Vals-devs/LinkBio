import { defineStore } from 'pinia'
import api from '../services/api.js'

export const useThemeStore = defineStore('theme', {
  state: () => ({
    currentTheme: null,
  }),
  actions: {
    async fetchTheme() {
      try {
        const response = await api.get('/theme')
        this.currentTheme = response.data
      } catch (error) {
        console.error('Failed to fetch theme:', error)
      }
    },
    async applyTheme(themeData) {
      try {
        const response = await api.put('/theme', themeData)
        this.currentTheme = response.data
        alert('Theme applied successfully!')
      } catch (error) {
        console.error('Failed to apply theme:', error)
        alert('Failed to apply theme.')
      }
    },
    // Placeholder for setting specific styles directly if needed
    setThemeLocally(themeData) {
      this.currentTheme = { ...this.currentTheme, ...themeData }
    }
  },
  getters: {
    // Getter to provide a default theme if none is set
    effectiveTheme: (state) => {
      return state.currentTheme || {
        primary_color: '#3b82f6',
        background_color: '#f8fafc',
        font_family: 'Inter, sans-serif',
        layout_style: 'minimal',
      }
    }
  }
})
