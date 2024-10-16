const visitorName = document.querySelector('input[name="userName"]');
const visitorEmail = document.querySelector('input[name="userEmail"]');
const visitorTel = document.querySelector('input[name="userTel"]');
const visitorMessage = document.querySelector('textarea[name="message"]');
const inputs = [visitorName, visitorEmail, visitorMessage];
const submitBtn = document.querySelector('input[type="submit"]');

function showError(input, message){
    errorMessage = document.createElement('div');
    errorMessage.classList.add('error');
    input.classList.add('errorInput')
    errorMessage.innerHTML = message;
    var container = input.parentElement;
    container.appendChild(errorMessage);
}



submitBtn.addEventListener('click', (event)=>{
    //remove error when submit is clicked
    hasError = false
    if(document.querySelector('.error')){
        inputs.forEach((input)=>{
            input.classList.remove('errorInput');
        })
        document.querySelectorAll('.error').forEach((error)=>{
            error.remove();
        });
    
    }
    

    // check for blank fields
    inputs.forEach((input)=>{
        if(input.value.trim() == ""){
            showError(input, "This field is required");
            hasError = true;
        }
    });

    // validate email field
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;;
    if( (!visitorEmail.value.match(emailRegex)) && (!visitorEmail.value.trim() == '') ){
        showError(visitorEmail, "Enter a valid email address");
        hasError = true;
    }

    var phoneRegex = /^\+?[0-9]{10,15}$/;
    if ((!visitorTel.value.match(phoneRegex)) && (visitorTel.value.trim() != '')) {
        showError(visitorTel, "Enter a valid phone number (10-15 digits)");
        hasError = true;
    } else{
        visitorTel.classList.remove("errorInput")
    }

    
    // check if there is error to prevent submission
    if (hasError === true) {
        event.preventDefault();
    }else{
        submitBtn.value = "Sending...";
    }
    
});

// submitBtn.addEventListener('click', function(event){
//     checkError();
//     if (hasError) {
//         event.preventDefault();
//     }
// });
