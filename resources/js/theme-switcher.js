// mirar si localstorage existe clave "theme"
//   si existe -> poner el tema como theme
// si no --> claro

// Function to set the theme
// document.getElementById('btnSwitch').addEventListener('click',()=>{
//     if (document.documentElement.getAttribute('data-bs-theme') == 'dark') {
//         document.documentElement.setAttribute('data-bs-theme','light')
//         //guardar en localstorate modo light
//     }
//     else {
//         document.documentElement.setAttribute('data-bs-theme','dark')
//         //guardar en localstorage modo dark
        
//     }
// })

// const toggleBtn = document.getElementById("btnSwitch");
// const theme = document.getElementById("theme");
// let darkMode = localStorage.getItem("dark-mode");

// const enableDarkMode = () => {
//   theme.classList.add("dark-mode-theme");
//   toggleBtn.classList.remove("dark-mode-toggle");
//   localStorage.setItem("dark-mode", "enabled");
// };

// const disableDarkMode = () => {
//   theme.classList.remove("dark-mode-theme");
//   toggleBtn.classList.add("dark-mode-toggle");
//   localStorage.setItem("dark-mode", "disabled");
// };

// if (darkMode === "enabled") {
//   enableDarkMode(); // set state of darkMode on page load
// }

// toggleBtn.addEventListener("click", (e) => {
//   darkMode = localStorage.getItem("dark-mode"); // update darkMode when clicked
//   if (darkMode === "disabled") {
//     enableDarkMode();
//   } else {
//     disableDarkMode();
//   }
// });

// Get the current theme from localStorage, if available
const savedTheme = localStorage.getItem('theme');

// Set the initial theme based on the saved value or use a default
if (savedTheme) {
  document.documentElement.setAttribute('data-bs-theme', savedTheme);
} else {
  document.documentElement.setAttribute('data-bs-theme', 'light'); // Default theme
}

// Add a click event listener to the button
document.getElementById('btnSwitch').addEventListener('click', () => {
  if (document.documentElement.getAttribute('data-bs-theme') == 'dark') {
    document.documentElement.setAttribute('data-bs-theme', 'light');
    // Save the theme setting to localStorage
    localStorage.setItem('theme', 'light');
  } else {
    document.documentElement.setAttribute('data-bs-theme', 'dark');
    // Save the theme setting to localStorage
    localStorage.setItem('theme', 'dark');
  }
});






