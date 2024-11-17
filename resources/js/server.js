import './bootstrap';



window.Echo.private('notifications.1')
    .listen('.newOrderNotification', (e) => {
        console.log(e)
        console.log('qq')
    });






