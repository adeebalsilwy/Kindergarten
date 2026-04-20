<script>
    // Password visibility toggle - optimized
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.setAttribute('icon', 'EyeOff');
        } else {
            passwordInput.type = 'password';
            eyeIcon.setAttribute('icon', 'Eye');
        }
        lucide.createIcons();
    }
    
    // Form submission with loading state - optimized
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('login-form');
        const submitButton = form.querySelector('button[type="submit"]');
        
        if (!submitButton) return;
        
        // Store original content
        submitButton.dataset.original = submitButton.innerHTML;
        
        form.addEventListener('submit', function(e) {
            if (submitButton.disabled) {
                e.preventDefault();
                return;
            }
            
            // Show loading state
            const originalContent = submitButton.innerHTML;
            submitButton.innerHTML = '<i data-lucide="loader" class="w-4 h-4 me-2 animate-spin"></i> {{ __("global.signing_in") }}';
            lucide.createIcons();
            submitButton.disabled = true;
            
            // Safety timeout - revert after 8 seconds
            setTimeout(() => {
                if (submitButton.disabled) {
                    submitButton.innerHTML = originalContent;
                    submitButton.disabled = false;
                    lucide.createIcons();
                }
            }, 8000);
        });
        
        // Demo account functionality - simplified
        const demoButtons = document.querySelectorAll('.demo-account');
        demoButtons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const email = this.dataset.email;
                const password = this.dataset.password;
                
                const emailInput = document.getElementById('email');
                const passwordInput = document.getElementById('password');
                
                if (emailInput && passwordInput) {
                    emailInput.value = email;
                    passwordInput.value = password;
                    emailInput.focus();
                    
                    // Auto-submit after brief delay
                    setTimeout(() => {
                        form.requestSubmit();
                    }, 150);
                }
            });
        });
        
        // Copy buttons - simplified
        const copyButtons = document.querySelectorAll('.demo-copy');
        copyButtons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                if (this.disabled) return;
                
                const email = this.dataset.email;
                const password = this.dataset.password;
                const text = Email: \nPassword: ;
                
                navigator.clipboard.writeText(text).then(() => {
                    showNotification();
                });
                
                function showNotification() {
                    const notification = document.getElementById('copy-notification');
                    if (notification) {
                        notification.classList.remove('translate-y-20');
                        setTimeout(() => {
                            notification.classList.add('translate-y-20');
                        }, 3000);
                    }
                }
            });
        });
        
        // Initialize lucide icons
        lucide.createIcons();
    });
</script>
