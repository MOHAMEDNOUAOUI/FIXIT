var buttonsubmit = document.querySelector('#passwordbutton');

var formpassword = document.querySelector('#formpassword');
var formmetier = document.querySelector('#metierform');
var forminfos = document.querySelector('#forminfo');


const emailRegex =  /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

buttonsubmit.addEventListener('click' , function() {
    

    forminfos.querySelectorAll('p').forEach(function(paragraph) {
        paragraph.remove();
    });


    var emailInput = forminfos.querySelector('#email');
    var nameInput = forminfos.querySelector('#name');
    var phoneInput = forminfos.querySelector('#phone');
    console.log(emailInput);

    if(!emailRegex.test(emailInput.value)){
        emailInput.classList.add('wrong');
        let p = document.createElement('p');
        p.textContent = 'Invalid email address';
        emailInput.closest('.email').appendChild(p);
    }
    else{
        if(emailInput.closest('.email').querySelector('p')){
            emailInput.closest('.email').querySelector('p').remove();
            emailInput.classList.remove('wrong');
        }
    }

    var nameRegex = /^[A-Za-z\s]+$/;
    if (!nameRegex.test(nameInput.value.trim())) {
        let p = document.createElement('p');
        p.textContent = 'Name can only contain letters and spaces';
        nameInput.closest('.name').appendChild(p);
    }

    // Check phone
    var phoneRegex = /^\d+$/;
    if (!phoneRegex.test(phoneInput.value.trim())) {
        let p = document.createElement('p');
        p.textContent = 'Phone number can only contain digits';
        phoneInput.closest('.phone').appendChild(p);
    }
})