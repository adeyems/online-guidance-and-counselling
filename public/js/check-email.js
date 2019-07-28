/*
* Validate SignUp form
*/

/*
* Declare UI elements
*/

// EasyHTTP Class Object
const http = new EasyHTTP;

//signup form
const form = document.getElementById('signup-form');

const email = document.getElementById("email");

const emailMsg = document.getElementById("email-msg");

let emailValid, currentDiv;

email.value = "qddddddddd";
//Validate Email
const validateEmail  = () => {
    let data = email.value;
    if (data !== ''){
        http.get(`/api/validate-email?email=${data}`)
            .then(data => EmailExists(data))
            .catch(err => console.log(err));
    }
};

//if email exist
const EmailExists = (data) => {
    currentDiv = emailMsg;
    if (data === true) {
       emailValid = false;
        displayUIMessage();
    }
    else {
        emailValid = true;
        clearUIMessage();
    }
};



const validateForm = (e) => {
    if (emailValid === false){
        e.preventDefault();
    }
    else{
        form.submit();
    }
};

form.addEventListener('submit', validateForm);


//Prints Input Validity Status
const displayUIMessage = status => {
    currentDiv.innerHTML = `<br><p class="text-center " style="color:red" id="msg">An Account is Associated with this email address
<i class="fa fa-close" style="font-size:20px;color:red"></i></p>
            `;
};

const clearUIMessage = () => {
    currentDiv.innerHTML = '';
};

email.addEventListener('blur', () => {
        console.log("aaaaaaaaaaaaa");
    }
);
