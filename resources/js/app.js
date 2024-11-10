import './bootstrap';


window.Echo.channel('test')
    .listen('MessageSent', (e) => {
        alert(1)
    })
