var buttonSidebar = document.getElementById('sidebar-toggler')

buttonSidebar.onclick = function () {
    var elementSidebar = document.getElementById('sidebar')
    elementSidebar.classList.toggle('show-sidebar')

    var bodyOverlay = document.getElementById('body-overlay')
    bodyOverlay.classList.toggle('body-overlay-show')
}

var bodyOverlay = document.getElementById('body-overlay')
bodyOverlay.onclick = function () {
    var elementSidebar = document.getElementById('sidebar')
    elementSidebar.classList.toggle('show-sidebar')

    var bodyOverlay = document.getElementById('body-overlay')
    bodyOverlay.classList.toggle('body-overlay-show')
}

var nameTagIcon = document.getElementById('name-tag-icon-zaki')
nameTagIcon.onclick = function () {
    var nameTag = document.getElementById('name-tag-zaki')
    nameTag.classList.toggle('opacity-1')
}

var nameTagIcon = document.getElementById('name-tag-icon-okta')
nameTagIcon.onclick = function () {
    var nameTag = document.getElementById('name-tag-okta')
    nameTag.classList.toggle('opacity-1')
}

var nameTagIcon = document.getElementById('name-tag-icon-meisha')
nameTagIcon.onclick = function () {
    var nameTag = document.getElementById('name-tag-meisha')
    nameTag.classList.toggle('opacity-1')
}

// password toggle
function passwordToggle() {
    var toggleIconClose = document.getElementById('eye-close')
    var toggleIconOpen = document.getElementById('eye-open')
    toggleIconClose.classList.toggle('d-none')
    toggleIconOpen.classList.toggle('d-block')

    var input = document.getElementById("password");
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}

function passwordToggle2() {
    var toggleIconClose = document.getElementById('eye-close')
    var toggleIconOpen = document.getElementById('eye-open')
    toggleIconClose.classList.toggle('d-none')
    toggleIconOpen.classList.toggle('d-block')

    var input = document.getElementById("password_confirmation");
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}