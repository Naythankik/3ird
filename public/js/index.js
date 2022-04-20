const modal = document.querySelector(".mode");
const overlay = document.querySelector(".overlay");
const btnCloseModal = document.querySelector(".close");
const btnOpenModal = document.querySelector(".show");

for (let i = 0; i < btnOpenModal.length; i++) {
    btnOpenModal[i].addEventListener("click", function () {
        modal.classList.remove("hidden");
        overlay.classList.remove("hidden");
        console.log("okay");
    });
}
const closeModal = function () {
    modal.classList.add("hidden");
    overlay.classList.add("hidden");
};

btnCloseModal.addEventListener("click", closeModal);

overlay.addEventListener("click", closeModal);
document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && !modal.classList.contains("hidden")) {
        closeModal();
    }
});