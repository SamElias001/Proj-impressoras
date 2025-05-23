let index = 0;
const glass = document.getElementById('glass');
const slides = document.querySelectorAll('.slideGlass').length;

function moveSlide(direcao) {
    index += direcao;
    if (index < 0) {
        index = slides - 1;
    }

    if (index >= slides) {
        index = 0;
    }
    
    glass.style.transform = `translateX(${-index * 300}px)`;
}