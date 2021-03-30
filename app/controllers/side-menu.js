let menuBtn = document.getElementById("menuButton");
let nav = document.querySelector(".nav__appear");
let exit = document.querySelector(".exit");

menuBtn.addEventListener('click', onClick);
exit.addEventListener('click', onBodyClick);



function onClick() {
    nav.classList.add('is--open');
}

function onBodyClick(e) {
    console.log(e);
    if (
        menuBtn.contains(e.target)
    ) {
        return;
    }

    nav.classList.remove('is--open');
    
}