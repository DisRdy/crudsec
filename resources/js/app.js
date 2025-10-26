import './bootstrap';

// Simple Delete Confirmation Modal

// Create modal HTML
// Simple Delete Confirmation Modal

// Create modal HTML
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

// Add modal to body when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    
    const modal = document.getElementById('deleteModal');
    const messageEl = document.getElementById('deleteModalMessage');
    const cancelBtn = document.getElementById('deleteModalCancel');
    const confirmBtn = document.getElementById('deleteModalConfirm');
    
    let deleteCallback = null;
    
    // Show modal function
    window.showDeleteModal = function(message, callback) {
        messageEl.textContent = message;
        deleteCallback = callback;
        modal.classList.add('show');
    };
    
    // Hide modal function
    function hideModal() {
        modal.classList.remove('show');
        deleteCallback = null;
    }
    
    // Cancel button
    cancelBtn.addEventListener('click', hideModal);
    
    // Confirm button
    confirmBtn.addEventListener('click', function() {
        if (deleteCallback) {
            deleteCallback();
        }
        hideModal();
    });
    
    // Click outside to close
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            hideModal();
        }
    });
    
    // ESC key to close
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('show')) {
            hideModal();
        }
    });
    
    // Intercept delete buttons
    document.addEventListener('click', function(e) {
        const btn = e.target.closest('[wire\\:confirm]');
        if (btn && btn.getAttribute('wire:click')?.includes('delete')) {
            e.preventDefault();
            e.stopPropagation();
            
            const message = btn.getAttribute('wire:confirm');
            const wireClick = btn.getAttribute('wire:click');
            
            showDeleteModal(message, function() {
                // Get Livewire component and call delete directly
                const wireId = btn.closest('[wire\\:id]')?.getAttribute('wire:id');
                const wireClick = btn.getAttribute('wire:click');
                
                // Parse wire:click to get method and params
                const match = wireClick.match(/(\w+)\((.+)\)/);
                if (match && window.Livewire) {
                    const method = match[1];
                    const params = match[2].split(',').map(p => {
                        const trimmed = p.trim();
                        return isNaN(trimmed) ? trimmed : Number(trimmed);
                    });
                    
                    // Call Livewire component directly
                    if (wireId) {
                        window.Livewire.find(wireId).call(method, ...params);
                    }
                }
            });
        }
    }, true);
});