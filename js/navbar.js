function navbarSetActiveButton(buttonId) {
    navbarButtons = document.getElementsByClassName('nav-item')
    buttonToActive = navbarButtons[buttonId].children[0]
    buttonToActive.classList.add('active')
    buttonToActive.classList.add('disabled')
    console.log(buttonToActive)
}