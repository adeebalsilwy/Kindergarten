@if (session('success') || session('error') || session('warning') || session('info'))
    @pushOnce('styles')
        @vite('resources/css/vendors/toastify.css')
    @endPushOnce

    @pushOnce('vendors')
        @vite('resources/js/vendors/toastify.js')
    @endPushOnce

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const config = {
                duration: 5000,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                style: {
                    borderRadius: "1rem",
                    padding: "1rem 1.5rem",
                    fontWeight: "bold",
                    fontSize: "0.9rem",
                    boxShadow: "0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)",
                    display: "flex",
                    alignItems: "center"
                }
            };

            @if (session('success'))
                Toastify({
                    ...config,
                    text: "{{ session('success') }}",
                    style: { ...config.style, background: "linear-gradient(to right, #00b09b, #96c93d)" }
                }).showToast();
            @endif

            @if (session('error'))
                Toastify({
                    ...config,
                    text: "{{ session('error') }}",
                    style: { ...config.style, background: "linear-gradient(to right, #ff5f6d, #ffc371)" }
                }).showToast();
            @endif

            @if (session('warning'))
                Toastify({
                    ...config,
                    text: "{{ session('warning') }}",
                    style: { ...config.style, background: "linear-gradient(to right, #f12711, #f5af19)" }
                }).showToast();
            @endif

            @if (session('info'))
                Toastify({
                    ...config,
                    text: "{{ session('info') }}",
                    style: { ...config.style, background: "linear-gradient(to right, #2193b0, #6dd5ed)" }
                }).showToast();
            @endif
        });
    </script>
@endif
