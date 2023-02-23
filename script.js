let emailLogIn = document.querySelector("#emailLogIn");
let passLogIn = document.querySelector("#passLogIn");
let resEmail = document.getElementById("resEmail");
let resPass = document.getElementById("resPass");
let regEmail = /\w+@gmail.com/gi;

document.getElementById("logIn").onclick = function (e) {
  if (emailLogIn.value.length === 0) {
    e.preventDefault();
    resEmail.innerHTML = "Please choose your Email";
    resEmail.style.color = "red";
  } else if (regEmail.test(emailLogIn.value) === false) {
    e.preventDefault();
    resEmail.innerHTML = "ce nest pas email";
    resEmail.style.color = "red";
  }
  // validation password
  if (passLogIn.value.length === 0) {
    e.preventDefault();
    resPass.innerHTML = "Please choose your Email";
    resPass.style.color = "red";
  }
};
