<?php
// includes/head.php — Tactile 3D Spatial CV & Portfolio System
$canonical = 'https://about.ilmuna.my.id';
$og_image  = $canonical . '/assets/img/Meta.png';
$css_v     = @filemtime(__DIR__ . '/../assets/css/spatial-3d.css') ?: time();
$js_v      = @filemtime(__DIR__ . '/../assets/js/spatial-engine.js') ?: time();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="<?php echo function_exists('asset_url') ? asset_url('assets/img/favicon.png') : 'assets/img/favicon.png'; ?>" />
  <link rel="shortcut icon" href="favicon.ico" />
  <link rel="apple-touch-icon" href="<?php echo function_exists('asset_url') ? asset_url('assets/img/favicon.png') : 'assets/img/favicon.png'; ?>" />

  <!-- Primary SEO -->
  <title>Syahriel Andika | CV &amp; Portofolio 3D Interaktif</title>
  <meta name="description" content="CV &amp; Portofolio resmi Syahriel Andika — Mahasiswa S1 PAI UNUGIRI Bojonegoro, Educational Technologist, Web &amp; Security Developer, Owner ILMUNA Digital." />
  <meta name="keywords" content="Syahriel Andika, ILMUNA Digital, Portofolio Syahriel Andika, CV Syahriel Andika, Web Developer UNUGIRI, WAF Guardian Dome, Bojonegoro" />
  <meta name="author" content="Syahriel Andika" />
  <meta name="robots" content="index, follow" />

  <!-- Theme / PWA (Navy & White) -->
  <meta name="theme-color" content="#1D3B5E" />
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="default" />
  <meta name="apple-mobile-web-app-title" content="Syahriel Andika" />

  <!-- Open Graph -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo $canonical; ?>" />
  <meta property="og:title" content="Syahriel Andika | CV &amp; Portofolio 3D Interaktif" />
  <meta property="og:description" content="Educational Technologist, Web &amp; Security Developer, Owner ILMUNA Digital — Mahasiswa PAI UNUGIRI Bojonegoro." />
  <meta property="og:image" content="<?php echo $og_image; ?>" />
  <meta property="og:locale" content="id_ID" />
  <meta property="og:site_name" content="Syahriel Andika Portofolio" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:url" content="<?php echo $canonical; ?>" />
  <meta name="twitter:title" content="Syahriel Andika | CV &amp; Portofolio 3D Interaktif" />
  <meta name="twitter:description" content="Educational Technologist, Web &amp; Security Developer, Owner ILMUNA Digital." />
  <meta name="twitter:image" content="<?php echo $og_image; ?>" />

  <!-- Canonical -->
  <link rel="canonical" href="<?php echo $canonical; ?>" />

  <!-- Fonts: Plus Jakarta Sans & JetBrains Mono -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Tailwind CSS via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          navy: '#1D3B5E',
          teal: '#0D7A87',
          sky:  '#52B2DC',
        },
        fontFamily: {
          sans: ['"Plus Jakarta Sans"', 'system-ui', 'sans-serif'],
          mono: ['"JetBrains Mono"', 'monospace'],
        },
      }
    }
  }
  </script>

  <!-- Main Spatial 3D CSS -->
  <link rel="stylesheet" href="assets/css/spatial-3d.css?v=<?php echo $css_v; ?>" />

  <!-- Three.js WebGL 3D + GSAP + ScrollTrigger + Lenis + Motion v12 + Anime.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
  <script src="https://unpkg.com/lenis@1.1.18/dist/lenis.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/motion@12.0.6/dist/motion.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"></script>
  <script src="assets/js/spatial-engine.js?v=<?php echo $js_v; ?>" defer></script>

  <!-- JSON-LD Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Person",
    "name": "Syahriel Andika",
    "jobTitle": "Web Developer, Educational Technologist & Owner ILMUNA Digital",
    "image": "<?php echo $canonical; ?>/assets/img/Photo.jpg",
    "email": "mailto:syahriel.andika28@gmail.com",
    "telephone": "+6285117100227",
    "url": "<?php echo $canonical; ?>",
    "affiliation": [
      {"@type": "Organization", "name": "Universitas Nahdlatul Ulama Sunan Giri Bojonegoro", "url": "https://unugiri.ac.id"},
      {"@type": "Organization", "name": "ILMUNA Digital", "url": "https://ilmuna.my.id"}
    ],
    "sameAs": [
      "https://ilmuna.my.id",
      "https://about.ilmuna.my.id",
      "https://library.unugiri.ac.id",
      "https://learn.ilmuna.my.id",
      "https://usmanroin.com"
    ]
  }
  </script>
</head>
<body class="bg-white text-slate-800 antialiased overflow-x-hidden selection:bg-teal/20 selection:text-navy">

<!-- SEO Semantic Header -->
<header class="sr-only">
  <h1>Syahriel Andika</h1>
  <p>Mahasiswa S1 Pendidikan Agama Islam (PAI) Fakultas Tarbiyah, Universitas Nahdlatul Ulama Sunan Giri (UNUGIRI) Bojonegoro. Educational Technologist, Web &amp; Security Developer, dan Owner ILMUNA Digital. Pengembang sistem WAF Guardian Dome, Perpustakaan Digital UNUGIRI, ILMUNA Learn, Usman Roin Official, dan berbagai solusi teknologi pendidikan.</p>
</header>
