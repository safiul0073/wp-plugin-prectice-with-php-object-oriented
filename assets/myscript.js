window.addEventListener("load", function () {

    var menuButtons = document.querySelectorAll("ul.nav-tabs > li");
    
    for (i = 0; i < menuButtons.length; i++) {
        menuButtons[i].addEventListener("click", switchTab)
    }


})

function switchTab (event) {
    event.preventDefault()
    document.querySelector("ul.nav-tabs li.active").classList.remove("active")
    document.querySelector(".tab-pane.active").classList.remove("active")

    var clickedTab = event.currentTarget
    var anchor = event.target;
    var activePanId = anchor.getAttribute("href")
    clickedTab.classList.add("active")
    document.querySelector(activePanId).classList.add("active")
}