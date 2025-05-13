import './bootstrap';
window.Echo.private(`App.Models.User.${userId}`)
    .notification((notification) => {
        console.log(notification);
        // Aquí pots actualitzar la interfície d'usuari amb la notificació rebuda
        const notificationList = document.getElementById('notification-list');
        const newNotification = document.createElement('li');
        newNotification.textContent = notification.message; // Assumeix que la notificació té un camp "message"
        notificationList.appendChild(newNotification);
    });
