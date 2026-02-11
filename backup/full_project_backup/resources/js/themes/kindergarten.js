// Kindergarten Theme JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Initialize theme-specific functionality
    initializeKindergartenTheme();
});

function initializeKindergartenTheme() {
    // Apply theme-specific animations
    applyThemeAnimations();
    
    // Initialize interactive elements
    initializeInteractiveElements();
    
    // Set up theme-specific event listeners
    setupEventListeners();
    
    // Apply accessibility enhancements
    enhanceAccessibility();
}

function applyThemeAnimations() {
    // Add entrance animations to menu items
    const menuItems = document.querySelectorAll('.side-menu, .top-menu');
    menuItems.forEach((item, index) => {
        item.style.animationDelay = `${index * 0.1}s`;
        item.classList.add('animate-fade-in-up');
    });
    
    // Add hover effects to cards
    const cards = document.querySelectorAll('.box');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.15)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '';
        });
    });
}

function initializeInteractiveElements() {
    // Initialize tooltips with kindergarten-friendly content
    initializeTooltips();
    
    // Set up search functionality
    setupSearchFunctionality();
    
    // Initialize notification system
    initializeNotifications();
}

function initializeTooltips() {
    // Find all elements with title attributes and convert to tooltips
    const elementsWithTitle = document.querySelectorAll('[title]');
    elementsWithTitle.forEach(element => {
        const title = element.getAttribute('title');
        if (title) {
            // Create tooltip using the existing tooltip system
            element.setAttribute('data-tooltip', title);
            element.removeAttribute('title');
        }
    });
}

function setupSearchFunctionality() {
    const searchInput = document.querySelector('.search .form-input');
    const searchResults = document.querySelector('.search-result');
    
    if (searchInput && searchResults) {
        searchInput.addEventListener('focus', function() {
            searchResults.classList.add('show');
        });
        
        searchInput.addEventListener('blur', function() {
            // Delay hiding to allow clicking on results
            setTimeout(() => {
                searchResults.classList.remove('show');
            }, 200);
        });
        
        // Live search functionality
        searchInput.addEventListener('input', debounce(function(e) {
            const searchTerm = e.target.value.toLowerCase();
            performSearch(searchTerm);
        }, 300));
    }
}

function performSearch(term) {
    // Simple client-side search implementation
    const searchableItems = document.querySelectorAll('[data-searchable]');
    let hasResults = false;
    
    searchableItems.forEach(item => {
        const content = item.textContent.toLowerCase();
        const isVisible = content.includes(term);
        
        item.style.display = isVisible ? '' : 'none';
        if (isVisible) hasResults = true;
    });
    
    // Show no results message if needed
    const noResultsElement = document.querySelector('.no-results-message');
    if (noResultsElement) {
        noResultsElement.style.display = hasResults ? 'none' : 'block';
    }
}

function initializeNotifications() {
    // Set up notification badge animation
    const notificationBadge = document.querySelector('.relative.block.text-white\\/70.outline-none.before\\:absolute.before\\:right-0.before\\:top-\\[-2px\\].before\\:h-\\[8px\\].before\\:w-\\[8px\\].before\\:rounded-full.before\\:bg-danger.before\\:content-\\[\'\'\\]');
    
    if (notificationBadge) {
        // Add pulsing animation
        notificationBadge.style.animation = 'pulse 2s infinite';
    }
    
    // Set up notification panel interactions
    const notificationButton = document.querySelector('[data-notification-button]');
    const notificationPanel = document.querySelector('[data-notification-panel]');
    
    if (notificationButton && notificationPanel) {
        notificationButton.addEventListener('click', function(e) {
            e.preventDefault();
            notificationPanel.classList.toggle('show');
        });
    }
}

function setupEventListeners() {
    // Language switcher functionality
    setupLanguageSwitcher();
    
    // Theme toggle functionality
    setupThemeToggle();
    
    // Mobile menu functionality
    setupMobileMenu();
}

function setupLanguageSwitcher() {
    const languageLinks = document.querySelectorAll('[data-lang-switch]');
    languageLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const lang = this.getAttribute('data-lang');
            switchLanguage(lang);
        });
    });
}

