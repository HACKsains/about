<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/data/portfolio.php';
require_once __DIR__ . '/includes/head.php';

$total_creds      = count($all_certificates);
$total_sk         = count(array_filter($all_certificates, fn($c) => $c['folder'] === 'sk-organisasi'));
$total_certs_only = $total_creds - $total_sk;
$total_webs       = count($systems);
$total_orgs       = count($organizations);
$total_kader      = count($kaderisasi);
?>

<!-- Top Gradient Scroll Progress Bar -->
<div id="scroll-progress" class="scroll-progress-bar"></div>

<!-- Interactive Three.js WebGL 3D Spatial Scene -->
<canvas id="three-spatial-canvas"></canvas>
<div class="studio-grid-plane"></div>

<!-- ═══════════════════════════════════════════════════════════════
     1. FLOATING 3D GLASS NAVBAR
═══════════════════════════════════════════════════════════════ -->
<nav class="navbar-3d">
  <div class="flex items-center justify-between px-4 sm:px-6 py-2.5">

    <!-- Brand Identity -->
    <a href="#profil" class="flex items-center gap-3 no-underline group">
      <div class="relative w-9 h-9 sm:w-10 sm:h-10 rounded-full border-2 border-teal overflow-hidden shadow-md flex-shrink-0">
        <img src="<?php echo htmlspecialchars($profile['photo']); ?>"
             alt="Syahriel Andika"
             class="w-full h-full object-cover object-top no-download">
        <span class="img-shield"></span>
      </div>
      <div class="flex items-center gap-2">
        <img src="assets/img/logos/ilmuna-official.png" alt="ILMUNA Digital" class="h-7 sm:h-8 w-auto object-contain no-download">
      </div>
    </a>

    <!-- Nav Links (Desktop) -->
    <div class="hidden lg:flex items-center gap-1 bg-slate-100/80 border border-slate-200/80 rounded-full px-2.5 py-1">
      <?php foreach ($nav_links as $link): ?>
        <a href="<?php echo htmlspecialchars($link['href']); ?>" class="nav-link-item">
          <?php echo htmlspecialchars($link['label']); ?>
        </a>
      <?php endforeach; ?>
    </div>

    <!-- Right Actions -->
    <div class="flex items-center gap-2">
      <a href="https://wa.me/<?php echo htmlspecialchars($profile['phone_wa']); ?>"
         target="_blank"
         rel="noopener noreferrer"
         class="btn-3d-primary text-xs px-3.5 sm:px-5 py-2 rounded-xl">
        <span class="hidden sm:inline">WhatsApp</span>
        <span class="sm:hidden">WA</span>
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
      </a>

      <!-- Mobile Hamburger -->
      <button id="mobile-menu-toggle"
              class="lg:hidden w-9 h-9 rounded-xl border border-slate-200 bg-white flex items-center justify-center text-slate-700 hover:text-teal hover:border-teal transition-colors"
              aria-label="Menu Navigasi">
        <svg id="hamburger-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        <svg id="close-icon" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
      </button>
    </div>

  </div>

  <!-- Mobile Dropdown Drawer -->
  <div id="mobile-drawer" class="lg:hidden hidden border-t border-slate-200/80 bg-white/95 backdrop-blur-xl px-4 py-3 rounded-b-[22px]">
    <div class="flex flex-col gap-1.5">
      <?php foreach ($nav_links as $link): ?>
        <a href="<?php echo htmlspecialchars($link['href']); ?>"
           class="mobile-nav-link text-xs font-bold text-slate-700 hover:text-teal px-3.5 py-2.5 rounded-xl hover:bg-slate-50 transition-colors flex items-center justify-between">
          <span><?php echo htmlspecialchars($link['label']); ?></span>
          <span class="text-xs text-slate-400">&rarr;</span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</nav>

<!-- ═══════════════════════════════════════════════════════════════
     2. HERO SECTION — TRUE 3D SPATIAL STAGE
