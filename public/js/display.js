let error = document.querySelector('.error');
setTimeout(function (){
    error.style.display = 'none';
},5000);



const features = document.querySelector(".features");
const description = document.querySelector(".description");
const classify = document.querySelector(".classify").children;

for (let x = 0; x < classify.length; x++) {
    classify[x].addEventListener("click", function (e) {
        if (x === 0) {
            features.removeAttribute("hidden");
            classify[x].style.borderBottomColor = "red";
            classify[1].style.borderBottomColor = "grey";
            description.setAttribute("hidden", "");
        } else {
            features.setAttribute("hidden", "");
            classify[1].style.borderBottomColor = "red";
            classify[0].style.borderBottomColor = "grey";
            description.removeAttribute("hidden");
        }
    });
}

// for the image transition
let previous = document.querySelector("#previous");
let next = document.querySelector("#next");
let images = document.querySelector(".display-list").children;
let defaultImage = document.querySelector("#active-image");

for (let x = 0; x < images.length; x++) {
    images[x].addEventListener("click", function (e) {
        let image = images[x].getAttribute("src");
        defaultImage.setAttribute("src", image);
        if (images[x].getAttribute('src') === defaultImage.getAttribute('src')){
            images[x].style.outline = '1px solid red';
        }
    });

}

next.addEventListener("click", function (e) {
    let jpg = [];
    let picture = document.querySelector("#active-image");
    Array.from(images).forEach(function (element, index, Array) {
        let dp = element.getAttribute("src");
        jpg.push(dp);
    });
    let id = jpg.indexOf(picture.getAttribute("src"));
    id++;
    if (id < images.length) {
        picture.setAttribute("src", images[id].getAttribute("src"));
    }
});

previous.addEventListener("click", function (e) {
    let imageArray = [];
    let picture = document.querySelector("#active-image");
    Array.from(images).forEach(function (element, index, Array) {
        let dp = element.getAttribute("src");
        imageArray.push(dp);
    });
    let id = imageArray.indexOf(picture.getAttribute("src"));
    id--;
    if (images.length > id && id >= 0) {
        picture.setAttribute("src", images[id].getAttribute("src"));
    }
});


