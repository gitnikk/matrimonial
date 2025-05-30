<?php 
    include "common/user.session.php";
    include "../inc/inc.config.php";
    
    $conn = new DBConfig();
    $conn -> startTransation();

    if((!isset($_REQUEST['profileFilter']) || $_REQUEST['profileFilter'] == 'All')) {
        $statusFilter = "";    
    } else {
        if(!isset($_REQUEST['search']))
            $statusFilter = "AND transactionStatus = '".$_REQUEST['profileFilter']."'";
    }

    $searchFor = "";
    if(isset($_REQUEST['search'])) {
        $searchFor = "AND user_id = '".$_REQUEST['search']."'";
    }

    // Pagination
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $pageno = $_GET['page'];
    } else {
        $pageno = 1;
    }

    $no_of_records_per_page = 2;
    $offset = ($pageno-1) * $no_of_records_per_page; 

    // Calculate total records
    $total_pages_sql = "SELECT id
                        FROM   transactiondetails
                        WHERE  isDeleted = 0 $statusFilter $searchFor
                        ORDER BY id DESC";
    // die($total_pages_sql);
    $result1 = $conn -> db -> query($total_pages_sql);    
    $total_rows = $result1->rowCount();
    
    $total_pages = ceil($total_rows / $no_of_records_per_page);    
    $sql = "SELECT *
            FROM   transactiondetails
            WHERE  isDeleted = 0 $statusFilter $searchFor
            ORDER BY id DESC
            LIMIT   $offset, $no_of_records_per_page";   
    $result = $conn -> db -> query($sql);

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="ThemeStarz">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css"> -->
    <title>सरल मिलन</title>
<styel>


</style>
</head>
<body data-spy="scroll" data-target=".navbar" data-bg-parallax="scroll" data-bg-parallax-speed="3">
    <div class="ts-page-wrapper" id="page-top">
        <header >
            <!--NAVIGATION ******************************************************************************************-->
            <?php            
                include("common/user.header.php");
            ?>
            <!--end navbar-->
        </header>


        <main id="ts-content">
            <section style="margin-top:9rem">
                <div class="container">
                    <div class="">
                        
                        
                        <div class="row">
                            <div class="col-md-12 ">
<!-- Search Options:s -->
                            <div class="search-container">
                            <form action="#">
                                <div class="form-group form-row">
                                <!-- <label class="mr-5 mt-2" style="font-weight:bold">Search :</label> -->
                                    <div class="input-group col-md-4">
                                        <input type="text" class="form-control" placeholder="प्रोफाइल आयडी सर्च उदा. 54" name="search" id="search" >
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="offset-md-2">
                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div> -->
                            </form>  
                            </div>
                                                       
<?php

$queryUrlParams = $_GET;

if($pageno<=$total_pages && $total_pages > 1){    
    if($pageno>1)
    {
        $queryUrlParams['page'] = $pageno-1;
        $btn_prev_params = http_build_query($queryUrlParams);
        $queryUrlParams['page'] = 1;
        $new_url_params = http_build_query($queryUrlParams);
        $pagLink = "<ul class='pagination'>
                        <li class='page-item'><a class='page-link' href='transactions.php?$btn_prev_params'>Prev</a></li>
                        <li class='page-item'><a class='page-link' href='transactions.php?$new_url_params'>1</a></li>
        ";  //&laquo;
    }   
    else
    {
        $queryUrlParams['page'] = 1;
        $new_url_params = http_build_query($queryUrlParams);
        $pagLink = "<nav><ul class='pagination'>
        <li class='page-item active'><a class='page-link' href='transactions.php?$new_url_params'>1</a></li>
        ";  
    }
    
    if($pageno-2 > 2){
        $pagLink .= "<li class='page-item'><a class='page-link' href='#'>...</a></li>";
    }
    for ($i=$pageno-2; $i<=$pageno+2; $i++) {
        if( $i > 1 && $i <= $total_pages-1 )
        {
            $queryUrlParams['page'] = $i;
            $new_url_params = http_build_query($queryUrlParams);
            if($i == $pageno) {                
                $pagLink .= "<li class='page-item active'><a class='page-link' href='transactions.php?$new_url_params'>".$i."</a></li>";
            }
            else 
            $pagLink .= "<li class='page-item'><a class='page-link' href='transactions.php?$new_url_params'>".$i."</a></li>"; 
        }           
    }      
    if($i < $total_pages){
        // show dots
        $pagLink .= "<li class='page-item'><a class='page-link' href='#'>...</a></li>";
    }

    $queryUrlParams['page'] = $total_pages;
    $new_url_params = http_build_query($queryUrlParams);
    if($pageno == $total_pages){
        // Show last page number
        $pagLink .= "<li class='page-item active'><a class='page-link' href='transactions.php?$new_url_params'>".$total_pages."</a></li>"; 
    }
    else {
        $pagLink .= "<li class='page-item'><a class='page-link' href='transactions.php?$new_url_params'>".$total_pages."</a></li>"; 
    }
    
    if($total_pages != $pageno){
        $queryUrlParams['page'] = ($pageno+1);
        $new_url_params = http_build_query($queryUrlParams);
        //show next button
        $pagLink .= " <li class='page-item'><a class='page-link' href='transactions.php?$new_url_params'>Next</a></li></ul>";  //&raquo;
    }
    else
    {
        $pagLink .= "</ul>"; 
    }
} else {
    $pagLink = "";
}
    echo "<div style='float:right'>$pagLink</div>";
