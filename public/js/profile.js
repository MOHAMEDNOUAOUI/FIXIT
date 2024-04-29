var buttonsubmit = document.querySelector('#passwordbutton');

var forminfos = document.querySelector('#forminfo');


const emailRegex =  /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

buttonsubmit.addEventListener('click' , function() {
    

    forminfos.querySelectorAll('p').forEach(function(paragraph) {
        paragraph.remove();
    });


    var emailInput = forminfos.querySelector('#email');
    var nameInput = forminfos.querySelector('#name');
    var phoneInput = forminfos.querySelector('#phone');


    if(!emailRegex.test(emailInput.value)){
        emailInput.classList.add('wrong');
        let p = document.createElement('p');
        p.textContent = 'Invalid email address';
        emailInput.closest('.email').appendChild(p);
    }
    else{
        emailInput.classList.remove('wrong');
    }


    var nameRegex = /^[A-Za-z\s]+$/;
    if (!nameRegex.test(nameInput.value.trim())) {
        let p = document.createElement('p');
        p.textContent = 'Name can only contain letters and spaces';
        nameInput.closest('.name').appendChild(p);
        nameInput.classList.add('wrong');
    }
    else{
        nameInput.classList.remove('wrong');
    }


    // Check phone
    var phoneRegex = /^\d{11}$/;
    if (!phoneRegex.test(phoneInput.value.trim())) {
        let p = document.createElement('p');
        p.textContent = 'Phone number can only contain digits';
        phoneInput.closest('.phone').appendChild(p);
        phoneInput.classList.add('wrong');
    }
    else{
        phoneInput.classList.remove('wrong');
    }

    if (forminfos.querySelectorAll('.wrong').length === 0) {
        forminfos.submit();
    }


})




document.querySelector('.profilecircle').addEventListener('click', function() {
    let fileInput = document.querySelector('#profile');
    fileInput.click();

    fileInput.addEventListener('change', function() {
        // Check if a file is selected
        if (fileInput.files && fileInput.files[0]) {
            // Create a FileReader object
            let reader = new FileReader();

            // Set up the FileReader onload event
            reader.onload = function(e) {
                // Update the background image of profile circle
                document.querySelector('.profilecircle').style.backgroundImage = `url(${e.target.result})`;
                
                // Update the background image of background div
                document.getElementById('background').style.backgroundImage = `url(${e.target.result})`;
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(fileInput.files[0]);
        }
    });
});
