import './bootstrap';

// Simple Delete Confirmation Modal - Ultra Simple Version

const modalHTML = `
<div id="deleteModal" class="delete-modal">
    <div class="delete-modal-content">
        <div class="delete-modal-icon">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
        </div>
        <h3 class="delete-modal-title">Konfirmasi Hapus</h3>
        <p class="delete-modal-message" id="deleteModalMessage">Yakin ingin menghapus data ini?</p>
        <div class="delete-modal-buttons">
            <button id="deleteModalCancel" class="delete-modal-btn delete-modal-btn-cancel">
                <svg style="width: 1.25rem; height: 1.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                Batal
            </button>
            <button id="deleteModalConfirm" class="delete-modal-btn delete-modal-btn-confirm">
                <svg style="width: 1.25rem; height: 1.25rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
                Ya, Hapus
            </button>
        </div>
    </div>
</div>
`;

document.addEventListener('DOMContentLoaded', function() {
    // Add modal to body
    if (!document.getElementById('deleteModal')) {
        document.body.insertAdjacentHTML('beforeend', modalHTML);
    }
    
    const modal = document.getElementById('deleteModal');
    const messageEl = document.getElementById('deleteModalMessage');
    const cancelBtn = document.getElementById('deleteModalCancel');
    const confirmBtn = document.getElementById('deleteModalConfirm');
    
    let pendingButton = null;
    
    function hideModal() {
        modal.classList.remove('show');
        pendingButton = null;
    }
    
    function showModal(message, button) {
        messageEl.textContent = message;
        pendingButton = button;
        modal.classList.add('show');
    }
    
    // Cancel
    cancelBtn.addEventListener('click', hideModal);
    
    // Confirm - trigger original button click
    confirmBtn.addEventListener('click', function() {
        if (pendingButton) {
            const confirmMsg = pendingButton.getAttribute('wire:confirm');
            pendingButton.removeAttribute('wire:confirm');
            pendingButton.click();
            setTimeout(() => {
                if (confirmMsg) {
                    pendingButton.setAttribute('wire:confirm', confirmMsg);
                }
            }, 500);
        }
        hideModal();
    });
    
    // Click outside
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            hideModal();
        }
    });
    
    // ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('show')) {
            hideModal();
        }
    });
    
    // Intercept delete buttons
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('[wire\\:click*="delete"][wire\\:confirm]');
        if (btn) {
            const confirmMsg = btn.getAttribute('wire:confirm');
            if (confirmMsg) {
                e.preventDefault();
                e.stopPropagation();
                e.stopImmediatePropagation();
                showModal(confirmMsg, btn);
            }
        }
    }, true);
});

// Web3 Welcome Page Animations
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add floating particles effect
    function createParticle() {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.left = Math.random() * 100 + '%';
        particle.style.animationDuration = (Math.random() * 3 + 7) + 's';
        particle.style.animationDelay = Math.random() * 5 + 's';
        
        document.body.appendChild(particle);
        
        setTimeout(() => {
            particle.remove();
        }, 15000);
    }

    // Create particles periodically
    if (window.location.pathname === '/' || window.location.pathname === '/welcome') {
        setInterval(createParticle, 2000);
    }

    // Intersection Observer for fade-in animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observe all glass cards and feature sections
    document.querySelectorAll('.glass-card, section').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
});