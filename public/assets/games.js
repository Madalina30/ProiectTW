let htmlCatZone = document.querySelector(".categories-html");
let cssCatZone = document.querySelector(".categories-css");
const lang = document.querySelector(".language").innerText;
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

async function buildCategry(catZone, catData){
    let result = await fetch('../models/game.json').then(data=>data.json()).then(data=>data);
    let catHolder = ``;
    for(let i=0; i<catData.length; i++){
        let maxLevel = result[lang][catData[i][0]].length;
        let level = document.querySelector('.config .'+catData[i][0]+' .level').innerText;
        catHolder += `<div class="category-${catData[i][1]} categories-here">`;
        catHolder += `<img id="${catData[i][0]}" class="level-image ${catData[i][1]}" src="../../public/images/${catData[i][2]}" alt="${catData[i][3]}">`;
        catHolder += `<div class="${catData[i][1]}-text categories-text"> 
            <section class="section__${catData[i][1]}">
            ${lang=='ro'?'Nivele completate':'Levels done'}
                <span class="progress-${catData[i][1]} categories-data"> 
                    ${level} 
                </span> 
            </section>
            <section> 
                ${parseInt(level) < parseInt(maxLevel)?`
                <span class="bullet-cat"> &#8226; </span> 
                <span class="completed-${catData[i][1]} completed-data">
                    ${lang=='ro'?'Necompletat':'Not completed yet'}
                </span>`:`
                <span style='margin-left: 10px;color:green;'> &#8226; </span> 
                <span class="completed-${catData[i][1]} completed-data" style='color:green !important;'>
                ${lang=='ro'?'Completat':'Completed'}
                </span>`}
                
            </section>
        </div>
        </div>`;
    }
    catZone.innerHTML = catHolder;
    document.querySelector(".beginner-html").addEventListener('click', function() {
        let span = document.querySelector(".completed-beginner-html");
        if (span.innerText == 'Completed') {
            window.location.href = "templateCategory.php?cat=hb&level=" + (parseInt(document.querySelector('.config .htmlBeginner .level').innerText) - 1);
        } else {
            window.location.href = "templateCategory.php?cat=hb&level=" + document.querySelector('.config .htmlBeginner .level').innerText;
        }
    });
    
    document.querySelector(".intermediate-html").addEventListener('click', function() {
        let span = document.querySelector(".completed-intermediate-html");
        if (span.innerText == 'Completed') {
            window.location.href = "templateCategory.php?cat=hi&level=" + (parseInt(document.querySelector('.config .htmlIntermediate .level').innerText) - 1);
        } else {
            window.location.href = "templateCategory.php?cat=hi&level=" + document.querySelector('.config .htmlIntermediate .level').innerText;
        }
    });
    
    document.querySelector(".expert-html").addEventListener('click', function() {
        let span = document.querySelector(".completed-expert-html");
        if (span.innerText == 'Completed') {
            window.location.href = "templateCategory.php?cat=he&level=" + (parseInt(document.querySelector('.config .htmlExpert .level').innerText) - 1);
        } else {
            window.location.href = "templateCategory.php?cat=he&level=" + document.querySelector('.config .htmlExpert .level').innerText;
        }
    });
    
    document.querySelector(".beginner-css").addEventListener('click', function() {
        let span = document.querySelector(".completed-beginner-css");
        if (span.innerText == 'Completed') {
            window.location.href = "templateCategory.php?cat=cb&level=" + (parseInt(document.querySelector('.config .cssBeginner .level').innerText) - 1);
        } else {
            window.location.href = "templateCategory.php?cat=cb&level=" + document.querySelector('.config .cssBeginner .level').innerText;
        }
    });
    
    document.querySelector(".intermediate-css").addEventListener('click', function() {
        let span = document.querySelector(".completed-intermediate-css");
        if (span.innerText == 'Completed') {
            window.location.href = "templateCategory.php?cat=ci&level=" + (parseInt(document.querySelector('.config .cssIntermediate .level').innerText) - 1);
        } else {
            window.location.href = "templateCategory.php?cat=ci&level=" + document.querySelector('.config .cssIntermediate .level').innerText;
        }
    });
    
    document.querySelector(".expert-css").addEventListener('click', function() {
        let span = document.querySelector(".completed-expert-css");
        if (span.innerText == 'Completed') {
            window.location.href = "templateCategory.php?cat=ce&level=" + (parseInt(document.querySelector('.config .cssExpert .level').innerText) - 1);
        } else {
            window.location.href = "templateCategory.php?cat=ce&level=" + document.querySelector('.config .cssExpert .level').innerText;
        }
    });
}