// script for registration route
// let dob = document.querySelector(".date");
// for (let x = 0; x < dob.children.length; x++){
//
//     dob.children[x].addEventListener('blur',function (e){
//         let data = dob.children;
//     })
// }


let genderOption = document.querySelector('.gender-select');
let genderCustom = document.querySelector('#custom');
genderCustom.addEventListener('click',function(){
    genderOption.removeAttribute('hidden');
})

let genders = document.getElementsByName('gender');
for(let x = 0; x < 2; x++){
    genders[x].addEventListener('click',function(){
        genderOption.setAttribute('hidden','');
    })
}

let allInputs = document.getElementsByTagName('input');

for(let x = 0; x < allInputs.length; x++){
    if(allInputs[x].type === "radio"){
    }else{
        allInputs[x].addEventListener('input',function(){
            allInputs[x].style.border = "1px"
            allInputs[x].style.outline = "solid"
            allInputs[x].style.outlineWidth = "thin"
            allInputs[x].style.outlineColor = "grey";
            allInputs[x].style.background = "none";
        });

        allInputs[x].addEventListener('blur',function(){
            if(allInputs[x].value === ""){
                allInputs[x].style.border = "1px"
                allInputs[x].style.outline = "solid"
                allInputs[x].style.outlineWidth = "thin"
                allInputs[x].style.outlineColor = "red";
                allInputs[x].style.background = "url('/storage/logo/error.jpeg') no-repeat right";
                allInputs[x].style.backgroundSize = "10px";
            }
        })
    }
}


// looping through the year, Months, Days
let year = document.querySelector('#year');
let month = document.querySelector('#month')
let day = document.querySelector('#day');
let Months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
let today = new Date;

// console.log(todayYear.getFullYear());
for(let x = today.getFullYear(); x >= 1900;x-- ){
    let options = document.createElement('option');
    options.value = x;
    options.innerHTML = x;
    year.appendChild(options);
}
for (const m in Months) {
    let options = document.createElement('option');
    options.value = Months[m];
    options.innerHTML = Months[m];
    month.appendChild(options)
}
for(let x = 1; x < 32; x++){
    let options = document.createElement('option');
    options.value = x;
    options.innerHTML = x;
    day.appendChild(options);
}