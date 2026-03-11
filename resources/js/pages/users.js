/**
 * UserManager - Professional & Radical Solution for User Management Pages
 * Designed for High-Performance Interactivity, Advanced Diagnostics, and Seamless UI
 */

const UserManagerConfig = {
    DEBUG_MODE: true,
    STORAGE_KEY: 'active_user_tab_persistence',
    LOG_PREFIX: '👤 [UserMgr]'
};

/**
 * Professional Diagnostic System
 */
const Logger = {
    _log: (level, msg, data = null) => {
        if (!UserManagerConfig.DEBUG_MODE && level === 'debug') return;
        
        const timestamp = new Date().toLocaleTimeString('en-GB', { hour12: false });
        const styles = {
            info: 'color: #3b82f6; font-weight: bold;',
            error: 'color: #ef4444; font-weight: bold; background: #fee2e2; padding: 2px 5px; border-radius: 4px;',
            warn: 'color: #f59e0b; font-weight: bold;',
            debug: 'color: #8b5cf6; font-style: italic;',
            success: 'color: #10b981; font-weight: bold;'
        };

        console.groupCollapsed(`%c${UserManagerConfig.LOG_PREFIX} [${timestamp}] [${level.toUpperCase()}] ${msg}`, styles[level] || '');
        if (data) console.dir(data);
        console.trace('Stack Trace');
        console.groupEnd();
    },
    info: (msg, data) => Logger._log('info', msg, data),
    error: (msg, error) => Logger._log('error', msg, error),
    warn: (msg, data) => Logger._log('warn', msg, data),
    debug: (msg, data) => Logger._log('debug', msg, data),
    success: (msg, data) => Logger._log('success', msg, data)
};

class UserManager {
    constructor() {
        this.selectors = {
            // New Manual Tabs (Children Management Style)
            manualTabButtons: '.tab-button',
            manualTabContents: '.tab-content',
            
            // Legacy/Component Tabs
            tabGroup: '.x-base-tab-group',
            tabList: '[role="tablist"]',
            tabButtons: '[data-tw-toggle="tab"]',
            tabPanels: '.tab-pane',
            
            // Other selectors
            roleCards: '.role-card',
            passwordInput: '#password',
            userForm: '#userForm',
            errorInputs: '.text-danger'
        };

        this.state = {
            initialized: false,
            activeTabId: null,
            formIsDirty: false
        };

        this.init();
    }

