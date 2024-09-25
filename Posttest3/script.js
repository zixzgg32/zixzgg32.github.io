document.querySelector('.btn-search').addEventListener('click', function() {
    const searchTerm = document.querySelector('.search-bar input').value;
    alert('Searching for: ' + searchTerm);
});

document.getElementById('hamburger-menu').addEventListener('click', function() {
    document.getElementById('side-menu').style.width = '250px';
});

document.getElementById('close-menu').addEventListener('click', function() {
    document.getElementById('side-menu').style.width = '0';
});

const discussButtons = document.querySelectorAll('.btn-discuss');
discussButtons.forEach(button => {
    button.addEventListener('click', function() {
        alert('Not Available');
    });
});

document.getElementById('switch').addEventListener('change', function() {
    if (this.checked) {
        document.body.classList.add('dark-mode');
        document.body.classList.remove('light-mode');
    } else {
        document.body.classList.add('light-mode');
        document.body.classList.remove('dark-mode');
    }
});