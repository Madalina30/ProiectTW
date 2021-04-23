let buttonEnabled = false;
const textZone = document.querySelector(".where-you-write");
const description = document.querySelector(".lvlDescription");
const categoryName = document.querySelector(".categoryName");
const lvlName = document.querySelector(".lvlName");
const nextLevel = document.querySelector(".next-level");
const imgSeeDefault = document.querySelector(".what-you-see");
const level = nextLevel.getAttribute("level"); 
const maxLevel = nextLevel.getAttribute("max-level");
const attempts = document.querySelector(".attempts");
const textRight = document.querySelector(".where-you-see");
const toLevels = document.querySelectorAll(".toLevel");
let fromUrl = getCategoryAndLevel();
let categoryChosen = fromUrl.cat;
// console.log(categoryChosen);
nextLevel.innerText = "Check Validity";

goToLevel();
if (categoryChosen.includes('h')) {
    showMeHTML();


    textZone.addEventListener("keyup", ()=>{
        showMeHTML();
    })
} else if (categoryChosen.includes('c')) {
    showMeCSS()
    textZone.addEventListener("keyup", ()=>{
       showMeCSS();
    })
}

function showMeCSS(){
    let css = document.querySelectorAll('.where-you-write > *');
    //  console.log(textZone.outerHTML)
    let newCss = ["<style>"];
        for(let i=0;i<css.length;i++){
            if(css[i].classList.contains("input-zone")){
                newCss.push(css[i].value);
            }else{
                newCss.push(css[i].innerText?css[i].innerText:css[i].outerHTML);
            }
        }
    newCss = newCss.join("(P)").replaceAll("<br>","").replaceAll(",","").split("(P)");
    newCss = newCss.slice(0, newCss.length-3)
    newCss.push("</style>")
    newCss = newCss.join("")
    document.querySelector(".style-css").innerHTML = newCss
    console.log(newCss)
}
function showMeHTML(){
    let html = document.querySelectorAll('.where-you-write > *');
    let newHtml = [];
    for(let i=0;i<html.length;i++){
        if(html[i].classList.contains("input-zone")){
            newHtml.push(html[i].value);
        }else{

            console.log(html[i].outerHTML)
            newHtml.push(html[i].innerText?html[i].innerText:html[i].outerHTML);
        }
    }
    newHtml = newHtml.slice(0, newHtml.length-2)
    textRight.innerHTML = newHtml.join("");
}


let pointsPerLevel = 20;

async function loadAnswers(type, level){
    const result = await fetch('../models/game.json').then(data=>data.json()).then(data=>data);
    if (checkValidity(result[type][level]) == true) {
        buttonEnabled = true;
        ////// sweet alert    
        Swal.fire({
            icon: 'success',
            title: 'Great job!',
            text: 'You answered correctly! You can go to the next level with ' + pointsPerLevel + " points!"
          }).then((result) => {
            if (result.isConfirmed) {
              nextLevel.innerText = 'Next Level'
            }
          });
        //   nextLevel.innerText = 'Next Level'
        console.log("Atatea pnt la level ", level, ": ", pointsPerLevel);

    } else {
        buttonEnabled = false;
        let intAttempt = parseInt(attempts.innerText)
        console.log(intAttempt + "da")
        attempts.innerText = intAttempt + 1;
        pointsPerLevel -= 1;
        ////// sweet alert
        Swal.fire({
            icon: 'error',
            title: 'Wrong answer!',
            text: 'You submitted a wrong answer! You got -1 points and -1 attempts!',
          });
        
    }
}

function checkValidity(data){
    const answers = data.lvlAnswers;
    let inputs = document.querySelectorAll('.where-you-write > input');
    let c = 0, c1=0;
    for(let i=0;i<inputs.length;i++){
        if(inputs[i].value == answers[i]){
            c1++;
        }
    }
    console.log(c1, " ", answers.length)
    if(c1 == answers.length){
        console.log("esti jmecher")
        return true;
    } else {
        return false;
    }
}




