<?php
// Include the database configuration file.
include "config.php";

// Retrieve the value of the "search" variable from "script.js".
if (isset($_POST['search'])) {
   // Assign the search box value to the $Name variable.
   $Name = $_POST['search'];

    // Define the search query.
    $Query = "SELECT yc_master.*, yc_modal.*, yc_engine.* FROM yc_master   
    INNER JOIN yc_modal ON yc_master.Master_ID = yc_modal.Brand_ID 
    INNER JOIN yc_engine ON yc_modal.Mod_ID = yc_engine.Modal_ID 
    WHERE yc_master.Location = 'KSA' AND yc_engine.Price != 'Discontinued' AND yc_engine.Status = 'Publish' AND CONCAT(Brand,' ',Modal) LIKE '%{$Name}%' GROUP BY yc_engine.Ref_Modal ";

   // Execute the query.
   $ExecQuery = MySQLi_query($conn, $Query);

   $list = mysqli_fetch_assoc($ExecQuery);


   // Create an unordered list to display the results.
   echo '<ul>'; ?>

    <li onclick='fill("<?php echo $list['Name']; ?>")'>
        <a href="<?php echo site_url()."/".$list['Brand_Slug']; ?>">
        <!-- Display the searched result in the search box of "search.php". -->
       <?php echo "All ".$list['Brand']." Cars"; ?>
       </a>
    </li>

    <?php
   // Fetch the results from the database.
   mysqli_data_seek($ExecQuery,0);
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
       ?>
   <!-- Create list items.
    Call the JavaScript function named "fill" found in "script.js".
    Pass the fetched result as a parameter. -->

    <li onclick='fill("<?php echo $Result['Name']; ?>")'>
        <a href="<?php echo site_url()."/".$Result['Brand_Slug']."/".$Result['Modal_Slug']; ?>">
        <!-- Display the searched result in the search box of "search.php". -->
       <?php echo $Result['Brand']." ".$Result['Modal']; ?>
       </a>
    </li>

   <!-- The following PHP code is only for closing parentheses. Do not be confused. -->
   <?php
}}
?>
</ul>