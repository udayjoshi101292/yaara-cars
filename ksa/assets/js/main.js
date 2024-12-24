

// single car Share button code
if (document.querySelector(".share_btn") !== null) {
    console.warn("Share button True");
} else {
    console.warn("Share button False");
}
window.addEventListener("load", () => {
    let share__ = document.querySelectorAll(".share_btn_pop .sharethis-inline-share-buttons .st-btn");
    share__.forEach(element => {
        element.style.cssText = "display:inline-block";
    })
})
// read more button 
if (document.querySelector(".read_more_button") !== null) {
    let read_more_buttons = document.querySelectorAll(".read_more_button");
    let read_more_state = false;
    read_more_buttons.forEach(element => {
        element.addEventListener("click", (e) => {
            let close_para = element.previousElementSibling;
            let text = element.querySelector(".readmore_text")
            let img_wrap = element.querySelector('.read_more_img_wrap');
            // console.log(img_wrap);
            if (read_more_state === false) {
                close_para.style.cssText = '-webkit-line-clamp: initial;';
                text.innerHTML = 'Read Less';
                img_wrap.style.cssText = 'transform: rotate(-180deg);';
                read_more_state = true;
            } else {
                // console.log("fales");
                text.innerHTML = 'Read More';
                img_wrap.style.cssText = 'transform: rotate(0deg);';
                close_para.style.cssText = '-webkit-line-clamp: 2;'
                read_more_state = false;
            }
        })
    });
}

