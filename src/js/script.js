const DropBtn = document.querySelectorAll(".drop-btn");

DropBtn.forEach((btn) => {
  btn.addEventListener("click", () => {
    btn.classList.toggle("show");
  });
});

const containerForm = document.querySelector(".container-form");
const loginBtn = document.querySelector(".login-btn");
const registerBtn = document.querySelector(".register-btn");

loginBtn.addEventListener("click", () => {
  containerForm.classList.toggle("grouplogin");
  containerForm.classList.toggle("groupregister");
});

registerBtn.addEventListener("click", () => {
  containerForm.classList.toggle("grouplogin");
  containerForm.classList.toggle("groupregister");
});

const loginModal = document.getElementById("loginModal");
const loginModalBtn = document.querySelectorAll(".login-mdl-btn");

loginModalBtn.forEach((btn) => {
  btn.addEventListener("click", () => {
    loginModal.classList.remove("hidden");
    loginModal.classList.add("flex");
    loginModal.addEventListener("click", (e) => {
      if (e.target === loginModal) {
        loginModal.classList.remove("flex");
        loginModal.classList.add("hidden");
      }
    });
  });
});
