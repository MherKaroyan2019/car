// window.onclick = function(event) {
//     let values = document.getElementsByClassName("value-counts");

//     for(let i of values){
//         if (event.target != i && !i.contains(event.target) && i.style.display == "block") {
//             i.style.display = "none";
//         }
//     }
// }
console.log(1);
$( window ).click(function(evt){
    let targ = $(evt.target);
    let values = $(".value-counts")
    values.each(function(index, element){
        if($(element) != targ && !$.contains($(element),targ) && $(element).css("display") == "block"){
            $(element).css("display", "none");
        }
    })
})

$( document ).ready(function() {
    $(".openValues").on({
        click: function(){
            setTimeout(() => {
                $(this).next().css("display", "block");
            }, 0.0001);
        },
        input: function(){
            let input = $(this);
            let values = input.next().find(".value-line")
            let regex = new RegExp('^' + input.val().toLowerCase() + '$');
            values.each(function(index, element) { 
                let value;
                if($(element).find("*").length == 0){
                    value = $(element).text().toLowerCase().slice(0, input.val().length);
                }else{
                    value = $(element).children().eq(1).text().toLowerCase().slice(0, input.val().length);
                }
                
                if(regex.test(value) == true){
                    $(element).css("display", "block");
                }else{
                    $(element).css("display", "none");
                }
            });
        },
        blur: function(){
            let values = $(this).next().find(".value-line");
            values.each(function(index, element){
                $(element).css("display", "block");
            })
            $(this).val("");
        }
    })
    $(".lang").click(function(){
        $(".language-menu").toggle();
    })
    $(".value-line").click(function(evt){
        let parent = $(this).parent().parent();
        let input = parent.prev();

        if($(this).children().length == 0){
            input.val($(this).text());
            parent.css("display", "none");
        }else if($(evt.target).prop("tagName") == "LABEL"){
            parent.css("display", "block");
            $(evt.target).prev().prop("checked", !$(evt.target).prev().prop("checked"));
        }
    })
    $(".shoose").click(function(){
        let parent = $(this).parent().parent();
        let input = parent.prev();
        let values = parent.find(".value-line");
        let vals = [];
        values.each(function(index, element){
            if($(element).children().first().prop("checked") == true){
                vals.push($(element).children().eq(1).text());
            }
        });
        input.val(vals.join(", "));
        console.log()
        parent.hide();
    })
    $(".noshoose").click(function(){
        let parent = $(this).parent().parent();
        let input = parent.prev();
        let values = parent.find(".value-line");
        let inputVal = input.val().split(", ");
        values.each(function(i1, e1){
            for (const iterator of inputVal) {
                if($(e1).children().first().prop("checked") == true && iterator != $(e1).children().first().val()){
                    $(e1).children().first().prop("checked", false);
                }
            }
        })
        parent.hide();
    })
    $("#img").change(function(){
        const files = $(this)[0].files;
        let imgCont = $(".img-container");

        if(files){
            imgCont.html("");
            for(let i of files){
                const fileReader = new FileReader();
                fileReader.readAsDataURL(i);
                fileReader.addEventListener("load", function () {
                    let img_div = $("<div class='img-div'></div>");
                    let src = fileReader.result;
                    img_div.css("background-image", `url('${src}')`)
                    imgCont.append(img_div);
                });
            }
        }
    })
    $(".left-arrow").click(function(){
        let div = $(".images");
        let count = div.attr("data-count");
        let imgNames = div.attr("data-image-names").split(",");

        --count
        if(count < 0){
            count = imgNames.length - 1;
        }

        div.css("background-image", `url('../assets/addimages/${imgNames[count]}')`);
        div.attr("data-count", count);
    })
    $(".right-arrow").click(function(){
        let div = $(".images");
        let count = div.attr("data-count");
        let imgNames = div.attr("data-image-names").split(",");

        ++count
        if(count >= imgNames.length){
            count = 0;
        }

        div.css("background-image", `url('../assets/addimages/${imgNames[count]}')`);
        div.attr("data-count", count);
    })
    $(".button").click(function(){
        console.log(1)
        $(".sections-content").animate({
            width: 'toggle'
        });
    })
    $(".block h2").click(function(){
        $(this).next().animate({
            height: 'toggle'
        });
    })
    $(".filt").click(function(){
        $(".search-form").toggle();
    })
    $(".change").click(function(){
        $(this).prev().removeAttr('disabled');
        $(this).hide();
        $(this).next().css("display", "flex");
    })
    $(".no").click(function(){
        console.log($(this).parent(".changesubmit").prev().prev().attr('value'))
        $(this).parent(".changesubmit").prev().prev().attr('disabled','disabled');
        $(this).parent(".changesubmit").prev().prev().attr('value', $(this).parent(".changesubmit").prev().prev().attr('data-value'));
        $(this).parent(".changesubmit").prev().css("display", "inline-block");
        $(this).parent(".changesubmit").hide();
    })
});

