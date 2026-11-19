/**
 * Woosung Remicon — app.js
 * Vanilla JS: nav, lang, forms, scroll, filters, admin
 */
(function () {
  'use strict';

  /* ── Helpers ─────────────────────────────── */
  const $ = (sel, ctx = document) => ctx.querySelector(sel);
  const $$ = (sel, ctx = document) => [...ctx.querySelectorAll(sel)];

  /* ── DOM ready ───────────────────────────── */
  document.addEventListener('DOMContentLoaded', () => {
    initNavbar();
    initMobileNav();
    initLangSwitcher();
    initSmoothScroll();
    initAlertDismiss();
    initFormValidation();
    initProductFilter();
    initDeleteConfirm();
    initAdminSidebar();
    initSticky();
    initScrollReveal();
  });

  /* ── Sticky Navbar ───────────────────────── */
  function initSticky() {
    const navbar = $('.navbar');
    if (!navbar) return;
    const onScroll = () => {
      navbar.classList.toggle('scrolled', window.scrollY > 10);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  }

  /* ── Mobile Nav Toggle ───────────────────── */
  function initNavbar() {
    const toggler = $('#navToggler');
    const closeBtn = $('#navMobileClose');
    const overlay = $('#navMobile');
    if (!toggler || !overlay) return;

    const open = () => {
      overlay.classList.add('open');
      document.body.style.overflow = 'hidden';
      toggler.setAttribute('aria-expanded', 'true');
    };
    const close = () => {
      overlay.classList.remove('open');
      document.body.style.overflow = '';
      toggler.setAttribute('aria-expanded', 'false');
    };

    toggler.addEventListener('click', () => {
      overlay.classList.contains('open') ? close() : open();
    });
    if (closeBtn) closeBtn.addEventListener('click', close);
    overlay.addEventListener('click', e => {
      if (e.target === overlay) close();
    });
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape') close();
    });
  }

  function initMobileNav() {
    // Mark active nav link
    const path = window.location.pathname;
    $$('.nav-link').forEach(link => {
      const href = link.getAttribute('href');
      if (href && href !== '/' && path.startsWith(href)) {
        link.classList.add('active');
      } else if (href === '/' && path === '/') {
        link.classList.add('active');
      }
    });
  }

  /* ── Language Switcher ───────────────────── */
  function initLangSwitcher() {
    $$('.lang-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const locale = btn.dataset.locale;
        if (!locale) return;
        // Build URL with locale switch
        const url = new URL(window.location.href);
        url.searchParams.set('lang', locale);
        window.location.href = url.toString();
      });
    });
  }

  /* ── Smooth Scroll ───────────────────────── */
  function initSmoothScroll() {
    $$('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', e => {
        const id = anchor.getAttribute('href').slice(1);
        if (!id) return;
        const target = document.getElementById(id);
        if (!target) return;
        e.preventDefault();
        const offset = parseInt(getComputedStyle(document.documentElement)
          .getPropertyValue('--navbar-h')) || 68;
        const top = target.getBoundingClientRect().top + window.scrollY - offset - 16;
        window.scrollTo({ top, behavior: 'smooth' });
      });
    });
  }

  /* ── Alert Auto-Dismiss ──────────────────── */
  function initAlertDismiss() {
    // Close button
    $$('.alert-close').forEach(btn => {
      btn.addEventListener('click', () => dismissAlert(btn.closest('.alert')));
    });
    // Auto-dismiss success alerts after 5 seconds
    $$('.alert-success, .alert-info').forEach(alert => {
      setTimeout(() => dismissAlert(alert), 5000);
    });
  }

  function dismissAlert(el) {
    if (!el) return;
    el.style.transition = 'opacity 0.35s, transform 0.35s, margin 0.35s, padding 0.35s, max-height 0.35s';
    el.style.opacity = '0';
    el.style.transform = 'translateY(-8px)';
    el.style.overflow = 'hidden';
    el.style.maxHeight = el.offsetHeight + 'px';
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        el.style.maxHeight = '0';
        el.style.marginBottom = '0';
        el.style.paddingTop = '0';
        el.style.paddingBottom = '0';
      });
    });
    setTimeout(() => el.remove(), 400);
  }

  /* ── Form Validation Feedback ────────────── */
  function initFormValidation() {
    $$('form[data-validate]').forEach(form => {
      form.addEventListener('submit', e => {
        let valid = true;
        $$('[required]', form).forEach(field => {
          const ok = validateField(field);
          if (!ok) valid = false;
        });
        if (!valid) {
          e.preventDefault();
          const first = $('[required].is-invalid', form);
          if (first) first.focus();
        }
      });

      $$('[required]', form).forEach(field => {
        field.addEventListener('blur', () => validateField(field));
        field.addEventListener('input', () => {
          if (field.classList.contains('is-invalid')) validateField(field);
        });
      });
    });

    // Privacy checkbox (special case)
    const privacyCheckbox = $('#privacy_consent');
    if (privacyCheckbox) {
      privacyCheckbox.closest('form')?.addEventListener('submit', e => {
        if (!privacyCheckbox.checked) {
          e.preventDefault();
          showFieldError(privacyCheckbox, privacyCheckbox.dataset.errorMsg || '개인정보 처리방침에 동의해 주세요.');
        }
      });
    }
  }

  function validateField(field) {
    const value = field.value.trim();
    let errorMsg = '';

    if (!value && field.required) {
      errorMsg = field.dataset.errorRequired || '필수 항목입니다.';
    } else if (field.type === 'email' && value) {
      if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
        errorMsg = '올바른 이메일 주소를 입력해 주세요.';
      }
    } else if (field.type === 'tel' && value) {
      if (!/^[\d\-+\s()]{7,20}$/.test(value)) {
        errorMsg = '올바른 전화번호를 입력해 주세요.';
      }
    }

    if (errorMsg) {
      showFieldError(field, errorMsg);
      return false;
    } else {
      clearFieldError(field);
      return true;
    }
  }

  function showFieldError(field, msg) {
    field.classList.add('is-invalid');
    field.classList.remove('is-valid');
    let errEl = field.parentElement.querySelector('.invalid-feedback');
    if (!errEl) {
      errEl = document.createElement('div');
      errEl.className = 'invalid-feedback';
      field.parentElement.appendChild(errEl);
    }
    errEl.textContent = msg;
  }

  function clearFieldError(field) {
    field.classList.remove('is-invalid');
    field.classList.add('is-valid');
    const errEl = field.parentElement.querySelector('.invalid-feedback');
    if (errEl) errEl.remove();
  }

  /* ── Product Category Filter ─────────────── */
  function initProductFilter() {
    const tabs = $$('.filter-tab');
    const cards = $$('.product-card-wrap');
    if (!tabs.length || !cards.length) return;

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        // Update active tab
        tabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');

        const filter = tab.dataset.filter || 'all';

        cards.forEach(card => {
          const category = card.dataset.category || '';
          const show = filter === 'all' || category === filter;
          card.style.display = show ? '' : 'none';
          if (show) {
            card.style.animation = 'fadeIn 0.35s ease both';
          }
        });

        // Show empty state if no visible cards
        const grid = $('#productGrid');
        if (grid) {
          const visible = cards.filter(c => c.style.display !== 'none');
          let emptyState = $('#productEmpty');
          if (visible.length === 0) {
            if (!emptyState) {
              emptyState = document.createElement('div');
              emptyState.id = 'productEmpty';
              emptyState.className = 'text-center py-8 text-gray';
              emptyState.style.gridColumn = '1 / -1';
              emptyState.textContent = '해당 카테고리의 제품이 없습니다.';
              grid.appendChild(emptyState);
            }
          } else if (emptyState) {
            emptyState.remove();
          }
        }
      });
    });
  }

  /* ── Admin: Confirm Delete ───────────────── */
  function initDeleteConfirm() {
    $$('[data-confirm-delete]').forEach(btn => {
      btn.addEventListener('click', e => {
        const msg = btn.dataset.confirmDelete || '정말 삭제하시겠습니까? 이 작업은 되돌릴 수 없습니다.';
        if (!window.confirm(msg)) {
          e.preventDefault();
          return;
        }
        // If it's a link that wraps a form, submit the adjacent form
        const formId = btn.dataset.formId;
        if (formId) {
          e.preventDefault();
          const form = document.getElementById(formId);
          if (form) form.submit();
        }
      });
    });

    // Delete forms with hidden method
    $$('form[data-confirm]').forEach(form => {
      form.addEventListener('submit', e => {
        const msg = form.dataset.confirm;
        if (!window.confirm(msg)) e.preventDefault();
      });
    });
  }

  /* ── Admin Sidebar Toggle ────────────────── */
  function initAdminSidebar() {
    const toggler = $('#adminSidebarToggler');
    const sidebar = $('#adminSidebar');
    const overlay = $('#adminOverlay');
    if (!toggler || !sidebar) return;

    const open = () => {
      sidebar.classList.add('open');
      if (overlay) overlay.style.display = 'block';
      document.body.style.overflow = 'hidden';
    };
    const close = () => {
      sidebar.classList.remove('open');
      if (overlay) overlay.style.display = 'none';
      document.body.style.overflow = '';
    };

    toggler.addEventListener('click', () => {
      sidebar.classList.contains('open') ? close() : open();
    });
    if (overlay) overlay.addEventListener('click', close);
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape') close();
    });

    // Mark active sidebar item
    const path = window.location.pathname;
    $$('.admin-nav-item').forEach(item => {
      const href = item.getAttribute('href');
      if (href && path.startsWith(href) && href !== '/') {
        item.classList.add('active');
      }
    });
  }

  /* ── Scroll Reveal ───────────────────────── */
  function initScrollReveal() {
    if (!('IntersectionObserver' in window)) return;

    const els = $$('[data-reveal]');
    if (!els.length) return;

    const obs = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('animate-fade-in-up');
          obs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });

    els.forEach(el => {
      el.style.opacity = '0';
      obs.observe(el);
    });
  }

  /* ── Character counter for textareas ─────── */
  $$('textarea[data-maxlength]').forEach(area => {
    const max = parseInt(area.dataset.maxlength);
    if (!max) return;
    const counter = document.createElement('div');
    counter.className = 'form-hint text-right';
    counter.style.marginTop = '0.25rem';
    area.parentElement.appendChild(counter);
    const update = () => {
      const remaining = max - area.value.length;
      counter.textContent = `${area.value.length} / ${max}`;
      counter.style.color = remaining < 20 ? 'var(--red)' : 'var(--gray-400)';
    };
    area.addEventListener('input', update);
    update();
  });

  /* ── Image preview on file input ─────────── */
  $$('input[type="file"][data-preview]').forEach(input => {
    const previewId = input.dataset.preview;
    const preview = document.getElementById(previewId);
    if (!preview) return;
    input.addEventListener('change', () => {
      const file = input.files[0];
      if (!file || !file.type.startsWith('image/')) return;
      const reader = new FileReader();
      reader.onload = e => {
        preview.src = e.target.result;
        preview.style.display = 'block';
      };
      reader.readAsDataURL(file);
    });
  });

  /* ── Toggle (available/unavailable) ─────── */
  $$('[data-toggle-available]').forEach(toggle => {
    toggle.addEventListener('change', function () {
      const form = this.closest('form') || document.getElementById(this.dataset.formId);
      if (form) form.submit();
    });
  });

  /* ── Tabs (admin tabbed forms) ───────────── */
  $$('[data-tab-trigger]').forEach(trigger => {
    trigger.addEventListener('click', () => {
      const group = trigger.closest('[data-tab-group]');
      if (!group) return;
      const target = trigger.dataset.tabTrigger;

      $$('[data-tab-trigger]', group).forEach(t => t.classList.remove('active'));
      $$('[data-tab-panel]', group).forEach(p => p.classList.add('hidden'));

      trigger.classList.add('active');
      const panel = $(`[data-tab-panel="${target}"]`, group);
      if (panel) panel.classList.remove('hidden');
    });
  });

  /* ── Copy to clipboard ───────────────────── */
  $$('[data-copy]').forEach(btn => {
    btn.addEventListener('click', () => {
      const text = btn.dataset.copy;
      if (!text) return;
      navigator.clipboard.writeText(text).then(() => {
        const original = btn.textContent;
        btn.textContent = '복사됨 ✓';
        setTimeout(() => { btn.textContent = original; }, 2000);
      });
    });
  });

  /* ── Back button ─────────────────────────── */
  $$('[data-back]').forEach(btn => {
    btn.addEventListener('click', () => window.history.back());
  });

})();
