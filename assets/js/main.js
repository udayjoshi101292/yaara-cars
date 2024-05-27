


const car_carousel = document.querySelectorAll('.cars-carousel');
jQuery(car_carousel).owlCarousel({
    loop:false,
    margin:30,
    nav:true,
    dots: false,
    navText: ["<img src='https://www.nuitsolutions.co.in/yaara/assets/img/ar-right.svg'alt=''class='nav-btn nav-rotate'>",
    "<img src='https://www.nuitsolutions.co.in/yaara/assets/img/ar-right.svg' alt=''class='nav-btn'>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})

const logo_carousel = document.querySelectorAll('.logos-carousel')
jQuery('.logos-carousel').owlCarousel({
    loop:false,
    dots: false,
    margin:10,
    nav:true,
    navText: ["<img src='https://www.nuitsolutions.co.in/yaara/assets/img/ar-right.svg'alt=''class='nav-btn nav-rotate'>",
    "<img src='https://www.nuitsolutions.co.in/yaara/assets/img/ar-right.svg' alt=''class='nav-btn'>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:4
        },
        1000:{
            items:6
        }
    }
})

const hyundai_carousel = document.querySelectorAll('.hyundai-carousel')
jQuery(hyundai_carousel).owlCarousel({
    loop:false,
    dots: false,
    margin:20,
    nav:true,
    navText: ["<img src='https://www.nuitsolutions.co.in/yaara/assets/img/ar-right.svg'alt=''class='nav-btn nav-rotate'>",
    "<img src='https://www.nuitsolutions.co.in/yaara/assets/img/ar-right.svg' alt=''class='nav-btn'>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})