const toggleBtn = document.getElementById("toggleBtn");
const navList = document.getElementById("navList");

toggleBtn.addEventListener('click', () => {
    navList.classList.toggle('active');
});

