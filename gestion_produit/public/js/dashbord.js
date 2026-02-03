document.addEventListener('DOMContentLoaded', function() {
    initializeNavigation();
    initializeCharts();
});

function initializeNavigation() {
    const navItems = document.querySelectorAll('.nav-item');
    const sections = document.querySelectorAll('.content-section');
    const menuToggle = document.querySelector('.menu-toggle');
    const sidebar = document.querySelector('.sidebar');

    navItems.forEach(item => {
        item.addEventListener('click', function(e) {
            const sectionId = this.getAttribute('data-section');
            // If it's a real link (like logout), let it happen
            if (this.getAttribute('href') !== '#') return;

            e.preventDefault();
            navItems.forEach(nav => nav.classList.remove('active'));
            this.classList.add('active');
            
            sections.forEach(section => section.classList.remove('active'));
            document.getElementById(sectionId + '-section').classList.add('active');
        });
    });

    if (menuToggle) {
        menuToggle.addEventListener('click', () => sidebar.classList.toggle('active'));
    }
}

function initializeCharts() {
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Ventes (€)',
                data: [1200, 1900, 3000, 5000, 2000, 3000],
                borderColor: '#667eea',
                tension: 0.4
            }]
        }
    });
}