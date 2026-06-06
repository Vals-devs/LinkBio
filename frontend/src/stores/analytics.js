import { defineStore } from 'pinia'
import { ref } from 'vue'
import api from '../services/api.js'

export const useAnalyticsStore = defineStore('analytics', () => {
  const summary = ref(null)
  const linkStats = ref([])
  const visitors = ref([])
  const loading = ref(false)

  const fetchSummary = async () => {
    loading.value = true
    try {
      const response = await api.get('/analytics/summary')
      summary.value = response.data
      return response.data
    } finally {
      loading.value = false
    }
  }

  const fetchLinkStats = async () => {
    const response = await api.get('/analytics/links')
    linkStats.value = response.data
    return response.data
  }

  const fetchVisitors = async () => {
    const response = await api.get('/analytics/visitors')
    visitors.value = response.data
    return response.data
  }

  return {
    summary,
    linkStats,
    visitors,
    loading,
    fetchSummary,
    fetchLinkStats,
    fetchVisitors
  }
})
