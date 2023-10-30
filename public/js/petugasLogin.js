document.getElementById("eye-view").addEventListener("click", function () {
    let passForm = document.getElementById("password");

    if (passForm.type === "password") {
        passForm.type = "text";
    } else {
        passForm.type = "password";
    }
});
