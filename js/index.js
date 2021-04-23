const burger = document.querySelector(".burger");
const navlinks = document.querySelector(".navlinks");
let opened = false;

burger.addEventListener('click', () =>{
    if(!opened){
        burger.classList.add('resNav');
        opened = true;
    }
    else{
        burger.classList.remove('resNav');
        opened = false;
    }
    navlinks.classList.toggle('navSlide');
});