═══════════════════════════════════════════════════════════════ -->
<section id="profil" class="relative min-h-screen flex items-center pt-28 sm:pt-32 pb-20 overflow-hidden z-10">
  <div class="max-w-7xl mx-auto px-5 sm:px-6 w-full relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-10 items-center">

      <!-- Left Column: 3D Kinetic Typography, Stats & Push CTAs -->
      <div class="lg:col-span-7 space-y-6">

        <!-- Live 3D Pill -->
        <div class="section-pill-3d">
          <span class="w-2.5 h-2.5 bg-teal rounded-full live-pulse-dot"></span>
          <span>CV &amp; Portofolio 3D · PAI UNUGIRI · ILMUNA Digital</span>
        </div>

        <!-- 3D Extruded Headline -->
        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-black text-navy leading-[1.05] tracking-tight headline-3d">
          Syahriel<br>
          <span class="gradient-text-3d">Andika</span>
        </h1>

        <!-- Bio -->
        <p class="text-slate-600 text-base sm:text-lg leading-relaxed max-w-xl font-medium">
          <?php echo htmlspecialchars($profile['bio']); ?>
        </p>

        <!-- 3D Metric Cubes -->
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-1 max-w-xl">
          <div class="stat-cube-3d">
            <div class="text-2xl sm:text-3xl font-black text-navy font-mono" data-counter="<?php echo $total_creds; ?>"><?php echo $total_creds; ?></div>
            <div class="text-[11px] font-bold text-teal uppercase tracking-wider mt-0.5">Sertifikat &amp; SK</div>
          </div>
          <div class="stat-cube-3d">
            <div class="text-2xl sm:text-3xl font-black text-navy font-mono" data-counter="<?php echo $total_webs; ?>"><?php echo $total_webs; ?></div>
            <div class="text-[11px] font-bold text-teal uppercase tracking-wider mt-0.5">Sistem &amp; Web</div>
          </div>
          <div class="stat-cube-3d">
            <div class="text-2xl sm:text-3xl font-black text-navy font-mono" data-counter="<?php echo $total_orgs; ?>"><?php echo $total_orgs; ?></div>
            <div class="text-[11px] font-bold text-teal uppercase tracking-wider mt-0.5">Organisasi</div>
          </div>
          <div class="stat-cube-3d">
            <div class="text-2xl sm:text-3xl font-black text-navy font-mono" data-counter="<?php echo $total_kader; ?>"><?php echo $total_kader; ?></div>
            <div class="text-[11px] font-bold text-teal uppercase tracking-wider mt-0.5">Kaderisasi NU</div>
          </div>
        </div>

        <!-- Tactile 3D CTA Deck -->
        <div class="flex flex-wrap items-center gap-3.5 pt-2">
          <button type="button" data-quick-open-web="semua" class="btn-3d-primary w-full sm:w-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 7a2 2 0 012-2h5l2 2h7a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/></svg>
            <span>Buka Folder Website (<?php echo $total_webs; ?>)</span>
          </button>

          <button type="button" data-quick-open-cert="semua" class="btn-3d-white w-full sm:w-auto">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 7a2 2 0 012-2h5l2 2h7a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/></svg>
            <span>Buka Folder Sertifikat (<?php echo $total_creds; ?>)</span>
          </button>
        </div>

      </div>

      <!-- Right Column: Interactive 3D Multi-Layer Portrait Stage -->
      <div class="lg:col-span-5 flex justify-center">
        <div class="hero-3d-stage w-full max-w-[330px] sm:max-w-[365px]">

          <!-- Orbiting Depth Rings -->
          <div class="hero-orbit-ring"></div>
          <div class="hero-orbit-ring-2"></div>

          <!-- Main 3D Tilt Portrait Card -->
          <div class="card-3d portrait-3d-slab" data-tilt-3d data-tilt-max="14">
            <div class="card-glare"></div>

            <div class="relative rounded-t-[25px] overflow-hidden bg-slate-100">
              <img src="<?php echo htmlspecialchars($profile['photo']); ?>"
                   alt="Syahriel Andika"
                   class="w-full aspect-[4/5] object-cover object-top block no-download">
              <div class="img-shield"></div>

              <!-- Subtle bottom vignette for depth -->
              <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-navy/35 to-transparent pointer-events-none"></div>
            </div>

            <div class="p-4 sm:p-5 bg-white rounded-b-[25px] border-t border-slate-100 flex items-center justify-between z-layer-1">
              <div>
                <div class="font-black text-navy text-base sm:text-lg leading-tight">Syahriel Andika</div>
                <div class="text-[11px] sm:text-xs text-teal font-mono font-bold mt-0.5">Educational Technologist · Web Security</div>
              </div>
              <img src="assets/img/logos/ilmuna-official.png" alt="ILMUNA" class="h-6 w-auto object-contain no-download">
            </div>

            <!-- 3 Floating 3D Badges Orbiting in Z-Space -->
            <div class="badge-3d hero-badge-top">
              <img src="assets/img/logos/ilmuna-official.png" style="width:20px;height:20px;object-fit:contain;" alt="" class="no-download">
              <span>Owner ILMUNA Digital</span>
            </div>

            <div class="badge-3d hero-badge-mid">
              <img src="assets/img/logos/unugiri.png" style="width:20px;height:20px;object-fit:contain;" alt="UNUGIRI" class="no-download">
              <span>Mahasiswa PAI UNUGIRI</span>
            </div>

            <div class="badge-3d hero-badge-bot">
              <img src="assets/img/logos/perpustakaan-unugiri.png" style="width:20px;height:20px;object-fit:contain;" alt="Perpustakaan UNUGIRI" class="no-download">
              <span>Tim IT Perpustakaan</span>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     3. RINGKASAN CV & KOMPETENSI 3D BENTO
