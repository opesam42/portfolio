toggleBars = Array.from( document.querySelectorAll('.toggle-bar') );
activeNav = document.querySelector('header nav');

function toggleMenu(){
    if ( activeNav.classList.contains('active') ){
        activeNav.classList.remove('active')
    }else{
        activeNav.classList.add('active')
    }
}
toggleBars.forEach((icon)=>{
    icon.addEventListener('click', toggleMenu);
})

