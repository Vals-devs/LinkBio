import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useLangStore = defineStore('lang', () => {
  // Detect default browser language: if starts with 'id', default to 'id', else 'en'
  const detectLanguage = () => {
    const saved = localStorage.getItem('lang')
    if (saved) return saved
    const browserLang = navigator.language || navigator.userLanguage || 'en'
    return browserLang.toLowerCase().startsWith('id') ? 'id' : 'en'
  }

  const locale = ref(detectLanguage())

  const setLanguage = (lang) => {
    locale.value = lang
    localStorage.setItem('lang', lang)
  }

  // Translation dictionary
  const translations = {
    en: {
      // Navbar / General
      dashboard: 'Dashboard',
      profile: 'My Profile',
      links: 'Manage Links',
      analytics: 'Analytics',
      aiTools: 'AI Tools',
      themeEditor: 'Theme Editor',
      logout: 'Logout',
      welcome: 'Welcome',
      publicPage: 'My Public Page',
      settings: 'Settings',

      // Landing Page
      landingHeroTitle: 'Elevate Your Bio Link with',
      landingHeroTitleHighlight: 'AI Intelligence',
      landingHeroSub: 'Create a stunning, interactive landing page for your links, customize your profile bio with advanced AI copy generation, and access detailed unique device visitor insights.',
      landingGetStarted: 'Create Your LinkBio',
      landingGoDashboard: 'Go to Dashboard',
      landingLoginDashboard: 'Login to Dashboard',
      landingLogin: 'Login',
      landingReg: 'Get Started',
      landingFeaturesTitle: 'Packed with Premium Features',
      feat1Title: 'Dynamic Link Aggregator',
      feat1Desc: 'Add, edit, delete, and sort links instantly. Includes real-time click tracking to analyze which references perform best.',
      feat2Title: 'Advanced Device Analytics',
      feat2Desc: 'Differentiate between total visits and unique visitors (per device) using IP-based tracking. Monitor mobile vs desktop ratios.',
      feat3Title: 'AI Co-Writer',
      feat3Desc: 'Generate engaging profile bios in different tones based on your skills, and get natural language visitor pattern reviews.',

      // Landing Page Additions
      tryDemoTitle: 'Try AI Generator Demo',
      tryDemoSub: 'Type what you do below to see how our AI crafts a beautiful bio instantly!',
      demoPlaceholder: 'e.g., UI/UX Designer who loves dark mode and minimal layouts',
      generateDemoBtn: 'Generate Bio',
      generatingDemo: 'AI is writing...',
      activeThemeLabel: 'Choose Theme Style:',
      faqTitle: 'Frequently Asked Questions',
      faq1Q: 'What is LinkBio AI?',
      faq1A: 'LinkBio AI is a modern link-in-bio aggregator that uses advanced AI to help you write stunning profile descriptions and analyzes device metrics with simple, elegant visitor insight summaries.',
      faq2Q: 'Is it free to use?',
      faq2A: 'Yes! LinkBio AI is completely free to create your page, list your social links, generate AI bios, and track your analytics.',
      faq3Q: 'How does the AI Bio Generator work?',
      faq3A: 'You just enter your key skills or a brief prompt, choose a desired tone (like Professional, Casual, or Cyberpunk), and the AI compiles custom bio options for you to apply instantly.',
      faq4Q: 'Can I track who visits my page?',
      faq4A: 'Absolutely! Our dashboard differentiates between total page views and unique device visitors using secure IP hashing, giving you accurate traffic charts.',

      // Login / Register
      loginTitle: 'Login to Your Account',
      loginSub: 'Welcome back! Enter your credentials to access your dashboard.',
      email: 'Email Address',
      password: 'Password',
      dontHaveAccount: 'Don\'t have an account?',
      registerNow: 'Register now',
      registerTitle: 'Create Your Account',
      registerSub: 'Start consolidating your links and customizing with AI today.',
      fullName: 'Full Name',
      username: 'Username',
      alreadyHaveAccount: 'Already have an account?',
      loginNow: 'Login now',
      signIn: 'Sign In',
      signingIn: 'Signing in...',
      createAccount: 'Create Account',
      creatingAccount: 'Creating Account...',
      namePlaceholder: 'Enter your full name',
      usernamePlaceholder: 'Enter your username',
      emailPlaceholder: 'Enter your email address',
      mobileTraffic: 'Mobile Traffic',
      linkColumn: 'Link',
      clicksColumn: 'Clicks',
      keySkills: 'Key Skills',
      addSkillPlaceholder: 'Add a skill and press Enter',
      tone: 'Tone',

      // Dashboard Home
      greetMorning: 'Good Morning',
      greetAfternoon: 'Good Afternoon',
      greetEvening: 'Good Evening',
      dashHomeSub: 'Your Link-in-Bio platform is live and collecting traffic. Create beautiful bio variations, manage your links, and track real-time analytics with ease.',
      viewPublicPage: 'View Public Page',
      copyLink: 'Copy Link',
      copied: 'Copied!',
      totalViews: 'Total Views',
      uniqueVisitors: 'Unique Visitors',
      linkClicks: 'Link Clicks',
      clickThroughRate: 'Avg Click-Through Rate',
      quickActions: 'Quick Actions',
      addLinksTitle: 'Add New Links',
      addLinksDesc: 'Insert portfolio, social profile, or product links.',
      editProfileDesc: 'Modify name, bio, and social profile handles.',
      aiGenDesc: 'Use AI to generate compelling bio copies.',
      fullReportsDesc: 'Check devices ratio, top links, and AI traffic insights.',
      linksOverview: 'My Links Overview',
      profileCard: 'Profile Card',
      professionNotSet: 'Profession Not Set',
      bioNotSet: 'No bio entered yet. Edit your profile to fill this out!',
      editProfileSettings: 'Edit Profile Settings',

      // Profile View
      saveChanges: 'Save Changes',
      socialProfiles: 'Social Profiles',
      githubUrl: 'GitHub URL',
      linkedinUrl: 'LinkedIn URL',
      twitterUrl: 'Twitter / X URL',
      instagramUrl: 'Instagram URL',
      profession: 'Profession',
      bio: 'Bio',
      profileSaved: 'Profile saved successfully!',

      // Links View
      manageLinks: 'Manage Links',
      addLink: 'Add Link',
      addNewLink: 'Add New Link',
      title: 'Title',
      url: 'URL',
      cancel: 'Cancel',
      deleteConfirm: 'Are you sure you want to delete this link?',

      // Analytics View
      aiVisitorIntelligence: 'AI Visitor Intelligence',
      aiActive: 'AI Active',
      aiInsightSub: 'Automated insights based on your recent visitor trends',
      regenerate: 'Regenerate Insight',
      analyzing: 'Analyzing...',
      noInsightsYet: 'No insights generated yet. Click Regenerate to compile insights.',
      topPerforming: 'Top Performing Links',
      trend: 'Trend',

      // AI Tools View
      aiBioGenerator: 'AI Bio Generator',
      tones: 'Tones',
      generateBio: 'Generate Bio',
      generating: 'Generating...',
      aiSuggestions: 'AI-Generated Suggestions',
      useThisBio: 'Use this Bio',
      bioApplied: 'Bio applied and saved successfully!',
      customizeTheme: 'Customize Theme Style',
      layoutStyle: 'Layout Style',
      primaryColor: 'Primary Accent Color',
      backgroundColor: 'Background Color',
      fontFamily: 'Font Family',
      fontFamilyPlaceholder: 'e.g., "Outfit", sans-serif',
      saveTheme: 'Save Custom Theme',
      themePreview: 'Interactive Theme Preview',
      previewText: 'Click here to visit my page',
      themeSaved: 'Theme style saved successfully!',
      enterProfession: 'Please enter your profession first!',
      needBioUsername: 'Please set your username and bio first!',
      suggestLayout: 'Generate Layout Idea',
      layoutSuggestion: 'AI Layout Suggestion',
      layout: 'Layout',
      applySuggestion: 'Apply AI Design Style',
      seoAnalyzer: 'AI SEO & Copy Analyzer',
      seoScore: 'SEO Quality Score',
      suggestions: 'Recommended Suggestions',
      reanalyze: 'Re-analyze Profile',
    },
    id: {
      // Navbar / General
      dashboard: 'Dashboard',
      profile: 'Profilku',
      links: 'Kelola Link',
      analytics: 'Analitik',
      aiTools: 'Fitur AI',
      themeEditor: 'Desain Tema',
      logout: 'Keluar',
      welcome: 'Halo',
      publicPage: 'Halaman Publikku',
      settings: 'Pengaturan',

      // Landing Page
      landingHeroTitle: 'Bikin Link Bio Kamu Makin Kece Pakai',
      landingHeroTitleHighlight: 'Kecerdasan AI',
      landingHeroSub: 'Buat landing page link kamu yang estetik dan interaktif, racik bio profil keren pakai generator AI canggih, plus pantau statistik pengunjung unik tiap perangkat.',
      landingGetStarted: 'Bikin LinkBio Sekarang',
      landingGoDashboard: 'Masuk Dashboard',
      landingLoginDashboard: 'Login Dashboard',
      landingLogin: 'Masuk',
      landingReg: 'Mulai Bikin',
      landingFeaturesTitle: 'Dilengkapi Fitur-Fitur Kece',
      feat1Title: 'Agregator Link Dinamis',
      feat1Desc: 'Tambah, edit, hapus, dan urutkan link kamu secara instan. Ada tracking klik real-time biar kamu tau link mana yang paling laku.',
      feat2Title: 'Analisis Perangkat Super Detail',
      feat2Desc: 'Bedain total kunjungan sama pengunjung unik per perangkat lewat IP tracking. Pantau juga rasio HP vs Desktop.',
      feat3Title: 'Partner Nulis AI',
      feat3Desc: 'Bikin bio profil keren dalam berbagai gaya bahasa sesuai keahlian kamu, dan dapetin insight kunjungan dengan bahasa yang santai.',

      // Landing Page Additions
      tryDemoTitle: 'Cobain Demo AI Generator',
      tryDemoSub: 'Tulis keahlian atau pekerjaanmu di bawah buat liat gimana AI nulis bio keren dalam sekejap!',
      demoPlaceholder: 'Contoh: UI/UX Designer yang hobi main game dan bikin desain minimalis',
      generateDemoBtn: 'Bikin Bio',
      generatingDemo: 'AI lagi nulis...',
      activeThemeLabel: 'Pilih Gaya Tema:',
      faqTitle: 'Pertanyaan Populer (FAQ)',
      faq1Q: 'Apa itu LinkBio AI?',
      faq1A: 'LinkBio AI itu platform buat kumpulin semua link sosmed kamu dalam satu halaman kece, yang dilengkapi AI buat bantu kamu nulis bio profil keren dan kasih ringkasan analitik pengunjung yang gampang dipahami.',
      faq2Q: 'Ini beneran gratis?',
      faq2A: 'Beneran 100% gratis! Kamu bisa bikin halaman sendiri, tambah link sepuasnya, generate bio pakai AI, dan pantau statistik tanpa dipungut biaya.',
      faq3Q: 'Gimana cara kerja AI Bio Generator?',
      faq3A: 'Cukup ketik keahlian atau kesibukan kamu, pilih gaya bahasa yang kamu mau (kayak Profesional, Santai, atau Cyberpunk), dan AI bakal bikinin beberapa draf bio keren yang tinggal kamu klik buat pakai.',
      faq4Q: 'Bisa tau siapa aja yang ngunjungin link saya?',
      faq4A: 'Bisa banget! Dashboard analitik kita bisa bedain mana kunjungan biasa dan mana pengunjung unik (berdasarkan perangkat unik mereka) biar data kunjungan kamu super akurat.',

      // Login / Register
      loginTitle: 'Masuk ke Akunmu',
      loginSub: 'Halo lagi! Masuk pakai email & password kamu buat akses dashboard.',
      email: 'Email',
      password: 'Password',
      dontHaveAccount: 'Belum punya akun?',
      registerNow: 'Daftar sekarang',
      registerTitle: 'Bikin Akun Baru',
      registerSub: 'Yuk kumpulin semua link kamu dan bikin bio makin keren pakai AI sekarang.',
      fullName: 'Nama Lengkap',
      username: 'Username',
      alreadyHaveAccount: 'Udah punya akun?',
      loginNow: 'Masuk sekarang',
      signIn: 'Masuk',
      signingIn: 'Masuk dulu...',
      createAccount: 'Bikin Akun',
      creatingAccount: 'Proses daftar...',
      namePlaceholder: 'Tulis nama lengkap kamu di sini',
      usernamePlaceholder: 'Tulis username pilihanmu',
      emailPlaceholder: 'Tulis alamat email aktifmu',
      mobileTraffic: 'Trafik Seluler',
      linkColumn: 'Tautan',
      clicksColumn: 'Klik',
      keySkills: 'Keahlian Utama',
      addSkillPlaceholder: 'Tambah keahlian dan tekan Enter',
      tone: 'Gaya Bahasa (Tone)',

      // Dashboard Home
      greetMorning: 'Selamat Pagi ☀️',
      greetAfternoon: 'Selamat Siang ☀️',
      greetEvening: 'Selamat Malam 🌙',
      dashHomeSub: 'Link-in-Bio kamu udah aktif nih dan siap narik pengunjung. Yuk kelola link kamu, bikin variasi bio pakai AI, dan pantau statistik pengunjung dengan gampang.',
      viewPublicPage: 'Lihat Halaman Publik',
      copyLink: 'Salin Link',
      copied: 'Berhasil Disalin!',
      totalViews: 'Total Kunjungan',
      uniqueVisitors: 'Pengunjung Unik',
      linkClicks: 'Total Klik Link',
      clickThroughRate: 'Rata-rata CTR (Klik/Views)',
      quickActions: 'Aksi Cepat',
      addLinksTitle: 'Tambah Link Baru',
      addLinksDesc: 'Taruh link portofolio, sosmed, atau tokomu di sini.',
      editProfileDesc: 'Ganti nama, bio, dan link sosmed kamu biar makin update.',
      aiGenDesc: 'Pakai AI buat bikin bio profil yang keren dan menarik.',
      fullReportsDesc: 'Pantau rasio gadget pengunjung, performa link, dan insight lalu lintas AI.',
      linksOverview: 'Daftar Link Kamu',
      profileCard: 'Preview Kartu Profil',
      professionNotSet: 'Profesi Belum Diisi',
      bioNotSet: 'Bio kamu masih kosong nih. Yuk edit profil biar rame!',
      editProfileSettings: 'Edit Pengaturan Profil',

      // Profile View
      saveChanges: 'Simpan Perubahan',
      socialProfiles: 'Profil Media Sosial',
      githubUrl: 'Link GitHub',
      linkedinUrl: 'Link LinkedIn',
      twitterUrl: 'Link Twitter / X',
      instagramUrl: 'Link Instagram',
      profession: 'Profesi / Pekerjaan',
      bio: 'Bio Profil',
      profileSaved: 'Profil kamu berhasil disimpan!',

      // Links View
      manageLinks: 'Kelola Link',
      addLink: 'Tambah Link',
      addNewLink: 'Tambah Link Baru',
      title: 'Judul Link',
      url: 'URL / Link',
      cancel: 'Batal',
      deleteConfirm: 'Kamu yakin mau hapus link yang satu ini?',

      // Analytics View
      aiVisitorIntelligence: 'Insight Pengunjung AI',
      aiActive: 'AI Aktif',
      aiInsightSub: 'Insight otomatis dari AI berdasarkan tren kunjungan kamu',
      regenerate: 'Minta Insight Baru',
      analyzing: 'Lagi Menganalisis...',
      noInsightsYet: 'Belum ada insight AI. Yuk klik tombol di atas buat menganalisis!',
      topPerforming: 'Link Paling Sering Diklik',
      trend: 'Tren',

      // AI Tools View
      aiBioGenerator: 'AI Bio Generator',
      tones: 'Gaya Bahasa (Tone)',
      generateBio: 'Bikin Bio Keren',
      generating: 'Lagi Dibikin...',
      aiSuggestions: 'Rekomendasi Bio dari AI',
      useThisBio: 'Pakai Bio Ini',
      bioApplied: 'Bio profil barumu udah berhasil disimpan!',
      customizeTheme: 'Kustomisasi Gaya Tema',
      layoutStyle: 'Gaya Tata Letak',
      primaryColor: 'Warna Aksen Utama',
      backgroundColor: 'Warna Latar Belakang',
      fontFamily: 'Tipe Huruf (Font)',
      fontFamilyPlaceholder: 'Contoh: "Outfit", sans-serif',
      saveTheme: 'Simpan Desain Tema',
      themePreview: 'Preview Desain Interaktif',
      previewText: 'Klik di sini untuk mengunjungi halamanku',
      themeSaved: 'Gaya tema berhasil disimpan!',
      enterProfession: 'Mohon isi bidang profesi terlebih dahulu!',
      needBioUsername: 'Mohon isi username dan bio profil kamu dulu!',
      suggestLayout: 'Rekomendasikan Gaya Desain',
      layoutSuggestion: 'Rekomendasi Gaya Desain AI',
      layout: 'Gaya Tampilan',
      applySuggestion: 'Terapkan Desain Rekomendasi AI',
      seoAnalyzer: 'Analisis SEO & Kualitas Profil AI',
      seoScore: 'Skor Kualitas SEO',
      suggestions: 'Rekomendasi Perbaikan',
      reanalyze: 'Analisis Ulang Profil',
    }
  }

  // Translation helper getter
  const t = (key) => {
    return translations[locale.value][key] || key
  }

  return {
    locale,
    setLanguage,
    t
  }
})