═══════════════════════════════════════════════════════════════ -->
<section id="cv-ringkasan" class="py-20 relative z-10 border-t border-slate-200/70 bg-white/60 backdrop-blur-[2px]">
  <div class="max-w-7xl mx-auto px-5 sm:px-6">

    <div class="text-center max-w-2xl mx-auto mb-12 reveal-3d-header">
      <div class="section-pill-3d mb-3">Curriculum Vitae · Profil &amp; Kompetensi</div>
      <h2 class="text-3xl sm:text-4xl font-black text-navy headline-3d">Dedikasi, Keahlian &amp; Kontak Cepat</h2>
      <p class="text-slate-500 text-sm mt-2">Perpaduan keilmuan Pendidikan Agama Islam, rekayasa perangkat lunak web, AI pendidikan, dan keamanan siber.</p>
    </div>

    <!-- Top CV Identity Slab -->
    <div class="card-3d p-7 sm:p-9 mb-8 reveal-3d" data-tilt-3d data-tilt-max="6">
      <div class="card-glare"></div>
      <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
        <div class="md:col-span-4 text-center z-layer-1">
          <div class="relative w-32 h-32 sm:w-36 sm:h-36 rounded-3xl overflow-hidden mx-auto border-4 border-white shadow-2xl">
            <img src="<?php echo htmlspecialchars($profile['photo']); ?>" alt="Syahriel Andika" class="w-full h-full object-cover object-top no-download">
            <span class="img-shield"></span>
          </div>
          <div class="font-black text-navy text-lg mt-3.5">Syahriel Andika</div>
          <div class="text-xs text-teal font-mono font-bold flex items-center justify-center gap-1.5 mt-1">
            <img src="assets/img/logos/unugiri.png" alt="UNUGIRI" class="w-4 h-4 object-contain no-download">
            <span>S1 PAI · UNUGIRI Bojonegoro</span>
          </div>
          <div class="text-[11px] text-slate-500 font-medium mt-1"><?php echo htmlspecialchars($profile['location']); ?></div>
        </div>

        <div class="md:col-span-8 space-y-4 z-layer-1">
          <div class="inline-flex items-center gap-2 text-xs font-mono font-bold text-teal uppercase tracking-wider bg-teal/10 px-3 py-1 rounded-full">
            <span>Ringkasan Profesional</span>
          </div>
          <h3 class="text-2xl font-black text-navy">Educational Technologist &amp; Web Security Developer</h3>
          <p class="text-slate-600 text-sm leading-relaxed">
            Aktif memimpin dan berkontribusi pada pengembangan ekosistem teknologi pendidikan di <strong>ILMUNA Digital</strong>, pengamanan aplikasi web melalui <strong>WAF Guardian Dome</strong>, layanan pustaka digital di <strong>Perpustakaan UNUGIRI</strong>, kepengurusan <strong>BEM Fakultas Tarbiyah UNUGIRI</strong>, serta kaderisasi <strong>IPNU &amp; GP Ansor</strong>.
          </p>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-2">
            <div class="p-3.5 bg-slate-50/90 rounded-2xl border border-slate-200 flex items-center justify-between gap-2">
              <div class="truncate">
                <div class="text-[10px] text-slate-400 font-mono uppercase font-bold">Email Resmi</div>
                <div class="text-xs font-extrabold text-navy truncate"><?php echo htmlspecialchars($profile['email']); ?></div>
              </div>
              <button type="button" class="btn-3d-white text-xs px-3 py-1.5 rounded-xl flex-shrink-0" data-copy="<?php echo htmlspecialchars($profile['email']); ?>">
                Salin
              </button>
            </div>

            <div class="p-3.5 bg-slate-50/90 rounded-2xl border border-slate-200 flex items-center justify-between gap-2">
              <div class="truncate">
                <div class="text-[10px] text-slate-400 font-mono uppercase font-bold">WhatsApp Aktif</div>
                <div class="text-xs font-extrabold text-navy truncate"><?php echo htmlspecialchars($profile['phone']); ?></div>
              </div>
              <button type="button" class="btn-3d-white text-xs px-3 py-1.5 rounded-xl flex-shrink-0" data-copy="<?php echo htmlspecialchars($profile['phone']); ?>">
                Salin
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 6 3D Skills & Competency Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
      <?php foreach ($skills as $sk): ?>
        <div class="card-3d p-5 reveal-3d" data-tilt-3d data-tilt-max="10">
          <div class="card-glare"></div>
          <div class="flex items-start justify-between gap-3 z-layer-1">
            <div>
              <span class="inline-block text-[10px] font-mono font-extrabold uppercase tracking-wider px-2.5 py-0.5 rounded-full bg-teal/10 text-teal mb-2">
                <?php echo htmlspecialchars($sk['level']); ?>
              </span>
              <h4 class="text-base font-black text-navy"><?php echo htmlspecialchars($sk['title']); ?></h4>
              <p class="text-xs text-slate-500 font-mono mt-1 leading-relaxed"><?php echo htmlspecialchars($sk['sub']); ?></p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-navy to-teal text-white flex items-center justify-center shadow-md flex-shrink-0 z-layer-2">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     4. RIWAYAT ORGANISASI (TERMASUK BEM FT UNUGIRI & SK RESMI)
        & RIWAYAT KADERISASI 3D
