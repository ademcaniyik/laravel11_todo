// Check for dark mode preference
if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark')
} else {
    document.documentElement.classList.remove('dark')
}

// Function to toggle dark mode
window.toggleDarkMode = function() {
    if (localStorage.theme === 'dark') {
        localStorage.theme = 'light'
        document.documentElement.classList.remove('dark')
    } else {
        localStorage.theme = 'dark'
        document.documentElement.classList.add('dark')
    }
}
