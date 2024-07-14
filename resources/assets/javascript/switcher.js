document.addEventListener('DOMContentLoaded', function () {
    const themeToggle = document.getElementById('theme-toggle');
    const themeToggleIcon = document.getElementById('theme-toggle-icon');

    const currentTheme = localStorage.getItem('theme');
    
    if (!currentTheme) {
        localStorage.setItem('theme', 'dark');
        document.documentElement.classList.add('dark');
        themeToggleIcon.textContent = '☀️';
    } else if (currentTheme === 'dark') {
        document.documentElement.classList.add('dark');
        themeToggleIcon.textContent = '☀️';
    } else {
        document.documentElement.classList.remove('dark');
        themeToggleIcon.textContent = '🌙';
    }

    themeToggle.addEventListener('click', function () {
        document.documentElement.classList.toggle('dark');

        if (document.documentElement.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
            themeToggleIcon.textContent = '☀️';
        } else {
            localStorage.setItem('theme', 'light');
            themeToggleIcon.textContent = '🌙';
        }
    });
});