═══════════════════════════════════════════════════════════════ -->
<section id="organisasi" class="py-24 relative z-10 border-t border-slate-200/70 bg-slate-50/70 backdrop-blur-[2px]">
  <div class="max-w-7xl mx-auto px-5 sm:px-6">

    <div class="text-center max-w-2xl mx-auto mb-14 reveal-3d-header">
      <div class="section-pill-3d mb-3">Rekam Jejak · Kepemimpinan &amp; SK Pengesahan</div>
      <h2 class="text-3xl sm:text-4xl font-black text-navy headline-3d">Organisasi, SK Resmi &amp; Kaderisasi</h2>
      <p class="text-slate-500 text-sm mt-2">Pengalaman kepemimpinan lengkap beserta lampiran Surat Keputusan (SK) resmi yang dapat diverifikasi langsung.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

      <!-- Column A: Riwayat Organisasi (8 Organisasi + Tombol Lihat SK Resmi) -->
      <div class="lg:col-span-7">
        <div class="flex items-center justify-between mb-6 reveal-3d-header">
          <div>
            <h3 class="text-xl sm:text-2xl font-black text-navy">Riwayat Organisasi &amp; Pengabdian</h3>
            <p class="text-slate-500 text-xs mt-0.5 font-medium"><?php echo $total_orgs; ?> peran aktif &amp; purna tugas terverifikasi.</p>
          </div>
          <span class="text-xs font-mono font-extrabold px-3 py-1 rounded-full bg-white border border-slate-200 text-teal shadow-sm">
            <?php echo $total_sk; ?> SK Resmi
          </span>
        </div>

        <div class="space-y-4">
          <?php foreach ($organizations as $org): ?>
            <div class="card-3d p-5 flex items-start gap-4 reveal-3d" data-tilt-3d data-tilt-max="8">
              <div class="card-glare"></div>

              <div class="logo-emblem <?php echo !empty($org['wide']) ? 'w-16 px-2' : ''; ?>">
                <img src="<?php echo htmlspecialchars($org['logo']); ?>" alt="<?php echo htmlspecialchars($org['org']); ?>" class="no-download">
              </div>

              <div class="flex-1 min-w-0 z-layer-1">
                <div class="flex flex-wrap items-center justify-between gap-2">
                  <span class="text-[11px] font-extrabold font-mono text-teal uppercase tracking-wider">
                    <?php echo htmlspecialchars($org['role']); ?>
                  </span>
                  <div class="flex items-center gap-2">
                    <?php if (!empty($org['period'])): ?>
                      <span class="text-[10px] font-mono font-bold px-2.5 py-0.5 rounded-full bg-slate-100 text-slate-600 border border-slate-200">
                        <?php echo htmlspecialchars($org['period']); ?>
                      </span>
                    <?php endif; ?>
                    <?php if (!empty($org['url'])): ?>
                      <a href="<?php echo htmlspecialchars($org['url']); ?>" target="_blank" rel="noopener noreferrer" class="text-xs font-extrabold text-navy hover:text-teal transition-colors">
                        Kunjungi &rarr;
                      </a>
                    <?php endif; ?>
                  </div>
                </div>

                <h4 class="text-base font-black text-navy mt-1"><?php echo htmlspecialchars($org['org']); ?></h4>
                <p class="text-xs text-slate-600 mt-1 leading-relaxed"><?php echo htmlspecialchars($org['desc']); ?></p>

                <?php if (!empty($org['sk'])): ?>
                  <div class="mt-3 pt-3 border-t border-slate-100 flex flex-wrap items-center justify-between gap-2">
                    <span class="text-[10.5px] font-mono font-bold text-slate-500 truncate max-w-full">
                      <?php echo htmlspecialchars($org['sk']['number']); ?>
                    </span>
                    <button type="button"
                            class="btn-3d-primary text-[11px] px-3 py-1.5 rounded-xl"
                            data-sk-open
                            data-category="SK Resmi Organisasi"
                            data-title="<?php echo htmlspecialchars($org['sk']['title']); ?>"
                            data-issuer="<?php echo htmlspecialchars($org['sk']['issuer']); ?>"
                            data-desc="<?php echo htmlspecialchars($org['sk']['desc']); ?>"
                            data-img="<?php echo htmlspecialchars($org['sk']['img']); ?>"
                            data-pages="<?php echo htmlspecialchars(json_encode($org['sk']['pages']), ENT_QUOTES, 'UTF-8'); ?>">
                      <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                      <span>Lihat SK Resmi (<?php echo count($org['sk']['pages']); ?> Hal.)</span>
                    </button>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Column B: Riwayat Kaderisasi 3D Ascending Timeline -->
      <div class="lg:col-span-5">
        <div class="mb-6 reveal-3d-header">
          <h3 class="text-xl sm:text-2xl font-black text-navy">Riwayat Kaderisasi Formal</h3>
          <p class="text-slate-500 text-xs mt-0.5 font-medium">Jenjang perkaderan IPNU-IPPNU &amp; Gerakan Pemuda Ansor.</p>
        </div>

        <div class="kader-rail space-y-4">
          <?php foreach ($kaderisasi as $kad): ?>
            <div class="relative reveal-3d">
              <span class="kader-node-dot"></span>
              <div class="card-3d p-5 flex items-start gap-4" data-tilt-3d data-tilt-max="9">
                <div class="card-glare"></div>

                <div class="logo-emblem">
                  <img src="<?php echo htmlspecialchars($kad['logo']); ?>" alt="<?php echo htmlspecialchars($kad['title']); ?>" class="no-download">
                </div>

                <div class="flex-1 min-w-0 z-layer-1">
                  <div class="flex flex-wrap items-center justify-between gap-2">
                    <div class="flex items-center gap-1.5">
                      <span class="text-[10.5px] font-black font-mono px-2.5 py-0.5 rounded-full bg-gradient-to-r from-navy to-teal text-white shadow-sm">
                        Tingkat <?php echo $kad['level']; ?>
                      </span>
                      <?php if (!empty($kad['year'])): ?>
                        <span class="text-[10.5px] font-extrabold font-mono px-2.5 py-0.5 rounded-full bg-slate-100 text-navy border border-slate-200">
                          <?php echo htmlspecialchars($kad['year']); ?>
                        </span>
                      <?php endif; ?>
                    </div>
                    <span class="text-[11px] font-extrabold font-mono text-navy"><?php echo htmlspecialchars($kad['org']); ?></span>
                  </div>

                  <h4 class="text-lg font-black text-navy mt-1.5"><?php echo htmlspecialchars($kad['title']); ?></h4>
                  <div class="text-xs font-bold text-teal"><?php echo htmlspecialchars($kad['full']); ?></div>
                  <p class="text-xs text-slate-600 mt-1.5 font-medium">
                    <span class="text-navy font-bold">Penyelenggara:</span> <?php echo htmlspecialchars($kad['place']); ?>
                  </p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     5. FOLDER 3D INTERAKTIF — WEBSITE & SISTEM YANG TELAH DIBUAT
        Klik Folder 3D untuk membuka semua Website di dalamnya!
