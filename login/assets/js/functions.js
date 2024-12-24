

    // export function testing(){
    //     console.log("This is just testing");
    //     return '123';
    // }
    // export const test = "1234 ";



// Preview image for input type:file 
export function img_preview(e) {
    let main_wrap = e.target.closest('.single-preview-img-upload');
    let img_tag = main_wrap.querySelector('.single_preview_img_holder img');
    let reader = new FileReader();
    reader.onload = function () {
        if(img_tag){
            let result = reader.result;
            img_tag.setAttribute('src', reader.result);
            img_tag.style.cssText = 'opacity: 1;'
        }else{
            console.log("Image tag not found");
        }
    }
    reader.readAsDataURL(e.target.files[0]);
}

// Delete preview image and reset input 
export function delate_preview_img(e){
    let main_wrap = e.target.closest('.single-preview-img-upload');
    let input = main_wrap.querySelector('input');
    let img_tag = main_wrap.querySelector('.single_preview_img_holder img');
    
    input.value = '';
    img_tag.setAttribute('src', '');
    img_tag.style.cssText = 'opacity: 0;'
}

// Post sidebar select brands 
// Brand
export function select_brand_fun(item){
    
    let currentSelect = item.currentTarget;
    let currentOption = item.target.options[item.target.selectedIndex];
    console.log(currentSelect,currentOption);

    let input_brand_slug = currentSelect.closest(".select_brands_wrap").querySelector('.category_brand_slug');
    input_brand_slug.value = currentOption.getAttribute('data-brand-slug');
    console.log(input_brand_slug);
    

    const data = item.target.value;
    const data_id = Number(item.target.options[item.target.selectedIndex].getAttribute('data-brand-id'));

    let modal_select = currentSelect.closest(".select_brand_inner_wrap").querySelector('.post_modal_select');

    let remove_options = currentSelect.closest(".select_brand_inner_wrap").querySelectorAll(".select_brands_wrap .post_modal_select option:not(:first-child)");
    remove_options.forEach(el => {
        el.remove();
    })

    $.ajax({
        url: "https://beingdigitalz.co.in/demo/yaara/login/action-filter.php",
        method: "POST",
        cache: false,
        data: {data_id},
        success: function(res){
            let modal_data = JSON.parse(res);
            
            modal_data.forEach(element => {
                let option_tag = document.createElement("option");
                option_tag.innerHTML = element.name;
                option_tag.value = element.value;
                modal_select.append(option_tag);
            });
        },
        error:function(error){
            console.error(error)
        }
    })    
}

// Onload fill Select Brand/Modal 
export function fill_brand_modal_on_load(theItem){


    let currentSelect = theItem;
    let currentOption = theItem.options[theItem.selectedIndex];

    let input_brand_slug = currentSelect.closest(".select_brands_wrap").querySelector('.category_brand_slug');
    if(input_brand_slug.value){
        input_brand_slug.value = currentOption.getAttribute('data-brand-slug');
    }
    console.log(input_brand_slug);
    

    const data = theItem.value;
    const data_id = Number(theItem.options[theItem.selectedIndex].getAttribute('data-brand-id'));

    let modal_select = currentSelect.closest(".select_brand_inner_wrap").querySelector('.post_modal_select');
    let selected_modal = modal_select.getAttribute('data-selected-modal');
    // console.log(selected_modal);
    

    let remove_options = currentSelect.closest(".select_brand_inner_wrap").querySelectorAll(".select_brands_wrap .post_modal_select option:not(:first-child)");
    remove_options.forEach(el => {
        console.log("Done Removing");
        el.remove();
    })

    $.ajax({
        url: "https://beingdigitalz.co.in/demo/yaara/login/action-filter.php",
        method: "POST",
        cache: false,
        data: {data_id},
        success: function(res){
            let modal_data = JSON.parse(res);
            console.log(modal_data);
            
            
            modal_data.forEach(element => {
                let option_tag = document.createElement("option");
                option_tag.innerHTML = element.name;
                option_tag.value = element.value;
                modal_select.append(option_tag);
                
                if(option_tag.value === selected_modal){
                    option_tag.setAttribute('selected', true);
                    console.log(option_tag);
                }else{
                    console.log("Modal False");
                }
            });
        },
        error:function(error){
            console.error(error)
        }
    }) 

}

// Check if value exists in array and updatea
export function category_checkbox_fun(item, checkVal_arr, chackSlug_arr, cat_val, cat_slug){
    // chackSlug_arr;
    let clicked_item = item.currentTarget;
    
    let item_val = clicked_item.value;
    let item_slug = clicked_item.getAttribute('category-data-slug');

    // console.log(item_val, item_slug);

    if(clicked_item.checked){
        checkVal_arr.push(item_val);
        chackSlug_arr.push(item_slug);
        // console.log("tre its checked");
    }else{
       remove_spec_item_from_arr(checkVal_arr, item_val)
       remove_spec_item_from_arr(chackSlug_arr, item_slug)
    //    console.log("False not checked");
    }
 
    cat_val.value = checkVal_arr;
    cat_slug.value = chackSlug_arr;
    console.log(checkVal_arr);
    

}

// Add already checked value to arr (Category)
export function checked_value_from_db_to_arr(item, checkVal_arr, chackSlug_arr){
    let clicked_item = item;
    let item_val = clicked_item.value;
    let item_slug = clicked_item.getAttribute('category-data-slug');

    console.log(item_val, item_slug);

    if(clicked_item.checked){
        checkVal_arr.push(item_val);
        chackSlug_arr.push(item_slug);
        // console.log("tre its checked");
    }else{
       remove_spec_item_from_arr(checkVal_arr, item_val)
       remove_spec_item_from_arr(chackSlug_arr, item_slug)
    }

    console.log(checkVal_arr, chackSlug_arr);
    
}


// get the specific item from the array 
export function remove_spec_item_from_arr(theArr, theItem) {
    let pos = theArr.indexOf(theItem);
    theArr.splice(pos, 1);
    return theArr;
}

// Trying to copy the code 
export function trying_to_copy(){
let cou = 0;
window.addEventListener("contextmenu", (e) => {
    e.preventDefault();
    cou++;
    // console.log(cou)
    if(cou === 2 || cou === 10 || cou === 15 || cou === 20){
        alert("Trying to copying the code \n Trying CTRL + SHIFT + i")
    }else if(cou === 3){
        alert("Stop it")
    }else if(cou === 4){
        alert("Yo, Just give it a rest")
    }
})
}


