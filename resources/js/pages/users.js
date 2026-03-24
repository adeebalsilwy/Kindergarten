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
            this.initPermissions(); // Add permissions management
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
     * Advanced Permissions Management
     */
    initPermissions() {
        const selectAllBtn = document.getElementById('selectAllPermissions');
        const deselectAllBtn = document.getElementById('deselectAllPermissions');
        const groupCheckboxes = document.querySelectorAll('.group-select-permission');
        const permCheckboxes = document.querySelectorAll('.permission-checkbox');

        if (selectAllBtn) {
            selectAllBtn.addEventListener('click', () => {
                permCheckboxes.forEach(cb => {
                    cb.checked = true;
                    cb.dispatchEvent(new Event('change'));
                });
                groupCheckboxes.forEach(cb => cb.checked = true);
                Logger.debug('All permissions selected');
            });
        }

        if (deselectAllBtn) {
            deselectAllBtn.addEventListener('click', () => {
                permCheckboxes.forEach(cb => {
                    cb.checked = false;
                    cb.dispatchEvent(new Event('change'));
                });
                groupCheckboxes.forEach(cb => cb.checked = false);
                Logger.debug('All permissions deselected');
            });
        }

        groupCheckboxes.forEach(groupCb => {
            groupCb.addEventListener('change', () => {
                const group = groupCb.getAttribute('data-group');
                const isChecked = groupCb.checked;
                document.querySelectorAll(`.permission-checkbox[data-group="${group}"]`).forEach(cb => {
                    cb.checked = isChecked;
                    cb.dispatchEvent(new Event('change'));
                });
            });
        });

        permCheckboxes.forEach(cb => {
            cb.addEventListener('change', () => {
                const group = cb.getAttribute('data-group');
                const groupCb = document.querySelector(`.group-select-permission[data-group="${group}"]`);
                if (!groupCb) return;

                const groupPerms = document.querySelectorAll(`.permission-checkbox[data-group="${group}"]`);
                const allChecked = Array.from(groupPerms).every(p => p.checked);
                const someChecked = Array.from(groupPerms).some(p => p.checked);

                groupCb.checked = allChecked;
                groupCb.indeterminate = someChecked && !allChecked;
            });

            // Initial state
            cb.dispatchEvent(new Event('change'));
        });
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
        if (form) {
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
        this.initToggles();
    }

    initToggles() {
        let pendingToggle = null;
        const toggleModal = document.getElementById('toggle-confirmation-modal');
        const confirmToggleBtn = document.getElementById('confirmToggleBtn');
        const toggleUserName = document.getElementById('toggleUserName');
        const toggleActionText = document.getElementById('toggleActionText');

        const openConfirmationModal = (toggle, type, userName) => {
            const newStatus = toggle.checked
                ? (type === 'status' ? '{{ __("global.active") }}' : '{{ __("global.verified") }}')
                : (type === 'status' ? '{{ __("global.inactive") }}' : '{{ __("global.unverified") }}');

            pendingToggle = {
                element: toggle,
                type: type,
                newValue: toggle.checked
            };

            if (toggleUserName) toggleUserName.textContent = userName;
            if (toggleActionText) {
                const actionLabel = type === 'status'
                    ? '{{ __("global.change_status_to") }}'
                    : '{{ __("global.change_verification_to") }}';
                toggleActionText.textContent = actionLabel + ': ' + newStatus;
            }

            // Show modal using Tailwind Modal API
            const modalInstance = tailwind.Modal.getOrCreateInstance(toggleModal);
            modalInstance.show();
        };

        // Status toggles
        document.querySelectorAll('.status-toggle').forEach(toggle => {
            toggle.addEventListener('change', function(e) {
                e.preventDefault();
                const row = this.closest('tr');
                const userName = row?.querySelector('.font-black')?.textContent?.trim() || '';
                openConfirmationModal(this, 'status', userName);
            });
        });

        // Verification toggles
        document.querySelectorAll('.verification-toggle').forEach(toggle => {
            toggle.addEventListener('change', function(e) {
                e.preventDefault();
                const row = this.closest('tr');
                const userName = row?.querySelector('.font-black')?.textContent?.trim() || '';
                openConfirmationModal(this, 'verification', userName);
            });
        });

        // Confirm toggle action
        if (confirmToggleBtn && toggleModal) {
            confirmToggleBtn.addEventListener('click', async function() {
                if (!pendingToggle) return;

                const { element, type, newValue } = pendingToggle;
                const url = element.dataset.url;

                try {
                    const response = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    });

                    const data = await response.json();
                    if (data.success) {
                        // Update label text
                        const labelSelector = type === 'status' ? '.status-label' : '.verification-label';
                        const label = element.closest('.flex-col')?.querySelector(labelSelector);

                        if (label) {
                            label.textContent = type === 'status'
                                ? (data.is_active ? '{{ __("global.active") }}' : '{{ __("global.inactive") }}')
                                : (data.is_verified ? '{{ __("global.verified") }}' : '{{ __("global.unverified") }}');
                        }

                        // Show success toast if available
                        if (typeof Toastify !== 'undefined') {
                            Toastify({
                                text: data.message,
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                style: { background: "linear-gradient(to right, #00b09b, #96c93d)" }
                            }).showToast();
                        }

                        Logger.success('Toggle updated successfully');
                    } else {
                        // Revert checkbox on failure
                        element.checked = !element.checked;
                        Logger.error('Toggle failed:', data);
                    }
                } catch (error) {
                    element.checked = !element.checked;
                    Logger.error('Toggle error:', error);

                    if (typeof Toastify !== 'undefined') {
                        Toastify({
                            text: '{{ __("global.error_occurred") }}',
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            style: { background: "linear-gradient(to right, #ff5f6d, #ffc371)" }
                        }).showToast();
                    }
                }

                // Close modal
                const modalInstance = tailwind.Modal.getOrCreateInstance(toggleModal);
                modalInstance.hide();
                pendingToggle = null;
            });
        }

        // Cancel toggle - revert checkbox when modal is closed without confirming
        if (toggleModal) {
            toggleModal.addEventListener('hidden.tw.modal', function() {
                if (pendingToggle) {
                    pendingToggle.element.checked = !pendingToggle.element.checked;
                    pendingToggle = null;
                }
            });
        }
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

            const names = ['أحمد محمد', 'سارة علي', 'خالد محمود', 'ليلى حسن', 'عمر فاروق'];
            const depts = ['administration', 'teaching', 'finance', 'support'];

            if (nameInput) nameInput.value = names[Math.floor(Math.random() * names.length)];
            if (emailInput) emailInput.value = 'user' + Math.floor(Math.random() * 10000) + '@example.com';
            if (phoneInput) phoneInput.value = '05' + Math.floor(Math.random() * 100000000);

            if (deptSelect && deptSelect.tomselect) {
                const randomOption = depts[Math.floor(Math.random() * depts.length)];
                deptSelect.tomselect.setValue(randomOption);
            }

            window.generatePassword();

            // Select a random role
            const roleCards = document.querySelectorAll('.role-card');
            if (roleCards.length > 0) {
                // Deselect all first
                roleCards.forEach(card => {
                    const cb = card.querySelector('.role-checkbox');
                    if (cb) {
                        cb.checked = false;
                        card.classList.remove('selected', 'active', 'border-primary', 'bg-primary/5');
                    }
                });

                // Select one
                const randomRole = roleCards[Math.floor(Math.random() * roleCards.length)];
                const cb = randomRole.querySelector('.role-checkbox');
                if (cb) {
                    cb.checked = true;
                    randomRole.classList.add('selected', 'active', 'border-primary', 'bg-primary/5');
                    Logger.debug('Demo: Role selected');
                }
            }

            // Select some random permissions
            const permCheckboxes = document.querySelectorAll('.permission-checkbox');
            if (permCheckboxes.length > 0) {
                permCheckboxes.forEach(cb => {
                    cb.checked = false;
                    cb.dispatchEvent(new Event('change'));
                });

                for (let i = 0; i < 5; i++) {
                    const randomPerm = permCheckboxes[Math.floor(Math.random() * permCheckboxes.length)];
                    randomPerm.checked = true;
                    randomPerm.dispatchEvent(new Event('change'));
                }
            }

            Logger.info('Demo data populated professionally.');

            // Success notification if available
            if (typeof Toastify !== 'undefined') {
                Toastify({
                    text: "تم توليد البيانات التجريبية بنجاح",
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                }).showToast();
            }
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
