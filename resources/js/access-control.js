// Access Control Components JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all access control components
    initializeAccessControlComponents();
    
    // Set up event listeners
    setupEventListeners();
    
    // Load user preferences
    loadUserPreferences();
});

function initializeAccessControlComponents() {
    // Initialize Tom Select elements
    initializeTomSelect();
    
    // Initialize date pickers
    initializeDatePickers();
    
    // Initialize tooltips
    initializeTooltips();
    
    // Initialize form validation
    initializeFormValidation();
    
    // Initialize bulk actions
    initializeBulkActions();
    
    // Initialize view toggles
    initializeViewToggles();
}

function initializeTomSelect() {
    if (typeof TomSelect !== 'undefined') {
        document.querySelectorAll('.tom-select').forEach(element => {
            if (!element.tomselect) {
                new TomSelect(element, {
                    plugins: ['dropdown_input'],
                    allowEmptyOption: true,
                    placeholder: element.dataset.placeholder || 'Select...',
                    maxOptions: 1000,
                    onInitialize: function() {
                        // Add loading indicator
                        this.control.classList.add('tom-select-initialized');
                    }
                });
            }
        });
    }
}

function initializeDatePickers() {
    // Initialize date pickers for date inputs
    document.querySelectorAll('input[type="date"]').forEach(input => {
        // Add date picker functionality if needed
        input.addEventListener('focus', function() {
            this.showPicker();
        });
    });
}

function initializeTooltips() {
    // Initialize tooltips for help text
    document.querySelectorAll('[data-tooltip]').forEach(element => {
        element.addEventListener('mouseenter', function() {
            showTooltip(this);
        });
        
        element.addEventListener('mouseleave', function() {
            hideTooltip(this);
        });
    });
}

function initializeFormValidation() {
    // Add real-time validation to forms
    document.querySelectorAll('.form-validate').forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validateForm(this)) {
                e.preventDefault();
                return false;
            }
        });
        
        // Add real-time validation
        form.querySelectorAll('input, select, textarea').forEach(field => {
            field.addEventListener('blur', function() {
                validateField(this);
            });
            
            field.addEventListener('input', function() {
                clearFieldError(this);
            });
        });
    });
}

function initializeBulkActions() {
    // Handle select all checkbox
    const selectAllCheckbox = document.getElementById('selectAll');
    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.item-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateBulkActions();
        });
    }
    
    // Handle individual checkboxes
    document.querySelectorAll('.item-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateBulkActions();
            updateSelectAll();
        });
    });
}

function initializeViewToggles() {
    // Handle view toggle buttons
    document.querySelectorAll('.view-toggle-btn').forEach(button => {
        button.addEventListener('click', function() {
            const view = this.dataset.view;
            changeView(view);
        });
    });
}

function setupEventListeners() {
    // Handle form submissions
    document.addEventListener('submit', function(e) {
        if (e.target.classList.contains('ajax-form')) {
            e.preventDefault();
            submitFormAjax(e.target);
        }
    });
    
    // Handle modal events
    document.addEventListener('show.bs.modal', function(e) {
        if (e.target.id.includes('modal')) {
            // Focus first input in modal
            const firstInput = e.target.querySelector('input, select, textarea');
            if (firstInput) {
                setTimeout(() => firstInput.focus(), 100);
            }
        }
    });
    
    // Handle dropdown events
    document.addEventListener('click', function(e) {
        // Close dropdowns when clicking outside
        if (!e.target.closest('.dropdown')) {
            document.querySelectorAll('.dropdown.show').forEach(dropdown => {
                dropdown.classList.remove('show');
            });
        }
    });
    
    // Handle search functionality
    const searchInput = document.querySelector('input[name="search"]');
    if (searchInput) {
        let searchTimeout;
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                performSearch(this.value);
            }, 500);
        });
    }
}

function loadUserPreferences() {
    // Load saved view preference
    const savedView = localStorage.getItem('accessControlView');
    if (savedView) {
        changeView(savedView, false);
    }
    
    // Load saved filters
    const savedFilters = localStorage.getItem('accessControlFilters');
    if (savedFilters) {
        applySavedFilters(JSON.parse(savedFilters));
    }
    
    // Load column preferences
    const savedColumns = localStorage.getItem('accessControlColumns');
    if (savedColumns) {
        applyColumnPreferences(JSON.parse(savedColumns));
    }
}