$(document).ready(function () {


    const car_carousel = document.querySelectorAll('.cars-carousel');
    $(car_carousel).owlCarousel({
        loop: false,
        margin: 30,
        nav: true,
        dots: false,
        navText: ["<img src='https://yaaracars.com/assets/img/ar-right.svg'alt=''class='nav-btn nav-rotate'>",
            "<img src='https://yaaracars.com/assets/img/ar-right.svg' alt=''class='nav-btn'>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    })

    const logo_carousel = document.querySelectorAll('.logos-carousel')
    $('.logos-carousel').owlCarousel({
        loop: false,
        dots: false,
        margin: 10,
        nav: true,
        navText: ["<img src='https://yaaracars.com/assets/img/ar-right.svg'alt=''class='nav-btn nav-rotate'>",
            "<img src='https://yaaracars.com/assets/img/ar-right.svg' alt=''class='nav-btn'>"],
        responsive: {
            0: {
                items: 3
            },
            600: {
                items: 4
            },
            1000: {
                items: 6
            }
        }
    })

    const hyundai_carousel = $('.hyundai-carousel')
    $(hyundai_carousel).owlCarousel({
        loop: false,
        dots: false,
        margin: 20,
        nav: true,
        navText: ["<img src='https://yaaracars.com/assets/img/ar-right.svg'alt=''class='nav-btn nav-rotate'>",
            "<img src='https://yaaracars.com/assets/img/ar-right.svg' alt=''class='nav-btn'>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })

    const about_us_page_pioneer_carousel = $(".our_pioneer .pioneer_inner_wrap");
    $(about_us_page_pioneer_carousel).owlCarousel({
        loop: true,
        margin: 10,
        dots: false,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })


    const adv_logo_carousel = $('.adv_owl_carousel');
    $(adv_logo_carousel).owlCarousel({
        loop: true,
        dots: false,
        nav: false,
        autoplay: true,
        autoplaySpeed: 2000,
        autoplayTimeout: 2000,
        slideTransition: 'linear',
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        }
    })

    const tabs_carousel = $(".tabs_carousel");
    $(tabs_carousel).owlCarousel({
        loop: false,
        dots: false,
        nav: true,
        autoWidth: true,
        margin: 25,
        navText: [
            '<img src="https://yaaracars.com/assets/img/ar-right.svg">',
            '<img src="https://yaaracars.com/assets/img/ar-right.svg">'
        ],
        autoplay: false,
        // autoplaySpeed: 2000,
        // autoplayTimeout: 2000,
        // slideTransition: 'linear',
        // autoplayHoverPause: true,
        responsive: {
            0: {
                items: 3
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    })


    const hero_ = jQuery('#hero-carousel');
    hero_.owlCarousel({
        loop: true,
        nav: false,
        dots: true,
        mouseDrag: false,
        touchDrag: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
        navText: ["<img src='https://yaaracars.com/assets/img/ar-right.svg'alt=''class='nav-btn nav-rotate'>",
            "<img src='https://yaaracars.com/assets/img/ar-right.svg' alt=''class='nav-btn'>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })



});


// search filter 

$(document.body).on("change", ".car_filter_input", function (e) {
    $(".car_filter_input").closest(".radio_wrap").removeClass("input_radio_checked");
    $(this).closest(".radio_wrap").addClass("input_radio_checked");
})

let input_radio_budget = $(".input_radio_budget");
let input_redio_modal = $(".input_radio_brand");
let select_body_data = ["Select Brand", "Toyota", "BMW", "Ford", "Honda", "Audi"];

let select_budget_data_keys = ["val_empty", "50000", "50001-100000", "100001-150000", "150001"]
let select_body_data_vals = ["Select Budget", "Upto SAR 50,000", "SAR 50,001 - 100,000", "SAR 100,001 - 150,000", "SAR 150,001 & Above"]

select_budget_data_keys.forEach((each_key, list) => {
    let options_ = document.createElement("option");
    options_.innerHTML = select_body_data_vals[list];
    options_.setAttribute("value", each_key)
    $(".select_budget_modal").append(options_)
    if (options_.index == 0) {
        options_.setAttribute("value", "")
        options_.setAttribute("selected", "selected")
        options_.setAttribute("disabled", "disabled")
    } else {
        // console.log("false");
    }

})


$(document.body).on("change", ".input_radio_budget", function (e) {
    let clicked_radio = $(this);
    budget_radio(clicked_radio)
})

function budget_radio(clicked_radio) {
    let select_budget_modal = $(clicked_radio).closest('form').find(".filter_select_wrap").find(".select_budget_modal");
    $(select_budget_modal).attr("id", "Budget")

    $(select_budget_modal).closest(".filter_select_wrap").removeClass("select_brand_wrap_in_view");
    $(select_budget_modal).closest(".filter_select_wrap").addClass("select_budget_wrap_in_view");
    $(select_budget_modal).removeClass("select_brand_wrap");
    let options_removed = $(select_budget_modal).children();
    options_removed.remove();

    select_budget_data_keys.forEach((each_key, list) => {
        let options_ = document.createElement("option");
        options_.innerHTML = select_body_data_vals[list];
        options_.setAttribute("value", each_key)
        select_budget_modal.append(options_)
        if (options_.index == 0) {
            options_.setAttribute("value", "")
            options_.setAttribute("selected", "selected")
            options_.setAttribute("disabled", "disabled")
        } else {
            // console.log("false");
        }

    })
}

$(document.body).on('change', '.input_radio_brand', function (e) {
    let clicked_radio = $(this);
    brand_radio(clicked_radio);
    const This = $(this);

    const brands = $(this).val();
    $.ajax({
        url: "/action.brandfilter.php",
        method: "POST",
        cache: false,
        data: { brands: brands },
        success: function (res) {
            // console.log(res);
            if (res !== "") {
                const select_body_data = JSON.parse(res);
                // console.log(select_body_data);

                let option = "<option>Select Brand</option>";
                const select_budget_modal = $(This).closest('form').find(".select_budget_modal");
                //   console.log(select_budget_modal)



                // console.warn(Object.values(select_body_data).toSorted());
                select_body_data.forEach(element => {


                    // const {element} = element;
                    console.log(element);
                    option += `<option value="${element.id}" data-redirect="${element.slug}">${element.brand}</option>`;

                });



                select_budget_modal.append(option)

            }

        },
        error: function (error) {
            console.log(error);
        }
    })
});
$(document.body).find('.input_radio_brand').trigger("change");


$(document.body).on('click', '.home_page_form_filter', function (e) {
    // e.preventDefault();
    if ($(".input_radio_brand").is(':checked')) {
        e.preventDefault();
        console.log("tre");
        // $(this).closest('form').trigger('submit');
        const This = $(this).closest('form');
        const Brand = $(This).find('.select_brand_wrap option:selected').data('redirect');
        console.log($(This).find(".select_brand_wrap option:selected"));
        const Modal = $(This).find('.select_modal option:selected').data('redirect');

        if (Brand !== '' && Brand !== undefined && Brand !== null) {

            window.location = `${window.location.origin}/${Brand}`;
        }
        if (
            (Brand !== '' && Brand !== undefined && Brand !== null)
            &&
            (Modal !== '' && Modal !== undefined && Modal !== null)
        ) {

            window.location = `${window.location.origin}/${Brand}/${Modal}`;
        }
    }


})



function brand_radio(clicked_radio) {
    let select_budget_modal = $(clicked_radio).closest('form').find(".filter_select_wrap").find(".select_budget_modal");
    $(select_budget_modal).attr("id", "Brands")
    $(select_budget_modal).closest(".filter_select_wrap").removeClass("select_budget_wrap_in_view");
    $(select_budget_modal).closest(".filter_select_wrap").addClass("select_brand_wrap_in_view");
    $(select_budget_modal).addClass("select_brand_wrap");
    let options_removed = $(select_budget_modal).children();
    options_removed.remove();
}

// Disable form if input == ''
// $(document.body).on("click", ".form_filter", function (e) {
//     // e.preventDefault();
//     if ($(".select_budget_modal").get(0).value === "" || $(".home_select_city").get(0).value === "") {
//         e.preventDefault();
//     }
// })

// Brand/Modal code START 
$(document.body).on("change", ".select_brand_wrap", function (e) {

    const sellectedID = ($(this).val());

    const This = $(this);

    $.ajax({
        url: "https://ksa.yaaracars.com/action.brandfilter.php",
        method: "POST",
        cache: false,
        data: { selectedBrand: sellectedID },
        success: function (res) {
            // console.log(res);


            if (res !== "") {
                const select_body_data = JSON.parse(res);

                let option = "";
                const select_budget_modal = $(This).closest('form').find(".select_modal");
                //   console.log(select_budget_modal)



                // console.warn(Object.values(select_body_data).toSorted());
                for (const key in select_body_data) {

                    const element = select_body_data[key];
                    console.log(element);
                    option += `<option value="${element.id}" data-redirect="${element.slug}">${element.name}</option>`;

                }

                $(select_budget_modal).find(`option:not(:first-child)`).remove();
                select_budget_modal.append(option)

            }
        },
        error: function (error) {
            console.log(error);
        }
    })
})
// Brand/Modal code END
// search filter END 






/**
 * 
 * Home Page Filter By Budget
 * 
 * 
 */

$(document.body).on(`submit`, `#filter-cars`, function (e) {
    e.preventDefault();
    const This = $(this);
    const ThisForm = $(this).closest(`form`);
    const BudgetField = $(ThisForm).find(`[data-name="filter-form"]`);
    const By_budget = String($(BudgetField).val()).toLowerCase();

    const Budget = $(ThisForm).find(`[name="price"]`).val();
    const Brand = $(ThisForm).find(`[name="brand-name"]`).val();


    // console.log(Budget, Brand);

    let location = null;

    if (By_budget === 'budget' && $(BudgetField).prop('checked') === true) {



        if (
            Budget !== '' && Budget !== undefined && Budget !== null
            &&
            (Brand === '' || Brand === undefined || Brand === null)
        ) {


            location = `${window.location.origin}/${Budget}/`;

        }
        else if (
            (Budget === '' || Budget === undefined || Budget === null)
            &&
            (Brand !== '' && Brand !== undefined && Brand !== null)
        ) {
            location = `${window.location.origin}/${Brand}/`;

        }
        else if (
            (Budget !== '' && Budget !== undefined && Budget !== null)
            &&
            (Brand !== '' && Brand !== undefined && Brand !== null)

        ) {

            location = `${window.location.origin}/${Brand}/${Budget}`;

        }

        if (location === null) {
            alert("Please Select a Brand Or a Budget To Search");
            return;
        }
        else {

            $(ThisForm).get(0).reset();

            console.log(location);
            window.location = location;
        }
    }


})




/**
 * 
 * Home Page Filter By Budget
 * 
 * 
 */







// select2 
let single_select_two = $(".js-example-basic-single");
if (single_select_two !== null) {
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
        $('.remove_search_from_select2').select2({
            minimumResultsForSearch: Infinity // Disables the search bar
        });
    });


} else {
    console.log("False");
}




// Validate phone number 
let input_phone_wrap = $(".input_phone_wrap");
let phoneNum_input = $(".phone_number");
let popup_input_name = $("input[name='popup_name']");
let form_submit_button = $('.modal-footer button')

$(document.body).on("keyup", ".phone_number", function (e) {
    let numberValidation_regex = /^\d+$/;
    if (numberValidation_regex.test($(phoneNum_input).val())) {
        $(input_phone_wrap).removeClass('invalid_num')
    } else if ($(phoneNum_input).val() == '') {
        $(input_phone_wrap).removeClass('invalid_num')
    } else {
        $(input_phone_wrap).addClass('invalid_num')
        // alert("Not number")
    }
})
$(document.body).on("click", ".has_phone_no", function (e) {
    // phone_num_validation(e);
})

function phone_num_validation(x) {
    let inp_phone_num_val = $(phoneNum_input).val();
    // let result = /^(?:\+966|00966|0)(?:2|3|4|6|7|9|50|51|52|55|56)[0-9]{7}$/.test(inp_phone_num_val);
    let result = /^5\d{8}$/.test(inp_phone_num_val);
    if (result) {
        // alert("Validation true")
        return true;
        console.log($(popup_input_name).val());


    } else if ($(phoneNum_input).val() == '') {

        // x.preventDefault();
        alert("Phone number field empty");
        return false;
    }
    else {
        // x.preventDefault()
        alert("Please enter a valid number");
        return false;
    }
}

$(document.body).on("submit", "#im_interested", function (e) {
    e.preventDefault();
    let form_this = $(this);
    let form = $(form_this).closest("form");
    let action = $(form_this).attr('action');
    const data = $(form_this).serializeArray();
    let thankyou_wrap = $(form_this).closest(".modal-content").find(".thankyou_popup_wrap");
    let input_name = $("input[name='popup_name']")
    if ($(input_name).val() === '') {
        // x.preventDefault();
        alert("Name number field empty");

        return false;
    }


    const IsItTrue = phone_num_validation(e);
    console.log(IsItTrue);
    data.push({
        name: 'submit',
        value: $(form_this).find(`[type="submit"]`).attr("name")
    })
    console.log(data);
    if (IsItTrue === true) {
        $.ajax({
            url: action,
            method: "POST",
            data: data,
            cache: false,
            success: function (response) {
                // console.log(response);
                if (response !== '') {
                    const { status, msg, redirect } = JSON.parse(response);

                    console.log(status, msg, redirect);

                    $(form_this).find('.response').remove();

                    if (status === true) {
                        // $(form_this).append(`<div class="response alert alert-success" role="alert">Form Submitted, Thank You</div>`);

                        if (!$(thankyou_wrap).hasClass("show_thankyou_wrapper")) {
                            $(thankyou_wrap).addClass("show_thankyou_wrapper");
                        }
                        // setTimeout(() => {
                        //     window.location = redirect;
                        // }, 2000);
                        $(form_this).get(0).reset();
                    }
                    else {
                        $(form_this).append(`<div class="response">${msg}</div>`);
                    }

                }


            },
            error: function (error) {
                console.error(error);
            }
        })
    }

})

// remove thank you wrapper after closeing form 
$(document.body).on('click', '.im_interested_popup .btn-close', function (e) {

    let thankyou_wrap = $(this).closest(".modal-content").find(".thankyou_popup_wrap");
    setTimeout(() => {
        if ($(thankyou_wrap).hasClass("show_thankyou_wrapper")) {
            $(thankyou_wrap).removeClass("show_thankyou_wrapper")
        }
    }, 200);

})

$(document.body).on("submit", "#contact_adv_form", function (e) {
    e.preventDefault();
    let form_this = $(this);
    let form = $(form_this).closest("form");
    let action = $(form_this).attr('action');
    const data = $(form_this).serializeArray();

    const IsItTrue = phone_num_validation(e);
    console.log(IsItTrue);
    data.push({
        name: 'submit',
        value: $(form_this).find(`[type="submit"]`).attr("name")
    })
    console.log(data);
    if (IsItTrue === true) {
        $.ajax({
            url: action,
            method: "POST",
            data: data,
            cache: false,
            success: function (response) {
                // console.log(response);
                if (response !== '') {
                    const { status, msg, redirect } = JSON.parse(response);

                    console.log(status, msg, redirect);

                    $(form_this).find('.response').remove();

                    if (status === true) {
                        $(form_this).append(`<div class="response alert alert-success mt-3" role="alert">Thank you for submitting the form.</div>`);

                        // setTimeout(() => {
                        //     window.location = redirect;
                        // }, 1000);
                        $(form_this).get(0).reset();
                    }
                    else {
                        $(form_this).append(`<div class="response">${msg}</div>`);
                    }

                }


            },
            error: function (error) {
                console.error(error);
            }
        })
    }

})


$('.pagination-list li.active').prev().addClass('active-sibling');
$('.pagination-list li.active').next().addClass('active-sibling');

//Homepage JS
jQuery(document).ready(function () {
    jQuery('#body-cars-type .owl-item:first-child .tab_item .nav-link').trigger('click');
    jQuery('#car-price-tabs .owl-item:first-child .tab_item .nav-link').trigger('click');
})


//Homepage JS

jQuery(document).ready(function () {
    jQuery('#body-cars-type .owl-item:first-child .tab_item .nav-link').trigger('click');
    jQuery('#car-price-tabs .owl-item:first-child .tab_item .nav-link').trigger('click');
    jQuery('.custom_table_wrap .accordion-item:first-child .accordion-button').trigger('click');


    jQuery('.yc-mobile-inner .yc-nav-list > .yc-nav-has-children.yc-nav-items > .yc-icon').on('click', function () {
        jQuery('.yc-mobile-inner .yc-nav-list > .yc-nav-has-children.yc-nav-items').removeClass('active')
        jQuery('.yc-mobile-inner .yc-sub-menu .sub-menu-item').removeClass('active')
        jQuery(this).parent().addClass('active');
    })

    jQuery('.yc-mobile-inner .yc-sub-menu > .sub-menu-item  >.yc-icon').on('click', function () {
        jQuery('.yc-mobile-inner .yc-sub-menu .sub-menu-item').removeClass('active')
        jQuery(this).parent().addClass('active');
    })

    if (screen.width < 600) {
        jQuery('.global-desktop').remove();
    }
    else {

        jQuery('.global-mobile').remove();
    }


    //Location Change'
    // jQuery(document.body).on("change", "#select-location", function () {
    //     if (jQuery(this).val() === 'KSA') {
    //         window.location = "https://ksa.yaaracars.com";
    //     } else {
    //         window.location = 'https://uae.yaaracars.com';
    //     }
    // })

})

/**
 * 
 * brand/price page select
 * 
 */


$(document.body).on('change', `[data-select-var="variant"]`, function (e) {
    const thisValue = $(this).val();
    // console.log()
    if (thisValue !== '' && thisValue !== undefined && thisValue !== null) {

        window.location.href = $(this).find(`[value="${$(this).val()}"]`).data('takeme-to');

    }

})