    init() {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.boot());
        } else {
            this.boot();
        }
    }

    boot() {
        Logger.info('🚀 Booting UserManager Professional Module...');
        try {
            this.initTabs();
            this.initManualTabs(); // Add support for new manual tabs
            this.initRoleCards();
            this.initFormTracking();
            this.setupSecurityTools();
            this.handleValidationContext();
            
            this.state.initialized = true;
            Logger.success('✨ UserManager ready and operational.');
        } catch (err) {
            Logger.error('💥 Critical failure during UserManager boot sequence.', err);
        }
    }

    /**
     * Support for new "Children Management" style manual tabs
     */
    initManualTabs() {
        const buttons = document.querySelectorAll(this.selectors.manualTabButtons);
        const contents = document.querySelectorAll(this.selectors.manualTabContents);

        if (!buttons.length) return;

        Logger.info(`Found ${buttons.length} manual tab buttons. Initializing...`);

        const activateManualTab = (tabId, shouldPersist = true) => {
            if (!tabId) return;

            // Normalize tabId (remove # if present)
            const cleanId = tabId.startsWith('#') ? tabId.substring(1) : tabId;
            const targetContent = document.getElementById(cleanId);

            if (!targetContent) {
                Logger.error(`Manual tab content not found: ${cleanId}`);
                return;
            }

            // Update Buttons
            buttons.forEach(btn => {
                const btnId = btn.getAttribute('data-tab');
                if (btnId === cleanId) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });

            // Update Contents
            contents.forEach(content => {
                if (content.id === cleanId) {
                    content.classList.add('active');
                    // Transitions
                    content.style.opacity = '0';
                    content.style.display = 'block';
                    requestAnimationFrame(() => {
                        content.style.transition = 'opacity 0.3s ease';
                        content.style.opacity = '1';
                    });
                } else {
                    content.classList.remove('active');
                    content.style.display = 'none';
                }
            });

            this.state.activeTabId = cleanId;
            if (shouldPersist) sessionStorage.setItem(UserManagerConfig.STORAGE_KEY, cleanId);
            
            Logger.debug(`Manual Tab Activated: ${cleanId}`);
        };

        buttons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const tabId = btn.getAttribute('data-tab');
                activateManualTab(tabId);
            });
        });

        // Initial Activation for manual tabs
        this.resolveInitialManualTab(buttons, activateManualTab);
    }

    resolveInitialManualTab(buttons, activator) {
        const hash = window.location.hash;
        const persisted = sessionStorage.getItem(UserManagerConfig.STORAGE_KEY);
        const firstError = document.querySelector(this.selectors.errorInputs);
        
        if (hash && document.getElementById(hash.substring(1))) {
            activator(hash.substring(1), false);
        } else if (firstError) {
            const errorPanel = firstError.closest(this.selectors.manualTabContents);
            if (errorPanel) {
                Logger.info('Manual: Redirecting to tab with validation errors.');
                activator(errorPanel.id);
            } else {
                this.activateFirstManual(buttons, activator);
            }
        } else if (persisted && document.getElementById(persisted)) {
            Logger.info('Manual: Restoring persisted tab session.');
            activator(persisted);
        } else {
            this.activateFirstManual(buttons, activator);
        }
    }

    activateFirstManual(buttons, activator) {
        const firstBtn = buttons[0];
        if (firstBtn) {
            const target = firstBtn.getAttribute('data-tab');
            activator(target);
        }
    }

    /**
     * Radical Tab Management System
     * Solves "Content Not Displaying" and "First Tab" issues comprehensively
     */
    initTabs() {
        const tabList = document.querySelector(this.selectors.tabList);
        if (!tabList) {
            Logger.warn('No tab list detected on this page. Skipping tab initialization.');
            return;
        }

        const buttons = tabList.querySelectorAll(this.selectors.tabButtons);
        const panels = document.querySelectorAll(this.selectors.tabPanels);

        if (!buttons.length || !panels.length) {
            Logger.error('Tab buttons or panels missing from the DOM structure.');
            return;
        }

        /**
         * Core Activation Logic
         * Handles visual states, accessibility, and content visibility
         */
        const activateTab = (targetId, shouldPersist = true) => {
            if (!targetId) return;

            // Normalize ID
            const cleanId = targetId.startsWith('#') ? targetId : `#${targetId}`;
            const targetPanel = document.querySelector(cleanId);

            if (!targetPanel) {
                Logger.error(`Failed to locate panel with ID: ${cleanId}`);
                return;
            }

            Logger.debug(`Activating sequence for tab: ${cleanId}`);

            // 1. Update Buttons State
            buttons.forEach(btn => {
                const btnTarget = btn.getAttribute('data-tw-target');
                const isMatch = btnTarget === cleanId || btnTarget === cleanId.substring(1);
                const parentTab = btn.closest('[role="tab"]');

                if (isMatch) {
                    btn.classList.add('active');
                    if (parentTab) {
                        parentTab.classList.add('active');
                        parentTab.setAttribute('aria-selected', 'true');
                    }
                } else {
                    btn.classList.remove('active');
                    if (parentTab) {
                        parentTab.classList.remove('active');
                        parentTab.setAttribute('aria-selected', 'false');
                    }
                }
            });

            // 2. Update Panels State with Professional Transitions
            panels.forEach(panel => {
                const isMatch = `#${panel.id}` === cleanId;
                
                if (isMatch) {
                    // Show active panel
                    panel.style.display = 'block';
                    panel.classList.add('active');
                    
                    // Trigger animations
                    requestAnimationFrame(() => {
                        panel.style.opacity = '1';
                        panel.style.transform = 'translateY(0)';
                        panel.style.transition = 'opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1), transform 0.4s cubic-bezier(0.4, 0, 0.2, 1)';
                    });
                } else {
                    // Hide inactive panels
                    panel.classList.remove('active');
                    panel.style.opacity = '0';
                    panel.style.transform = 'translateY(15px)';
                    
                    // Use timeout to hide after transition
                    setTimeout(() => {
                        if (!panel.classList.contains('active')) {
                            panel.style.display = 'none';
                        }
                    }, 400);
                }
            });

            this.state.activeTabId = cleanId;
            if (shouldPersist) sessionStorage.setItem(UserManagerConfig.STORAGE_KEY, cleanId);
            
            Logger.info(`Tab ${cleanId} is now active.`);
        };

        // Event Binding
        buttons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const target = btn.getAttribute('data-tw-target');
                activateTab(target);
            });
        });

        // Smart Initial Activation Sequence
        this.resolveInitialTab(buttons, activateTab);
    }

    /**
     * Resolves which tab should be active on page load
     */
    resolveInitialTab(buttons, activator) {
        const hash = window.location.hash;
        const persisted = sessionStorage.getItem(UserManagerConfig.STORAGE_KEY);
        const firstError = document.querySelector(this.selectors.errorInputs);
        
        Logger.debug('Resolving initial tab context...', { hash, persisted, hasError: !!firstError });

        if (hash && document.querySelector(hash)) {
            activator(hash, false);
        } else if (firstError) {
            const errorPanel = firstError.closest(this.selectors.tabPanels);
            if (errorPanel) {
                Logger.info('Redirecting to tab with validation errors.');
                activator(`#${errorPanel.id}`);
            } else {
                this.activateFirst(buttons, activator);
            }
        } else if (persisted && document.querySelector(persisted)) {
            Logger.info('Restoring persisted tab session.');
            activator(persisted);
        } else {
            this.activateFirst(buttons, activator);
        }
    }

    activateFirst(buttons, activator) {
        const firstBtn = buttons[0];
        if (firstBtn) {
            const target = firstBtn.getAttribute('data-tw-target');
            Logger.info('Defaulting to first available tab.');
            activator(target);
        }
    }

    /**
     * Enhanced Role Card Interactivity
     */
    initRoleCards() {
        const cards = document.querySelectorAll(this.selectors.roleCards);
        cards.forEach(card => {
            const checkbox = card.querySelector('input[type="checkbox"]');
            if (!checkbox) return;

            // Sync visual state with checkbox on load
            if (checkbox.checked) card.classList.add('active', 'border-primary', 'bg-primary/5');

            card.addEventListener('click', (e) => {
                // Prevent double-toggle if clicking the checkbox directly
                if (e.target !== checkbox && !checkbox.contains(e.target)) {
                    checkbox.checked = !checkbox.checked;
                    // Trigger change event for any other listeners
                    checkbox.dispatchEvent(new Event('change', { bubbles: true }));
                }
                
                if (checkbox.checked) {
                    card.classList.add('active', 'border-primary', 'bg-primary/5');
                    Logger.debug('Role selected:', checkbox.value);
                } else {
                    card.classList.remove('active', 'border-primary', 'bg-primary/5');
                    Logger.debug('Role deselected:', checkbox.value);
                }
            });
        });
    }

    initFormTracking() {
        const form = document.querySelector(this.selectors.userForm);
        if (!form) return;

        form.addEventListener('input', () => {
            if (!this.state.formIsDirty) {
                this.state.formIsDirty = true;
                Logger.debug('Form state changed to: DIRTY');
            }
        });

        // Warn before navigation if dirty
        window.addEventListener('beforeunload', (e) => {
            if (this.state.formIsDirty) {
                e.preventDefault();
                e.returnValue = '';
            }
        });

        form.addEventListener('submit', () => {
            this.state.formIsDirty = false;
            Logger.info('Form submission initiated.');
        });
    }

    setupSecurityTools() {
        // Global helper for password toggling
        window.togglePassword = (id) => {
            const input = document.getElementById(id);
            if (!input) return;
            
            const type = input.type === 'password' ? 'text' : 'password';
            input.type = type;
            Logger.debug(`Password visibility toggled for: ${id} to ${type}`);
        };

        // Global helper for password generation
        window.generatePassword = () => {
            const length = 16;
            const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+";
            let retVal = "";
            for (let i = 0, n = charset.length; i < length; ++i) {
                retVal += charset.charAt(Math.floor(Math.random() * n));
            }
            
            const pwdInputs = document.querySelectorAll('input[type="password"], #password');
            pwdInputs.forEach(input => {
                if (input.name.includes('password')) {
                    input.value = retVal;
                    // Change type to text briefly so user sees it
                    input.type = 'text';
                    setTimeout(() => input.type = 'password', 3000);
                }
            });
            
            Logger.success('Secure password generated and applied.');
            
            // Try to copy to clipboard
            navigator.clipboard.writeText(retVal).then(() => {
                Logger.info('Password copied to clipboard.');
            }).catch(err => {
                Logger.warn('Failed to copy password to clipboard.');
            });
        };

        // Global helper for demo data
        window.fillDemoData = () => {
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            const phoneInput = document.getElementById('phone');
            const deptSelect = document.getElementById('department');

            if (nameInput) nameInput.value = 'Demo User ' + Math.floor(Math.random() * 1000);
            if (emailInput) emailInput.value = 'demo' + Math.floor(Math.random() * 1000) + '@example.com';
            if (phoneInput) phoneInput.value = '+9665' + Math.floor(Math.random() * 10000000);
            
            if (deptSelect && deptSelect.tomselect) {
                const options = ['administration', 'teaching', 'finance', 'support'];
                const randomOption = options[Math.floor(Math.random() * options.length)];
                deptSelect.tomselect.setValue(randomOption);
            }
            
            window.generatePassword();
            Logger.info('Demo data populated.');
        };
    }

    handleValidationContext() {
        const errors = document.querySelectorAll('.text-danger');
        if (errors.length > 0) {
            Logger.warn(`Page loaded with ${errors.length} validation errors.`);
            // Focus first error field
            const firstError = errors[0];
            const input = firstError.previousElementSibling;
            if (input && (input.tagName === 'INPUT' || input.tagName === 'SELECT')) {
                input.focus();
            }
        }
    }
}

// Instantiate Global UserManager
window.userManager = new UserManager();