function validateForm(form) {
    let isValid = true;
    const requiredFields = form.querySelectorAll('[required]');
    
    requiredFields.forEach(field => {
        if (!validateField(field)) {
            isValid = false;
        }
    });
    
    return isValid;
}

function validateField(field) {
    const value = field.value.trim();
    const required = field.hasAttribute('required');
    const type = field.type;
    
    // Clear previous errors
    clearFieldError(field);
    
    if (required && !value) {
        showFieldError(field, 'This field is required');
        return false;
    }
    
    // Type-specific validation
    switch (type) {
        case 'email':
            if (value && !isValidEmail(value)) {
                showFieldError(field, 'Please enter a valid email address');
                return false;
            }
            break;
        case 'url':
            if (value && !isValidUrl(value)) {
                showFieldError(field, 'Please enter a valid URL');
                return false;
            }
            break;
        case 'number':
            if (value && isNaN(value)) {
                showFieldError(field, 'Please enter a valid number');
                return false;
            }
            break;
    }
    
    // Custom validation patterns
    const pattern = field.getAttribute('pattern');
    if (pattern && value && !new RegExp(pattern).test(value)) {
        showFieldError(field, 'Please enter a valid value');
        return false;
    }
    
    field.classList.add('is-valid');
    return true;
}

function showFieldError(field, message) {
    field.classList.add('is-invalid');
    field.classList.remove('is-valid');
    
    // Remove existing error message
    const existingError = field.parentNode.querySelector('.invalid-feedback');
    if (existingError) {
        existingError.remove();
    }
    
    // Add error message
    const errorDiv = document.createElement('div');
    errorDiv.className = 'invalid-feedback';
    errorDiv.textContent = message;
    field.parentNode.appendChild(errorDiv);
    
    // Add ARIA attributes for accessibility
    field.setAttribute('aria-describedby', 'error-' + field.id);
    field.setAttribute('aria-invalid', 'true');
}

function clearFieldError(field) {
    field.classList.remove('is-invalid');
    const errorDiv = field.parentNode.querySelector('.invalid-feedback');
    if (errorDiv) {
        errorDiv.remove();
    }
    field.removeAttribute('aria-describedby');
    field.removeAttribute('aria-invalid');
}

function isValidEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function isValidUrl(url) {
    try {
        new URL(url);
        return true;
    } catch {
        return false;
    }
}

function updateBulkActions() {
    const selectedItems = document.querySelectorAll('.item-checkbox:checked');
    const bulkActionsContainer = document.querySelector('.bulk-actions-container');
    
    if (bulkActionsContainer) {
        if (selectedItems.length > 0) {
            bulkActionsContainer.classList.remove('hidden');
            const countElement = bulkActionsContainer.querySelector('.selected-count');
            if (countElement) {
                countElement.textContent = selectedItems.length;
            }
        } else {
            bulkActionsContainer.classList.add('hidden');
        }
    }
}

function updateSelectAll() {
    const selectAllCheckbox = document.getElementById('selectAll');
    const allCheckboxes = document.querySelectorAll('.item-checkbox');
    const checkedCheckboxes = document.querySelectorAll('.item-checkbox:checked');
    
    if (selectAllCheckbox) {
        if (checkedCheckboxes.length === allCheckboxes.length && allCheckboxes.length > 0) {
            selectAllCheckbox.checked = true;
            selectAllCheckbox.indeterminate = false;
        } else if (checkedCheckboxes.length > 0) {
            selectAllCheckbox.checked = false;
            selectAllCheckbox.indeterminate = true;
        } else {
            selectAllCheckbox.checked = false;
            selectAllCheckbox.indeterminate = false;
        }
    }
}

