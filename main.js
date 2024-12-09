
function validateEmail() {
    let form = document.getElementById('order-form');
    let email = document.getElementById('email').value;
    let emailCheckText = document.getElementById('email-check-text');
    let emailFormat = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (email.match(emailFormat)) {
        form.classList.add('valid');
        form.classList.remove('invalid');
        emailCheckText.innerHTML = "Your Email Address is Valid";
        emailCheckText.style.color = "#3aa757";
    } else {
        form.classList.remove('valid');
        form.classList.add('invalid');
        emailCheckText.innerHTML = "Please Enter Valid Email Address";
        emailCheckText.style.color = "#ff0000";
    }
}

