const buttonShowMore = document.querySelector('.btn__show');
const section = document.querySelector('#about');
let paragraph = document.createElement("p", HTMLParagraphElement);
let link = document.createElement("a", HTMLLinkElement);
let buttonShowLess = document.createElement("button", HTMLButtonElement);

buttonShowMore.addEventListener('click', () => {
    buttonShowMore.style.display = "none";
    paragraph.innerHTML = "Here is the link to the amazing guide that explains you the game: <a href='https://lego-hmlcss.000webhostapp.com/app/views/documentatie.html' style='color:blueviolet'>Guide</a>";
    buttonShowLess.className = "btn__show";
    buttonShowLess.type = "button";
    buttonShowLess.innerText = "Show less";
    buttonShowLess.style.cursor = 'pointer';

    section.appendChild(paragraph);
    section.appendChild(buttonShowLess);
});

buttonShowLess.addEventListener('click', () => {
    paragraph.remove();
    buttonShowLess.remove();
    buttonShowMore.style.display = "block";
})