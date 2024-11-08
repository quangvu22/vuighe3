// ------------JS ĐỔI MÀU-----------------------
function changeBackgroundColor() {
    var main = document.getElementById("main");
    var header = document.getElementById("header");
    var buttons = document.querySelectorAll(".header-category-button");

    if (main.style.backgroundColor === "lightblue") {
        main.style.backgroundColor = "white";
        header.style.backgroundColor = "white";
        buttons.forEach(button => button.style.backgroundColor = "white");
    } else {
        main.style.backgroundColor = "lightblue";
        header.style.backgroundColor = "lightblue";
        buttons.forEach(button => button.style.backgroundColor = "lightblue");
    }
}

