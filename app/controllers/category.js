const category = {
    htmlBeginner: [
        // array de nivele
        {
            categoryName:'HTML - Beginner',
            lvlName:'1',
            lvlDescription:`This is the description of this level, please pay
            attention bla bla this level is very interesting 
            bla bla bl ablbThis is the description of this level, please pay
            attention bla bla this level is very interesting 
            bla bla bl ablb
            <br>
            Link for: `,
            lvlAnswers:['html','head','head','html'],
            lvlTemplate:`&lt;[cod]><br>
            &nbsp; &lt;[cod]>
                            <br>
                            &nbsp;&nbsp; &lt;title> titlu &lt;/title><br>
                            &nbsp; &lt;/[cod]><br>
                        &lt;/[cod]>`,
            lvlImg: 'htmlDefaultBeginner.svg'
        }
    ],
    htmlIntermediate: [
        {
            categoryName:'HTML - Intermediate',
            lvlName:'1',
            lvlDescription:`This is the description of this level, please pay
            attention bla bla this level is very interesting 
            bla bla bl ablbThis is the description of this level, please pay
            attention bla bla this level is very interesting 
            bla bla bl ablb
            <br>
            Link for: `,
            lvlAnswers:[''],
            lvlTemplate:`&lt;[cod]><br>
            &nbsp; &lt;[cod]>
                            <br>
                            &nbsp;&nbsp; &lt;title> titlu &lt;/title><br>
                            &nbsp; &lt;/[cod]><br>
                        &lt;/[cod]>`,
            lvlImg: 'htmlDefaultIntermediate.svg'

        }
    ],
    htmlExpert: [
        {
            categoryName:'HTML - Expert',
            lvlName:'1',
            lvlDescription:`This is the description of this level, please pay
            attention bla bla this level is very interesting 
            bla bla bl ablbThis is the description of this level, please pay
            attention bla bla this level is very interesting 
            bla bla bl ablb
            <br>
            Link for: `,
            lvlAnswers:[''],
            lvlTemplate:`&lt;[cod]><br>
            &nbsp; &lt;[cod]>
                            <br>
                            &nbsp;&nbsp; &lt;title> titlu &lt;/title><br>
                            &nbsp; &lt;/[cod]><br>
                        &lt;/[cod]>`,
            lvlImg: 'htmlDefaultExpert.svg'
        }
    ],
    cssBeginner: [
        {
            categoryName:'CSS - Beginner',
            lvlName:'1',
            lvlDescription:`This is the description of this level, please pay
            attention bla bla this level is very interesting 
            bla bla bl ablbThis is the description of this level, please pay
            attention bla bla this level is very interesting 
            bla bla bl ablb
            <br>
            Link for: `,
            lvlAnswers:[''],
            lvlTemplate:`&lt;[cod]><br>
            &nbsp; &lt;[cod]>
                            <br>
                            &nbsp;&nbsp; &lt;title> titlu &lt;/title><br>
                            &nbsp; &lt;/[cod]><br>
                        &lt;/[cod]>`,
            lvlImg: 'cssDefaultBeginner.svg'
        }
    ],
    cssIntermediate: [
        {
            categoryName:'CSS - Intermediate',
            lvlName:'1',
            lvlDescription:`This is the description of this level, please pay
            attention bla bla this level is very interesting 
            bla bla bl ablbThis is the description of this level, please pay
            attention bla bla this level is very interesting 
            bla bla bl ablb
            <br>
            Link for: `,
            lvlAnswers:[''],
            lvlTemplate:`&lt;[cod]><br>
            &nbsp; &lt;[cod]>
                            <br>
                            &nbsp;&nbsp; &lt;title> titlu &lt;/title><br>
                            &nbsp; &lt;/[cod]><br>
                        &lt;/[cod]>`,
            lvlImg: 'cssDefaultIntermediar.svg'
        }
    ],
    cssExpert: [
        {
            categoryName:'CSS - Expert',
            lvlName:'1',
            lvlDescription:`This is the description of this level, please pay
            attention bla bla this level is very interesting 
            bla bla bl ablbThis is the description of this level, please pay
            attention bla bla this level is very interesting 
            bla bla bl ablb
            <br>
            Link for: `,
            lvlAnswers:[''],
            lvlTemplate:`&lt;[cod]><br>
            &nbsp; &lt;[cod]>
                            <br>
                            &nbsp;&nbsp; &lt;title> titlu &lt;/title><br>
                            &nbsp; &lt;/[cod]><br>
                        &lt;/[cod]>`,
            lvlImg: 'cssDefaultExpert.svg'
        }
    ]

}

const textZone = document.querySelector(".where-you-write");
const description = document.querySelector(".lvlDescription");
const categoryName = document.querySelector(".categoryName");
const lvlName = document.querySelector(".lvlName");
const nextLevel = document.querySelector(".next-level");
const imgSeeDefault = document.querySelector(".what-you-see");


try {
    let fromUrl = getCategoryAndLevel();
    let categoryChosen = fromUrl.cat;
    // let levelAt = fromUrl.lvl;
    switch (categoryChosen) {
        case "hb":
            buildLevel(category.htmlBeginner[0]);
           
            document.querySelector(".next-level").addEventListener('click', function() {
                
                window.location.href = "templateCategory.html?cat=hi";
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
            .see-levels {
                background-color: #2C7131;
            }
            `;
            document.head.appendChild(style);
            break;
        case "hi":
            buildLevel(category.htmlIntermediate[0]);

            document.querySelector(".next-level").addEventListener('click', function() {
                window.location.href = "templateCategory.html?cat=he";
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
            }
            .next-level {
                background-color: #C6A726;
            }
            .see-levels {
                background-color: #C6A726;
            }
            `;
            document.head.appendChild(style);
            break;
        case "he":
            buildLevel(category.htmlExpert[0]);
            document.querySelector(".next-level").addEventListener('click', function() {
                window.location.href = "templateCategory.html?cat=cb";
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
            }
            .next-level {
                background-color: #B71313;
                color: white;
            }
            .see-levels {
                background-color: #B71313;
            }
            `;
            document.head.appendChild(style);
            break;
        case "cb":
            buildLevel(category.cssBeginner[0]);
            document.querySelector(".next-level").addEventListener('click', function() {
                window.location.href = "templateCategory.html?cat=ci";
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
            }
            .next-level {
                background-color: #7ECEF2;
                color: #054863;
            }
            .see-levels {
                background-color: #7ECEF2;
            }
            `;
            document.head.appendChild(style);
            break;
        case "ci":
            buildLevel(category.cssIntermediate[0]);
            document.querySelector(".next-level").addEventListener('click', function() {
                window.location.href = "templateCategory.html?cat=ce";
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
            .see-levels {
                background-color: #695726;
            }
            `;
            document.head.appendChild(style);
            break;
        case "ce":
            buildLevel(category.cssExpert[0]);
            document.querySelector(".next-level").addEventListener('click', function() {
                window.location.href = "allgames.html";
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
            .see-levels {
                background-color: #7ECEF2;
            }
            `;
            document.head.appendChild(style);
            break;
        default:
            break;
    }

    console.log(fromUrl.cat);
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