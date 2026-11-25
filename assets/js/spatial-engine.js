/**
 * ═══════════════════════════════════════════════════════════════════════════
 *  ILMUNA DIGITAL — TRUE 3D SPATIAL ENGINE v4.0
 *  File: assets/js/spatial-engine.js
 *  Features:
 *   1. Real Three.js WebGL 3D Sculptural Background (Scroll + Mouse Reactive)
 *   2. Lenis Momentum Smooth Scroll + GSAP ScrollTrigger Bidirectional 3D Reveal
 *   3. True Multi-Layer 3D Cursor Tilt + Dynamic Specular Glare ([data-tilt-3d])
 *   4. Interactive 3D Physical Folder Engine for Websites & Certificates/SK
 *   5. Multi-Page Official SK & Prev/Next Gallery 3D Lightbox Modal
 *   6. Animated 3D Metric Counters, Spatial Cursor, Mobile Drawer & Dock
 *   7. Strict Multi-Layer Anti-Download Protection on All Images
 * ═══════════════════════════════════════════════════════════════════════════
 */

document.addEventListener('DOMContentLoaded', () => {
  const isTouch = window.matchMedia('(hover: none) and (pointer: coarse)').matches;
  const DATA = window.PORTFOLIO_DATA || { websites: [], websiteFolders: {}, certificates: [], certFolders: {} };

  // ── Helper: Safe HTML Escape ─────────────────────────────────────────────
  const esc = (str) => String(str ?? '')
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#39;');

  // ── 1. GSAP + SCROLLTRIGGER + LENIS SMOOTH SCROLL ────────────────────────
  if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
    gsap.registerPlugin(ScrollTrigger);
  }

  let lenis = null;
  if (typeof Lenis !== 'undefined') {
    lenis = new Lenis({
      duration: 1.25,
      easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
      orientation: 'vertical',
      smoothWheel: true,
      wheelMultiplier: 1.1,
      touchMultiplier: 1.6,
    });
    window.lenis = lenis;

    if (typeof ScrollTrigger !== 'undefined') {
      lenis.on('scroll', ScrollTrigger.update);
      gsap.ticker.add((time) => lenis.raf(time * 1000));
      gsap.ticker.lagSmoothing(0);
    } else {
      const raf = (time) => {
        lenis.raf(time);
        requestAnimationFrame(raf);
      };
      requestAnimationFrame(raf);
    }
  }

  const smoothScrollTo = (el, offset = -90) => {
    if (!el) return;
    if (lenis) {
      lenis.scrollTo(el, { offset, duration: 1.1 });
    } else {
      const y = el.getBoundingClientRect().top + window.scrollY + offset;
      window.scrollTo({ top: y, behavior: 'smooth' });
    }
  };

  // Smooth anchor scrolling
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const targetId = this.getAttribute('href');
      if (targetId && targetId !== '#') {
        const targetEl = document.querySelector(targetId);
        if (targetEl) {
          e.preventDefault();
          smoothScrollTo(targetEl, -88);
        }
      }
    });
  });

  // ── 2. REAL THREE.JS WEBGL 3D SPATIAL BACKGROUND ─────────────────────────
  let scrollVelocity = 0;
  let lastScrollPos = window.scrollY;
  window.addEventListener('scroll', () => {
    const cur = window.scrollY;
    scrollVelocity = Math.max(-40, Math.min(40, cur - lastScrollPos));
    lastScrollPos = cur;
  }, { passive: true });

  function initThreeSpatialScene() {
    const canvas = document.getElementById('three-spatial-canvas');
    if (!canvas) return;

    // Fallback to subtle 2D 3D-projected particles if Three.js didn't load
    if (typeof THREE === 'undefined') {
      const ctx = canvas.getContext('2d');
      if (!ctx) return;
      const resize = () => { canvas.width = window.innerWidth; canvas.height = window.innerHeight; };
      resize();
      window.addEventListener('resize', resize);
      const pts = Array.from({ length: 60 }, () => ({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        r: Math.random() * 2.2 + 0.8,
        vx: (Math.random() - 0.5) * 0.4,
        vy: (Math.random() - 0.5) * 0.4
      }));
      const draw2D = () => {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        pts.forEach(p => {
          p.x = (p.x + p.vx + canvas.width) % canvas.width;
          p.y = (p.y + p.vy + canvas.height) % canvas.height;
          ctx.beginPath();
          ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
          ctx.fillStyle = 'rgba(13, 122, 135, 0.25)';
          ctx.fill();
        });
        requestAnimationFrame(draw2D);
      };
      draw2D();
      return;
    }

    let renderer;
    try {
      renderer = new THREE.WebGLRenderer({ canvas, alpha: true, antialias: true, powerPreference: 'high-performance' });
    } catch (e) {
      return;
    }

    renderer.setPixelRatio(Math.min(window.devicePixelRatio || 1, 2));
    renderer.setSize(window.innerWidth, window.innerHeight);

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(48, window.innerWidth / window.innerHeight, 0.1, 100);
    camera.position.set(0, 0, 15);

    // Studio Lighting (bright & sculptural)
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.9);
    scene.add(ambientLight);

    const dirLight1 = new THREE.DirectionalLight(0x52B2DC, 1.35);
    dirLight1.position.set(8, 10, 10);
    scene.add(dirLight1);

    const dirLight2 = new THREE.DirectionalLight(0x0D7A87, 1.0);
    dirLight2.position.set(-10, -6, 8);
    scene.add(dirLight2);

    const worldGroup = new THREE.Group();
    scene.add(worldGroup);

    // Materials (translucent studio glass + wireframe edge accents)
    const matTealGlass = new THREE.MeshPhysicalMaterial({
      color: 0x0D7A87,
      roughness: 0.22,
      metalness: 0.15,
      transparent: true,
      opacity: 0.14,
      flatShading: true
    });
    const matSkyGlass = new THREE.MeshPhysicalMaterial({
      color: 0x52B2DC,
      roughness: 0.2,
      metalness: 0.1,
      transparent: true,
      opacity: 0.16,
      flatShading: true
    });
    const matWireNavy = new THREE.MeshBasicMaterial({
      color: 0x1D3B5E,
      wireframe: true,
      transparent: true,
      opacity: 0.16
    });
    const matWireTeal = new THREE.MeshBasicMaterial({
      color: 0x0D7A87,
      wireframe: true,
      transparent: true,
      opacity: 0.2
    });
    const matWireSky = new THREE.MeshBasicMaterial({
      color: 0x52B2DC,
      wireframe: true,
      transparent: true,
      opacity: 0.22
    });

    const floaters = [];

    // 1. Hero Sculpted Icosahedron (top-right spatial anchor)
    const icoGroup = new THREE.Group();
    icoGroup.add(new THREE.Mesh(new THREE.IcosahedronGeometry(2.4, 0), matTealGlass));
    icoGroup.add(new THREE.Mesh(new THREE.IcosahedronGeometry(2.45, 0), matWireTeal));
    icoGroup.position.set(6.8, 2.2, -3.5);
    worldGroup.add(icoGroup);
    floaters.push({ mesh: icoGroup, baseY: 2.2, rx: 0.004, ry: 0.006, amp: 0.55, speed: 0.9, phase: 0 });

    // 2. Sculpted 3D Torus Knot (left mid-depth)
    const knotGroup = new THREE.Group();
    knotGroup.add(new THREE.Mesh(new THREE.TorusKnotGeometry(1.75, 0.42, 72, 12), matSkyGlass));
    knotGroup.add(new THREE.Mesh(new THREE.TorusKnotGeometry(1.78, 0.43, 48, 8), matWireSky));
    knotGroup.position.set(-7.4, -1.6, -5.0);
    worldGroup.add(knotGroup);
    floaters.push({ mesh: knotGroup, baseY: -1.6, rx: 0.003, ry: -0.005, amp: 0.65, speed: 0.75, phase: 1.5 });

    // 3. Concentric 3D Orbital Gyroscope Rings (center-background)
    const ring1 = new THREE.Mesh(new THREE.TorusGeometry(4.6, 0.03, 12, 90), matWireSky);
    ring1.position.set(0.5, 0.4, -7.5);
    ring1.rotation.set(1.1, 0.4, 0);
    worldGroup.add(ring1);
    floaters.push({ mesh: ring1, baseY: 0.4, rx: 0.0018, ry: 0.0025, amp: 0.3, speed: 0.6, phase: 2.3 });

    const ring2 = new THREE.Mesh(new THREE.TorusGeometry(6.2, 0.025, 12, 100), matWireNavy);
    ring2.position.set(0.5, 0.4, -8.5);
    ring2.rotation.set(-0.7, 0.8, 0.2);
    worldGroup.add(ring2);
    floaters.push({ mesh: ring2, baseY: 0.4, rx: -0.0015, ry: 0.002, amp: 0.35, speed: 0.5, phase: 0.8 });

    // 4. Floating 3D Octahedrons & Glass Cubes across scroll depths
    const geoOct = new THREE.OctahedronGeometry(1.05, 0);
    const geoBox = new THREE.BoxGeometry(1.35, 1.35, 1.35);
    const accents = [
      { geo: geoOct, pos: [-5.5,  4.2, -4.5], mat: matWireTeal, glass: matSkyGlass },
      { geo: geoBox, pos: [ 5.8, -4.4, -5.5], mat: matWireNavy, glass: matTealGlass },
      { geo: geoOct, pos: [-2.2, -5.8, -4.2], mat: matWireSky,  glass: matSkyGlass },
      { geo: geoBox, pos: [ 2.4,  5.5, -6.5], mat: matWireTeal, glass: matTealGlass },
      { geo: geoOct, pos: [ 8.5, -0.5, -7.2], mat: matWireSky,  glass: matSkyGlass },
      { geo: geoBox, pos: [-8.2,  1.8, -6.8], mat: matWireNavy, glass: matTealGlass },
    ];
    accents.forEach((cfg, i) => {
      const g = new THREE.Group();
      g.add(new THREE.Mesh(cfg.geo, cfg.glass));
      g.add(new THREE.Mesh(cfg.geo, cfg.mat));
      g.position.set(...cfg.pos);
      worldGroup.add(g);
      floaters.push({
        mesh: g,
        baseY: cfg.pos[1],
        rx: 0.004 + (i % 3) * 0.0015,
        ry: 0.005 + ((i + 1) % 3) * 0.0015,
        amp: 0.45 + (i % 2) * 0.2,
        speed: 0.8 + i * 0.1,
        phase: i * 1.1
      });
    });

    // 5. 3D Depth Particle Starfield (240 points in Navy/Teal/Sky)
    const count = isTouch ? 120 : 240;
    const positions = new Float32Array(count * 3);
    const colors = new Float32Array(count * 3);
    const palette = [new THREE.Color(0x1D3B5E), new THREE.Color(0x0D7A87), new THREE.Color(0x52B2DC)];

    for (let i = 0; i < count; i++) {
      positions[i * 3]     = (Math.random() - 0.5) * 34;
      positions[i * 3 + 1] = (Math.random() - 0.5) * 26;
      positions[i * 3 + 2] = (Math.random() - 0.5) * 18 - 4;
      const col = palette[i % palette.length];
      colors[i * 3]     = col.r;
      colors[i * 3 + 1] = col.g;
      colors[i * 3 + 2] = col.b;
    }

    const pGeo = new THREE.BufferGeometry();
    pGeo.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    pGeo.setAttribute('color', new THREE.BufferAttribute(colors, 3));
    const pMat = new THREE.PointsMaterial({
      size: 0.14,
      vertexColors: true,
      transparent: true,
      opacity: 0.55
    });
    const starfield = new THREE.Points(pGeo, pMat);
    worldGroup.add(starfield);

    // Mouse parallax target
    let mouseX = 0, mouseY = 0;
    let smoothMX = 0, smoothMY = 0;
    window.addEventListener('mousemove', (e) => {
      mouseX = (e.clientX / window.innerWidth - 0.5) * 2;
      mouseY = (e.clientY / window.innerHeight - 0.5) * 2;
    }, { passive: true });

    window.addEventListener('resize', () => {
      camera.aspect = window.innerWidth / window.innerHeight;
      camera.updateProjectionMatrix();
      renderer.setSize(window.innerWidth, window.innerHeight);
    });

    const clock = new THREE.Clock();
    function animate() {
      requestAnimationFrame(animate);
      const t = clock.getElapsedTime();
      const maxScroll = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);
      const scrollRatio = window.scrollY / maxScroll;

      smoothMX += (mouseX - smoothMX) * 0.05;
      smoothMY += (mouseY - smoothMY) * 0.05;
      scrollVelocity *= 0.92;

      // Camera flies smoothly with mouse & scroll depth (bidirectional!)
      camera.position.x = smoothMX * 1.45;
      camera.position.y = -smoothMY * 1.0 - (scrollRatio - 0.5) * 3.8;
      camera.position.z = 15 - Math.sin(scrollRatio * Math.PI) * 2.4;
      camera.lookAt(0, -(scrollRatio - 0.5) * 2.2, -3);

      worldGroup.rotation.y = smoothMX * 0.14 + scrollRatio * 0.65;
      worldGroup.rotation.x = smoothMY * 0.08;

      const velBoost = scrollVelocity * 0.0022;
      for (let i = 0; i < floaters.length; i++) {
        const f = floaters[i];
        f.mesh.rotation.x += f.rx + velBoost;
        f.mesh.rotation.y += f.ry + velBoost * 0.8;
        f.mesh.position.y = f.baseY + Math.sin(t * f.speed + f.phase) * f.amp;
      }

      starfield.rotation.y = t * 0.025 + scrollRatio * 0.5;
      starfield.rotation.x = Math.sin(t * 0.08) * 0.08;

      renderer.render(scene, camera);
    }
    animate();
  }
  initThreeSpatialScene();

  // ── 3. TRUE MULTI-LAYER 3D CURSOR TILT ENGINE ([data-tilt-3d]) ───────────
  function bind3DTilt(root = document) {
    if (isTouch) return;
    root.querySelectorAll('[data-tilt-3d]').forEach(card => {
      if (card.dataset.tiltBound === '1') return;
      card.dataset.tiltBound = '1';
      const maxTilt = parseFloat(card.dataset.tiltMax || '10');
      const glare = card.querySelector('.card-glare');

      card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const px = (e.clientX - rect.left) / rect.width;
        const py = (e.clientY - rect.top) / rect.height;
        const rx = (0.5 - py) * maxTilt * 2;
        const ry = (px - 0.5) * maxTilt * 2;

        card.style.transition = 'transform 0.08s ease-out';
        card.style.transform = `perspective(1100px) rotateX(${rx.toFixed(2)}deg) rotateY(${ry.toFixed(2)}deg) scale3d(1.018, 1.018, 1.018)`;

        if (glare) {
          glare.style.setProperty('--gx', `${(px * 100).toFixed(1)}%`);
          glare.style.setProperty('--gy', `${(py * 100).toFixed(1)}%`);
        }
      });

      card.addEventListener('mouseleave', () => {
        card.style.transition = 'transform 0.55s cubic-bezier(0.16, 1, 0.3, 1)';
        card.style.transform = 'perspective(1100px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
      });
    });
  }
  bind3DTilt(document);

  // ── 4. TOP PROGRESS BAR, NAVBAR STATE & ACTIVE SECTION TRACKER ───────────
  const progressBar = document.getElementById('scroll-progress');
  const navbar = document.querySelector('.navbar-3d');
  const trackedSections = document.querySelectorAll('section[id]');
  const dockButtons = document.querySelectorAll('.mobile-dock-btn');
  const desktopNavLinks = document.querySelectorAll('.nav-link-item');

  window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;
    const docHeight = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);

    if (progressBar) {
      progressBar.style.width = `${Math.min(100, (scrollY / docHeight) * 100)}%`;
    }
    navbar?.classList.toggle('scrolled', scrollY > 28);

    let currentId = '';
    const probe = scrollY + 180;
    trackedSections.forEach(sec => {
      if (probe >= sec.offsetTop && probe < sec.offsetTop + sec.offsetHeight) {
        currentId = sec.id;
      }
    });

    if (currentId === 'cv-ringkasan') currentId = 'profil';
    if (currentId) {
      dockButtons.forEach(btn => btn.classList.toggle('active', btn.dataset.dock === currentId));
      desktopNavLinks.forEach(link => link.classList.toggle('active', link.getAttribute('href') === '#' + currentId));
    }
  }, { passive: true });

  // ── 5. MOBILE HAMBURGER DRAWER ───────────────────────────────────────────
  const mobileToggle = document.getElementById('mobile-menu-toggle');
  const mobileDrawer = document.getElementById('mobile-drawer');
  const hamburgerIcon = document.getElementById('hamburger-icon');
  const closeIcon = document.getElementById('close-icon');

  const setDrawer = (open) => {
    mobileDrawer?.classList.toggle('hidden', !open);
    hamburgerIcon?.classList.toggle('hidden', open);
    closeIcon?.classList.toggle('hidden', !open);
  };

  mobileToggle?.addEventListener('click', () => {
    setDrawer(mobileDrawer?.classList.contains('hidden'));
  });
  document.querySelectorAll('.mobile-nav-link').forEach(link => {
    link.addEventListener('click', () => setDrawer(false));
  });

  // ── 6. ANIMATED 3D STAT COUNTERS ─────────────────────────────────────────
  document.querySelectorAll('[data-counter]').forEach(el => {
    const target = parseInt(el.dataset.counter, 10) || 0;
    if (typeof gsap !== 'undefined') {
      const obj = { val: 0 };
      gsap.to(obj, {
        val: target,
        duration: 1.4,
        delay: 0.25,
        ease: 'power3.out',
        onUpdate: () => { el.textContent = Math.round(obj.val); }
      });
    }
  });

  // ── 7. TRUE BIDIRECTIONAL 3D SCROLL ANIMATIONS (DOWN & UP) ───────────────
  if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
    // Crisp 3D Hero Entrance Choreography on Load
    gsap.from('#profil .section-pill-3d, #profil h1, #profil p, #profil .stat-cube-3d', {
      opacity: 0,
      y: 34,
      rotationX: 14,
      duration: 0.85,
      ease: 'power3.out',
      stagger: 0.08,
      clearProps: 'transform,opacity'
    });

    gsap.from('.hero-3d-stage', {
      opacity: 0,
      y: 45,
      rotationY: -14,
      scale: 0.92,
      duration: 1.05,
      delay: 0.15,
      ease: 'power3.out',
      clearProps: 'transform,opacity'
    });

    // 3D Cards & Folders: bidirectional 4-callback choreography
    // clearProps: 'transform' ensures hover tilt & 3D folder perspective remain razor-sharp
    ScrollTrigger.batch('.reveal-3d', {
      start: 'top 90%',
      end: 'bottom 10%',
      onEnter: (batch) => {
        gsap.fromTo(batch,
          { opacity: 0, y: 65, rotationX: 16, scale: 0.93 },
          { opacity: 1, y: 0, rotationX: 0, scale: 1, duration: 0.82, ease: 'power3.out', stagger: 0.06, overwrite: true, clearProps: 'transform' }
        );
      },
      onLeave: (batch) => {
        gsap.to(batch, { opacity: 0.18, y: -40, rotationX: -12, scale: 0.96, duration: 0.46, ease: 'power2.in', overwrite: true });
      },
      onEnterBack: (batch) => {
        gsap.fromTo(batch,
          { opacity: 0, y: -65, rotationX: -16, scale: 0.93 },
          { opacity: 1, y: 0, rotationX: 0, scale: 1, duration: 0.72, ease: 'power3.out', stagger: 0.05, overwrite: true, clearProps: 'transform' }
        );
      },
      onLeaveBack: (batch) => {
        gsap.to(batch, { opacity: 0.18, y: 40, rotationX: 12, scale: 0.96, duration: 0.46, ease: 'power2.in', overwrite: true });
      }
    });

    // Section headers: 3D tilt-slide in both directions
    ScrollTrigger.batch('.reveal-3d-header', {
      start: 'top 92%',
      end: 'bottom 8%',
      onEnter: (batch) => {
        gsap.fromTo(batch,
          { opacity: 0, y: 34, rotationX: 14 },
          { opacity: 1, y: 0, rotationX: 0, duration: 0.78, ease: 'power3.out', stagger: 0.08, overwrite: true, clearProps: 'transform' }
        );
      },
      onLeave: (batch) => {
        gsap.to(batch, { opacity: 0.18, y: -24, rotationX: -10, duration: 0.42, ease: 'power2.in', overwrite: true });
      },
      onEnterBack: (batch) => {
        gsap.fromTo(batch,
          { opacity: 0, y: -34, rotationX: -14 },
          { opacity: 1, y: 0, rotationX: 0, duration: 0.68, ease: 'power3.out', stagger: 0.06, overwrite: true, clearProps: 'transform' }
        );
      },
      onLeaveBack: (batch) => {
        gsap.to(batch, { opacity: 0.18, y: 24, rotationX: 10, duration: 0.42, ease: 'power2.in', overwrite: true });
      }
    });

    // Scrubbed 3D Parallax on Hero Portrait & Orbit Badges
    gsap.to('.hero-3d-stage', {
      scrollTrigger: { trigger: '#profil', start: 'top top', end: 'bottom top', scrub: 1.2 },
      y: 70,
      rotationX: 6,
      ease: 'none'
    });
  }

  // ── 8. 3D FOLDER ENGINE A — WEBSITE & SISTEM (#proyek) ───────────────────
  const webFolders = document.querySelectorAll('[data-web-folder]');
  const webVault = document.getElementById('web-vault');
  const webVaultTitle = document.getElementById('web-vault-title');
  const webVaultCount = document.getElementById('web-vault-count');
  const webVaultSub = document.getElementById('web-vault-sub');
  const webVaultGrid = document.getElementById('web-vault-grid');
  const webVaultClose = document.getElementById('web-vault-close');
  let activeWebFolder = null;

  function renderWebCard(sys) {
    const logoClass = sys.wide ? 'logo-wide' : 'logo-square';
    const tagsHtml = (sys.tags || []).map(t =>
      `<span class="text-[10.5px] font-mono font-bold px-2.5 py-0.5 rounded-lg bg-slate-100 text-slate-600 border border-slate-200/80">#${esc(t)}</span>`
    ).join('');

    const ctaHtml = sys.url
      ? `<a href="${esc(sys.url)}" target="_blank" rel="noopener noreferrer" class="btn-3d-primary w-full text-xs py-2.5">
           <span>Kunjungi ${esc(sys.domain)}</span>
           <span>&rarr;</span>
         </a>`
      : `<div class="text-center text-xs font-mono font-extrabold text-navy py-2.5 px-3 border border-slate-200 rounded-xl bg-slate-50">
           Infrastruktur Server Terproteksi (Active WAF)
         </div>`;

    return `
      <div class="card-3d p-5 flex flex-col justify-between web-vault-item" data-tilt-3d data-tilt-max="9">
        <div class="card-glare"></div>
        <div class="z-layer-1">
          <!-- Browser Mockup Chrome -->
          <div class="browser-chrome mb-4">
            <span class="vault-dot bg-[#FF5F57]"></span>
            <span class="vault-dot bg-[#FFBD2E]"></span>
            <span class="vault-dot bg-[#28CA41]"></span>
            <span class="text-[11px] font-mono font-bold text-slate-500 ml-2 truncate flex-1">${esc(sys.domain)}</span>
            <span class="inline-flex items-center gap-1 text-[10px] font-mono font-extrabold text-teal flex-shrink-0">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 live-pulse-dot"></span>
              ${esc(sys.status)}
            </span>
          </div>

          <!-- Crisp 3D Logo Stage -->
          <div class="web-logo-stage mb-4">
            <img src="${esc(sys.logo)}" alt="${esc(sys.name)}" class="${logoClass} no-download">
            <div class="img-shield"></div>
          </div>

          <div class="mb-3">
            <span class="text-[10.5px] font-mono font-extrabold text-teal uppercase tracking-wider">${esc(sys.category)}</span>
            <h4 class="text-lg font-black text-navy mt-0.5">${esc(sys.name)}</h4>
            <div class="text-[11.5px] text-slate-500 font-semibold">${esc(sys.type)}</div>
          </div>

          <p class="text-xs text-slate-600 leading-relaxed mb-4">${esc(sys.desc)}</p>
        </div>

        <div class="z-layer-1">
          <div class="flex flex-wrap gap-1.5 mb-4">${tagsHtml}</div>
          ${ctaHtml}
        </div>
      </div>
    `;
  }

  function closeWebFolder() {
    activeWebFolder = null;
    webFolders.forEach(btn => {
      btn.classList.remove('is-open');
      btn.setAttribute('aria-expanded', 'false');
      const cue = btn.querySelector('.folder-cue-text');
      if (cue) cue.textContent = 'Klik untuk buka folder';
    });
    if (webVault) {
      webVault.classList.remove('is-open');
    }
    if (typeof ScrollTrigger !== 'undefined') setTimeout(() => ScrollTrigger.refresh(), 180);
  }

  function openWebFolder(folderKey, shouldScroll = true) {
    if (!webVault || !webVaultGrid) return;

    // Toggle closed if clicking the already open folder
    if (activeWebFolder === folderKey && shouldScroll) {
      closeWebFolder();
      return;
    }

    activeWebFolder = folderKey;
    const meta = DATA.websiteFolders[folderKey] || { name: 'Website & Sistem', sub: '' };
    const items = folderKey === 'semua'
      ? DATA.websites
      : DATA.websites.filter(s => s.folder === folderKey);

    webFolders.forEach(btn => {
      const match = btn.dataset.webFolder === folderKey;
      btn.classList.toggle('is-open', match);
      btn.setAttribute('aria-expanded', match ? 'true' : 'false');
      const cue = btn.querySelector('.folder-cue-text');
      if (cue) cue.textContent = match ? 'Folder terbuka' : 'Klik untuk buka folder';
    });

    if (webVaultTitle) webVaultTitle.textContent = meta.name;
    if (webVaultCount) webVaultCount.textContent = `${items.length} Website`;
    if (webVaultSub) webVaultSub.textContent = meta.sub;

    webVaultGrid.innerHTML = items.map(renderWebCard).join('');
    webVault.classList.add('is-open');

    bind3DTilt(webVaultGrid);

    if (typeof gsap !== 'undefined') {
      gsap.fromTo(webVault,
        { opacity: 0, y: 24, rotationX: 8, scale: 0.97 },
        { opacity: 1, y: 0, rotationX: 0, scale: 1, duration: 0.52, ease: 'power3.out', clearProps: 'transform' }
      );
      gsap.fromTo(webVaultGrid.querySelectorAll('.web-vault-item'),
        { opacity: 0, y: 42, rotationX: 18, scale: 0.9 },
        { opacity: 1, y: 0, rotationX: 0, scale: 1, duration: 0.65, ease: 'back.out(1.2)', stagger: 0.08, delay: 0.08, clearProps: 'transform' }
      );
    }

    if (shouldScroll) {
      setTimeout(() => smoothScrollTo(webVault, -100), 120);
    }
    if (typeof ScrollTrigger !== 'undefined') setTimeout(() => ScrollTrigger.refresh(), 300);
  }

  webFolders.forEach(btn => {
    btn.addEventListener('click', () => openWebFolder(btn.dataset.webFolder, true));
  });
  webVaultClose?.addEventListener('click', closeWebFolder);

  // Hero Quick-Open Website Folder Button
  document.querySelectorAll('[data-quick-open-web]').forEach(btn => {
    btn.addEventListener('click', () => {
      const key = btn.dataset.quickOpenWeb || 'semua';
      activeWebFolder = null;
      openWebFolder(key, false);
      smoothScrollTo(document.getElementById('proyek'), -85);
    });
  });

  // ── 9. 3D FOLDER ENGINE B — SERTIFIKAT & SK RESMI (#sertifikat) ──────────
  const certFolders = document.querySelectorAll('[data-cert-folder]');
  const certVault = document.getElementById('cert-vault');
  const certVaultTitle = document.getElementById('cert-vault-title');
  const certVaultCount = document.getElementById('cert-vault-count');
  const certVaultSub = document.getElementById('cert-vault-sub');
  const certVaultGrid = document.getElementById('cert-vault-grid');
  const certVaultEmpty = document.getElementById('cert-vault-empty');
  const certVaultSearch = document.getElementById('cert-vault-search');
  const certVaultClose = document.getElementById('cert-vault-close');

  let activeCertFolder = null;
  let currentCertList = [];

  function renderCertCard(cert, index) {
    const pagesCount = Array.isArray(cert.pages) && cert.pages.length > 1 ? cert.pages.length : 0;
    const pagePill = pagesCount
      ? `<span class="text-[10px] font-mono font-extrabold px-2 py-0.5 rounded-full bg-rose-600 text-white shadow">${pagesCount} Hal.</span>`
      : '';

    return `
      <div class="card-3d cursor-pointer group cert-card-item flex flex-col justify-between"
           data-tilt-3d data-tilt-max="8"
           data-cert-index="${index}">
        <div class="card-glare"></div>

        <div>
          <!-- Protected Certificate Thumbnail -->
          <div class="relative aspect-[16/10] rounded-t-[21px] overflow-hidden bg-slate-100 border-b border-slate-200">
            <img src="${esc(cert.img)}"
                 alt="${esc(cert.title)}"
                 class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-105 no-download"
                 loading="lazy">
            <div class="img-shield"></div>

            <div class="absolute top-2.5 left-2.5 flex items-center gap-1.5 z-10">
              <span class="text-[10px] font-mono font-extrabold px-2 py-0.5 rounded-full bg-navy/90 text-white shadow-sm">${esc(cert.year || '')}</span>
              ${pagePill}
            </div>

            <div class="absolute top-2.5 right-2.5 z-10">
              <span class="text-[10px] font-mono font-extrabold px-2.5 py-0.5 rounded-full bg-white/95 text-navy border border-slate-200 shadow-sm">
                ${esc(cert.category)}
              </span>
            </div>

            <div class="absolute inset-0 bg-navy/35 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center z-10 pointer-events-none">
              <span class="btn-3d-primary text-xs px-3.5 py-1.5 rounded-xl">Buka Pratinjau 3D</span>
            </div>
          </div>

          <!-- Metadata -->
          <div class="p-4 sm:p-5 z-layer-1">
            <h4 class="font-black text-navy text-sm group-hover:text-teal transition-colors line-clamp-2 leading-snug">
              ${esc(cert.title)}
            </h4>
            <div class="text-[11.5px] text-slate-500 font-mono mt-1.5 line-clamp-1">
              Penerbit: <strong class="text-slate-700">${esc(cert.issuer)}</strong>
            </div>
            <p class="text-xs text-slate-500 mt-2 line-clamp-2 leading-relaxed">
              ${esc(cert.desc)}
            </p>
          </div>
        </div>

        <div class="px-4 sm:px-5 pb-4 pt-1 flex items-center justify-between z-layer-1">
          <span class="text-[11px] font-extrabold text-teal flex items-center gap-1 group-hover:underline">
            <span>${pagesCount ? 'Lihat SK Multi-Halaman' : 'Klik untuk melihat berkas'}</span>
            <span>&rarr;</span>
          </span>
        </div>
      </div>
    `;
  }

  function paintCertGrid(list, animateCards = true) {
    if (!certVaultGrid) return;
    currentCertList = list;

    if (!list.length) {
      certVaultGrid.innerHTML = '';
      certVaultEmpty?.classList.remove('hidden');
      if (certVaultCount) certVaultCount.textContent = '0 Berkas';
      return;
    }

    certVaultEmpty?.classList.add('hidden');
    if (certVaultCount) certVaultCount.textContent = `${list.length} Berkas`;
    certVaultGrid.innerHTML = list.map((c, idx) => renderCertCard(c, idx)).join('');

    // Click handlers for Lightbox
    certVaultGrid.querySelectorAll('.cert-card-item').forEach(card => {
      card.addEventListener('click', () => {
        const idx = parseInt(card.dataset.certIndex, 10);
        openLightboxGallery(currentCertList, idx);
      });
    });

    bind3DTilt(certVaultGrid);

    if (animateCards && typeof gsap !== 'undefined') {
      const cards = certVaultGrid.querySelectorAll('.cert-card-item');
      gsap.fromTo(cards,
        { opacity: 0, y: 38, rotationX: 16, scale: 0.92 },
        { opacity: 1, y: 0, rotationX: 0, scale: 1, duration: 0.55, ease: 'power3.out', stagger: { each: 0.03, from: 'start', amount: 0.45 }, clearProps: 'transform' }
      );
    }

    if (typeof ScrollTrigger !== 'undefined') setTimeout(() => ScrollTrigger.refresh(), 280);
  }

  function closeCertFolder() {
    activeCertFolder = null;
    certFolders.forEach(btn => {
      btn.classList.remove('is-open');
      btn.setAttribute('aria-expanded', 'false');
      const cue = btn.querySelector('.folder-cue-text');
      if (cue) cue.textContent = 'Klik untuk buka folder';
    });
    if (certVault) certVault.classList.remove('is-open');
    if (certVaultSearch) certVaultSearch.value = '';
    if (typeof ScrollTrigger !== 'undefined') setTimeout(() => ScrollTrigger.refresh(), 180);
  }

  function getCertsForFolder(folderKey, query = '') {
    let base = folderKey === 'semua'
      ? DATA.certificates
      : DATA.certificates.filter(c => c.folder === folderKey);

    const q = query.trim().toLowerCase();
    if (q) {
      base = base.filter(c =>
        (c.title || '').toLowerCase().includes(q) ||
        (c.issuer || '').toLowerCase().includes(q) ||
        (c.category || '').toLowerCase().includes(q) ||
        (c.year || '').toLowerCase().includes(q) ||
        (c.desc || '').toLowerCase().includes(q)
      );
    }
    return base;
  }

  function openCertFolder(folderKey, shouldScroll = true) {
    if (!certVault || !certVaultGrid) return;

    if (activeCertFolder === folderKey && shouldScroll) {
      closeCertFolder();
      return;
    }

    activeCertFolder = folderKey;
    const meta = DATA.certFolders[folderKey] || { name: 'Arsip Sertifikat', sub: '' };

    certFolders.forEach(btn => {
      const match = btn.dataset.certFolder === folderKey;
      btn.classList.toggle('is-open', match);
      btn.setAttribute('aria-expanded', match ? 'true' : 'false');
      const cue = btn.querySelector('.folder-cue-text');
      if (cue) cue.textContent = match ? 'Folder terbuka' : 'Klik untuk buka folder';
    });

    if (certVaultSearch) certVaultSearch.value = '';
    if (certVaultTitle) certVaultTitle.textContent = meta.name;
    if (certVaultSub) certVaultSub.textContent = meta.sub;

    certVault.classList.add('is-open');
    const items = getCertsForFolder(folderKey);
    paintCertGrid(items, true);

    if (typeof gsap !== 'undefined') {
      gsap.fromTo(certVault,
        { opacity: 0, y: 24, rotationX: 7, scale: 0.98 },
        { opacity: 1, y: 0, rotationX: 0, scale: 1, duration: 0.5, ease: 'power3.out', clearProps: 'transform' }
      );
    }

    if (shouldScroll) {
      setTimeout(() => smoothScrollTo(certVault, -100), 120);
    }
  }

  certFolders.forEach(btn => {
    btn.addEventListener('click', () => openCertFolder(btn.dataset.certFolder, true));
  });
  certVaultClose?.addEventListener('click', closeCertFolder);

  certVaultSearch?.addEventListener('input', (e) => {
    if (!activeCertFolder) return;
    paintCertGrid(getCertsForFolder(activeCertFolder, e.target.value), false);
  });

  // Hero Quick-Open Certificate Folder Button
  document.querySelectorAll('[data-quick-open-cert]').forEach(btn => {
    btn.addEventListener('click', () => {
      const key = btn.dataset.quickOpenCert || 'semua';
      activeCertFolder = null;
      openCertFolder(key, false);
      smoothScrollTo(document.getElementById('sertifikat'), -85);
    });
  });

  // ── 10. 3D MULTI-PAGE & GALLERY LIGHTBOX MODAL ───────────────────────────
  const lbOverlay = document.getElementById('lightbox-overlay');
  const lbClose = document.getElementById('lightbox-close');
  const lbCategory = document.getElementById('lb-category');
  const lbCounter = document.getElementById('lb-counter');
  const lbTitle = document.getElementById('lb-title');
  const lbImg = document.getElementById('lb-img');
  const lbIssuer = document.getElementById('lb-issuer');
  const lbDesc = document.getElementById('lb-desc');
  const lbPagesBar = document.getElementById('lb-pages-bar');
  const lbPagesButtons = document.getElementById('lb-pages-buttons');
  const lbPrev = document.getElementById('lb-prev');
  const lbNext = document.getElementById('lb-next');

  let lbList = [];
  let lbIdx = 0;

  function showLightboxItem(item, listLen = 1, curIdx = 0) {
    if (!item || !lbOverlay) return;
    if (lbCategory) lbCategory.textContent = item.category || 'Dokumen';
    if (lbTitle) lbTitle.textContent = item.title || '';
    if (lbIssuer) lbIssuer.textContent = item.issuer || '';
    if (lbDesc) lbDesc.textContent = item.desc || '';
    if (lbCounter) lbCounter.textContent = listLen > 1 ? `${curIdx + 1} / ${listLen}` : '';

    const pages = Array.isArray(item.pages) && item.pages.length > 1 ? item.pages : null;
    if (lbImg) lbImg.src = pages ? pages[0] : (item.img || '');

    // Multi-page switcher for Official SKs
    if (pages && lbPagesBar && lbPagesButtons) {
      lbPagesBar.classList.remove('hidden');
      lbPagesButtons.innerHTML = pages.map((src, pIdx) => `
        <button type="button" class="lb-page-btn ${pIdx === 0 ? 'active' : ''}" data-lb-page="${pIdx}">
          Halaman ${pIdx + 1}
        </button>
      `).join('');

      lbPagesButtons.querySelectorAll('[data-lb-page]').forEach(pBtn => {
        pBtn.addEventListener('click', () => {
          const pi = parseInt(pBtn.dataset.lbPage, 10);
          if (lbImg) lbImg.src = pages[pi];
          lbPagesButtons.querySelectorAll('[data-lb-page]').forEach(b => b.classList.remove('active'));
          pBtn.classList.add('active');
        });
      });
    } else {
      lbPagesBar?.classList.add('hidden');
    }

    // Prev / Next arrows
    lbPrev?.classList.toggle('hidden', listLen <= 1);
    lbNext?.classList.toggle('hidden', listLen <= 1);

    lbOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';
    lenis?.stop();
  }

  function openLightboxGallery(list, index) {
    lbList = list || [];
    lbIdx = Math.max(0, Math.min(index, lbList.length - 1));
    showLightboxItem(lbList[lbIdx], lbList.length, lbIdx);
  }

  function closeLightbox() {
    lbOverlay?.classList.remove('active');
    document.body.style.overflow = '';
    lenis?.start();
  }

  lbPrev?.addEventListener('click', () => {
    if (lbList.length <= 1) return;
    lbIdx = (lbIdx - 1 + lbList.length) % lbList.length;
    showLightboxItem(lbList[lbIdx], lbList.length, lbIdx);
  });

  lbNext?.addEventListener('click', () => {
    if (lbList.length <= 1) return;
    lbIdx = (lbIdx + 1) % lbList.length;
    showLightboxItem(lbList[lbIdx], lbList.length, lbIdx);
  });

  lbClose?.addEventListener('click', closeLightbox);
  lbOverlay?.addEventListener('click', (e) => {
    if (e.target === lbOverlay) closeLightbox();
  });

  // Direct "Lihat SK Resmi" buttons inside Organisasi cards
  document.querySelectorAll('[data-sk-open]').forEach(btn => {
    btn.addEventListener('click', () => {
      let pages = [];
      try { pages = JSON.parse(btn.dataset.pages || '[]'); } catch (e) {}
      openLightboxGallery([{
        category: btn.dataset.category || 'SK Resmi Organisasi',
        title: btn.dataset.title || '',
        issuer: btn.dataset.issuer || '',
        desc: btn.dataset.desc || '',
        img: btn.dataset.img || '',
        pages
      }], 0);
    });
  });

  // Keyboard navigation in Lightbox
  document.addEventListener('keydown', (e) => {
    if (!lbOverlay?.classList.contains('active')) return;
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowRight') lbNext?.click();
    if (e.key === 'ArrowLeft') lbPrev?.click();
  });

  // ── 11. COPY TO CLIPBOARD + TOAST ────────────────────────────────────────
  const toast = document.getElementById('toast');
  let toastTimer = null;
  function showToast(msg) {
    if (!toast) return;
    toast.textContent = msg;
    toast.classList.add('show');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => toast.classList.remove('show'), 2600);
  }

  document.querySelectorAll('[data-copy]').forEach(btn => {
    btn.addEventListener('click', async () => {
      const val = btn.dataset.copy;
      if (!val) return;
      try {
        await navigator.clipboard.writeText(val);
        showToast(`Disalin: ${val}`);
      } catch (err) {
        const tmp = document.createElement('textarea');
        tmp.value = val;
        document.body.appendChild(tmp);
        tmp.select();
        document.execCommand('copy');
        document.body.removeChild(tmp);
        showToast(`Disalin: ${val}`);
      }
    });
  });

  // ── 12. INTERACTIVE SPATIAL GLOWING CURSOR (DESKTOP) ─────────────────────
  if (!isTouch) {
    const cursor = document.createElement('div');
    cursor.className = 'spatial-cursor';
    const dot = document.createElement('div');
    dot.className = 'spatial-cursor-dot';
    document.body.appendChild(cursor);
    document.body.appendChild(dot);

    let cx = -100, cy = -100, tx = -100, ty = -100;
    window.addEventListener('mousemove', (e) => {
      tx = e.clientX;
      ty = e.clientY;
      dot.style.left = `${tx}px`;
      dot.style.top = `${ty}px`;
      const overInteractive = e.target.closest('a, button, .folder-3d, .cert-card-item, [data-tilt-3d]');
      cursor.classList.toggle('hovering', Boolean(overInteractive));
    }, { passive: true });

    const trackCursor = () => {
      cx += (tx - cx) * 0.16;
      cy += (ty - cy) * 0.16;
      cursor.style.left = `${cx}px`;
      cursor.style.top = `${cy}px`;
      requestAnimationFrame(trackCursor);
    };
    trackCursor();
  }

  // ── 13. STRICT MULTI-LAYER ANTI-DOWNLOAD SECURITY ────────────────────────
  document.addEventListener('contextmenu', (e) => {
    if (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA') return;
    e.preventDefault();
    showToast('Konten & gambar dilindungi hak cipta (Anti-Download)');
  });

  document.addEventListener('dragstart', (e) => {
    if (e.target.tagName === 'IMG' || e.target.closest('.no-download, .img-shield, .cert-card-item, .folder-3d-sheet')) {
      e.preventDefault();
    }
  });

  document.addEventListener('keydown', (e) => {
    const inInput = document.activeElement && (document.activeElement.tagName === 'INPUT' || document.activeElement.tagName === 'TEXTAREA');
    if (inInput) return;

    const key = (e.key || '').toLowerCase();
    if (
      (e.ctrlKey && (key === 's' || key === 'u' || key === 'p')) ||
      (e.ctrlKey && e.shiftKey && (key === 'i' || key === 'j' || key === 'c')) ||
      e.key === 'F12'
    ) {
      e.preventDefault();
      showToast('Aksi dinonaktifkan — Proteksi Dokumen Aktif');
    }
  });

  document.addEventListener('keyup', (e) => {
    if (e.key === 'PrintScreen') {
      navigator.clipboard?.writeText('').catch(() => {});
      showToast('Tangkapan layar terdeteksi — Dokumen dilindungi');
    }
  });
});
