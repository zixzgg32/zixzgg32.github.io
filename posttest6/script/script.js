document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.btn-search').addEventListener('click', function() {
        const searchTerm = document.querySelector('.search-bar input').value;
        alert('Searching for: ' + searchTerm);
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('hamburger-menu').addEventListener('click', function() {
        document.getElementById('side-menu').style.width = '250px';
    });
});

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('close-menu').addEventListener('click', function() {
        document.getElementById('side-menu').style.width = '0';
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const discussButtons = document.querySelectorAll('.btn-discuss');
    discussButtons.forEach(button => {
        button.addEventListener('click', function() {
            alert('Not Available');
        });
    });
});

const lightMode = document.getElementById('switchA');
const darkMode = document.getElementById('switchB');
lightMode.addEventListener('change', function() {
    if (this.checked) {
        document.body.classList.add('light-mode');
        document.body.classList.remove('dark-mode');
    }
});
darkMode.addEventListener('change', function() {
    if (this.checked) {
        document.body.classList.add('dark-mode');
        document.body.classList.remove('light-mode');
    }
});