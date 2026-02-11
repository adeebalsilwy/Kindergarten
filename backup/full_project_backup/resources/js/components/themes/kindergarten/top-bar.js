// Kindergarten Theme Top Bar Component

(function() {
    'use strict';
    
    class KindergartenTopBar {
        constructor() {
            this.init();
        }
        
        init() {
            this.setupSearch();
            this.setupNotifications();
            this.setupLanguageSwitcher();
            this.setupUserMenu();
            this.setupMobileMenu();
            this.enhanceAccessibility();
        }
        
        setupSearch() {
            const searchInput = document.querySelector('.search .form-input');
            const searchResults = document.querySelector('.search-result');
            
            if (!searchInput || !searchResults) return;
            
            // Search focus handling
            searchInput.addEventListener('focus', () => {
                searchResults.classList.add('show');
            });
            
            searchInput.addEventListener('blur', () => {
                setTimeout(() => {
                    searchResults.classList.remove('show');
                }, 200);
            });
            
            // Real-time search
            let searchTimeout;
            searchInput.addEventListener('input', (e) => {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    this.performSearch(e.target.value.toLowerCase());
                }, 300);
            });
        }
        
        performSearch(term) {
            const searchableItems = document.querySelectorAll('[data-search-content]');
            let hasResults = false;
            
            searchableItems.forEach(item => {
                const content = item.textContent.toLowerCase();
                const matches = content.includes(term);
                
                item.style.display = matches ? '' : 'none';
                if (matches) hasResults = true;
            });
            
            // Toggle no results message
            const noResultsMsg = document.querySelector('.no-search-results');
            if (noResultsMsg) {
                noResultsMsg.style.display = hasResults ? 'none' : 'block';
            }
        }
        
        setupNotifications() {
            const notificationBtn = document.querySelector('[data-notification-btn]');
            const notificationPanel = document.querySelector('[data-notification-panel]');
            
            if (!notificationBtn || !notificationPanel) return;
            
            notificationBtn.addEventListener('click', (e) => {
                e.preventDefault();
                notificationPanel.classList.toggle('show');
            });
            
            // Close when clicking outside
            document.addEventListener('click', (e) => {
                if (!notificationPanel.contains(e.target) && 
                    !notificationBtn.contains(e.target)) {
                    notificationPanel.classList.remove('show');
                }
            });
        }
        
        setupLanguageSwitcher() {
            const langLinks = document.querySelectorAll('[data-lang-switch]');
            
            langLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const lang = link.getAttribute('data-lang');
                    this.switchLanguage(lang);
                });
            });
        }
        
        switchLanguage(lang) {
            // Store preference
            localStorage.setItem('kindergarten_lang', lang);
            
            // Update UI
            this.updateLanguageDisplay(lang);
            
            // In real app, would trigger language change
            console.log(`Switching to ${lang} language`);
            
            // Show confirmation
            this.showNotification(`Language switched to ${lang.toUpperCase()}`, 'success');
        }
        
        updateLanguageDisplay(lang) {
            const langDisplay = document.querySelector('[data-current-lang]');
            if (langDisplay) {
                langDisplay.textContent = lang.toUpperCase();
            }
        }
        
        setupUserMenu() {
            const userMenuBtn = document.querySelector('[data-user-menu-btn]');
            const userMenu = document.querySelector('[data-user-menu]');
            
            if (!userMenuBtn || !userMenu) return;
            
            userMenuBtn.addEventListener('click', (e) => {
                e.preventDefault();
                userMenu.classList.toggle('show');
            });
            
            // Close on outside click
            document.addEventListener('click', (e) => {
                if (!userMenu.contains(e.target) && 
                    !userMenuBtn.contains(e.target)) {
                    userMenu.classList.remove('show');
                }
            });
        }
        
        setupMobileMenu() {
            const mobileToggle = document.querySelector('[data-mobile-toggle]');
            const mobileMenu = document.querySelector('[data-mobile-menu]');
            
            if (!mobileToggle || !mobileMenu) return;
            
            mobileToggle.addEventListener('click', (e) => {
                e.preventDefault();
                mobileMenu.classList.toggle('show');
                mobileToggle.classList.toggle('active');
            });
        }
        
        enhanceAccessibility() {
            // Keyboard navigation
            this.setupKeyboardNav();
            
            // Focus management
            this.improveFocusHandling();
            
            // Screen reader support
            this.addScreenReaderSupport();
        }
        
        setupKeyboardNav() {
            const navItems = document.querySelectorAll('.top-menu, .side-menu');
            
            navItems.forEach(item => {
                item.setAttribute('tabindex', '0');
                
                item.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        item.click();
                    }
                });
            });
        }
        
        improveFocusHandling() {
            const focusable = document.querySelectorAll('a, button, input, select, textarea');
            
            focusable.forEach(el => {
                el.addEventListener('focus', () => {
                    el.style.outline = '2px solid #3b82f6';
                    el.style.outlineOffset = '2px';
                });
                
                el.addEventListener('blur', () => {
                    el.style.outline = '';
                });
            });
        }
        
        addScreenReaderSupport() {
            // Add ARIA labels to icon-only buttons
            const iconButtons = document.querySelectorAll('button .lucide, a .lucide');
            
            iconButtons.forEach(icon => {
                const parent = icon.parentElement;
                if (parent && !parent.getAttribute('aria-label')) {
                    const label = this.getAriaLabelForIcon(parent);
                    if (label) {
                        parent.setAttribute('aria-label', label);
                    }
                }
            });
        }
        
        getAriaLabelForIcon(element) {
            const iconMap = {
                'Search': 'Search',
                'Bell': 'Notifications',
                'User': 'User profile',
                'Globe': 'Language switcher',
                'Menu': 'Mobile menu',
                'X': 'Close'
            };
            
            const iconName = Array.from(element.classList)
                .find(cls => iconMap[cls.replace('lucide-', '')]);
                
            return iconName ? iconMap[iconName] : null;
        }
        
        showNotification(message, type = 'info') {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.innerHTML = `
                <div class="notification-content">
                    <span class="notification-message">${message}</span>
                    <button class="notification-close">&times;</button>
                </div>
            `;
            
            // Style the notification
            Object.assign(notification.style, {
                position: 'fixed',
                top: '20px',
                right: '20px',
                backgroundColor: type === 'success' ? '#10b981' : '#3b82f6',
                color: 'white',
                padding: '12px 20px',
                borderRadius: '8px',
                boxShadow: '0 4px 12px rgba(0,0,0,0.15)',
                zIndex: '10000',
                transform: 'translateX(100%)',
                transition: 'transform 0.3s ease'
            });
            
            document.body.appendChild(notification);
            
            // Animate in
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 100);
            
            // Auto-remove after 3 seconds
            setTimeout(() => {
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }, 3000);
            
            // Close button handler
            const closeBtn = notification.querySelector('.notification-close');
            closeBtn.addEventListener('click', () => {
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            });
        }
    }
    
    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            new KindergartenTopBar();
        });
    } else {
        new KindergartenTopBar();
    }
    
    // Export for global use
    window.KindergartenTopBar = KindergartenTopBar;
    
})();