function switchLanguage(lang) {
    // Store language preference
    localStorage.setItem('preferred_language', lang);
    
    // Update UI language indicators
    updateLanguageIndicators(lang);
    
    // Determine if the language is RTL
    const isRtl = lang === 'ar'; // Arabic is RTL, you can add more RTL languages here
    
    // Update HTML dir attribute
    const html = document.documentElement;
    if (isRtl) {
        html.setAttribute('dir', 'rtl');
    } else {
        html.setAttribute('dir', 'ltr');
    }
    
    // Add RTL class to body if RTL, remove if LTR
    if (isRtl) {
        document.body.classList.add('rtl');
    } else {
        document.body.classList.remove('rtl');
    }
    
    // Update CSS variables for RTL support
    updateRtlStyles(isRtl);
    
    // Trigger a custom event for other components to react
    window.dispatchEvent(new CustomEvent('languageChanged', {
        detail: { lang, isRtl }
    }));
    
    // Refresh the page to apply all language changes
    window.location.reload();
}

function updateLanguageIndicators(lang) {
    const langDisplay = document.querySelector('[data-current-lang]');
    if (langDisplay) {
        langDisplay.textContent = lang.toUpperCase();
    }
}

function updateRtlStyles(isRtl) {
    // Update any CSS variables or styles needed for RTL
    const root = document.documentElement;
    if (isRtl) {
        root.style.setProperty('--bs-rtl', 'true');
    } else {
        root.style.setProperty('--bs-rtl', 'false');
    }
}

function setupThemeToggle() {
    const themeToggle = document.querySelector('[data-theme-toggle]');
    if (themeToggle) {
        themeToggle.addEventListener('click', function(e) {
            e.preventDefault();
            toggleDarkMode();
        });
    }
}

function toggleDarkMode() {
    const html = document.documentElement;
    const isDark = html.classList.contains('dark');
    
    if (isDark) {
        html.classList.remove('dark');
        localStorage.setItem('theme', 'light');
    } else {
        html.classList.add('dark');
        localStorage.setItem('theme', 'dark');
    }
    
    // Update theme toggle button
    updateThemeToggleButton(!isDark);
}

function updateThemeToggleButton(isDark) {
    const themeIcon = document.querySelector('[data-theme-icon]');
    if (themeIcon) {
        themeIcon.setAttribute('icon', isDark ? 'Moon' : 'Sun');
    }
}

function setupMobileMenu() {
    const mobileMenuButton = document.querySelector('[data-mobile-menu-toggle]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function(e) {
            e.preventDefault();
            mobileMenu.classList.toggle('show');
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!mobileMenu.contains(e.target) && !mobileMenuButton.contains(e.target)) {
                mobileMenu.classList.remove('show');
            }
        });
    }
}

function enhanceAccessibility() {
    // Add keyboard navigation support
    setupKeyboardNavigation();
    
    // Improve focus indicators
    improveFocusIndicators();
    
    // Add ARIA labels where needed
    addAriaLabels();
}

function setupKeyboardNavigation() {
    // Enable keyboard navigation for menu items
    const menuItems = document.querySelectorAll('.side-menu, .top-menu');
    menuItems.forEach(item => {
        item.setAttribute('tabindex', '0');
        
        item.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });
}

function improveFocusIndicators() {
    // Add visible focus rings for keyboard navigation
    const focusableElements = document.querySelectorAll('a, button, input, select, textarea');
    focusableElements.forEach(element => {
        element.addEventListener('focus', function() {
            this.style.outline = '2px solid #3b82f6';
            this.style.outlineOffset = '2px';
        });
        
        element.addEventListener('blur', function() {
            this.style.outline = '';
        });
    });
}

function addAriaLabels() {
    // Add descriptive ARIA labels to interactive elements
    const icons = document.querySelectorAll('.lucide');
    icons.forEach(icon => {
        const parentLink = icon.closest('a, button');
        if (parentLink && !parentLink.getAttribute('aria-label')) {
            const title = parentLink.getAttribute('title') || parentLink.textContent.trim();
            if (title) {
                parentLink.setAttribute('aria-label', title);
            }
        }
    });
}

// Utility function for debouncing
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Export functions for use in other modules
window.KindergartenTheme = {
    initialize: initializeKindergartenTheme,
    switchLanguage: switchLanguage,
    toggleDarkMode: toggleDarkMode
};