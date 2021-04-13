let htmlCatZone = document.querySelector(".categories-html");
let cssCatZone = document.querySelector(".categories-css");
let htmlCat = [
    ["htmlBeginner", "beginner-html", "htmlBegGames.svg", "beginner"],
    ["htmlIntermediate", "intermediate-html", "htmlIntGames.svg", "intermediate"],
    ["htmlExpert", "expert-html", "htmlExpGames.svg", "expert"],
]
let cssCat = [
    ["cssBeginner", "beginner-css", "cssBegGames.svg", "beginner"],
    ["cssIntermediate", "intermediate-css", "cssIntGames.svg", "intermediate"],
    ["cssExpert", "expert-css", "cssExpGames.svg", "expert"],
]


buildCategry(htmlCatZone, htmlCat);
buildCategry(cssCatZone, cssCat);


function buildCategry(catZone, catData){
    let catHolder = ``;
    for(let i=0; i<catData.length; i++){
        catHolder += `<div class="category-${catData[i][1]} categories-here">`;
        catHolder += `<img id="${catData[i][0]}" class="level-image ${catData[i][1]}" src="../../public/images/${catData[i][2]}" alt="${catData[i][3]}">`;
        catHolder += `<div class="${catData[i][1]}-text categories-text"> 
            <section class="section__${catData[i][1]}">
                Levels done: 
                <span class="progress-${catData[i][1]} categories-data"> 
                    x 
                </span> 
            </section>
            <section> 
                <span class="bullet-cat"> &#8226; </span> 
                <span class="completed-${catData[i][1]} completed-data">
                    Not completed yet
                </span>
            </section>
        </div>
        </div>`;
    }
    catZone.innerHTML = catHolder;
}

document.querySelector(".beginner-html").addEventListener('click', function() {
    window.location.href = "templateCategory.php?cat=hb"
    // sa se duca la nivelul la care a ramas - db
});

document.querySelector(".intermediate-html").addEventListener('click', function() {
    window.location.href = "templateCategory.php?cat=hi"
});

document.querySelector(".expert-html").addEventListener('click', function() {
    window.location.href = "templateCategory.php?cat=he"
});

document.querySelector(".beginner-css").addEventListener('click', function() {
    window.location.href = "templateCategory.php?cat=cb"
});

document.querySelector(".intermediate-css").addEventListener('click', function() {
    window.location.href = "templateCategory.php?cat=ci"
});

document.querySelector(".expert-css").addEventListener('click', function() {
    window.location.href = "templateCategory.php?cat=ce"
});

