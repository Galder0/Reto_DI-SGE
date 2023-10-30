// Function to set the theme
// function setTheme(theme) {
//     if (theme === 'dark') {
//         document.body.classList.add('dark');
//         localStorage.setItem('theme', 'dark');
//     } else {
//         document.body.classList.remove('dark');
//         localStorage.setItem('theme', 'light');
//     }
// }

// // Check the user's preferred theme and set it
// if (localStorage.getItem('theme') === 'dark') {
//     setTheme('dark');
// }

// // Event listener for theme switcher dropdown
// document.querySelectorAll('[data-bs-theme-value]').forEach((element) => {
//     element.addEventListener('click', () => {
//         const theme = element.getAttribute('data-bs-theme-value');
//         setTheme(theme);
//     });
// });