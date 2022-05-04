// const modal = document.querySelector(".mode");
// const overlay = document.querySelector(".overlay");
// const btnCloseModal = document.querySelector(".close");
// const btnOpenModal = document.querySelector(".show");
//
// for (let i = 0; i < btnOpenModal.length; i++) {
//     btnOpenModal[i].addEventListener("click", function () {
//         modal.classList.remove("hidden");
//         overlay.classList.remove("hidden");
//         console.log("okay");
//     });
// }
// const closeModal = function () {
//     modal.classList.add("hidden");
//     overlay.classList.add("hidden");
// };
//
// btnCloseModal.addEventListener("click", closeModal);
//
// overlay.addEventListener("click", closeModal);
// document.addEventListener("keydown", function (e) {
//     if (e.key === "Escape" && !modal.classList.contains("hidden")) {
//         closeModal();
//     }
// });

const language = document.getElementById('lang');
en.addEventListener("click",function (){
    language.setAttribute("lang","en");
});

fr.addEventListener("click",function (){
    language.setAttribute("lang","fr");
});

es.addEventListener("click",function (){
    language.setAttribute("lang","es");
});

pt.addEventListener("click",function (){
    language.setAttribute("lang","pt");
});

nl.addEventListener("click",function (){
    language.setAttribute("lang","nl");
});

yo.addEventListener("click",function (){
    language.setAttribute("lang","yo");
});

ig.addEventListener("click",function (){
    language.setAttribute("lang","ig");
});

zh.addEventListener("click",function (){
    language.setAttribute("lang","zh");
});

ar.addEventListener("click",function (){
    language.setAttribute("lang","ar");
});

da.addEventListener("click",function (){
    language.setAttribute("lang","de");
});

de.addEventListener("click",function (){
    language.setAttribute("lang","da");
});

el.addEventListener("click",function (){
    language.setAttribute("lang","el");
});

let moreLang = document.querySelector('#more');
function more(){
    yo.removeAttribute("hidden");
    zh.removeAttribute("hidden");
    ar.removeAttribute("hidden");
    ig.removeAttribute("hidden");
    da.removeAttribute("hidden");
    de.removeAttribute("hidden");
    el.removeAttribute("hidden");
    moreLang.setAttribute("hidden","");
}

const list = document.querySelectorAll(".wish");
for ( let i = 0; i < list.length; i++){
list[i].addEventListener("click", function (e){
    list[i].classList.remove("btn-outline-danger")
    list[i].classList.add("btn-danger");
    list[i].setAttribute("title","Product is in WishList")
    alert("Product added to wishList successfully!!!");
});
}

const about = document.querySelector(".modal-about");
const close = document.querySelector(".about-close");
const overlay = document.querySelector(".about-overlay");
const mAbout = document.querySelector(".about");
about.addEventListener("click",function (){
    close.classList.remove("hidden");
    overlay.classList.remove("hidden");
    mAbout.classList.remove("hidden");
})

function closed(){
    close.classList.add("hidden");
    overlay.classList.add("hidden");
    mAbout.classList.add("hidden");
}

close.addEventListener("click",closed);
overlay.addEventListener("click", closed);
document.addEventListener("keydown",function (e){
    if (e.key === "Escape" && !mAbout.classList.contains("hidden")){
      closed();
    }
})



