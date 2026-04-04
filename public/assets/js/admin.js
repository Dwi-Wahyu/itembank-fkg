(function(){
  // MOBILE slide-in
  const mobBtn   = document.getElementById('btnSidebarMobile') || document.getElementById('btnSidebar');
  const sidebar  = document.getElementById('sidebar');
  const backdrop = document.getElementById('backdrop');

  function setMobileOpen(on){
    if (!sidebar) return;
    sidebar.classList.toggle('open', !!on);
    if (backdrop) backdrop.classList.toggle('show', !!on);
    document.body.classList.toggle('sidebar-open', !!on);
  }

  if (mobBtn && sidebar){
    mobBtn.addEventListener('click', (e)=>{ e.stopPropagation(); setMobileOpen(!sidebar.classList.contains('open')); });
    document.addEventListener('click', (e)=>{
      if (!sidebar.classList.contains('open')) return;
      const inside = sidebar.contains(e.target) || (mobBtn && mobBtn.contains(e.target));
      if (!inside) setMobileOpen(false);
    });
    if (backdrop) backdrop.addEventListener('click', ()=> setMobileOpen(false));
    window.addEventListener('resize', ()=> { if (window.innerWidth >= 992) setMobileOpen(false); });
  }

  // DESKTOP mini (ikon)
  const miniBtn = document.getElementById('btnSidebarMini');
  const toggleIcon = document.getElementById('toggleIcon');
  
  const applyMini = on => { 
    document.body.classList.toggle('app-mini', !!on); 
    localStorage.setItem('app-mini', on ? '1' : '0');
    
    // Update icon: closed (mini) -> chevron-right, open -> chevron-left
    if (toggleIcon) {
      if (on) {
        toggleIcon.classList.remove('bi-chevron-double-left');
        toggleIcon.classList.add('bi-chevron-double-right');
      } else {
        toggleIcon.classList.remove('bi-chevron-double-right');
        toggleIcon.classList.add('bi-chevron-double-left');
      }
    }
  };

  if (miniBtn) {
    miniBtn.addEventListener('click', ()=> applyMini(!document.body.classList.contains('app-mini')));
  }

  // Auto expand when clicking links in mini mode
  if (sidebar) {
    sidebar.addEventListener('click', (e) => {
      const isMini = document.body.classList.contains('app-mini');
      const isDesktop = window.innerWidth >= 992;
      
      if (isMini && isDesktop) {
        const menuItem = e.target.closest('.menu-item');
        // Don't auto-expand if clicking the toggle button itself (already handled)
        if (menuItem && !menuItem.closest('.sidebar-footer')) {
          applyMini(false);
          
          if (menuItem.classList.contains('menu-parent')) {
            const targetId = menuItem.getAttribute('href');
            const targetEl = document.querySelector(targetId);
            if (targetEl && !targetEl.classList.contains('show')) {
               const bsCollapse = bootstrap.Collapse.getInstance(targetEl) || new bootstrap.Collapse(targetEl);
               bsCollapse.show();
            }
          }
        }
      }
    });
  }

  // Initialize from localStorage
  if (localStorage.getItem('app-mini') === '1') {
    applyMini(true);
  } else {
    applyMini(false);
  }
})();
