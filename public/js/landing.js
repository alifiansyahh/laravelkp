// Tampilkan dropdown saat hover
document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll('nav ul li').forEach(item => {
    item.addEventListener('mouseenter', () => {
      const submenu = item.querySelector('ul');
      if (submenu) submenu.style.display = 'block';
    });
    item.addEventListener('mouseleave', () => {
      const submenu = item.querySelector('ul');
      if (submenu) submenu.style.display = 'none';
    });
  });
});
