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

// copy mail
copyBtn = document.getElementById('copyBtn');
function copyFunc(){
    textToCopy = document.getElementById('textToCopy').value;
    cpyResult = document.querySelector('.copied')
    
    navigator.clipboard.writeText(textToCopy).then(() => {
        //show message when copying is successful
        cpyResult.innerHTML = '<i style="font-size: .8em; font-weight:bold;">Copied!</i>';
                
        // Revert back to the original  after 2 seconds
        setTimeout(() => {
            cpyResult.innerHTML = ''
        }, 2000);
    }).catch(err => {
        // if an error occurs
        console.log('Failed to copy: ', err);
    })
}
copyBtn.addEventListener('click', copyFunc);
console.log( document.getElementById('textToCopy').value )