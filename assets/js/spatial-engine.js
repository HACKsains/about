/**
 * ═══════════════════════════════════════════════════════════════════════════
 *  ILMUNA DIGITAL — 5-ENGINE 3D SPATIAL MOTION SUITE v5.0
 *  File: assets/js/spatial-engine.js
 *  Orchestrated Engines (Zero-Collision Architecture):
 *   1. Lenis 1.1.18        — Inertial momentum scroll + velocity feed
 *   2. Three.js WebGL      — Real 3D sculptural geometry + depth starfield
 *   3. GSAP + ScrollTrigger— Bidirectional 3D scroll reveals (Down & Up) + parallax
 *   4. Motion v12          — Real spring() physics gestures, modals, inView & scroll
 *   5. Anime.js v3.2.2     — Kinetic 3D split-text, elastic grid staggers & SVG draw
 *   + Interactive 3D Physical Folder Vaults (Websites & 68 Certificates/SK)
 *   + Multi-Page Official SK Lightbox + Strict Anti-Download Security
 * ═══════════════════════════════════════════════════════════════════════════
 */

document.addEventListener('DOMContentLoaded', () => {
  const isTouch = window.matchMedia('(hover: none) and (pointer: coarse)').matches;
  const DATA = window.PORTFOLIO_DATA || { websites: [], websiteFolders: {}, certificates: [], certFolders: {} };

  const hasGSAP   = typeof gsap !== 'undefined';
  const hasST     = hasGSAP && typeof ScrollTrigger !== 'undefined';
  const hasLenis  = typeof Lenis !== 'undefined';
  const hasMotion = typeof Motion !== 'undefined' && typeof Motion.animate === 'function';
  const hasAnime  = typeof anime !== 'undefined';

  // Helper: Safe HTML Escape
  const esc = (str) => String(str ?? '')
    .replace(/&/g, '&amp;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&#39;');

  // ── 1. LENIS + GSAP TICKER & SCROLLTRIGGER COUPLING ──────────────────────
  if (hasST) {
    gsap.registerPlugin(ScrollTrigger);
  }

  let lenis = null;
  let scrollVelocity = 0;

  if (hasLenis) {
    lenis = new Lenis({
      duration: 1.25,
      easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
      orientation: 'vertical',
      smoothWheel: true,
      wheelMultiplier: 1.08,
      touchMultiplier: 1.65,
    });
    window.lenis = lenis;

    lenis.on('scroll', (e) => {
      scrollVelocity = Math.max(-45, Math.min(45, (e && typeof e.velocity === 'number') ? e.velocity * 2.2 : 0));
      if (hasST) ScrollTrigger.update();
    });

    if (hasGSAP) {
      gsap.ticker.add((time) => lenis.raf(time * 1000));
      gsap.ticker.lagSmoothing(0);
    } else {
      const raf = (time) => {
        lenis.raf(time);
        requestAnimationFrame(raf);
      };
      requestAnimationFrame(raf);
    }
  } else {
    let lastScrollPos = window.scrollY;
    window.addEventListener('scroll', () => {
      const cur = window.scrollY;
      scrollVelocity = Math.max(-40, Math.min(40, cur - lastScrollPos));
      lastScrollPos = cur;
    }, { passive: true });
  }

  const smoothScrollTo = (el, offset = -90) => {
    if (!el) return;
    if (lenis) {
      lenis.scrollTo(el, { offset, duration: 1.15 });
    } else {
      const y = el.getBoundingClientRect().top + window.scrollY + offset;
      window.scrollTo({ top: y, behavior: 'smooth' });
    }
  };

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
  function initThreeSpatialScene() {
    const canvas = document.getElementById('three-spatial-canvas');
    if (!canvas) return;

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

    scene.add(new THREE.AmbientLight(0xffffff, 0.92));

    const dirLight1 = new THREE.DirectionalLight(0x52B2DC, 1.35);
    dirLight1.position.set(8, 10, 10);
    scene.add(dirLight1);

    const dirLight2 = new THREE.DirectionalLight(0x0D7A87, 1.0);
    dirLight2.position.set(-10, -6, 8);
    scene.add(dirLight2);

    const worldGroup = new THREE.Group();
    scene.add(worldGroup);

    const matTealGlass = new THREE.MeshPhysicalMaterial({
      color: 0x0D7A87, roughness: 0.22, metalness: 0.15, transparent: true, opacity: 0.14, flatShading: true
    });
    const matSkyGlass = new THREE.MeshPhysicalMaterial({
      color: 0x52B2DC, roughness: 0.2, metalness: 0.1, transparent: true, opacity: 0.16, flatShading: true
    });
    const matWireNavy = new THREE.MeshBasicMaterial({ color: 0x1D3B5E, wireframe: true, transparent: true, opacity: 0.16 });
    const matWireTeal = new THREE.MeshBasicMaterial({ color: 0x0D7A87, wireframe: true, transparent: true, opacity: 0.2 });
    const matWireSky  = new THREE.MeshBasicMaterial({ color: 0x52B2DC, wireframe: true, transparent: true, opacity: 0.22 });

    const floaters = [];

    const icoGroup = new THREE.Group();
    icoGroup.add(new THREE.Mesh(new THREE.IcosahedronGeometry(2.4, 0), matTealGlass));
    icoGroup.add(new THREE.Mesh(new THREE.IcosahedronGeometry(2.45, 0), matWireTeal));
    icoGroup.position.set(6.8, 2.2, -3.5);
    worldGroup.add(icoGroup);
    floaters.push({ mesh: icoGroup, baseY: 2.2, rx: 0.004, ry: 0.006, amp: 0.55, speed: 0.9, phase: 0 });

    const knotGroup = new THREE.Group();
    knotGroup.add(new THREE.Mesh(new THREE.TorusKnotGeometry(1.75, 0.42, 72, 12), matSkyGlass));
    knotGroup.add(new THREE.Mesh(new THREE.TorusKnotGeometry(1.78, 0.43, 48, 8), matWireSky));
    knotGroup.position.set(-7.4, -1.6, -5.0);
    worldGroup.add(knotGroup);
    floaters.push({ mesh: knotGroup, baseY: -1.6, rx: 0.003, ry: -0.005, amp: 0.65, speed: 0.75, phase: 1.5 });

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
        mesh: g, baseY: cfg.pos[1],
        rx: 0.004 + (i % 3) * 0.0015,
        ry: 0.005 + ((i + 1) % 3) * 0.0015,
        amp: 0.45 + (i % 2) * 0.2,
        speed: 0.8 + i * 0.1,
        phase: i * 1.1
      });
    });

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
    const starfield = new THREE.Points(pGeo, new THREE.PointsMaterial({
      size: 0.14, vertexColors: true, transparent: true, opacity: 0.55
    }));
    worldGroup.add(starfield);

    let mouseX = 0, mouseY = 0, smoothMX = 0, smoothMY = 0;
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
    function animateThree() {
      requestAnimationFrame(animateThree);
      const t = clock.getElapsedTime();
      const maxScroll = Math.max(1, document.documentElement.scrollHeight - window.innerHeight);
      const scrollRatio = window.scrollY / maxScroll;

      smoothMX += (mouseX - smoothMX) * 0.05;
      smoothMY += (mouseY - smoothMY) * 0.05;
      scrollVelocity *= 0.92;

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
    animateThree();
  }
  initThreeSpatialScene();

  // ── 3. ANIME.JS — KINETIC 3D SPLIT-TEXT HERO, COUNTERS & SVG STROKE DRAW ─
  function initAnimeHeroSuite() {
    if (!hasAnime) return;

    // A. Split Hero H1 ("Syahriel" + "Andika") into 3D kinetic letters
    const heroH1 = document.querySelector('#profil h1');
    if (heroH1 && !heroH1.dataset.splitDone) {
      heroH1.dataset.splitDone = '1';
      const splitNodeText = (node) => {
        if (node.nodeType === Node.TEXT_NODE) {
          const text = node.textContent;
          if (!text.trim()) return;
          const frag = document.createDocumentFragment();
          for (const ch of text) {
            if (ch === ' ') {
              frag.appendChild(document.createTextNode(' '));
            } else {
              const span = document.createElement('span');
              span.className = 'kinetic-char';
              span.textContent = ch;
              frag.appendChild(span);
            }
          }
          node.replaceWith(frag);
        } else if (node.nodeType === Node.ELEMENT_NODE && node.tagName !== 'BR') {
          Array.from(node.childNodes).forEach(splitNodeText);
        }
      };
      Array.from(heroH1.childNodes).forEach(splitNodeText);
    }

    // B. Master Anime.js Elastic Hero Timeline
    const tl = anime.timeline({ autoplay: true });

    tl.add({
      targets: '#profil .section-pill-3d',
      translateY: [-22, 0],
      scale: [0.88, 1],
      opacity: [0, 1],
      duration: 680,
      easing: 'easeOutElastic(1, .7)'
    })
    .add({
      targets: '#profil .kinetic-char',
      translateY: [48, 0],
      rotateX: [-85, 0],
      scale: [0.75, 1],
      opacity: [0, 1],
      duration: 920,
      delay: anime.stagger(44),
      easing: 'easeOutElastic(1, .65)',
      complete: (anim) => {
        anim.animatables.forEach(a => { a.target.style.transform = ''; });
      }
    }, '-=460')
    .add({
      targets: '#profil p',
      translateY: [26, 0],
      opacity: [0, 1],
      duration: 680,
      easing: 'easeOutCubic'
    }, '-=620')
    .add({
      targets: '#profil .stat-cube-3d',
      translateY: [40, 0],
      rotateX: [24, 0],
      scale: [0.82, 1],
      opacity: [0, 1],
      duration: 850,
      delay: anime.stagger(75),
      easing: 'easeOutElastic(1, .68)',
      complete: (anim) => {
        anim.animatables.forEach(a => { a.target.style.transform = ''; });
      }
    }, '-=480')
    .add({
      targets: '#profil [data-quick-open-web], #profil [data-quick-open-cert]',
      translateY: [24, 0],
      opacity: [0, 1],
      duration: 640,
      delay: anime.stagger(90),
      easing: 'easeOutBack',
      complete: (anim) => {
        anim.animatables.forEach(a => { a.target.style.transform = ''; });
      }
    }, '-=580');

    // C. Anime.js Elastic Number Roll-Up Counters
    document.querySelectorAll('[data-counter]').forEach((el, idx) => {
      const targetVal = parseInt(el.dataset.counter, 10) || 0;
      const obj = { count: 0 };
      anime({
        targets: obj,
        count: targetVal,
        round: 1,
        duration: 1550,
        delay: 260 + idx * 110,
        easing: 'easeOutExpo',
        update: () => { el.textContent = obj.count; }
      });
    });

    // D. Anime.js Hero Portrait 3D Dramatic Arrival
    anime({
      targets: '.hero-3d-stage',
      translateY: [55, 0],
      rotateY: [-18, 0],
      scale: [0.9, 1],
      opacity: [0, 1],
      duration: 1150,
      delay: 180,
      easing: 'easeOutExpo',
      complete: () => {
        const stage = document.querySelector('.hero-3d-stage');
        if (stage) stage.style.transform = '';
      }
    });

    // E. Anime.js SVG Line-Drawing on Section Pill & Skill Icons
    const drawablePaths = document.querySelectorAll('.section-pill-3d svg path, #cv-ringkasan svg path');
    if (drawablePaths.length) {
      anime({
        targets: drawablePaths,
        strokeDashoffset: [anime.setDashoffset, 0],
        easing: 'easeInOutSine',
        duration: 1200,
        delay: anime.stagger(80, { start: 350 })
      });
    }
  }
  initAnimeHeroSuite();

  // ── 4. MOTION v12 — REAL SPRING PHYSICS GESTURES, INVIEW & SCROLL ────────
  function bindMotionSpringGestures(root = document) {
    if (!hasMotion) return;

    // A. Spring Hover & Tactile Press on 3D Push Buttons
    root.querySelectorAll('.btn-3d-primary, .btn-3d-white').forEach(btn => {
      if (btn.dataset.motionBound === '1') return;
      btn.dataset.motionBound = '1';

      if (!isTouch && typeof Motion.hover === 'function') {
        Motion.hover(btn, () => {
          Motion.animate(btn, { scale: 1.035, y: -2 }, { type: 'spring', stiffness: 440, damping: 18 });
          return () => {
            Motion.animate(btn, { scale: 1, y: 0 }, { type: 'spring', stiffness: 380, damping: 22 });
          };
        });
      }

      if (typeof Motion.press === 'function') {
        Motion.press(btn, () => {
          Motion.animate(btn, { scale: 0.955, y: 2 }, { type: 'spring', stiffness: 600, damping: 24 });
          return () => {
            Motion.animate(btn, { scale: 1, y: 0 }, { type: 'spring', stiffness: 420, damping: 16 });
          };
        });
      }
    });

    // B. Spring Bounce on Logo Emblems & Stat Cubes
    if (!isTouch && typeof Motion.hover === 'function') {
      root.querySelectorAll('.logo-emblem, .stat-cube-3d, .mobile-dock-btn').forEach(el => {
        if (el.dataset.motionHover === '1') return;
        el.dataset.motionHover = '1';
        Motion.hover(el, () => {
          Motion.animate(el, { scale: 1.07, y: -4 }, { type: 'spring', stiffness: 400, damping: 16 });
          return () => {
            Motion.animate(el, { scale: 1, y: 0 }, { type: 'spring', stiffness: 320, damping: 20 });
          };
        });
      });
    }
  }

  function initMotionScrollAndInView() {
    if (!hasMotion) return;

    bindMotionSpringGestures(document);

    // C. Motion.inView — Bouncy Spring Pop on Kaderisasi 3D Timeline Nodes
    if (typeof Motion.inView === 'function') {
      Motion.inView('.kader-node-dot', (element) => {
        Motion.animate(
          element,
          { scale: [0.2, 1.32, 1], opacity: [0, 1] },
          { type: 'spring', stiffness: 380, damping: 14 }
        );
        return () => {
          Motion.animate(element, { scale: 0.5, opacity: 0.4 }, { duration: 0.25 });
        };
      });

      // D. Motion.inView — Section Pills Spring Entrance
      Motion.inView('.section-pill-3d', (element) => {
        if (element.closest('#profil')) return;
        Motion.animate(
          element,
          { scale: [0.85, 1.04, 1], y: [14, 0], opacity: [0, 1] },
          { type: 'spring', stiffness: 340, damping: 18 }
        );
      });
    }

    // E. Motion.scroll — Smooth Scroll-Linked Orbit Ring Rotation & Progress Scale
    if (typeof Motion.scroll === 'function') {
      const orbit2 = document.querySelector('.hero-orbit-ring-2');
      if (orbit2) {
        Motion.scroll(
          Motion.animate(orbit2, { rotate: [0, 48], scale: [1, 1.12] }),
          { target: document.getElementById('profil') || document.body, offset: ['start start', 'end start'] }
        );
      }

      const brandAvatar = document.querySelector('.navbar-3d a img');
      if (brandAvatar) {
        Motion.scroll(
          Motion.animate(brandAvatar, { scale: [1, 1.08, 1] })
        );
      }
    }
  }
  initMotionScrollAndInView();

  // ── 5. TRUE MULTI-LAYER 3D CURSOR TILT ENGINE ([data-tilt-3d]) ───────────
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

  // ── 6. TOP PROGRESS BAR, NAVBAR STATE & ACTIVE SECTION TRACKER ───────────
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

  // ── 7. MOBILE HAMBURGER DRAWER (WITH MOTION SPRING) ──────────────────────
  const mobileToggle = document.getElementById('mobile-menu-toggle');
  const mobileDrawer = document.getElementById('mobile-drawer');
  const hamburgerIcon = document.getElementById('hamburger-icon');
  const closeIcon = document.getElementById('close-icon');

  const setDrawer = (open) => {
    mobileDrawer?.classList.toggle('hidden', !open);
    hamburgerIcon?.classList.toggle('hidden', open);
    closeIcon?.classList.toggle('hidden', !open);
    if (open && mobileDrawer && hasMotion) {
      Motion.animate(mobileDrawer, { opacity: [0, 1], y: [-12, 0] }, { type: 'spring', stiffness: 360, damping: 24 });
    }
  };

  mobileToggle?.addEventListener('click', () => setDrawer(mobileDrawer?.classList.contains('hidden')));
  document.querySelectorAll('.mobile-nav-link').forEach(link => {
    link.addEventListener('click', () => setDrawer(false));
  });

  // ── 8. GSAP + SCROLLTRIGGER — BIDIRECTIONAL 3D SCROLL REVEALS (DOWN & UP) ─
  if (hasST) {
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

    // Scrubbed 3D Parallax on Hero Portrait Stage
    gsap.to('.hero-3d-stage', {
      scrollTrigger: { trigger: '#profil', start: 'top top', end: 'bottom top', scrub: 1.2 },
      y: 72,
      rotationX: 6,
      ease: 'none'
    });
  }

  // Subtle Anime.js tactile ripple on 3D Folder hover count badge
  if (hasAnime && !isTouch) {
    document.querySelectorAll('.folder-3d').forEach(folder => {
      folder.addEventListener('mouseenter', () => {
        const pill = folder.querySelector('.folder-count-pill');
        if (pill) {
          anime.remove(pill);
          anime({ targets: pill, scale: [1, 1.14, 1], duration: 480, easing: 'easeOutElastic(1, .6)' });
        }
      });
    });
  }

  // Helper: Animate Vault Open with Motion Spring + Anime.js 3D Grid Stagger
  function animateVaultOpen(vaultEl, cardSelector) {
    if (hasMotion && vaultEl) {
      Motion.animate(
        vaultEl,
        { opacity: [0, 1], y: [28, 0], scale: [0.96, 1] },
        { type: 'spring', stiffness: 280, damping: 24 }
      );
    } else if (hasGSAP && vaultEl) {
      gsap.fromTo(vaultEl, { opacity: 0, y: 24, scale: 0.97 }, { opacity: 1, y: 0, scale: 1, duration: 0.45, clearProps: 'transform' });
    }

    const cards = vaultEl ? vaultEl.querySelectorAll(cardSelector) : [];
    if (!cards.length) return;

    if (hasAnime) {
      const cols = window.innerWidth >= 1024 ? 3 : (window.innerWidth >= 640 ? 2 : 1);
      const rows = Math.max(1, Math.ceil(cards.length / cols));
      anime.remove(cards);
      anime({
        targets: cards,
        translateY: [48, 0],
        rotateX: [22, 0],
        scale: [0.88, 1],
        opacity: [0, 1],
        duration: 720,
        delay: anime.stagger(Math.min(55, Math.max(22, 420 / cards.length)), { grid: [cols, rows], from: 'first' }),
        easing: 'easeOutElastic(1, .75)',
        complete: () => {
          cards.forEach(c => { c.style.transform = ''; });
        }
      });
    } else if (hasGSAP) {
      gsap.fromTo(cards,
        { opacity: 0, y: 38, rotationX: 16, scale: 0.92 },
        { opacity: 1, y: 0, rotationX: 0, scale: 1, duration: 0.55, ease: 'power3.out', stagger: 0.04, clearProps: 'transform' }
      );
    }
  }

  // ── 9. 3D FOLDER ENGINE A — WEBSITE & SISTEM (#proyek) ───────────────────
  const webFolders    = document.querySelectorAll('[data-web-folder]');
  const webVault      = document.getElementById('web-vault');
  const webVaultTitle = document.getElementById('web-vault-title');
  const webVaultCount = document.getElementById('web-vault-count');
  const webVaultSub   = document.getElementById('web-vault-sub');
  const webVaultGrid  = document.getElementById('web-vault-grid');
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
    if (webVault) webVault.classList.remove('is-open');
    if (hasST) setTimeout(() => ScrollTrigger.refresh(), 180);
  }

  function openWebFolder(folderKey, shouldScroll = true) {
    if (!webVault || !webVaultGrid) return;
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
    if (webVaultSub)   webVaultSub.textContent   = meta.sub;

    webVaultGrid.innerHTML = items.map(renderWebCard).join('');
    webVault.classList.add('is-open');

    bind3DTilt(webVaultGrid);
    bindMotionSpringGestures(webVaultGrid);
    animateVaultOpen(webVault, '.web-vault-item');

    if (shouldScroll) setTimeout(() => smoothScrollTo(webVault, -100), 120);
    if (hasST) setTimeout(() => ScrollTrigger.refresh(), 320);
  }

  webFolders.forEach(btn => {
    btn.addEventListener('click', () => openWebFolder(btn.dataset.webFolder, true));
  });
  webVaultClose?.addEventListener('click', closeWebFolder);

  document.querySelectorAll('[data-quick-open-web]').forEach(btn => {
    btn.addEventListener('click', () => {
      activeWebFolder = null;
      openWebFolder(btn.dataset.quickOpenWeb || 'semua', false);
      smoothScrollTo(document.getElementById('proyek'), -85);
    });
  });

  // ── 10. 3D FOLDER ENGINE B — SERTIFIKAT & SK RESMI (#sertifikat) ─────────
  const certFolders     = document.querySelectorAll('[data-cert-folder]');
  const certVault       = document.getElementById('cert-vault');
  const certVaultTitle  = document.getElementById('cert-vault-title');
  const certVaultCount  = document.getElementById('cert-vault-count');
  const certVaultSub    = document.getElementById('cert-vault-sub');
  const certVaultGrid   = document.getElementById('cert-vault-grid');
  const certVaultEmpty  = document.getElementById('cert-vault-empty');
  const certVaultSearch = document.getElementById('cert-vault-search');
  const certVaultClose  = document.getElementById('cert-vault-close');

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

    certVaultGrid.querySelectorAll('.cert-card-item').forEach(card => {
      card.addEventListener('click', () => {
        openLightboxGallery(currentCertList, parseInt(card.dataset.certIndex, 10));
      });
    });

    bind3DTilt(certVaultGrid);
    if (animateCards) {
      animateVaultOpen(certVault, '.cert-card-item');
    }
    if (hasST) setTimeout(() => ScrollTrigger.refresh(), 300);
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
    if (hasST) setTimeout(() => ScrollTrigger.refresh(), 180);
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
    if (certVaultTitle)  certVaultTitle.textContent = meta.name;
    if (certVaultSub)    certVaultSub.textContent   = meta.sub;

    certVault.classList.add('is-open');
    paintCertGrid(getCertsForFolder(folderKey), true);

    if (shouldScroll) setTimeout(() => smoothScrollTo(certVault, -100), 120);
  }

  certFolders.forEach(btn => {
    btn.addEventListener('click', () => openCertFolder(btn.dataset.certFolder, true));
  });
  certVaultClose?.addEventListener('click', closeCertFolder);

  certVaultSearch?.addEventListener('input', (e) => {
    if (!activeCertFolder) return;
    paintCertGrid(getCertsForFolder(activeCertFolder, e.target.value), false);
  });

  document.querySelectorAll('[data-quick-open-cert]').forEach(btn => {
    btn.addEventListener('click', () => {
      activeCertFolder = null;
      openCertFolder(btn.dataset.quickOpenCert || 'semua', false);
      smoothScrollTo(document.getElementById('sertifikat'), -85);
    });
  });

  // ── 11. 3D MULTI-PAGE & GALLERY LIGHTBOX (WITH MOTION SPRING PHYSICS) ────
  const lbOverlay      = document.getElementById('lightbox-overlay');
  const lbCard         = lbOverlay?.querySelector('.lightbox-card');
  const lbClose        = document.getElementById('lightbox-close');
  const lbCategory     = document.getElementById('lb-category');
  const lbCounter      = document.getElementById('lb-counter');
  const lbTitle        = document.getElementById('lb-title');
  const lbImg          = document.getElementById('lb-img');
  const lbIssuer       = document.getElementById('lb-issuer');
  const lbDesc         = document.getElementById('lb-desc');
  const lbPagesBar     = document.getElementById('lb-pages-bar');
  const lbPagesButtons = document.getElementById('lb-pages-buttons');
  const lbPrev         = document.getElementById('lb-prev');
  const lbNext         = document.getElementById('lb-next');

  let lbList = [];
  let lbIdx = 0;

  function showLightboxItem(item, listLen = 1, curIdx = 0) {
    if (!item || !lbOverlay) return;
    if (lbCategory) lbCategory.textContent = item.category || 'Dokumen';
    if (lbTitle)    lbTitle.textContent    = item.title || '';
    if (lbIssuer)   lbIssuer.textContent   = item.issuer || '';
    if (lbDesc)     lbDesc.textContent     = item.desc || '';
    if (lbCounter)  lbCounter.textContent  = listLen > 1 ? `${curIdx + 1} / ${listLen}` : '';

    const pages = Array.isArray(item.pages) && item.pages.length > 1 ? item.pages : null;
    if (lbImg) {
      lbImg.src = pages ? pages[0] : (item.img || '');
      if (hasMotion) {
        Motion.animate(lbImg, { opacity: [0.25, 1], scale: [0.96, 1] }, { type: 'spring', stiffness: 320, damping: 24 });
      }
    }

    if (pages && lbPagesBar && lbPagesButtons) {
      const pLabel = item.pageLabel || 'Halaman';
      lbPagesBar.classList.remove('hidden');
      lbPagesButtons.innerHTML = pages.map((src, pIdx) => `
        <button type="button" class="lb-page-btn ${pIdx === 0 ? 'active' : ''}" data-lb-page="${pIdx}">
          ${esc(pLabel)} ${pIdx + 1}
        </button>
      `).join('');

      lbPagesButtons.querySelectorAll('[data-lb-page]').forEach(pBtn => {
        pBtn.addEventListener('click', () => {
          const pi = parseInt(pBtn.dataset.lbPage, 10);
          if (lbImg) {
            lbImg.src = pages[pi];
            if (hasMotion) {
              Motion.animate(lbImg, { opacity: [0.2, 1], scale: [0.97, 1] }, { type: 'spring', stiffness: 340, damping: 25 });
            }
          }
          lbPagesButtons.querySelectorAll('[data-lb-page]').forEach(b => b.classList.remove('active'));
          pBtn.classList.add('active');
        });
      });
    } else {
      lbPagesBar?.classList.add('hidden');
    }

    lbPrev?.classList.toggle('hidden', listLen <= 1);
    lbNext?.classList.toggle('hidden', listLen <= 1);

    const wasClosed = !lbOverlay.classList.contains('active');
    lbOverlay.classList.add('active');
    document.body.style.overflow = 'hidden';
    lenis?.stop();

    if (wasClosed && lbCard && hasMotion) {
      Motion.animate(lbCard, { scale: [0.88, 1], y: [26, 0], opacity: [0, 1] }, { type: 'spring', stiffness: 340, damping: 24 });
    }
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

  document.querySelectorAll('[data-sk-open]').forEach(btn => {
    btn.addEventListener('click', () => {
      let pages = [];
      try { pages = JSON.parse(btn.dataset.pages || '[]'); } catch (e) {}
      openLightboxGallery([{
        category:  btn.dataset.category || 'SK Resmi Organisasi',
        pageLabel: btn.dataset.pageLabel || 'Halaman',
        title:     btn.dataset.title || '',
        issuer:   btn.dataset.issuer || '',
        desc:     btn.dataset.desc || '',
        img:      btn.dataset.img || '',
        pages
      }], 0);
    });
  });

  document.addEventListener('keydown', (e) => {
    if (!lbOverlay?.classList.contains('active')) return;
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowRight') lbNext?.click();
    if (e.key === 'ArrowLeft') lbPrev?.click();
  });

  // ── 12. COPY TO CLIPBOARD + MOTION SPRING TOAST ──────────────────────────
  const toast = document.getElementById('toast');
  let toastTimer = null;
  function showToast(msg) {
    if (!toast) return;
    toast.textContent = msg;
    toast.classList.add('show');
    if (hasMotion) {
      Motion.animate(toast, { y: [42, 0], scale: [0.9, 1], opacity: [0, 1] }, { type: 'spring', stiffness: 420, damping: 22 });
    }
    clearTimeout(toastTimer);
    toastTimer = setTimeout(() => {
      if (hasMotion) {
        Motion.animate(toast, { y: 48, scale: 0.92, opacity: 0 }, { duration: 0.28 }).finished.then(() => {
          toast.classList.remove('show');
        });
      } else {
        toast.classList.remove('show');
      }
    }, 2600);
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

  // ── 13. SPATIAL GLOWING CURSOR RING (DESKTOP) ────────────────────────────
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
      dot.style.top  = `${ty}px`;
      const overInteractive = e.target.closest('a, button, .folder-3d, .cert-card-item, [data-tilt-3d]');
      cursor.classList.toggle('hovering', Boolean(overInteractive));
    }, { passive: true });

    const trackCursor = () => {
      cx += (tx - cx) * 0.16;
      cy += (ty - cy) * 0.16;
      cursor.style.left = `${cx}px`;
      cursor.style.top  = `${cy}px`;
      requestAnimationFrame(trackCursor);
    };
    trackCursor();
  }

  // ── 14. STRICT MULTI-LAYER ANTI-DOWNLOAD SECURITY ────────────────────────
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
