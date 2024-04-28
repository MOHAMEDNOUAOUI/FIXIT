const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

document.querySelector('#notificationtrigger').addEventListener('click', function() {
    var notificationContainer = document.querySelector('.notificationcontainer');
    notificationContainer.style.display = "block";
});



document.addEventListener('click', function(event) {
    var notificationContainer = document.querySelector('.notificationcontainer');
    var bellIcon = document.querySelector('#notificationtrigger');

    var isClickInsideNotificationContainer = notificationContainer.contains(event.target);
    var isClickOnBellIcon = event.target === bellIcon;


    var isNotificationVisible = notificationContainer.style.display === "block";


    if (isNotificationVisible && !isClickInsideNotificationContainer && !isClickOnBellIcon) {
        notificationContainer.classList.add('slide-out');
       
        setTimeout(function() {
            notificationContainer.style.display = "none";
            notificationContainer.classList.remove('slide-out'); 
        }, 300);
    }
});




    document.querySelectorAll('#x').forEach(elemenet => {
        elemenet.addEventListener('click' , function() {
            let notificationId = this.getAttribute('data-id');

            let xml = new XMLHttpRequest();
            let clickedElement = this;

            xml.onload = function () {
                if(this.status == 200 && this.readyState == 4){
                    clickedElement.closest('.notification').remove();
                    updateNotificationCount();
                }
            }


            xml.open('DELETE', destroyNotificationUrl.replace(':notificationId', notificationId), true);
            xml.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            xml.send();

        })
    })



    function updateNotificationCount() {
    let notificationCountElement = document.querySelector('.topnot span');
    let currentCount = parseInt(notificationCountElement.innerText);
    let updatedCount = currentCount - 1;
    notificationCountElement.innerText = updatedCount;
    if (updatedCount < 0) {
        notificationCountElement.innerText = 0;
    }
}