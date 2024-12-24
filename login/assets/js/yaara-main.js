import {img_preview, delate_preview_img, select_brand_fun, category_checkbox_fun, trying_to_copy, checked_value_from_db_to_arr, fill_brand_modal_on_load} from './functions.js';
// console.log(testing());
// console.log(test);
// testing();
// trying_to_copy();


// Init Jodit-editor 
if (document.querySelector(".content_editor#editor") !== null) {
    const editor = Jodit.make('#editor', {
        width: '100%',
        height: '600',
    });
}



// Sentence Case for section inputs 
let section_titles = document.querySelectorAll(".to_sentence_case");
section_titles.forEach(section_title => {
    section_title.addEventListener("keyup", (e) => {
        e.target.value = toSentenceCase(e.target.value)

        // console.log(e.target.value);
    })
})
function toSentenceCase(str) {
    if (!str) return (str);
    return str[0].toUpperCase() + str.slice(1);
}

// select2 single 
let all_select_tags = $(".js-example-basic-single");
$(all_select_tags).select2();
// select2 single multiple
let multiple_car_select = $(".js-example-basic-multiple")
$(multiple_car_select).select2();


jQuery(document).ready(function () {
    jQuery('.js-example-basic-multiple').select2();
});
// select2 add choices
jQuery(document).ready(function () {
    jQuery('.select_2_add_choices').select2({
        tags: true
    });
});




//  single Images preview 
let image_upload_input = document.querySelectorAll('.single-img-upload');
image_upload_input.forEach(each_img_input => {
    each_img_input.addEventListener("change", (e) => {
        img_preview(e);
    })
})
let image_upload_input_01 = document.querySelectorAll('.single_preview_img_holder');
image_upload_input_01.forEach(each_img_input => {
    each_img_input.addEventListener("change", (e) => {
        img_preview(e);
    })
})
// hide img if src empty
let preview_img = document.querySelectorAll('.single_preview_img_holder img');
preview_img.forEach(each_pre_img => {
    if (each_pre_img.getAttribute('src') === '' || each_pre_img.getAttribute('src') === 'https://beingdigitalz.co.in/demo/yaara/assets/img/post/') {
        each_pre_img.style.cssText = 'opacity:0;';
    }
})
// Delete preview image and reset input 
let delate_pre_img_button = document.querySelectorAll('.delete_single_img');
delate_pre_img_button.forEach(each_delate_button => {
    each_delate_button.addEventListener("click", (e) => {
        delate_preview_img(e);
    })
})


// || Post sidebar || 


// Category
// Category checkbox is still pending...starting working on AJEX for brands button 
let category_checkbox = document.querySelectorAll(".category_checkbox");
let category_val_input = document.querySelector(".category_value");
let category_slug_val_input = document.querySelector(".category_slug_value");

let category_arr = [];
let category_arr_slug_val = [];
category_checkbox.forEach(each_category_checkbox => {
    if (each_category_checkbox.checked) {
        checked_value_from_db_to_arr(each_category_checkbox, category_arr, category_arr_slug_val);
    } else {
        // console.log("Not CHecked");
    }
    each_category_checkbox.addEventListener('click', (event) => {
        // console.log(event.currentTarget);
        category_checkbox_fun(event, category_arr, category_arr_slug_val, category_val_input, category_slug_val_input);
    })
})


//  Brand 
// remove_options.remove();
let post_brand_select = $(document.body).on("change", '.post_brand_select', function (e) {
    select_brand_fun(e);
});

// Show Brand/Modal onload from db 
if (document.querySelector('.select_brands_element') !== null) {
    let brands_ = document.querySelector('.select_brands_element');
    console.log(brands_);

    fill_brand_modal_on_load(brands_);
}

// || Post sidebar END || 

