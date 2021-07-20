// function $(arg)
// {
//     console.log(arg);
// }

const bage = document.querySelector(".cart-items-number");
const bageMob = document.querySelector(".cart-items-number-mob");

document.addEventListener("DOMContentLoaded", function (event) {

    if (window.location.pathname === "/") {
        let position = 0;
        let windowWidth = window.innerWidth;
        window.addEventListener("orientationchange", function (event) {
            console.log("the orientation of the device is now " + event.target.screen.orientation.angle);
        });
        let slidesToShow = 4;
        if (windowWidth < 576) {
            slidesToShow = 1;
        } else if (windowWidth < 768) {
            slidesToShow = 3;
        }
        const slidesToScroll = 1;
        const container = document.querySelector('.slider-container');
        const track = document.querySelector('.slider-track');
        const btnPrev = document.querySelector('.btn-prev');
        const btnNext = document.querySelector('.btn-next');
        const items = document.querySelectorAll('.slider-item');
        const itemsCount = items.length;
        const itemWidth = container.clientWidth / slidesToShow;
        const movePosition = slidesToShow * itemWidth;

        items.forEach((item) => {
            item.style.minWidth = `${itemWidth}px`;
        })

        btnNext.addEventListener('click', () => {
            const itemsLeft = itemsCount - (Math.abs(position) + slidesToShow * itemWidth) / itemWidth;
            position -= itemsLeft >= slidesToScroll ? movePosition : itemsLeft * itemWidth;
            setPosition();
            checkBtns();
        });

        btnPrev.addEventListener('click', () => {
            const itemsLeft = Math.abs(position) / itemWidth;
            position += itemsLeft >= slidesToScroll ? movePosition : itemsLeft * itemWidth;
            setPosition();
            checkBtns();
        });

        const setPosition = () => {
            track.style.transform = `translateX(${position}px)`;

        }

        const checkBtns = () => {
            btnPrev.disabled = position === 0
            btnNext.disabled = position <= -(itemsCount - slidesToShow) * itemWidth;
        }

        checkBtns()
    }

    if (window.location.pathname === "/cart") {
        function plusQty(node)
        {
            node.stepUp()
        }
        function minusQty(node)
        {
            node.stepDown()
        }
        const cartItemNumbers = document.querySelector('.count-cart-item-numbers');
        const totalPrice = document.querySelector('.totalPrice');

        const buttonsRemoveItem = document.getElementsByClassName("deleteItem");
        [].forEach.call(buttonsRemoveItem, function (el) {
            el.addEventListener('submit', function (e) {
                e.preventDefault();
                let link = el.getAttribute("action")
                let data = new FormData(e.target);
                fetch(link , {
                    method: 'POST',
                    body: data
                }).then(response => response.json())
                    .then((data) => {
                        el.parentNode.parentNode.parentNode.remove();
                        bage.innerText = data['cartQty'].toString();
                        bageMob.innerText = data['cartQty'].toString();
                        cartItemNumbers.innerText = data['cartQty'].toString();
                        totalPrice.innerText = data['totalPrice'].toString();
                        console.log(data);
                    })
            });
        });
    }

    const buttons = document.getElementsByClassName("addToCart");
    let modal = $('#myModal');
    [].forEach.call(buttons, function (el) {
        el.addEventListener('submit', function (e) {
            e.preventDefault();
            let data = new FormData(e.target);
            fetch('/cart', {
                method: 'POST',
                body: data
            }).then(response => response.json())
                .then((data) => {
                    bage.innerText = data['cartQty'].toString();
                    bageMob.innerText = data['cartQty'].toString();
                    modal.modal('show');
                    setTimeout(function () {
                        modal.modal('hide')},1500);
                })

        })
    });
});

let cart = [];

function getCartElements()
{
    return [

    ];
}

function getCartElementTemplate(element)
{
    return `
            < div class = "row border-top border-bottom" >
                   < div class = "row main align-items-center" >
                       < div class = "col-2" > < img class = "img-fluid" src = "${element.image}" > < / div >
                       < div class = "col" >
                           < div class = "row" > ${element.name} < / div >
                       <  / div >
                       < div class = "col" > < a href = "#" > - < / a > < a href = "#" class = "border" > ${element.qty} < / a > < a href = "#" > + < / a > <  / div >
                       < div class = "col" > ${element.price} < span class = "close" > & #10005; < / span > < / div >
                   <  / div >
               <  / div >
        `;
}

function populateTemplate()
{
    let htmlResult = '';

    if (window.location.pathname.includes('cart')) {
        cart.forEach(element => {
            htmlResult += getCartElementTemplate(element);
        });

        document.querySelector('.cart-items').innerHTML = htmlResult;
        document.querySelector('.cart-item-numbers').innerText = cart.length.toString();
        document.querySelector('.black-qty').innerText = cart.length.toString();
    }

}


cart = getCartElements();



// populateTemplate();

function addToCart(product)
{
    if (cart.length > 0) {
        for (let i = 0; i < cart.length; i++) {
            if (cart[i].id === product.id) {
                cart[i].qty += product.qty;
                console.log(cart);
                document.querySelector('.cart-items-number').innerText = cart.length.toString();
                return;
            }
        }
    }
    cart.push(product);
    bage.innerText = cart.length.toString();
    console.log(cart);
}



