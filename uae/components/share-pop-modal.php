   <!-- social media button pop up START -->
   <div class="modal fade share_btn_pop " id="share_btn_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">How would you like to share</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body">
            <div class="row">
            <div class="col-md-12">
                <div class="sharethis-inline-share-buttons"></div>
            </div>
        
            
            </div>
        </div>
      </div>
    </div>
    </div>
    
    <script>
        document.querySelector(".yc-car-share").addEventListener("click", () => {
            if(document.querySelector(".share_btn_pop").classList == "show"){
            }else{
                document.querySelector("body").style.cssText = 'padding-right:0; overflow: hidden;'
                console.log("false");
            }
        })
        document.querySelector(".yc_pop_up").addEventListener("click", () => {
            if(document.querySelector(".yc_pop_up_form").classList == "show"){
            }else{
                document.querySelector("body").style.cssText = 'padding-right:0;overflow: hidden;'
            }
        })
    </script>
    <!-- social media button pop up END -->