// function valuesRegex(event){
//     let values = event.target.nextElementSibling.getElementsByClassName("value-line");
//     let regex = new RegExp(`^${event.target.value.toLowerCase()}$`)
//     for(let i of values){
//         let value;
//         if(i.children.length == 0){
//             value = i.innerHTML.toLowerCase().slice(0, event.target.value.toLowerCase().length);
//         }else{
//             value = i.children[1].innerHTML.toLowerCase().slice(0, event.target.value.toLowerCase().length);
//         }
    
//         if(event.target.value == "") {
//             i.style.display = "block";
//         }else if(regex.test(value) == true){
//             i.style.display = "block";
//         }else{
//             i.style.display = "none";
//         }
//     }
// }

// function valuesBlur(event){
//     let values = event.target.nextElementSibling.getElementsByClassName("value-line");
//     for(let i of values){
//         if(i.style.display == "block"){
//             return;
//         }
//     }
//     for(let i of values){
//         i.style.display = "block";
//     }
//     event.target.value = "";
// }

// function valuesMenu(event){
//     setTimeout(() => {
//         event.target.nextElementSibling.style.display = "block";
//     }, 0.0001);
// }



// let inputDiv = document.getElementsByClassName("openValues");

// for(let i of inputDiv){
//     // i.addEventListener("click", valuesMenu);
//     // i.addEventListener("input", valuesRegex);
//     // i.addEventListener("blur", valuesBlur);
// }

// function languageMenu(){
//     let language_menu = document.getElementsByClassName("language-menu")[0];
//     let display = language_menu.style.display;
//     if(display == ""){
//         language_menu.style.display = "block";
//     }
//     if(display == "block"){
//         language_menu.style.display = "";
//     }
// }


// function valueLine(event){
//     let parent = event.currentTarget.parentElement.parentElement;
//     let element = event.currentTarget;

//     if(element.children.length == 0){
//         parent.previousElementSibling.value = element.innerHTML;
//         parent.style.display = "none";
//     }else{
//         if(event.target.tagName != "INPUT"){
//             if(element.children[0].checked == false) {
//                 element.children[0].checked = true;
//             }else{
//                 element.children[0].checked = false;
//             }
//         }
//     }
// }

// function choose(event){
//     let parent = event.target.parentElement.parentElement;
//     let input = parent.previousElementSibling
//     let values = parent.getElementsByClassName("value-line");
//     let inputValues = parent.previousElementSibling;
//     console.log(window.getComputedStyle(inputValues).getPropertyValue("font-size"))

//     input.value = "";

//     for (let i of values) {
//         if(i.children[0].checked == true){
//             if(input.value == ""){
//                 input.value += i.children[1].innerHTML;
//             }else{
//                 input.value += ", " + i.children[1].innerHTML;
//             }
//         }
//     }

//     parent.style.display = "none";

//     console.log(input.value)
// }

// function noChoose(event){
//     let parent = event.target.parentElement.parentElement;
//     let input = parent.previousElementSibling
//     let values = parent.getElementsByClassName("value-line");
//     let inputValues = parent.previousElementSibling.value.split(", ");

//     for (let i of values) {
//         for(let j of inputValues){
//             if(i.children[0].checked == true && j != i.children[1].innerHTML){
//                 i.children[0].checked = false;
//             }
//         }
//     }

//     parent.style.display = "none";
// }

// function getFileName(event){
//     const files = event.target.files;
//     let div = document.getElementsByClassName("img-container")[0];
//     if (files) {
//         div.textContent = "";
//         for(let i of files){
//             const fileReader = new FileReader();
//             fileReader.readAsDataURL(i);
//             fileReader.addEventListener("load", function () {
//                 let img_div = document.createElement("div");
//                 img_div.setAttribute("class", "img-div");
//                 let src = fileReader.result;
//                 img_div.style.backgroundImage = `url('${src}')`
//                 div.appendChild(img_div);
//             });
//         } 
//     }
// }

// function previousimg(){
//     let div = document.getElementsByClassName("images")[0];
//     let count = document.getElementsByClassName("images")[0].getAttribute("data-count");
//     let imgNames = document.getElementsByClassName("images")[0].getAttribute("data-image-names").split(",");

//     if(count == 0){
//         count = imgNames.length - 1;
//     }else{
//         count--;
//     }

//     div.style.backgroundImage = `url('addimages/${imgNames[count]}')`;
//     div.setAttribute("data-count", count);
// }

// function nextimg(){
//     let div = document.getElementsByClassName("images")[0];
//     let count = document.getElementsByClassName("images")[0].getAttribute("data-count");
//     let imgNames = document.getElementsByClassName("images")[0].getAttribute("data-image-names").split(",");

//     if(count == imgNames.length - 1){
//         count = 0;
//     }else{
//         count++;
//     }

//     div.style.backgroundImage = `url('addimages/${imgNames[count]}')`;
//     div.setAttribute("data-count", count);
// }

// if(document.getElementById("img")){
//     document.getElementById("img").addEventListener("change", getFileName);
// }