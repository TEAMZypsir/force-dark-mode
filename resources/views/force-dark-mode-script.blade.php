<script>
    // Force dark mode immediately on page load
    (function() {
        // Set theme to dark in localStorage
        localStorage.setItem('theme', 'dark');
        
        // Add dark class to html element
        document.documentElement.classList.add('dark');
        
        // Remove light class if it exists
        document.documentElement.classList.remove('light');
        
        // Override Filament's theme change event listener to prevent switching
        window.addEventListener('theme-changed', function(event) {
            event.stopImmediatePropagation();
            localStorage.setItem('theme', 'dark');
            document.documentElement.classList.add('dark');
            document.documentElement.classList.remove('light');
        }, true);
        
        // Watch for class changes and force dark mode
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.attributeName === 'class') {
                    if (!document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.add('dark');
                    }
                    if (document.documentElement.classList.contains('light')) {
                        document.documentElement.classList.remove('light');
                    }
                }
            });
        });
        
        observer.observe(document.documentElement, {
            attributes: true,
            attributeFilter: ['class']
        });
    })();
</script>

<style>
    /* Hide the dark mode toggle button */
    [x-data*="theme"] button[aria-label*="theme"],
    [x-data*="theme"] button[aria-label*="Toggle"],
    button[x-on\:click*="theme"] {
        display: none !important;
    }
</style>