// DATA TABLE 
if (document.querySelector(".table_wrap") !== null) {
    $('.post_table_tag').DataTable({
        order: [
            [0, 'desc']
        ],
        "columnDefs": [{
            "targets": [0],
            "orderable": false,
        }]
    });


    if (document.querySelector(".leads_table") !== null) {
        $('.leads_table_tag').DataTable({
            layout: {
                bottomStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            },
            // scrollX: true,
            pageLength: 50,
            order: [
                [0, 'desc']
                // []
            ],
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }],

            // bottomStart: {
            //     buttons: [
            //         {
            //             extend: 'excel',
            //             exportOptions: {
            //                 format: {
            //                     body: function (inner, rowidx, colidx, node) {
            //                         if ($(node).children("input").length > 0) {
            //                             return $(node).children("input").first().val();
            //                         } else {
            //                             return inner;
            //                         }
            //                     }
            //                 }
            //             }
            //         }
            //     ]
            // }

        });
    }

    // Add srNO to tabel row 
    if ($(".sr_no") !== null || $(".sr_no") !== undefined) {
        let all_table_row = document.querySelectorAll("tbody tr");
        let all_cell = document.querySelectorAll(".sr_no");
        console.log(all_table_row, all_cell);
        let no = 0;
        all_cell.forEach((Els, li) => {
            console.log(no);
            Els.innerHTML = no = no + 1;
            // no = +1;
            // console.log(li);
        })
        for (let i = 1; i <= all_table_row.length; i++) {
            // console.log(i);
            // all_cell.innerHTML = i;
        }

    } else {
        console.log("SR.NO cell not there");
    }



    // NOT WORKING 
    console.log($("[name='table_main_id_length']").closest(".dt-layout-cell").remove());
    window.addEventListener("load", () => {
        console.log(document.querySelector("#table_main_id").style.cssText = 'width=100%;');
    })
} else {
    // console.log("False")
}



// Add FAQ 
let Ul_wrapper = $(".faq_wrapper");
let Faq_ll_tags = $('.faq_row_wrap');
// let Add_new_Faq = $('.faq_add_row_btn .add_row');


let faq_row_items = $('.faq_wrapper .faq_row_wrap');
let count = faq_row_items.length;


$(document.body).on("click", ".faq_add_row_btn .add_row", function (e) {
    duplicate_faq_item();
})

function duplicate_faq_item() {
    var new_item = $(`<li class="faq_row_wrap"> ${Faq_ll_tags.html()}</li>`).hide();
    Ul_wrapper.append(new_item);
    new_item.slideDown();

    // let last_child = $('.faq_wrapper .faq_row_wrap:last-child');
    empty_row_val();
    new_name_id();
}

// Add unic name and ID with count onclick
function new_name_id() {
    // name_count = name_count +1;
    count = count + 1;
    let last_child = $('.faq_wrapper .faq_row_wrap:last-child');
    // console.log(faq_row_items.length + 1);

    let ini_name = $(last_child).find('input').attr('name');
    console.error(ini_name);
    let ini_id = $(last_child).find('input').attr('id');
    let ini_text_name = $(last_child).find('textarea').attr('name');
    let ini__text_id = $(last_child).find('textarea').attr('id');

    // let new_name = ini_name.concat(`-${count}`);
    let new_name = `${ini_name.split('__')[0]}__${count}`;
    let new_id = `${ini_name.split('__')[0]}__${count}`;
    // let new_text_name = ini_text_name.concat(-count);
    let new_text_name = `${ini_text_name.split('__')[0]}__${count}`;
    let new_text_id = `${ini_text_name.split('__')[0]}__${count}`;

    console.log(ini_name, count, new_name, new_id);
    // console.log(new_name.split('-'));

    $(last_child).find('input').attr('name', new_name);
    $(last_child).find('input').attr('id', new_id);
    $(last_child).find('textarea').attr('name', new_text_name);
    $(last_child).find('textarea').attr('id', new_text_id);
};
// remove value/innerText from newly added row 
function empty_row_val() {
    let last_child = $('.faq_wrapper .faq_row_wrap:last-child');
    $(last_child).find('input').val('');
    // $(last_child).find('input').attr('name', '');
    $(last_child).find('textarea').val('');
}

// Delete items 
$(document.body).on("click", ".delete_faq", function (e) {
    let clicked_item = $(this);
    delate_faq(clicked_item);
})

function delate_faq(x) {
    let faq_row = x.parent();
    if (Ul_wrapper.children().length > 1) {
        let result = confirm("This action can't be undone");
        if (result) {
            $(faq_row).slideUp(300, function () { $(this).remove(); });
        }
    } else {
        alert("Instead of delating it change the value");
    }
}


// Disable button if val == null 
$(document.body).on("click", ".form-update-btn input", function (e) {
    // e.preventDefault();

    let inputs = $('.faq-input-wrap input');
    let textarea = $(".faq-body textarea").toArray();
    $(inputs).each((ele, e) => {
        // console.log(e.value);
        console.log(e);
        console.log(ele);
        // console.log(textarea[e]);
        console.log(`${e} ${textarea}`);
    })
})

// Adding count for sidebar dropdown 
let info_badge = $(".badge.badge-info");