?>
<form action="#">
<div  style="float:left">
    <label class="mr-5" style="font-weight:bold">Show :</label>
    <div class="custom-control custom-radio custom-control-inline">
        <input class="custom-control-input" type="radio" name="profileFilter" value="All" id="all" onchange="this.form.submit()" <?php if((!isset($_REQUEST['profileFilter']) || $_REQUEST['profileFilter'] == 'All') && (!isset($_REQUEST['search']))) { echo "checked='checked'"; } ?> />
        <label class="custom-control-label" for="all">All</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input class="custom-control-input" type="radio" name="profileFilter" value="New" id="new" onchange="this.form.submit()" <?php if(isset($_REQUEST['profileFilter']) && $_REQUEST['profileFilter'] == 'New') { echo "checked='checked'"; } ?> />
        <label class="custom-control-label" for="new">New</label>
    </div>    
    <div class="custom-control custom-radio custom-control-inline">
        <input class="custom-control-input" type="radio" name="profileFilter" value="Approved" id="approved" onchange="this.form.submit()" <?php if(isset($_REQUEST['profileFilter']) && $_REQUEST['profileFilter'] == 'Approved') { echo "checked='checked'"; } ?> />
        <label class="custom-control-label" for="approved">Approved</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">    
        <input class="custom-control-input" type="radio" name="profileFilter" value="Declined" id="declined" onchange="this.form.submit()" <?php if(isset($_REQUEST['profileFilter']) && $_REQUEST['profileFilter'] == 'Declined') { echo "checked='checked'"; } ?> />
        <label class="custom-control-label" for="declined">Declined</label>
    </div>
</div>    
</form>

<table class="table table-border">
    <tr>
        <th>Date</th>
        <th>Profile ID</th>
        <th>Requested Profiles</th>
        <th>Transaction</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

<?php
    // echo $sql;
    if($result->rowCount()>0)  
    {
        foreach($result->fetchAll() as $row) {
            echo "
            <tr>
                <td>$row[createdAt]</td>
                <td>DM-$row[user_id]</td>
                <td>$row[profileViews]</td>
                <td><a href='../users/$row[transactionProof]' target='_blank' download>Img  <i class='fa fa-download ml-2'></i></a>
                </td>
                <td>$row[transactionStatus]</td>
                <td>";
                if($row['transactionStatus'] == 'New' || $row['transactionStatus'] == 'Declined')
                    echo "<a onClick='changeTransactionStatus(\"Approved\", \"$row[id]\",\"$row[user_id]\",\"$row[profileViews]\")' class='btn btn-success btn-sm mr-2' style='color:#FFF'>Approve</a>";
                if($row['transactionStatus'] == 'New' || $row['transactionStatus'] == 'Approved')
                    echo "<a onClick='changeTransactionStatus(\"Declined\", \"$row[id]\",\"$row[user_id]\",\"$row[profileViews]\")' class='btn btn-danger btn-sm' style='color:#fff'>Decline</a>";
                echo "</td>                            
            </tr>";       
        }

    }
    else {
        echo "<tr>";
        echo "<td colspan='6'>No data found</td>"; 
        echo "</tr>";
    }
    echo "</table>";
    echo "<div style='float:right'>$pagLink</div>";
?>
                                

                               
                                <!-- Pagination:e -->
                            </div>
                           
                        </div>
                        <!--end row-->
                    </div>
                   
                </div>
            </section>
        </main>
        <!--*********************************************************************************************************-->
        <!--************ FOOTER *************************************************************************************-->
        <!--*********************************************************************************************************-->
        <footer id="ts-footer">

            <section id="contact" class="ts-separate-bg-element"  data-bg-image-opacity=".1" data-bg-color="#1b1464">
                <div class="container">
                    
                    <div class="text-center text-white py-4">
                        <small>© 2020 सरल मिलन</small>
                    </div>
                </div>
                <!--end container-->
            </section>

        </footer>
        <!--end #footer-->
    </div>
    <!--end page-->



    
	<script src="../assets/js/jquery-3.3.1.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58"></script> -->
	<script src="../assets/js/isInViewport.jquery.js"></script>
	<!-- <script src="assets/js/jquery.particleground.min.js"></script> -->
	<!-- <script src="assets/js/owl.carousel.min.js"></script> -->
	<script src="../assets/js/scrolla.jquery.min.js"></script>
	<!-- <script src="assets/js/jquery.validate.min.js"></script> -->
	<!-- <script src="assets/js/jquery-validate.bootstrap-tooltip.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>
    <script src="../assets/js/jquery.wavify.js"></script>
    <script src="../assets/js/custom.js"></script>

    <script>
        function changeTransactionStatus(status, id, requestedBy, requestedTo){
            let str;
            if(status == 'Approved') 
                str = "approve";
            else if (status == 'Declined')
                str = "decline";
                        
            if(confirm("Do you want to "+str+" this transaction?")){
                $.post("ajax.php", {action: "changeTransactionStatus", status: ""+status, id: ""+id, requestedBy: ""+requestedBy, requestedTo: ""+requestedTo}, function(result){
                    // document.getElementById("currentTaluka").innerHTML = result;
                    // console.log(result);
                    window.location.reload();
                });
            }
            
        }
    </script>
</body>
</html>