try {
    switch (categoryChosen) {
        case "hb":
            // buildLevel(category.htmlBeginner[0]);
           
            document.querySelector(".next-level").addEventListener('click', function() {
                checkLevel("templateCategory.php?cat=hb&level="+level, "templateCategory.php?cat=hi&level=", "htmlBeginner")
            });


            var style = document.createElement('style');
            style.innerHTML = `
            .body__category {
                background-color: #bff8bf;
            }
            .btn-fill {
                background-color: #2c713159;
            }
            .game-container-center {
                color: #2C7131;
            }
            .where-you-write {
                background-color: #33AF3D;
                color: white;
            }
            .where-you-write input {
                background-color: #2C7131;
                color: white;
            }
            .next-level {
                background-color: #2C7131;
                color: white;
            }
            .level-at:hover, .level-at:focus {
                background-color: #2C7131;
            }
            .see-levels, .dropdown-content {
                background-color: #2C7131;
            }
            `;
            document.head.appendChild(style);
            break;
        case "hi":
            // buildLevel(category.htmlIntermediate[0]);

            document.querySelector(".next-level").addEventListener('click', function() {
                checkLevel("templateCategory.php?cat=hi&level="+level, "templateCategory.php?cat=he&level=", "htmlIntermediate")
            });
            var style = document.createElement('style');
            style.innerHTML = `
            .body__category {
                background-color: #F8E38D;
            }
            .btn-fill {
                background-color: #beab5ea6;
            }
            .where-you-write {
                background-color: #E0BC2A;
            }
            .where-you-write input {
                background-color: #C6A726;
                color: black;
            }
            .next-level {
                background-color: #C6A726;
            }

            .level-at:hover, .level-at:focus {
                background-color: #C6A726;
            }
            .see-levels, .dropdown-content {
                background-color: #C6A726;
            }
            `;
            document.head.appendChild(style);
            break;
        case "he":
            // buildLevel(category.htmlExpert[0]);
            document.querySelector(".next-level").addEventListener('click', function() {
                checkLevel("templateCategory.php?cat=he&level="+level, "templateCategory.php?cat=cb&level=", "htmlExpert")
            });
            var style = document.createElement('style');
            style.innerHTML = `
            .body__category {
                background-color: #FAB9B9;
            }
            .btn-fill {
                background-color: #b713135d;
            }
            .where-you-write {
                background-color: #E83434;
                color: white;
            }
            .where-you-write input {
                background-color: #B71313;
                color: white;
            }
            .next-level {
                background-color: #B71313;
                color: white;
            }
            .level-at:hover, .level-at:focus {
                background-color: #B71313;
            }
            .see-levels, .dropdown-content {
                background-color: #B71313;
            }
            `;
            document.head.appendChild(style);
            break;
        case "cb":
            // buildLevel(category.cssBeginner[0]);
            document.querySelector(".next-level").addEventListener('click', function() {
                checkLevel("templateCategory.php?cat=cb&level="+level, "templateCategory.php?cat=ci&level=", "cssBeginner")
            });
            var style = document.createElement('style');
            style.innerHTML = `
            .body__category {
                background-color: #D3EEF9;
                color: #054863;
            }
            .btn-fill {
                background-color: #81dafd4d;
            }
            .where-you-write {
                background-color: #A7E4FF;
            }
            .where-you-write input {
                background-color: #7ECEF2;
                color: black;
            }
            .next-level {
                background-color: #7ECEF2;
                color: #054863;
            }
            .level-at:hover, .level-at:focus {
                background-color: #7ECEF2;
            }
            .see-levels, .dropdown-content {
                background-color: #7ECEF2;
            }
            `;
            document.head.appendChild(style);
            break;
        case "ci":
            // buildLevel(category.cssIntermediate[0]);
            document.querySelector(".next-level").addEventListener('click', function() {
                checkLevel("templateCategory.php?cat=ci&level="+level, "templateCategory.php?cat=ce&level=", "cssIntermediate")
            });
            var style = document.createElement('style');
            style.innerHTML = `
            .body__category {
                background-color: #f7f3cf;
                color: #695726;
            }
            .btn-fill {
                background-color: #69572656;
            }
            .where-you-write {
                background-color: #968046;
                color: white;
            }
            .where-you-write input {
                background-color: #695726;
                color: white;
            }
            .next-level {
                background-color: #695726;
                color: white;
            }
            .level-at:hover, .level-at:focus {
                background-color: #695726;
            }
            .see-levels, .dropdown-content {
                background-color: #695726;
            }
            `;
            document.head.appendChild(style);
            break;
        case "ce":
            // buildLevel(category.cssExpert[0]);
            document.querySelector(".next-level").addEventListener('click', function() {
                checkLevel("templateCategory.php?cat=ce&level="+level, "allgames.html", "cssExpert")
            });
            var style = document.createElement('style');
            style.innerHTML = `
            .body__category {
                background: linear-gradient(180deg, rgba(211,238,249,1) 0%, rgba(191,248,191,1) 100%);
                color: #054863;
            }
            .btn-fill {
                background-color: #81dafd4d;
            }
            .where-you-write {
                background-color: #22A62D;
                color: white;
            }
            .where-you-write input {
                background-color: #245C28;
                color: white;
            }
            .next-level {
                background-color: #245C28;
                color: white;
            }
            .level-at:hover, .level-at:focus {
                background-color: #7ECEF2;
            }
            .see-levels, .dropdown-content {
                background-color: #7ECEF2;
            }
            .what-you-see {
            }
            .img-level-here {
                position: relative !important;
                top: 50%;
            }
            `;
            document.head.appendChild(style);
            break;
        default:
            break;
    }

    console.log(fromUrl.cat, level);
} catch (error) {
    console.log(error);
}

function buildLevel(...lvlData){
    lvlData = lvlData[0];
    const input = `<input type="text" name="html" id="level${lvlData.lvlName}-html"
    class="input-zone">`;
    lvlName.innerText = lvlData.lvlName;
    categoryName.innerText = lvlData.categoryName;
    description.innerHTML = lvlData.lvlDescription;
    textZone.innerHTML = lvlData.lvlTemplate.split("[cod]").join(input) + textZone.innerHTML;
    const image = `<img src="../../public/images/${lvlData.lvlImg}" alt="">`;
    imgSeeDefault.innerHTML = image;
}

function getCategoryAndLevel(){
    const q = {};
    location.href.split('?')[1].split('&').forEach(
        function(i)
        {
            q[i.split('=')[0]]=i.split('=')[1];
        }
    );
    return q;
}

function checkLevel(toLower, toHigher, category){
    
    if(buttonEnabled){
        console.log("treci")
        if(parseInt(level)<parseInt(maxLevel)){
            window.location.href = toLower;
            pointsPerLevel = 20;
        }else{
            toHigher === "allgames.html"?window.location.href = toHigher:window.location.href = toHigher+0;
        }
    }else{
        loadAnswers(category, level - 1) 
    }
  
    
}

function goToLevel(){
    //categoryChosen
    for(let i=0;i<toLevels.length;i++){
        toLevels[i].addEventListener("click", ()=>{
            let level = toLevels[i].getAttribute("level");
            window.location.href = `templateCategory.php?cat=${categoryChosen}&level=${level}`
        })
    }
}
///////////////////////////////
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown menu if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.level-at')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }