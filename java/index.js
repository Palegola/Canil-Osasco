document.addEventListener("DOMContentLoaded", function () {
    let slideIndex = 0;
    const slides = document.getElementsByClassName("carousel-slide");
    const totalSlides = slides.length;

    let prevButton = document.querySelector(".prev-button");
    let nextButton = document.querySelector(".next-button");

    prevButton.addEventListener("click", function () {
        changeSlide(-1);
    });

    nextButton.addEventListener("click", function () {
        changeSlide(1);
    });

    function changeSlide(n) {
    
        for (let i = 0; i < totalSlides; i++) {
            slides[i].style.display = "none";
        }

        slideIndex += n;

        if (slideIndex < 0) {
            slideIndex = totalSlides - 1;
        } else if (slideIndex >= totalSlides) {
            slideIndex = 0;
        }

        slides[slideIndex].style.display = "block";
    }

    changeSlide(1);

    setInterval(function () {
        changeSlide(1);
    }, 3000);
});
