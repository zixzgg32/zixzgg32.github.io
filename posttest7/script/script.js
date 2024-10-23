document.addEventListener('DOMContentLoaded', function() {
    const hamburgerMenu = document.getElementById('hamburger-menu');
    if (hamburgerMenu) {
        hamburgerMenu.addEventListener('click', function() {
            document.getElementById('side-menu').style.width = '250px';
        });
    }

    const closeMenu = document.getElementById('close-menu');
    if (closeMenu) {
        closeMenu.addEventListener('click', function() {
            document.getElementById('side-menu').style.width = '0';
        });
    }

    const keyword = document.getElementById('keyword');
    const searchServices = document.getElementById('searchServices');
    keyword.addEventListener('keyup', function() {
        if (keyword.value === '') {
            if (searchServices) {
                searchServices.innerHTML = ''; 
            }
        } else {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (searchServices) {
                        searchServices.innerHTML = xhr.responseText;
                        attachModalEventListeners();
                    }
                }
            };
            xhr.open('GET', 'Database/showJasa.php?keyword=' + keyword.value, true);
            xhr.send();
        }
    });
});

const lightMode = document.getElementById('switchA');
const darkMode = document.getElementById('switchB');
if (lightMode) {
    lightMode.addEventListener('change', function() {
        if (this.checked) {
            document.body.classList.add('light-mode');
            document.body.classList.remove('dark-mode');
        }
    });
}
if (darkMode) {
    darkMode.addEventListener('change', function() {
        if (this.checked) {
            document.body.classList.add('dark-mode');
            document.body.classList.remove('light-mode');
        }
    });
}

var closeModal = document.querySelectorAll(".close");
for (i = 0; i < closeModal.length; i++) {
    closeModal[i].addEventListener("click", function() {
        var dia = this.parentNode.parentNode; /* You need to update this part if you change level of close button */
        dia.style.opacity = 0;
        dia.style.zIndex = -1;
    });
}

var modalButton = document.querySelectorAll(".btn-discuss");
for (i = 0; i < modalButton.length; i++) {
    modalButton[i].addEventListener("click", function() {
        var targetId = this.getAttribute("data-target");
        var target = document.getElementById(targetId);
        target.style.opacity = 1;
        target.style.zIndex = 9999;
    });
}

setInterval(function() {
    var modal = document.querySelector('.modal-message');
    var recipientId = document.querySelector('input[name="recipient"]').value;

    fetch('getMessages.php?recipient=' + recipientId)
        .then(response => response.text())
        .then(data => {
            modal.innerHTML = data; 
        });
}, 5000);
