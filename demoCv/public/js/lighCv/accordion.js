var heads = document.getElementsByClassName("accordion-head");

for (var head of heads) {
    head.addEventListener("click", function (){
        this.nextElementSibling.classList.toggle("active");
        this.getElementsByTagName("i")[0].classList.toggle("rotate180");
    });
}
