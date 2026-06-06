<template>
  <div
    :class="[
      'bg-white border border-slate-200/80 shadow-sm transition-all duration-200',
      paddingClass,
      roundedClass,
      hoverable ? 'hover:shadow-md hover:border-slate-300 cursor-pointer' : '',
      customClass
    ]"
  >
    <div v-if="$slots.header" class="mb-4">
      <slot name="header" />
    </div>
    <slot />
    <div v-if="$slots.footer" class="mt-4 pt-4 border-t border-slate-100">
      <slot name="footer" />
    </div>
  </div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  padding: { type: String, default: 'lg' },
  rounded: { type: String, default: '2xl' },
  hoverable: { type: Boolean, default: false },
  customClass: { type: String, default: '' }
})

const paddingClass = computed(() => {
  const paddings = {
    none: 'p-0',
    sm: 'p-4',
    md: 'p-5',
    lg: 'p-6',
    xl: 'p-8'
  }
  return paddings[props.padding] || paddings.lg
})

const roundedClass = computed(() => {
  const rounds = {
    none: 'rounded-none',
    sm: 'rounded-lg',
    md: 'rounded-xl',
    lg: 'rounded-2xl',
    xl: 'rounded-3xl'
  }
  return rounds[props.rounded] || rounds['2xl']
})
</script>
