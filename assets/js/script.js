const c = (el)=>document.querySelector(el);

function alertBox(alert, mensagem) {
    c('.alert').classList.add(alert);
    c('.alert').innerHTML = mensagem;

    c('.alert').style.opacity = 0;
    c('.alert').style.display = 'block';
    setTimeout(() => {
        c('.alert').style.opacity = 1;
    }, 500);

    setTimeout(() => {
        c('.alert').style.opacity = 0;
        setTimeout(()=> {
            c('.alert').style.display = 'none';
        }, 500);
    }, 2000);
}

function openMenu() {
    let menu = document.querySelector('#menu-area');
    let opener = document.querySelector('.fas');

    if(menu.style.width == '200px') {
        menu.style.width = '0px';
        opener.classList.add('fa-bars');
        opener.classList.remove('fa-times');
    } else {
        menu.style.width = '200px';
        opener.classList.remove('fa-bars');
        opener.classList.add('fa-times');
    }
}

var map = L.map('map').setView([-22.751170700511594, -51.38040146840632], 13);
L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiZ2FicmllbGRldjIwMjIiLCJhIjoiY2wxd293NHp0MXJ3ZzNrb2Z0b2E1amR1bSJ9.c9kIjJPBIeG0Imrfz-W7iQ'
}).addTo(map);