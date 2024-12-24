(function ($) {
    const dataToLoadIn = $(`#find-cars`);
    dataToLoadIn.css({ 'position': 'relative', 'height': '100%' });
    const actionUrl = $(dataToLoadIn).data('cars');
    $(dataToLoadIn).removeAttr('data-cars');

    // console.log(actionUrl);

    const Location = window.location.origin.split('/').slice(-1).pop().split('.')[0].toUpperCase();

    const Loader = ($msg) => {
        let loader = '<div class="loader">';
        loader +=
            '<div class="d-flex justify-content-center flex-column align-items-center h-100">';
        loader += '<div class="spinner-grow text-primary" role="status">';
        loader += '<span class="visually-hidden">Loading...</span>';
        loader += "</div>";
        loader += "<div>";
        loader += '<p class="loader-text">' + $msg + "</p>";
        loader += "</div>";
        loader += "</div>";
        loader += "</div>";

        return loader;
    };

    const GridLoader = () => {
        return `<div class="spinner__cars load-more"><div class="spinner-border" role="status">
  <span class="sr-only"></span>
</div></div>`;
    }

    const fallbackImage = ()=>{
        return 'https://yaaracars.com/assets/img/yaara-placeholder.jpg';
    }


    const AjaxCall = (actionUrl, dataToLoadIn, dataToSearch = null, offset = null) => {
        let data;
        let Offset = 0;
        if (offset !== null) {
            Offset = offset
        }
        if (dataToSearch === null) {
            data = { data: 'onload', offset: Offset, location: Location, scrolling: true }

        }
        else {
            data = dataToSearch
        }

        if(actionUrl === undefined || actionUrl === null || actionUrl === ''){
            return;
        }

        $.ajax({
            url: actionUrl,
            method: 'POST',
            cache: false,
            data: data,
            beforeSend: function () {
                const loader = Loader(`Loading Cars...`);
                $(dataToLoadIn).append(loader);
            },
            complete: function () {
                $(dataToLoadIn).find(`.loader`).remove();
            },
            success: function (response) {
                // console.log(response);

                if (response !== '') {
                    const { status, msg, dataArray: data, showing, scrolling, query, total_results } = JSON.parse(response);

                    console.log(query);
                  
                    
                    
                    if (status === true) {
                        $(dataToLoadIn).css('display','grid');

                        if (scrolling === false) {
                            $(dataToLoadIn).children().remove();

                        }
                        let grids = '';
                        if (data !== undefined && data !== null && data !== '') {


                            data.forEach(element => {
                                const { model_id,currency, brand_name, brand_slug, model_name, model_slug, image, fuel_type, transmission_type , minPrice, maxPrice, fuel_type_col, transmission_type_col, version} = element;
                                // console.log(image, brand_name,model_name)


                                grids += `<div class="find_car_grid_item common_box_shadow">`;
                                grids += `<div class="find_new_single_car_img_holder">`;
                                grids += `<a href="${window.location.origin}/${brand_slug}/${model_slug}"><img src="${image ==='' || image ===null || image === undefined ? fallbackImage() : image}" alt="${brand_name}"/></a>`;
                                grids += `</div>`;
                                grids += `<div class="find_new_single_car_desc_wrap ">`;
                                grids += `<a href="${window.location.origin}/${brand_slug}/${model_slug}" class="find_car_desc_title">${brand_name} ${model_name} </a>`;
                                grids += `<div class="find_car_desc_type">`;
                                // Petrol, Diesel | Automatic, Manual</div>`;
                                grids += `${fuel_type_col}`
                                // grids += `${fuel_type.join(',')}`
                                if(transmission_type_col !== "" && transmission_type_col !== undefined && transmission_type_col !== null){
                                    grids += ` | `;
                                }
                                grids += `${transmission_type_col}`;
                                // grids += `${transmission_type.join(',')}`;
                                grids += `</div>`
                                grids += `<div class="find_car_desc_price" data-minPrice="${minPrice}" data-maxPrice=${maxPrice}>`;
                                grids += `<p>OTR Price</p>`;
                                // grids += `<p>SAR 5500</p>`;
                                // grids += `<p>Starting From</p>`;
                                
                                // grids += `<p>${minPrice === maxPrice ? '' : currency } ${minPrice} ${minPrice === maxPrice ? '' : 'onwards'}</p>`;
                                grids += `<p>${(minPrice === "TBD") ? '' :  currency} ${minPrice} ${parseInt(version) > 1 && minPrice !== 'TBD' ? 'onwards' : ''}</p>`;
                               

                                grids += `</div>`;
                                grids += `<div class="find_new_singe_button_wrap">`;
                                grids += `<a href="${window.location.origin}/${brand_slug}/${model_slug}" class="">Explore</a>`;
                                grids += `<a href="${window.location.origin}/${brand_slug}/${model_slug}/variants">Variants</a>`;
                                grids += `</div>`;
                                grids += `</div>`;
                                grids += `</div>`

                            });
                        }

                        $(dataToLoadIn).data('showing', showing);
                        $(dataToLoadIn).append(grids);

                    console.log(showing , total_results, $(dataToLoadIn).children().length, scrolling);


                        


                        if ($(dataToLoadIn).parent().find(`.spinner__cars.load-more`).has('d-none')) {
                            $(dataToLoadIn).parent().find(`.spinner__cars.load-more`).removeClass('d-none');
                            
                        }
                        
                       
                       

                        if (scrolling === false && $(dataToLoadIn).children().length >= total_results) {
                            
                            $(dataToLoadIn).parent().find(`.spinner__cars.load-more`).addClass('d-none');
                        }
                        else{
                            
                            $(dataToLoadIn).parent().find(`.spinner__cars.load-more`).removeClass('d-none');
                        }

                        if(scrolling === true && $(dataToLoadIn).children().length >= total_results){
                            
                            $(dataToLoadIn).parent().find(`.spinner__cars.load-more`).addClass('d-none');
                            // debugger;
                        }
                        
                        
                        


                    }
                    else {
                        $(dataToLoadIn).children().remove()
                        $(dataToLoadIn).css('display','block');
                        $(dataToLoadIn).append(`<div><span>${msg}</span> <a href="#" id="" class="reset f-13" data-remove="true">Reset</a></div>`);
                    }
                }
            },
            error: function (error) {
                console.error(error);

            }
        })
    };

    if (dataToLoadIn !== undefined && dataToLoadIn !== null) {

        AjaxCall(actionUrl, dataToLoadIn, null);
    }


    /**
     * 
     * 
     * Load More Button
     */

    $(document.body).on('click', '.load-more', function (e) {
        const offset = $(dataToLoadIn).children().length;
        const data = { data: 'onload', offset: offset, location: Location };
        AjaxCall(actionUrl, dataToLoadIn, data);

    })

    /***
     * 
     * 
     * function check If scrolled of section
     * 
     */


    /*
    $(window).on('scroll', function () {
        const ScrollTop = $(window).scrollTop();
        // console.log(ScrollTop);
        const SectionHeight = $(dataToLoadIn).innerHeight();
        const Scrolloffset = $(dataToLoadIn).offset().top;
        // console.log(SectionHeight)
        const Scrolled = ScrollTop + Scrolloffset;

        if (Scrolled > SectionHeight) {
            const offset = $(dataToLoadIn).children().length;

            let value = null;
            let searchValue = null;

            if (
                ($(dataToLoadIn).attr('data-search') !== null)
                &&
                ($(dataToLoadIn).attr('data-search') !== undefined)
                &&
                ($(dataToLoadIn).attr('data-search') !== '')
            ) {
                value = $(dataToLoadIn).attr('data-search');
            }


            if (
                ($(dataToLoadIn).attr('data-search-by') !== null)
                &&
                ($(dataToLoadIn).attr('data-search-by') !== undefined)
                &&
                ($(dataToLoadIn).attr('data-search-by') !== '')
            ) {
                searchValue = $(dataToLoadIn).attr('data-search-by');
            }

            const data = { data: 'onload', offset: offset, location: Location, search: value, searchby: searchValue, scrolling: true };
            console.log(data);
            if ($(dataToLoadIn).attr('data-scroll') === "true" || $(dataToLoadIn).attr('data-scroll') === undefined) {

                setTimeout(() => {
                    AjaxCall(actionUrl, dataToLoadIn, data);

                }, 3 * 1000);

            }
        }

    });
    */



    $(document.body).on(`click`, `#find-filters [data-search-by]`, function (e) {
        e.preventDefault();

        const This = $(this);
        const Parent = $(This).closest('[data-parent]');
        const search = $(Parent).find(`[data-search]`);
        const Wrap = $(Parent).closest(`.parent--wrap`);

        $(Parent).removeClass('selected--parent');



        /**
         * 
         * check if select all
         * 
         */

        $(Parent).find(`[name="select-all"]`).prop('checked', false);
        if($(Parent).find(`[name="select-all"]`).prop('checked') === true){

        }

        /***
         * 
         * Single Select form group
         * 
         */
        if ($(This).hasClass(`selected`)) {

            $(This).removeClass('selected');
            $(Parent).find(`.selected`).removeClass(`selected`);
        }
        else {

            $(Parent).find(`.selected`).removeClass(`selected`);
            $(This).addClass('selected');
        }


        /**
         * 
         * Select All
         * 
         */

        // $(This).toggleClass('selected');


        const searchValue = $(This).data('search-by');
        const value = $(search).data(`search`);

        // console.log(value, searchValue)

        $(dataToLoadIn).attr('data-search', value);
        $(dataToLoadIn).attr('data-search-by', searchValue);




        /**
         * 
         * Select All
         * 
         */
        const SelectedButtons = ($(Wrap).find(`.selected`).toArray());

        $(This).closest('[data-parent="parent"]').find(`[data-search] .selected-text`).remove();
        // console.warn($($(This).closest('[data-parent="parent"]').find(`[data-search]`)).find(`.selected-text`));
        const Search__Text = $(This).html();
        $(This).closest('[data-parent="parent"]').find(`[data-search]`).append(`<span class="selected-text">${Search__Text}</span>`);
        
        const DataToFind = [];
        SelectedButtons.forEach(buttons => {
            const Search__ = $(buttons).data('search-by');
            // $(buttons).closest('[data-parent="parent"]').removeClass(`selected--parent`)
            if(!$(buttons).closest('[data-parent="parent"]').hasClass(`selected--parent`)){
                $(buttons).closest('[data-parent="parent"]').addClass(`selected--parent`)
            }
            const Search__value = $(buttons).closest('[data-parent="parent"]').find(`[data-search]`).data(`search`);
            if (Search__ !== '' && Search__ !== null && Search__ !== undefined) {
                DataToFind.push({ name: Search__value, value: Search__ });
            }
        })


        if (DataToFind === '') {
            $(dataToLoadIn).attr('data-scroll', 'true');
        }
        else {

            $(dataToLoadIn).attr('data-scroll', 'false');
        }

        console.error(DataToFind);

        const data = { data: 'onload', offset: 0, location: Location, search: value, searchby: searchValue, datatofind: { DataToFind }, scrolling: false };

        // console.warn(data);

        AjaxCall(actionUrl, dataToLoadIn, data);
        addResetButton();
    })


    /**
     * 
     * 
     * checkbox select
     * 
     * 
     */


    $(document.body).on('change','[name="select-all"]', function(e){
        const This = $(this);
        const parent = $(This).closest(`[data-parent="parent"]`);
        

        // console.warn($(parent).find(`[data-search-by]`));

        
        if($(This).prop('checked') === true){
            
            $(parent).find(`[data-search-by]`).addClass(`selected`);
            // $(parent).find(`[data-search-by]`).trigger('click');

            $(parent).find(`.selected-text`).remove();


        }
        else{
            $(parent).find(`[data-search-by]`).removeClass(`selected`);


        }

        $(dataToLoadIn).children().remove();

        AjaxCall(actionUrl, dataToLoadIn, null);
        addResetButton();
    })




    /**
     * 
     * 
     * Reset
     * 
     */


    const addResetButton = ()=>{

        if(($(`#find-filters .selected[data-search-by]`).length > 0) && ($(`#find-filters #filters`).find(`#reset`).length ===0)){

            // $(`#find-filters #filters`).prepend(`<a class="f-13 reset" id="reset" href="#">Reset</a>`);
        }   
    }

    $(document.body).on('click', `.reset`, function (e) {

        e.preventDefault();

        $(document.body).find('.selected').removeClass('selected');
        $(document.body).find('.selected--parent').removeClass('selected--parent');
        $(document.body).find('.selected-text').remove();
        $(document.body).find('[name="select-all"]').prop('checked', false);

        $(dataToLoadIn).children().remove();

        AjaxCall(actionUrl, dataToLoadIn, null);

        console.log($(this).data('remove'));
        if($(this).data('remove') === false){

        }
        else{

            $(this).remove();
            // $(document.body).find(`.reset`).remove();
        }

    })



    /***
     * 
     * 
     * Scroll
     * 
     * 
     */


    const LoaderObserve = $(dataToLoadIn).parent().find(`.spinner__cars.load-more`).get(0);
    console.log(LoaderObserve);

    function handleIntersection(entries, observer) {
        entries.forEach((entry) => {
            // console.warn(entry)

            if (entry.isIntersecting) {
                const Target = entry.target;
                // console.error(Target);
                // console.log();
                setTimeout(() => {
                    if (!$(Target).hasClass('d-none')) {
                        $(Target).addClass('d-none');
                        // $(dataToLoadIn).parent().find(`.spinner__cars.load-more`).addClass('d-block');
                    }
                    const offset = $(dataToLoadIn).children().length;
                    // console.log(offset);
                    AjaxCall(actionUrl, dataToLoadIn, null,offset);


                }, 3 * 1000);

            }
        });
    }

    const observer = new IntersectionObserver(handleIntersection, {
        root: null,
        rootMargin: "0px",
        threshold: 1,
    });

    if (LoaderObserve !== null && LoaderObserve !== undefined && LoaderObserve !== '') {
        const section__To__observe = LoaderObserve;
        observer.observe(section__To__observe);
    }



    const filter = $(document.body).find(`#filter__left`);
    
    

    $(window).on('resize load', function(e){

        $($(document.body).find(`#find-filters`)).prepend(filter);

        if($(window).width() <= 991){

            $($($(document.body).find(`#find-filters`)).find(`#filterOffCanvas`)).find(`.offcanvas-body`).prepend(filter);
        }

    })



}(jQuery))