$(info_badge).each(function(el,x) {
    let menu_content = $(x).closest("a").next(".menu-content");
    if ($(menu_content).children().length < 1) {
        info_badge.style.cssText = "display:none";
    } else {
        $(x).html($(menu_content).children().length);
      
    }
})


// Add New Banner 
let banner_wrapper = $('.banner_wrapper');
let single_banner_item = $('.banner_wrapper .single_banner_wrap');
let count_ = single_banner_item.length - 1;
// console.log(count_ - 1);

$(document.body).on("click", ".banner_carousel_add", function (e) {
    duplicate_banner_item();
    let image_upload_input = document.querySelectorAll('.single-img-upload');
    image_upload_input.forEach(each_img_input => {
        each_img_input.addEventListener("change", (e) => {
            img_preview(e);
        })
    })
})

function duplicate_banner_item() {
    var new_item = $(`<div class="row single_banner_wrap my-2"> ${single_banner_item.html()}</div>`).hide();
    banner_wrapper.append(new_item);
    new_item.slideDown();

    // let last_child = $('.faq_wrapper .faq_row_wrap:last-child');
    empty_banner_item_val();
    single_banner_new_name_id();
    // $(Banner_wrap).find('.delete_single_banner_wrap').css('opacity', '1')
    // $(Banner_wrap).find('.delete_single_banner_wrap').css('visibility', 'visible')
    let baner_item = $('.banner_wrapper .single_banner_wrap')
    $(baner_item).each(function(index, el){
    $(el).find('.delete_single_banner_wrap').css('opacity', '1')
    $(el).find('.delete_single_banner_wrap').css('visibility', 'visible')
})
}

// remove value/innerText from newly added row 
function empty_banner_item_val() {
    let last_child = $('.banner_wrapper .single_banner_wrap:last-child');
    $(last_child).find('input').val('');
    let img = $(last_child).find('.single_preview_img_holder img');
    // $img.data("original-src", $img.attr("src"))
    $(img).attr('src', '')
    // $(img).attr("src", $(img).data("original-src"));
    // $(last_child).find('input').attr('name', '');    
}
// Add unic name and ID with count onclick
function single_banner_new_name_id() {
    // name_count = name_count +1;
    count_ = count_ + 1;
    console.log(count_);
    let last_child = $('.banner_wrapper .single_banner_wrap:last-child');
    // console.log(faq_row_items.length + 1);
    let ini_name = $(last_child).find('input')
    // let ini_name = $(last_child).find('input').attr('name');
    // console.log(ini_name);

    $(ini_name).each(function(index, el){
        // console.log($(el).attr('name'));
        let the_name = $(el).attr('name');
        // console.log(the_name.split('--')[0])
        let new_name = `${the_name.split('--')[0]}--${count_}`;
        // $(el).attr('name', new_name);
    })


    // $(last_child).find('input').attr('id', new_id);
    // $(last_child).find('textarea').attr('name', new_text_name);
    // $(last_child).find('textarea').attr('id', new_text_id);
};

// $(single_banner_item).each(function(index, el){
//     $(el).find('.delete_single_banner_wrap').css('opacity', '0')
//     $(el).find('.delete_single_banner_wrap').css('visibility', 'hidden')
// })
// Delete items 
$(document.body).on("click", ".delete_single_banner_wrap", function (e) {
    let clicked_item = $(this);
    delate_single_banner_item(clicked_item);
})

function delate_single_banner_item(x) {
    let single_banner_item = x.parent();
    let Banner_wrap = document.querySelector('.banner_wrapper');
    if (banner_wrapper.children().length > 1) {
        window.alert("This action can't be undone");
            $(single_banner_item).slideUp(300, function () { $(this).remove(); });
            update_banner_item_names();
    } else {
        // alert("Instead of delating it change the values");
            $(Banner_wrap).find('.delete_single_banner_wrap').css('opacity', '0')
            $(Banner_wrap).find('.delete_single_banner_wrap').css('visibility', 'hidden')
    }
}

// // Remove delate icon if banner length = 1
// if(banner_wrapper.children().length > 1)

// Update name for all banner items on Delate 
function update_banner_item_names(){
    setTimeout(() => {
        let all_items = $('.single_banner_wrap');
        $(all_items).each(function(index, item ){
           console.log($(item))
           let ini_name = $(item).find('input')
           let inp_name_only = $(ini_name).attr('name')
           let new_name = `${inp_name_only.split('--')[0]}--${index}`;
        //    $(ini_name).attr('name', new_name);
        })
    }, 1000);
}