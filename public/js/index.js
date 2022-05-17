// switching between languages
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

//wishlist
        let wish = document.querySelectorAll("#wishes");
        for (let x = 0; x < wish.length; x++){
            wish[x].addEventListener("click", function (){
                callback:
                    alert(`Item added to cart successfully. Redirecting...`);
                setTimeout(function () {
                    window.location.href = "/buy/list"
                }, 1000);

            })
        }

// progress Bar
    let paraLeft = document.querySelectorAll(".items");
    let divLeft = document.querySelectorAll(".orange");
    let itemLeft = document.querySelectorAll(".left");
    itemLeft.forEach(function (values,index,array){
        if(values.style.width === "0%") {
            divLeft[index].removeAttribute("class");
            paraLeft[index].style.fontWeight = "bolder";
            paraLeft[index].style.color = "red";
            paraLeft[index].innerHTML = "Product is out of stock";
        }else if(values.style.width <= "20%")
        {
            values.style.backgroundColor = "red";
            divLeft[index].setAttribute("title","Stock is getting low, make your order now!!");
            paraLeft[index].style.fontWeight = "bolder";
        }else{
            values.style.backgroundColor = "green";
            paraLeft[index].style.fontWeight = "bolder";
        }
    });

// see more details about product
let details = document.querySelectorAll('.see-details');
let modalBody = document.querySelectorAll("#myModal-body");
let modalClose = document.querySelectorAll('.close-contents');
details.forEach(function(detail,index,array){
    detail.onclick = function (){
        modalBody[index].style.display = "block";
    }
    modalClose[index].onclick = function (){
        modalBody[index].style.display = "none";
    }
    window.onclick = function (e){
        if (e.target === modalBody[index]){
            modalBody[index].style.display = "none";
        }
    }
});


//message in inbox folder
let messages = document.querySelectorAll('#message');
let messageContent = document.querySelectorAll('.message-details');
let noMessage = document.querySelector('.inbox-details-message');
// console.log(noMessage);
    messages.forEach(function (message,id,array){
        message.addEventListener("click",function (e){
            // contents.style.display = 'block';
            // if(!messageContent[id].hasAttribute('hidden')){
                noMessage.setAttribute('hidden','');
            // }else{
                messageContent[id].toggleAttribute('hidden');
            // }
        })
    })
console.log(require('mysql'));


//cancelling profile changes
        let profile = document.querySelector(".cancel");
        profile.addEventListener("click",function (){
            alert("Redirecting to home page......");
            setTimeout(function (){
                window.location.href = "/buy"
            },500);
        })


