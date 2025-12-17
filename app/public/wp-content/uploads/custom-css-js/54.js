<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", () => {
  // 1. On page load, get the theme from localStorage and apply it
  const savedTheme = localStorage.getItem('theme');
  if (savedTheme) {
    document.documentElement.setAttribute('data-theme', savedTheme);
  }

  // 2. Handle theme toggle button click
  const themeToggle = document.getElementById('theme-toggle');
  if (themeToggle) {
    themeToggle.addEventListener('click', (event) => {
      event.preventDefault();
      const currentTheme = document.documentElement.getAttribute('data-theme');
      const newTheme = (currentTheme === 'dark') ? 'light' : 'dark';
      document.documentElement.setAttribute('data-theme', newTheme);
      localStorage.setItem('theme', newTheme);
    });
  }

  // 3. Highlight the parent menu item if any submenu item is marked as current
  const menuItems = document.querySelectorAll('.menu-item');
  menuItems.forEach((menuItem) => {
    // Look for a `.submenu-item.current` inside this menuItem
    const currentSubmenuItem = menuItem.querySelector('.submenu-item.current');
    if (currentSubmenuItem) {
      const title = menuItem.querySelector('.menu-item-title');
      if (title) {
        title.classList.add('current');
      }
    }
  });
});

</script>
<!-- end Simple Custom CSS and JS -->