═══════════════════════════════════════════════════════════════ -->
<section id="proyek" class="py-24 relative z-10 border-t border-slate-200/70 bg-white/70 backdrop-blur-[2px]">
  <div class="max-w-7xl mx-auto px-5 sm:px-6">

    <div class="text-center max-w-2xl mx-auto mb-12 reveal-3d-header">
      <div class="section-pill-3d mb-3">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" d="M3 7a2 2 0 012-2h5l2 2h7a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/></svg>
        <span>Sistem Folder 3D · Portofolio Website</span>
      </div>
      <h2 class="text-3xl sm:text-4xl font-black text-navy headline-3d">Folder Website &amp; Sistem Digital</h2>
      <p class="text-slate-500 text-sm mt-2">Klik salah satu <strong>Folder 3D</strong> di bawah ini untuk membuka seluruh website &amp; sistem yang telah dibangun beserta pratinjaunya.</p>
    </div>

    <!-- 3D Physical Folders Grid (Websites) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-7" id="web-folders-grid">
      <?php foreach ($website_folders as $fkey => $fmeta): ?>
        <button type="button"
                class="folder-3d folder-accent-<?php echo htmlspecialchars($fmeta['accent']); ?> reveal-3d"
                data-web-folder="<?php echo htmlspecialchars($fkey); ?>"
                aria-expanded="false">
          <div class="folder-3d-shell">
            <div class="folder-3d-floor"></div>

            <!-- Folder Back + Tab -->
            <div class="folder-3d-back">
              <div class="folder-3d-tab">
                <span><?php echo htmlspecialchars($fmeta['code']); ?></span>
              </div>
            </div>

            <!-- 3 Real Logo Preview Sheets Peeking Out Inside -->
            <div class="folder-3d-sheets">
              <?php foreach ($fmeta['previews'] as $pidx => $pimg): ?>
                <div class="folder-3d-sheet sheet-logo s<?php echo $pidx + 1; ?>">
                  <img src="<?php echo htmlspecialchars($pimg); ?>" alt="" class="no-download" loading="lazy">
                </div>
              <?php endforeach; ?>
            </div>

            <!-- Hinged 3D Front Cover -->
            <div class="folder-3d-front">
              <div class="flex items-center justify-between">
                <span class="folder-count-pill"><?php echo $fmeta['count']; ?> Website</span>
                <span class="w-7 h-7 rounded-xl bg-white/15 border border-white/25 flex items-center justify-center text-white">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9"/></svg>
                </span>
              </div>

              <div>
                <h3 class="text-white font-black text-base leading-snug drop-shadow-sm">
                  <?php echo htmlspecialchars($fmeta['name']); ?>
                </h3>
                <p class="text-white/75 text-[11px] mt-0.5 line-clamp-1">
                  <?php echo htmlspecialchars($fmeta['sub']); ?>
                </p>
                <div class="folder-open-cue mt-2">
                  <span class="folder-cue-text">Klik untuk buka folder</span>
                  <span>&rarr;</span>
                </div>
              </div>
            </div>
          </div>
        </button>
      <?php endforeach; ?>
    </div>

    <!-- 3D Opened Folder Vault Window (Websites) -->
    <div id="web-vault" class="folder-vault" aria-live="polite">
      <div class="vault-window-bar">
        <div class="flex items-center gap-3">
          <div class="flex items-center gap-1.5">
            <span class="vault-dot bg-[#FF5F57]"></span>
            <span class="vault-dot bg-[#FFBD2E]"></span>
            <span class="vault-dot bg-[#28CA41]"></span>
          </div>
          <div class="h-5 w-px bg-slate-300 mx-1"></div>
          <div>
            <div class="flex items-center gap-2">
              <h3 id="web-vault-title" class="text-base sm:text-lg font-black text-navy">Semua Website &amp; Sistem</h3>
              <span id="web-vault-count" class="text-xs font-mono font-extrabold px-2.5 py-0.5 rounded-full bg-teal text-white">5</span>
            </div>
            <p id="web-vault-sub" class="text-[11px] text-slate-500 font-medium">Isi folder proyek website &amp; sistem aktif</p>
          </div>
        </div>

        <button type="button" id="web-vault-close" class="btn-3d-white text-xs px-4 py-2 rounded-xl">
          <span>Tutup Folder</span>
          <span class="font-black">&times;</span>
        </button>
      </div>

      <div class="p-6 sm:p-8">
        <div id="web-vault-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Populated dynamically with 3D animations when folder is clicked -->
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     6. FOLDER 3D INTERAKTIF — SERTIFIKAT & SK RESMI (67 BERKAS)
        Klik Folder 3D untuk membuka semua Sertifikat / SK di dalamnya!
