var slideIndex = 0;
showSlides(slideIndex);

function showSlides(n) {
    var i;
    var imgs = document.getElementsByClassName("img-container");
    if (n < 0) { n = imgs.length-1; }
    if (n > imgs.length-1) { n = 0; }
    slideIndex = n;
    for (i = 0; i < imgs.length; i++) {
        imgs[i].style.display = "none";
    }
    imgs[n].style.display = "inline";
}

function next() {
    ++slideIndex;
    showSlides(slideIndex);
}

function prev() {
    --slideIndex;
    showSlides(slideIndex);
}


function openModal() {
    var id = document.getElementById("modalScreen");
    id.style.display = "inline";
}

function closeModal() {
    var id = document.getElementById("modalScreen");
    id.style.display = "none";
}