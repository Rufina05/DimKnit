const container = document.getElementById("formContainer");
const openRegister = document.getElementById("openRegister");
const closeBtn = document.getElementById("closeBtn");

openRegister.addEventListener("click", () => {
    container.classList.add("active");
});

closeBtn.addEventListener("click", () => {
    container.classList.remove("active");
});