═══════════════════════════════════════════════════════════════ -->
<section id="sertifikat" class="py-24 relative z-10 border-t border-slate-200/70 bg-slate-50/75 backdrop-blur-[2px]">
  <div class="max-w-7xl mx-auto px-5 sm:px-6">

    <div class="text-center max-w-2xl mx-auto mb-12 reveal-3d-header">
      <div class="section-pill-3d mb-3">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" d="M3 7a2 2 0 012-2h5l2 2h7a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/></svg>
        <span>Sistem Folder 3D · <?php echo $total_creds; ?> Berkas Terverifikasi</span>
      </div>
      <h2 class="text-3xl sm:text-4xl font-black text-navy headline-3d">Folder Sertifikat &amp; SK Organisasi</h2>
      <p class="text-slate-500 text-sm mt-2">
        Seluruh <strong><?php echo $total_certs_only; ?> Sertifikat</strong> &amp; <strong><?php echo $total_sk; ?> SK Resmi Organisasi</strong> tersusun rapi dalam folder 3D. Klik folder mana saja untuk membuka seluruh isinya secara interaktif.
      </p>
    </div>

    <!-- 8 Tactile 3D Physical Folders Grid (Certificates & SK) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-7" id="cert-folders-grid">
      <?php foreach ($cert_folders as $fkey => $fmeta): ?>
        <button type="button"
                class="folder-3d folder-accent-<?php echo htmlspecialchars($fmeta['accent']); ?> reveal-3d"
                data-cert-folder="<?php echo htmlspecialchars($fkey); ?>"
                aria-expanded="false">
          <div class="folder-3d-shell">
            <div class="folder-3d-floor"></div>

            <!-- Folder Back + Top-Left Physical Tab -->
            <div class="folder-3d-back">
              <div class="folder-3d-tab">
                <span><?php echo htmlspecialchars($fmeta['code']); ?></span>
              </div>
            </div>

            <!-- 3 Real Miniature Certificate Sheets Peeking Inside -->
            <div class="folder-3d-sheets">
              <?php foreach ($fmeta['previews'] as $pidx => $pimg): ?>
                <div class="folder-3d-sheet s<?php echo $pidx + 1; ?>">
                  <img src="<?php echo htmlspecialchars($pimg); ?>" alt="" class="no-download" loading="lazy">
                </div>
              <?php endforeach; ?>
            </div>

            <!-- Hinged 3D Front Cover -->
            <div class="folder-3d-front">
              <div class="flex items-center justify-between">
                <span class="folder-count-pill"><?php echo $fmeta['count']; ?> Berkas</span>
                <span class="w-7 h-7 rounded-xl bg-white/15 border border-white/25 flex items-center justify-center text-white">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </span>
              </div>

              <div>
                <h3 class="text-white font-black text-base leading-snug drop-shadow-sm">
                  <?php echo htmlspecialchars($fmeta['name']); ?>
                </h3>
                <p class="text-white/75 text-[11px] mt-0.5 line-clamp-1">
                  <?php echo htmlspecialchars($fmeta['sub']); ?>
                </p>
                <div class="folder-open-cue mt-2">
                  <span class="folder-cue-text">Klik untuk buka folder</span>
                  <span>&rarr;</span>
                </div>
              </div>
            </div>
          </div>
        </button>
      <?php endforeach; ?>
    </div>

    <!-- 3D Opened Folder Vault Window (Certificates & SK) -->
    <div id="cert-vault" class="folder-vault" aria-live="polite">
      <div class="vault-window-bar">
        <div class="flex items-center gap-3">
          <div class="flex items-center gap-1.5">
            <span class="vault-dot bg-[#FF5F57]"></span>
            <span class="vault-dot bg-[#FFBD2E]"></span>
            <span class="vault-dot bg-[#28CA41]"></span>
          </div>
          <div class="h-5 w-px bg-slate-300 mx-1"></div>
          <div>
            <div class="flex items-center gap-2">
              <h3 id="cert-vault-title" class="text-base sm:text-lg font-black text-navy">Semua Berkas</h3>
              <span id="cert-vault-count" class="text-xs font-mono font-extrabold px-2.5 py-0.5 rounded-full bg-teal text-white">0</span>
            </div>
            <p id="cert-vault-sub" class="text-[11px] text-slate-500 font-medium">Klik berkas untuk membuka pratinjau ukuran penuh</p>
          </div>
        </div>

        <div class="flex flex-wrap items-center gap-2.5 w-full sm:w-auto">
          <!-- Instant Search Inside Opened Folder -->
          <div class="relative flex-1 sm:flex-initial">
            <svg class="w-4 h-4 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input type="text" id="cert-vault-search" class="vault-search-input" placeholder="Cari judul / penerbit..." autocomplete="off">
          </div>

          <button type="button" id="cert-vault-close" class="btn-3d-white text-xs px-4 py-2 rounded-xl">
            <span>Tutup Folder</span>
            <span class="font-black">&times;</span>
          </button>
        </div>
      </div>

      <div class="p-6 sm:p-8">
        <div id="cert-vault-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Populated dynamically with 3D pop-out stagger when folder is clicked -->
        </div>
        <div id="cert-vault-empty" class="hidden text-center py-12">
          <p class="text-slate-500 font-bold text-sm">Tidak ada berkas yang cocok dengan kata kunci tersebut.</p>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     7. KONTAK & KOLABORASI 3D
