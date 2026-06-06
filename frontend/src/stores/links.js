import { defineStore } from 'pinia'
import { ref } from 'vue'
import api from '../services/api.js'

export const useLinksStore = defineStore('links', () => {
  const links = ref([])
  const loading = ref(false)

  const fetchLinks = async () => {
    loading.value = true
    try {
      const response = await api.get('/links')
      links.value = response.data
      return response.data
    } finally {
      loading.value = false
    }
  }

  const createLink = async (data) => {
    const response = await api.post('/links', data)
    links.value.push(response.data)
    return response.data
  }

  const updateLink = async (id, data) => {
    const response = await api.put(`/links/${id}`, data)
    const index = links.value.findIndex(l => l.id === id)
    if (index !== -1) links.value[index] = response.data
    return response.data
  }

  const deleteLink = async (id) => {
    await api.delete(`/links/${id}`)
    links.value = links.value.filter(l => l.id !== id)
  }

  const reorderLinks = async (orderedIds) => {
    const response = await api.put('/links/reorder', { ids: orderedIds })
    links.value = response.data
    return response.data
  }

  return {
    links,
    loading,
    fetchLinks,
    createLink,
    updateLink,
    deleteLink,
    reorderLinks
  }
})
