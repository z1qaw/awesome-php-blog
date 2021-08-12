function navbarSetActiveButton(buttonId) {
    navbarButtons = document.getElementsByClassName('nav-item')
    buttonToActive = navbarButtons[buttonId].children[0]
    buttonToActive.classList.add('active')
    console.log(buttonToActive)
}