═══════════════════════════════════════════════════════════════ -->
<section id="kontak" class="py-24 relative z-10 border-t border-slate-200/70 bg-white/75 backdrop-blur-[2px]">
  <div class="max-w-3xl mx-auto px-5 sm:px-6 text-center">

    <div class="card-3d p-8 sm:p-11 reveal-3d" data-tilt-3d data-tilt-max="6">
      <div class="card-glare"></div>

      <div class="relative w-20 h-20 rounded-3xl overflow-hidden mx-auto border-4 border-white shadow-xl mb-5 z-layer-2">
        <img src="<?php echo htmlspecialchars($profile['photo']); ?>" alt="SA" class="w-full h-full object-cover object-top no-download">
        <span class="img-shield"></span>
      </div>

      <div class="z-layer-1">
        <div class="section-pill-3d mb-3">Terbuka untuk Kolaborasi</div>
        <h2 class="text-3xl sm:text-4xl font-black text-navy mb-2 headline-3d">Mari Berkolaborasi</h2>
        <p class="text-slate-500 text-sm max-w-lg mx-auto mb-8 leading-relaxed">
          Siap berkolaborasi dalam pengembangan website modern, keamanan aplikasi web, ekosistem EdTech, pendampingan halal, maupun kegiatan organisasi Nahdlatul Ulama.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-lg mx-auto mb-8">
          <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200 flex items-center justify-between gap-2">
            <div class="text-left truncate">
              <div class="text-[10px] text-slate-400 font-mono uppercase font-bold">Email</div>
              <div class="text-xs font-extrabold text-navy truncate"><?php echo htmlspecialchars($profile['email']); ?></div>
            </div>
            <button type="button" class="btn-3d-white text-xs px-3 py-1.5 rounded-xl flex-shrink-0" data-copy="<?php echo htmlspecialchars($profile['email']); ?>">
              Salin
            </button>
          </div>

          <div class="p-4 bg-slate-50 rounded-2xl border border-slate-200 flex items-center justify-between gap-2">
            <div class="text-left truncate">
              <div class="text-[10px] text-slate-400 font-mono uppercase font-bold">WhatsApp</div>
              <div class="text-xs font-extrabold text-navy truncate"><?php echo htmlspecialchars($profile['phone']); ?></div>
            </div>
            <a href="https://wa.me/<?php echo htmlspecialchars($profile['phone_wa']); ?>" target="_blank" rel="noopener noreferrer" class="btn-3d-primary text-xs px-3.5 py-1.5 rounded-xl flex-shrink-0">
              Chat &rarr;
            </a>
          </div>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-3">
          <a href="https://ilmuna.my.id" target="_blank" rel="noopener noreferrer" class="btn-3d-white text-xs px-3.5 py-2">ilmuna.my.id &rarr;</a>
          <a href="https://learn.ilmuna.my.id" target="_blank" rel="noopener noreferrer" class="btn-3d-white text-xs px-3.5 py-2">learn.ilmuna.my.id &rarr;</a>
          <a href="https://margo-one.ilmuna.my.id" target="_blank" rel="noopener noreferrer" class="btn-3d-white text-xs px-3.5 py-2">margo-one.ilmuna.my.id &rarr;</a>
          <a href="https://library.unugiri.ac.id" target="_blank" rel="noopener noreferrer" class="btn-3d-white text-xs px-3.5 py-2">library.unugiri.ac.id &rarr;</a>
          <a href="https://usmanroin.com" target="_blank" rel="noopener noreferrer" class="btn-3d-white text-xs px-3.5 py-2">usmanroin.com &rarr;</a>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════════
     3D LIGHTBOX MODAL (MULTI-PAGE SK + PREV/NEXT + ANTI-DOWNLOAD)
