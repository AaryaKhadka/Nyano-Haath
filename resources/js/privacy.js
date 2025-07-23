
        document.addEventListener('DOMContentLoaded', function() {
            // Set dates
            const lastUpdatedDate = new Date('2025-07-21');
            const dateOptions = { year: 'numeric', month: 'long', day: 'numeric' };
            document.getElementById('last-updated-date').textContent = lastUpdatedDate.toLocaleDateString('en-US', dateOptions);
            document.getElementById('current-year').textContent = new Date().getFullYear();

            // Click-to-Scroll
            const sidebarLinks = document.querySelectorAll('.sidebar-nav a');
            sidebarLinks.forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                });
            });

            // Active Section Highlighting
            const sections = document.querySelectorAll('main section');
            const observerOptions = {
                root: null,
                rootMargin: '0px 0px -40% 0px', // Adjust margin to trigger when section is higher up
                threshold: 0
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        sidebarLinks.forEach(link => link.classList.remove('active'));
                        const activeLink = document.querySelector(`.sidebar-nav a[href="#${entry.target.id}"]`);
                        if (activeLink) {
                            activeLink.classList.add('active');
                        }
                    }
                });
            }, observerOptions);

            sections.forEach(section => {
                observer.observe(section);
            });
        });