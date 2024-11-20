
const userName = document.getElementById("name");
const surname = document.getElementById("surname");
const email = document.getElementById("email");
const password = document.getElementById("password");
const phone = document.getElementById("phone");
const form = document.querySelector("form");


[userName, surname, email, password, phone].forEach(field => {
    field.addEventListener("input", () => field.setCustomValidity(""));
});


form.addEventListener("submit", e => {
    canSubmit = true;

    if (!email.value){
        showError(email, "Email");
        canSubmit = false;
    }
    if(!password.value){
        showError(password, "Password");
        canSubmit = false;
    }
    if (!userName.value){
        showError(userName, "Name");
        canSubmit = false;
    }
    if(!surname.value){
        showError(surname, "Surname");
        canSubmit = false;
    }
    if(!phone.value){
        showError(phone, "Phone");
        canSubmit = false;
    }

    if(!canSubmit){
        e.preventDefault();
    }
    else {
        localStorage.setItem("showNotification", "block")
    }
})



function showError(e, s){
    e.setCustomValidity(`${s} has to be entered!`);
    e.reportValidity();
}