═══════════════════════════════════════════════════════════════ -->
<div id="lightbox-overlay" class="lightbox-overlay" role="dialog" aria-modal="true" aria-labelledby="lb-title">
  <div class="lightbox-card">
    <div class="flex items-start justify-between gap-3 pb-3 border-b border-slate-200 mb-4">
      <div class="min-w-0">
        <div class="flex flex-wrap items-center gap-2 mb-1">
          <span id="lb-category" class="text-[11px] font-mono font-extrabold px-2.5 py-0.5 rounded-full bg-teal text-white"></span>
          <span id="lb-counter" class="text-[11px] font-mono font-bold text-slate-400"></span>
        </div>
        <h3 id="lb-title" class="text-base sm:text-lg font-black text-navy leading-snug"></h3>
      </div>

      <button type="button" id="lightbox-close" class="w-9 h-9 rounded-xl bg-slate-100 hover:bg-rose-50 hover:text-rose-600 text-slate-700 font-black text-lg flex items-center justify-center transition-colors flex-shrink-0" aria-label="Tutup">
        &times;
      </button>
    </div>

    <!-- Multi-Page Switcher (Shown for Multi-Page Official SKs) -->
    <div id="lb-pages-bar" class="hidden flex flex-wrap items-center gap-2 mb-3 p-2.5 rounded-xl bg-slate-50 border border-slate-200">
      <span class="text-[11px] font-mono font-bold text-slate-500 mr-1">Halaman Dokumen:</span>
      <div id="lb-pages-buttons" class="flex flex-wrap gap-1.5"></div>
    </div>

    <!-- Protected Image Preview Stage -->
    <div class="relative rounded-2xl overflow-hidden bg-slate-100 border border-slate-200 mb-4 max-h-[60vh] flex items-center justify-center">
      <img id="lb-img" src="" alt="Pratinjau Dokumen" class="w-full h-auto max-h-[60vh] object-contain no-download">
      <div class="img-shield"></div>

      <!-- Prev / Next Gallery Controls -->
      <button type="button" id="lb-prev" class="hidden absolute left-3 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full bg-white/95 hover:bg-teal hover:text-white text-navy shadow-lg border border-slate-200 flex items-center justify-center font-black transition-all" aria-label="Sebelumnya">
        &larr;
      </button>
      <button type="button" id="lb-next" class="hidden absolute right-3 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full bg-white/95 hover:bg-teal hover:text-white text-navy shadow-lg border border-slate-200 flex items-center justify-center font-black transition-all" aria-label="Selanjutnya">
        &rarr;
      </button>
    </div>

    <!-- Document Details -->
    <div class="space-y-1 text-left">
      <div class="text-xs text-slate-500 font-mono">Penerbit: <strong id="lb-issuer" class="text-navy"></strong></div>
      <p id="lb-desc" class="text-xs text-slate-600 leading-relaxed"></p>
      <div class="text-[10.5px] text-slate-400 font-mono pt-1">Dokumen dilindungi mode pratinjau (Anti-Download Aktif)</div>
    </div>
  </div>
</div>

<!-- Toast -->
<div id="toast" class="toast" role="alert" aria-live="polite">Disalin ke clipboard!</div>

<!-- Mobile 3D Floating Bottom Dock -->
<nav class="mobile-dock lg:hidden" aria-label="Navigasi Mobile Cepat">
  <a href="#profil" class="mobile-dock-btn active" data-dock="profil">
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
    <span>CV</span>
  </a>
  <a href="#organisasi" class="mobile-dock-btn" data-dock="organisasi">
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
    <span>Org &amp; SK</span>
  </a>
  <a href="#proyek" class="mobile-dock-btn" data-dock="proyek">
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7a2 2 0 012-2h5l2 2h7a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/></svg>
    <span>Web</span>
  </a>
  <a href="#sertifikat" class="mobile-dock-btn" data-dock="sertifikat">
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    <span>Sertifikat</span>
  </a>
  <a href="#kontak" class="mobile-dock-btn" data-dock="kontak">
    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
    <span>Kontak</span>
  </a>
</nav>

<!-- Structured Portfolio Data Payload for 3D Folder Engine -->
<script>
window.PORTFOLIO_DATA = {
  websites: <?php echo json_encode($systems, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
  websiteFolders: <?php echo json_encode($website_folders, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
  certificates: <?php echo json_encode($all_certificates, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>,
  certFolders: <?php echo json_encode($cert_folders, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
};
</script>

<?php require_once 'includes/footer.php'; ?>
