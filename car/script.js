window.onclick = function(event) {
    let values = document.getElementsByClassName("value-counts");

    for(let i of values){
        if (event.target != i && !i.contains(event.target) && i.style.display == "block") {
            i.style.display = "none";
        }
    }
}

function valuesRegex(event){
    let values = event.target.nextElementSibling.getElementsByClassName("value-line");
    let regex = new RegExp(`^${event.target.value.toLowerCase()}$`)
    for(let i of values){
        let value;
        if(i.children.length == 0){
            value = i.innerHTML.toLowerCase().slice(0, event.target.value.toLowerCase().length);
        }else{
            value = i.children[1].innerHTML.toLowerCase().slice(0, event.target.value.toLowerCase().length);
        }
    
        if(event.target.value == "") {
            i.style.display = "block";
        }else if(regex.test(value) == true){
            i.style.display = "block";
        }else{
            i.style.display = "none";
        }
    }
}

function valuesBlur(event){
    let values = event.target.nextElementSibling.getElementsByClassName("value-line");
    for(let i of values){
        if(i.style.display == "block"){
            return;
        }
    }
    for(let i of values){
        i.style.display = "block";
    }
    event.target.value = "";
}

let inputDiv = document.getElementsByClassName("openValues");

for(let i of inputDiv){
    i.addEventListener("click", valuesMenu);
    i.addEventListener("input", valuesRegex);
    i.addEventListener("blur", valuesBlur);
}

function languageMenu(){
    let language_menu = document.getElementsByClassName("language-menu")[0];
    let display = language_menu.style.display;
    if(display == ""){
        language_menu.style.display = "block";
    }
    if(display == "block"){
        language_menu.style.display = "";
    }
}

function valuesMenu(event){
    setTimeout(() => {
        event.target.nextElementSibling.style.display = "block";
    }, 0.0001);
}

function valueLine(event){
    let parent = event.currentTarget.parentElement.parentElement;
    let element = event.currentTarget;

    if(element.children.length == 0){
        parent.previousElementSibling.value = element.innerHTML;
        parent.style.display = "none";
    }else{
        if(event.target.tagName != "INPUT"){
            if(element.children[0].checked == false) {
                element.children[0].checked = true;
            }else{
                element.children[0].checked = false;
            }
        }
    }
}

function choose(event){
    let parent = event.target.parentElement.parentElement;
    let input = parent.previousElementSibling
    let values = parent.getElementsByClassName("value-line");
    let inputValues = parent.previousElementSibling;
    console.log(window.getComputedStyle(inputValues).getPropertyValue("font-size"))

    input.value = "";

    for (let i of values) {
        if(i.children[0].checked == true){
            if(input.value == ""){
                input.value += i.children[1].innerHTML;
            }else{
                input.value += ", " + i.children[1].innerHTML;
            }
        }
    }

    parent.style.display = "none";

    console.log(input.value)
}

function noChoose(event){
    let parent = event.target.parentElement.parentElement;
    let input = parent.previousElementSibling
    let values = parent.getElementsByClassName("value-line");
    let inputValues = parent.previousElementSibling.value.split(", ");

    for (let i of values) {
        for(let j of inputValues){
            if(i.children[0].checked == true && j != i.children[1].innerHTML){
                i.children[0].checked = false;
            }
        }
    }

    parent.style.display = "none";
}

function getFileName(event){
    const files = event.target.files;
    let div = document.getElementsByClassName("img-container")[0];
    console.log(files)
    if (files) {
        div.textContent = "";
        for(let i of files){
            const fileReader = new FileReader();
            fileReader.readAsDataURL(i);
            fileReader.addEventListener("load", function () {
                let img_div = document.createElement("div");
                img_div.setAttribute("class", "img-div");
                let src = fileReader.result;
                img_div.style.backgroundImage = `url('${src}')`
                div.appendChild(img_div);
            });
        } 
    }
}

function previousimg(){
    let div = document.getElementsByClassName("images")[0];
    let count = document.getElementsByClassName("images")[0].getAttribute("data-count");
    let imgNames = document.getElementsByClassName("images")[0].getAttribute("data-image-names").split(",");

    if(count == 0){
        count = imgNames.length - 1;
    }else{
        count--;
    }

    div.style.backgroundImage = `url('addimages/${imgNames[count]}')`;
    div.setAttribute("data-count", count);
}

function nextimg(){
    let div = document.getElementsByClassName("images")[0];
    let count = document.getElementsByClassName("images")[0].getAttribute("data-count");
    let imgNames = document.getElementsByClassName("images")[0].getAttribute("data-image-names").split(",");

    if(count == imgNames.length - 1){
        count = 0;
    }else{
        count++;
    }

    div.style.backgroundImage = `url('addimages/${imgNames[count]}')`;
    div.setAttribute("data-count", count);
}

document.getElementById("img").addEventListener("change", getFileName);