function changeView(view, savePreference = true) {
    // Update UI
    document.querySelectorAll('.view-toggle-btn').forEach(btn => {
        btn.classList.remove('active', 'bg-primary', 'text-white');
        btn.classList.add('bg-white', 'text-slate-600');
    });
    
    const activeButton = document.querySelector(`[data-view="${view}"]`);
    if (activeButton) {
        activeButton.classList.add('active', 'bg-primary', 'text-white');
        activeButton.classList.remove('bg-white', 'text-slate-600');
    }
    
    // Update content display
    const container = document.getElementById('itemsContainer');
    if (container) {
        container.className = getViewClass(view);
    }
    
    // Save preference
    if (savePreference) {
        localStorage.setItem('accessControlView', view);
        // Trigger custom event
        window.dispatchEvent(new CustomEvent('viewChanged', { detail: { view } }));
    }
}

function getViewClass(view) {
    switch (view) {
        case 'grid':
            return 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6';
        case 'list':
            return 'space-y-4';
        default: // table
            return 'overflow-x-auto';
    }
}

function performSearch(query) {
    // Implement search functionality
    if (query.length > 2) {
        // Add search to URL parameters
        const url = new URL(window.location);
        url.searchParams.set('search', query);
        window.history.replaceState({}, '', url);
        
        // Trigger search
        const searchEvent = new CustomEvent('searchPerformed', { detail: { query } });
        window.dispatchEvent(searchEvent);
    } else if (query.length === 0) {
        // Clear search
        const url = new URL(window.location);
        url.searchParams.delete('search');
        window.history.replaceState({}, '', url);
    }
}

function submitFormAjax(form) {
    const formData = new FormData(form);
    const action = form.getAttribute('action') || window.location.href;
    const method = form.getAttribute('method') || 'POST';
    
    // Show loading indicator
    const submitButton = form.querySelector('button[type="submit"]');
    const originalText = submitButton.innerHTML;
    submitButton.innerHTML = '<span class="loading-spinner"></span> Processing...';
    submitButton.disabled = true;
    
    fetch(action, {
        method: method,
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Handle success
            showNotification('Success', data.message || 'Operation completed successfully', 'success');
            if (data.redirect) {
                window.location.href = data.redirect;
            } else {
                window.location.reload();
            }
        } else {
            // Handle error
            showNotification('Error', data.message || 'An error occurred', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showNotification('Error', 'An error occurred while processing your request', 'error');
    })
    .finally(() => {
        // Restore button
        submitButton.innerHTML = originalText;
        submitButton.disabled = false;
    });
}

function showNotification(title, message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type} fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg max-w-sm`;
    notification.innerHTML = `
        <div class="flex items-start">
            <div class="flex-shrink-0">
                ${getNotificationIcon(type)}
            </div>
            <div class="ml-3">
                <h4 class="text-sm font-medium ${getNotificationTitleClass(type)}">${title}</h4>
                <p class="mt-1 text-sm ${getNotificationMessageClass(type)}">${message}</p>
            </div>
            <div class="ml-4 flex-shrink-0">
                <button type="button" class="notification-close inline-flex rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2">
                    <span class="sr-only">Close</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    `;
    
    // Add to DOM
    document.body.appendChild(notification);
    
    // Add close functionality
    notification.querySelector('.notification-close').addEventListener('click', function() {
        notification.remove();
    });
    
    // Auto-remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 5000);
}

function getNotificationIcon(type) {
    switch (type) {
        case 'success':
            return '<svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>';
        case 'error':
            return '<svg class="h-6 w-6 text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>';
        case 'warning':
            return '<svg class="h-6 w-6 text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>';
        default:
            return '<svg class="h-6 w-6 text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>';
    }
}

function getNotificationTitleClass(type) {
    switch (type) {
        case 'success': return 'text-green-800';
        case 'error': return 'text-red-800';
        case 'warning': return 'text-yellow-800';
        default: return 'text-blue-800';
    }
}

function getNotificationMessageClass(type) {
    switch (type) {
        case 'success': return 'text-green-700';
        case 'error': return 'text-red-700';
        case 'warning': return 'text-yellow-700';
        default: return 'text-blue-700';
    }
}

// Export functions for global use
window.AccessControl = {
    changeView,
    performSearch,
    validateForm,
    validateField,
    showNotification,
    initializeAccessControlComponents
};