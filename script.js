function changeText() {
    document.getElementById("welcomeText").innerHTML =
    "Keep Learning and Growing with Learnova!";
}

function toggleTheme() {

    document.body.classList.toggle("dark-mode");

    if (document.body.classList.contains("dark-mode")) {
        localStorage.setItem("theme", "dark");
    } else {
        localStorage.setItem("theme", "light");
    }
}

function changeImage() {

    let image = document.getElementById("courseImage");

    if (image.src.includes("DevOps.jpg")) {
        image.src = "images/Cybersecurity.jpg";
    } else {
        image.src = "images/DevOps.jpg";
    }
}

function changeColor() {
    document.getElementById("colorBox").style.backgroundColor =
    "#2563EB";
}

window.onload = function() {

    let now = new Date();

    document.getElementById("dateTime").innerHTML =
    "Current Date & Time: " + now.toLocaleString();
};

function validateForm() {

    let name = document.getElementById("name").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    if (name === "") {
        alert("Name is required");
        return false;
    }

    if (!email.includes("@")) {
        alert("Email must contain @");
        return false;
    }

    if (password.length < 6) {
        alert("Password must be at least 6 characters");
        return false;
    }

    alert("Validation Successful!");
    return true;
}

window.onload = function () {

    let savedTheme = localStorage.getItem("theme");

    if (savedTheme === "dark") {
        document.body.classList.add("dark-mode");
    }

    let dateElement = document.getElementById("dateTime");

    if (dateElement) {
        dateElement.innerHTML =
            "Current Date & Time: " +
            new Date().toLocaleString();
    }
};