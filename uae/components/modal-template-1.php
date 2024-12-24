<?php 

                        $makeModal = $car_modal[0]['Brand']." ".$car_modal[0]['Modal'];
                        $modal = $car_modal[0]['Modal'];

                        $var = [];
                        $fuel = [];
                        $trans = [];

                        foreach($car_modal as $car_var) {
                            $var[] = $car_var['Variant'];
                            $fuel[] = $car_var['Fuel_Type'];
                            $trans[] = $car_var['Transmission'];
                        }

                        $new_trans = array_unique($trans);
                        $new_fuel =  array_unique($fuel);

                        $first_ = reset($car_modal);
                        $last_ = end($car_modal);

                        $safety_final_keys = safety($conn, $first_);
                        $interior_final_keys = interior($conn, $first_);
                        $exterior_final_keys = exterior($conn, $first_);

                        // print_r($first_);

                        ?>

                        <p><?php echo $makeModal ?> price starts from <?php echo $first_['Price']; ?> onwards.   
                        
                        This <?php echo $first_['Body_Type']; ?> is offered in <?php echo car_count($var); ?> variants i.e. 
                        <span class="var-list">
                        <?php foreach($var as $name){
                            echo "$name<span>, </span>";
                        } 
                        ?>
                        </span>.</p>

                        <p>The <?php echo $first_['Year']." ".$makeModal ?> is available in 
                        <span class="var-list">
                        <?php foreach($new_fuel as $f){
                            echo "$f<span>, </span>";
                        }
                        ?>
                        </span>
                        with 
                        <span class="var-list">
                        <?php foreach($new_trans as $t){
                            echo "$t<span>, </span>";
                        }
                        ?>
                        </span>
                        transmission options.</p>   

                        <p><?php echo $makeModal; ?> has integrated numerous safety features, a few of which include the 
                        
                        <span class="var-list">
                        <?php
                         $int = [];
                         $ext = [];
                         $saf = [];
                     
                         foreach($safety_final_keys as $list => $vals){
                             if($first_[$list] == "Yes"){
                                 $saf[] = $safety_final_keys[$list]."<span>, </span>";
                             }
                         }
                         foreach(array_slice($saf, 0, 6) as $s){
                             echo $s;
                         }
                        
                        ?>
                        </span>


                        .</p><p><?php echo $modal; ?>’s interior features include a 
                        
                        <span class="var-list">
                        <?php
                     
                        foreach($interior_final_keys as $list => $vals){
                            if($first_[$list] == "Yes"){
                                $int[] = $interior_final_keys[$list]."<span>, </span>";
                            }
                        }
                        foreach(array_slice($int, 0, 6) as $i){
                            echo $i;
                        }
                        ?>
                        </span>
                        
                        .</p><p> Exterior features comprise an 
                        
                        <span class="var-list">
                        
                        <?php
                        
                        foreach($exterior_final_keys as $list => $vals){
                            if($first_[$list] == "Yes"){
                                $ext[] = $exterior_final_keys[$list]."<span>, </span>";
                            }
                        }
                        foreach(array_slice($ext, 0, 6) as $e){
                            echo $e;
                        }
                        ?>
                        </span>
                        .</p>