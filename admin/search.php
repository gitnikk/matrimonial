<?php 
    include "common/user.session.php";
    include "../inc/inc.config.php";
    
    $conn = new DBConfig();
    $conn -> startTransation();

    $searchFor="";
    $filter_Samaj="";
    //Show
    //pu.isReadyForInterCaste , pu.samajId, pu.isDeleted,  pu.profileStatus = 'Approved'

    
    //Search variables
    $ageFrom = isset($_REQUEST['ageFrom']) ? $_REQUEST['ageFrom'] : ""; 
    $ageTo = isset($_REQUEST['ageTo']) ? $_REQUEST['ageTo'] : "";
    $fromHeight = isset($_REQUEST['fromHeight']) ? $_REQUEST['fromHeight'] : "";
    $toHeight = isset($_REQUEST['toHeight']) ? $_REQUEST['toHeight'] : "";
    $searchState = isset($_REQUEST['searchState']) ? $_REQUEST['searchState'] : ""; 
    $searchCity = isset($_REQUEST['searchCity']) ? $_REQUEST['searchCity'] : "";
    $maritalStatus = isset($_REQUEST['maritalStatus']) ? $_REQUEST['maritalStatus'] : ""; 
    $profileId = isset($_REQUEST['profileId']) ? $_REQUEST['profileId'] : ""; 
    // search filters
    if(isset($ageFrom) && is_numeric($ageFrom)){
        $searchFor .= " AND TIMESTAMPDIFF(YEAR, pu.birthDate, CURDATE()) >= $ageFrom";
    }
    if(isset($ageTo) && is_numeric($ageTo)){
        $searchFor .= " AND TIMESTAMPDIFF(YEAR, pu.birthDate, CURDATE()) <= $ageTo";
    }
    if($fromHeight > 0){
        $searchFor .= " AND pu.height >= $fromHeight";
    }
    if($toHeight > 0){
        $searchFor .= " AND pu.height <= $toHeight";
    }
    if($searchState != ""){
        $searchFor .= " AND pu.currentState LIKE '%$searchState%'";
    }
    if($searchCity != ""){
        $searchFor .= " AND pu.currentCity LIKE '%$searchCity%'";
    }
    if($maritalStatus != ""){
        $searchFor .= " AND pu.maritalStatus LIKE '%$maritalStatus%'";
    }
    if($profileId != ""){
        $searchFor .= " AND pu.profileUserId = $profileId";
    }


  
    // Pagination
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $pageno = $_GET['page'];
    } else {
        $pageno = 1;
    }

    $no_of_records_per_page = 20;
    $offset = ($pageno-1) * $no_of_records_per_page; 

    // Calculate total records
    $total_pages_sql = "SELECT pu.profileUserId
                        FROM    profileUsers pu, profileFamily pf, samaj s
                        WHERE   pu.profileUserId = pf.profileUserId
                        AND     pu.profileUserId <> $_SESSION[user_id]
                        $filter_Samaj
                        AND     pu.samajId = s.id
                        AND     pu.isDeleted = 0
                        $searchFor";
    // die($total_pages_sql);
    $result1 = $conn -> db -> query($total_pages_sql);    
    $total_rows = $result1->rowCount();
    
    $total_pages = ceil($total_rows / $no_of_records_per_page);    
    $sql = "SELECT  *, TIMESTAMPDIFF(YEAR, pu.birthDate, CURDATE()) AS age 
            FROM    profileUsers pu, profileFamily pf, samaj s
            WHERE   pu.profileUserId = pf.profileUserId
            AND     pu.profileUserId <> $_SESSION[user_id]
            $filter_Samaj
            AND     pu.samajId = s.id
            AND     pu.isDeleted = 0
            $searchFor
            ORDER BY pu.profileUserId DESC
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
<style>
    .image--cover {
  /* width: 150px; */
  height: 180px;
  border-radius: 50%;
  margin: 0px;

  object-fit: cover;
  object-position: center top;
}

</style>

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
                    <div class="ts-mt__n-10">
                        <!-- Search Options:s -->
                        <button class="btn btn-primary collapsed m-2" data-toggle="collapse" data-target="#AdvanceSearch" aria-expanded="true" aria-controls="AdvanceSearch">
                            Advance Search
                        </button>
                        <button class="btn btn-primary collapsed m-2" data-toggle="collapse" data-target="#SearchByProfileID" aria-expanded="false" aria-controls="SearchByProfileID">
                            Search By Profile ID
                        </button>
                        <!-- <button class="btn btn-primary collapsed m-2" data-toggle="collapse" data-target="#SearchByInterCaste" aria-expanded="false" aria-controls="SearchByInterCaste">
                            Inter Caste Search
                        </button> -->
                        <div class="row">
                            <div class="col-md-12">
                                <div id="SearchOptionsAccordion" class="mt-4">
                                    <div class="card">
                                      <div id="AdvanceSearch" class="collapse" aria-labelledby="headingOne" data-parent="#SearchOptionsAccordion">
                                        <div class="card-body">
                                            <form action="#">
                                                <div class="form-group form-row">
                                                    <label class="col-md-2 col-form-label">वय </label>
                                                    <div class="col-md-3">
                                                        <input type="number" id="ageFrom" name="ageFrom"  class="form-control" placeholder="From Age">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="number" id="ageTo" name="ageTo" class="form-control" placeholder="To Age">
                                                    </div>
                                                </div>
                                                <div class="form-group form-row">
                                                    <label class="col-md-2 col-form-label">उंची </label>
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="fromHeight" name="fromHeight" >
                                                            <option value="">From height</option>
                                                            <option>4.0</option>
                                                            <option >4.1</option>
                                                            <option >4.2</option>
                                                            <option >4.3</option>
                                                            <option >4.4</option>
                                                            <option >4.5</option>
                                                            <option >4.6</option>
                                                            <option >4.7</option>
                                                            <option >4.8</option>
                                                            <option >4.9</option>
                                                            <option >5.0</option>
                                                            <option >5.1</option>
                                                            <option >5.2</option>
                                                            <option >5.3</option>
                                                            <option >5.4</option>
                                                            <option >5.5</option>
                                                            <option >5.6</option>
                                                            <option >5.7</option>
                                                            <option >5.8</option>
                                                            <option >5.9</option>
                                                            <option >6.0</option>
                                                            <option >6.1</option>
                                                            <option >6.2</option>
                                                            <option >6.3</option>
                                                            <option >6.4</option>
                                                            <option >6.5</option>
                                                            <option >6.6</option>
                                                            <option >6.7</option>
                                                            <option >6.8</option>
                                                            <option >6.9</option>
                                                            <option >7.0+</option>
                                                        </select>
                                                        
                                                    </div>
                                                    <div class="col-md-3">
                                                    <select class="form-control" id="toHeight" name="toHeight" >
                                                            <option value="">To height</option>
                                                            <option>4.0</option>
                                                            <option >4.1</option>
                                                            <option >4.2</option>
                                                            <option >4.3</option>
                                                            <option >4.4</option>
                                                            <option >4.5</option>
                                                            <option >4.6</option>
                                                            <option >4.7</option>
                                                            <option >4.8</option>
                                                            <option >4.9</option>
                                                            <option >5.0</option>
                                                            <option >5.1</option>
                                                            <option >5.2</option>
                                                            <option >5.3</option>
                                                            <option >5.4</option>
                                                            <option >5.5</option>
                                                            <option >5.6</option>
                                                            <option >5.7</option>
                                                            <option >5.8</option>
                                                            <option >5.9</option>
                                                            <option >6.0</option>
                                                            <option >6.1</option>
                                                            <option >6.2</option>
                                                            <option >6.3</option>
                                                            <option >6.4</option>
                                                            <option >6.5</option>
                                                            <option >6.6</option>
                                                            <option >6.7</option>
                                                            <option >6.8</option>
                                                            <option >6.9</option>
                                                            <option >7.0+</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group form-row">
                                                    <label class="col-md-2 col-form-label">स्थान </label>
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="searchState" name="searchState" onchange="getCity(this.value)">
                                                            <option value="">Select State</option>
                                                            <?php
                                                                $queryState = "select state from states_cities_details group by state order by state";
                                                                $resultState = $conn -> db -> query($queryState);
                                                                foreach($resultState->fetchAll() as $rowState) {
                                                                    echo "<option>$rowState[state]</option>";                                                                    
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="searchCity" name="searchCity">
                                                            <option value="">Select City</option>                                                            
                                                        </select>
                                                    </div>
                                                    <!-- <div class="col-md-3">
                                                        <select class="form-control" id="searchTaluka" name="searchTaluka">
                                                            <option value="">Select Taluka</option>
                                                            <option value="1">Maharashtra</option>
                                                            <option value="1">Gujarath</option>
                                                            <option value="1">MP</option>
                                                            <option value="1">UP</option>
                                                            <option value="1">Bihar</option>
                                                        </select>
                                                    </div> -->
                                                </div>
                                                <div class="form-group form-row">
                                                    <label class="col-md-2 col-form-label">वैवाहिक स्थिती </label>
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="maritalStatus" name="maritalStatus" >
                                                            <option selected>अविवाहित</option>
                                                            <option>घटस्फोट घेतला</option>
                                                            <option>घटस्फोट प्रक्रियेत</option>
                                                            <option>विधवा / विधुर</option>
                                                            <option>विभक्त</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="offset-md-2">
                                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                                </div>
                                            </form>
                                        </div>
                                      </div>
                                      <div id="SearchByProfileID" class="collapse" aria-labelledby="headingTwo" data-parent="#SearchOptionsAccordion">
                                        <div class="card-body">
                                            <form action="#">
                                                <div class="form-group form-row">
                                                    <label class="col-md-2 col-form-label">प्रोफाइल आयडी </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" id="profileId" name="profileId" >
                                                    </div>
                                                </div>
                                                <div class="offset-md-2">
                                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                                </div>
                                            </form>
                                            
                                        </div>
                                      </div>
                                      <div id="SearchByInterCaste" class="collapse" aria-labelledby="headingThree" data-parent="#SearchOptionsAccordion">
                                        <div class="card-body">
                                            <form action="#">
                                                <div class="form-group form-row">
                                                    <label class="col-md-2 col-form-label">समाज <span class="text-danger">*</span></label>
                                                    <div class="col-md-4">
                                                        <select class="form-control" id="samaj" name="samaj" >
                                                            <option value="">Select Samaj</option>
                                                            <option>मराठा समाज</option>
                                                            <option>लेवा समाज</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" id="cast" name="cast" placeholder="Cast / Subcast" required>
                                                    </div>
                                                </div>
                                                <div class="form-group form-row">
                                                    <label class="col-md-2 col-form-label">वय </label>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" placeholder="From Age">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" placeholder="To Age">
                                                    </div>
                                                </div>
                                                <div class="form-group form-row">
                                                    <label class="col-md-2 col-form-label">उंची </label>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" placeholder="From Height">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input type="text" class="form-control" placeholder="To Height">
                                                    </div>
                                                </div>
                                                <div class="form-group form-row">
                                                    <label class="col-md-2 col-form-label">स्थान </label>
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="searchState" name="searchState">
                                                            <option value="">Select State</option>
                                                            <option value="1">Maharashtra</option>
                                                            <option value="1">Gujarath</option>
                                                            <option value="1">MP</option>
                                                            <option value="1">UP</option>
                                                            <option value="1">Bihar</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="searchCity" name="searchCity">
                                                            <option value="">Select City</option>
                                                            <option value="1">Maharashtra</option>
                                                            <option value="1">Gujarath</option>
                                                            <option value="1">MP</option>
                                                            <option value="1">UP</option>
                                                            <option value="1">Bihar</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="searchTaluka" name="searchTaluka">
                                                            <option value="">Select Taluka</option>
                                                            <option value="1">Maharashtra</option>
                                                            <option value="1">Gujarath</option>
                                                            <option value="1">MP</option>
                                                            <option value="1">UP</option>
                                                            <option value="1">Bihar</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group form-row">
                                                    <label class="col-md-2 col-form-label">वैवाहिक स्थिती </label>
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="maritalStatus" name="maritalStatus" >
                                                            <option selected>अविवाहित</option>
                                                            <option>घटस्फोट घेतला</option>
                                                            <option>घटस्फोट प्रक्रियेत</option>
                                                            <option>विधवा / विधुर</option>
                                                            <option>विभक्त</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="offset-md-2">
                                                    <button type="submit" class="btn btn-primary mb-2">Search</button>
                                                </div>
                                            </form>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Search Options:e -->
                        <div class="row">
                            <div class="col-md-12 ">

                            <!-- <ul class="pagination">
  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
  <li class="page-item"><a class='page-link' class="page-link" href="#">1</a></li>
  <li class="page-item active"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul> -->
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
                        <li class='page-item'><a class='page-link' href='search.php?$btn_prev_params'>Prev</a></li>
                        <li class='page-item'><a class='page-link' href='search.php?$new_url_params'>1</a></li>
        ";  //&laquo;
    }   
    else
    {
        $queryUrlParams['page'] = 1;
        $new_url_params = http_build_query($queryUrlParams);
        $pagLink = "<nav><ul class='pagination'>
        <li class='page-item active'><a class='page-link' href='search.php?$new_url_params'>1</a></li>
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
                $pagLink .= "<li class='page-item active'><a class='page-link' href='search.php?$new_url_params'>".$i."</a></li>";
            }
            else 
            $pagLink .= "<li class='page-item'><a class='page-link' href='search.php?$new_url_params'>".$i."</a></li>"; 
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
        $pagLink .= "<li class='page-item active'><a class='page-link' href='search.php?$new_url_params'>".$total_pages."</a></li>"; 
    }
    else {
        $pagLink .= "<li class='page-item'><a class='page-link' href='search.php?$new_url_params'>".$total_pages."</a></li>"; 
    }
    
    if($total_pages != $pageno){
        $queryUrlParams['page'] = ($pageno+1);
        $new_url_params = http_build_query($queryUrlParams);
        //show next button
        $pagLink .= " <li class='page-item'><a class='page-link' href='search.php?$new_url_params'>Next</a></li></ul>";  //&raquo;
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

<?php
    // echo $query;
    if($result->rowCount()>0)  
    {
        foreach($result->fetchAll() as $row) {
            $birthDate = new DateTime($row['birthDate']);
            echo "
            <div class='profile-search-card ts-box row '>
                <div class='col-md-3 profile-img'>
                    <h4 class='text-center mb-3 text-primary'>SM-".$row['profileUserId']."</h4>
                    <img src='../users/$row[pic1]' class='image--cover' />
                </div>
                <div class='col-md-9 profile-body pl-4'>
                    <h4><b class='mr-4'>$row[firstName], $row[age] </b> $row[currentCity], $row[currentState] 
                    
                    <span style='float:right'><b> 
                        <span id='statusText$row[profileUserId]' ";
                        if($row['profileStatus'] == 'Approved'){echo "style='color:green'";}
                        else if($row['profileStatus'] == 'Inprocess'){echo "style='color:Blue'";}
                        else {echo "style='color:Red'";}
                        
                        echo ">$row[profileStatus]</b><span>
                    </span>
                    
                    </h4>
                    <h4>
                        <b>जन्म तारीख :&nbsp;&nbsp;&nbsp;</b>".$birthDate->format('d/m/Y')."&nbsp;&nbsp;&nbsp;<b class='ml-4'>वेळ : &nbsp;&nbsp;&nbsp;</b>$row[birthTime]<span></span>
                    </h4>
                    <h4>
                        <b>जन्मस्थान :&nbsp;&nbsp;&nbsp;</b>$row[birthCity], $row[birthDistrict]
                    </h4>
                    <h4>
                        <b>शिक्षण:&nbsp;&nbsp;&nbsp;</b>$row[education] <b class='ml-4'>व्यवसाय/नोकरी:&nbsp;&nbsp;&nbsp;</b>$row[occupation] 
                    </h4>
                    <h4>
                        <b>समाज:&nbsp;&nbsp;&nbsp;</b>$row[samaj] <b class='ml-4'>जात:&nbsp;&nbsp;&nbsp;</b>$row[caste] 
                    </h4>
                    <h4>
                        <b>उंची:&nbsp;&nbsp;&nbsp;</b>$row[height] 
                    </h4>
                    <div class='icon-links'>
                    <form method='POST' action='view-profile.php' target='_blank'>
                        <input type='hidden' id='i' name='i' value='$row[profileUserId]' />
                        <button type='submit' class='btn btn-default icon-btns mr-2' data-toggle='tooltip' data-placement='top' title='View Profile'>
                            <i class='fa fa-eye' aria-hidden='true' ></i>
                        </button>
                        <span id='buttonSection$row[profileUserId]'>
                        ";

            if($row['profileStatus'] == 'Approved'){
                echo " 
                <button type='button' class='btn btn-default mr-2' data-toggle='tooltip' data-placement='top' title='Approve' onclick=\"changeStatus($row[profileUserId],'Deactivated')\">
                    Deactivate
                </button>";
            } else if($row['profileStatus'] == 'Inprocess'){
                echo " 
                <button type='button' class='btn btn-default mr-2' data-toggle='tooltip' data-placement='top' title='Approve' onclick=\"changeStatus($row[profileUserId],'Approved')\">
                    Approve
                </button>";
                echo " 
                <button type='button' class='btn btn-default mr-2' data-toggle='tooltip' data-placement='top' title='Approve' onclick=\"changeStatus($row[profileUserId],'Rejected')\">
                    Reject
                </button>";
            } else {
                echo " 
                <button type='button' class='btn btn-default mr-2' data-toggle='tooltip' data-placement='top' title='Approve' onclick=\"changeStatus($row[profileUserId],'Approved')\">
                    Approve
                </button>";
            }
                
                

                    echo "
                    </span> 
                    </form>
                    ";
                    
                    echo "
                    </div>
                </div>
            </div>";
                
            }

    }
    else {
        echo "<br><br><br>
        <p class='text-justify text-danger' style='font-size:18px'>
                No profile found.
        </p>
        ";
    }
    echo "<div style='float:right'>$pagLink</div>";
?>
                                

                                <!-- <div class="profile-search-card ts-box row ">
                                    <div class="col-md-3 profile-img">
                                        <img src="../assets/images/profile-img.jpeg" class="img-responsive" />
                                    </div>
                                    <div class="col-md-9 profile-body">
                                        <h4><b>Akshay, 30 </b> Pune, Maharashtra</h4>
                                        <h4>
                                            <b>DOB & Time:  </b>17-04-1990 3:14 AM<span></span>
                                        </h4>
                                        <h4>
                                            <b>Birthplace:  </b>Dondaicha, Maharashtra
                                        </h4>
                                        <h4>
                                            <b>Education:  </b>M.Com, <b>Occupation:  </b>Service 
                                        </h4>
                                        <h4 style="text-align: justify;"><b>About me: </b> I am a happy go lucky person, searching for a sensitive, understanding partner. No condition on jobs. Family values are required to maintain. Hobbies should be match with mine.</h4>
                                        <div class="icon-links">
                                            <a class="btn btn-default icon-btns mr-2" data-toggle="tooltip" data-placement="top" title="Add to Star List">
                                                <i class="fa fa-star" aria-hidden="true" ></i>
                                            </a>
                                            <a class="btn btn-default icon-btns mr-2" data-toggle="tooltip" data-placement="top" title="Send Interest">
                                                <i class="fa fa-heart" aria-hidden="true" ></i>
                                            </a>
                                            <a class="btn btn-default icon-btns mr-2" data-toggle="tooltip" data-placement="top" title="View Profile">
                                                <i class="fa fa-eye" aria-hidden="true" ></i>
                                            </a>
                                        </div>
                                    </div>
                                </div> -->

                               

                                
                                
                                

                                 <!-- Pagination:s-->
                                 <!-- <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                      <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                          <span aria-hidden="true">&laquo;</span>
                                          <span class="sr-only">Previous</span>
                                        </a>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                                      <li class="page-item active"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item"><a class="page-link" href="#">4</a></li>
                                      <li class="page-item"><a class="page-link" href="#">5</a></li>
                                      <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                          <span aria-hidden="true">&raquo;</span>
                                          <span class="sr-only">Next</span>
                                        </a>
                                      </li>
                                    </ul>
                                  </nav> -->
                                <!-- Pagination:e -->
                            </div>
                            <!-- <div class="col-md-4">
                                <div class="adv-img-1 mb-4">
                                    <img src="../assets/images/google-ads.jpeg" class="img-responsive" />
                                </div>
                                <div class="adv-img-1 mb-4">
                                    <img src="../assets/images/custom-ads.jpeg" class="img-responsive" />
                                </div>
                            </div> -->
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


<!-- Modal -->
<div class="modal fade" id="addToCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Checkout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row no-gutters ts-cards-same-height">
                        
      <div class="col-md-12">
          <p class="text-danger">वर्षभरासाठी अनलिमिटेड प्रोफाईल बघण्यासाठी वार्षिक वर्गणी पंधराशे अदा करून आपण गोल्डन मेंबरशिप चा लाभ घेऊ शकता किंवा प्रतेकि 50 रुपये भरून प्रोफाइल ची माहिती घेऊ शकतात
        </p>
      </div>
                       
                        <!--Price Box Promoted-->
                        <div class="col-sm-4 col-lg-4">
                            <div class="card text-center ts-price-box" >
                                <div class="card-header p-0" data-bg-color="#d96270">
                                    <h5 class="mb-0 py-3 text-white" data-bg-color="#f26d7d">गोल्डन मेंबरशिप</h5>
                                    <div class="ts-title text-white py-5 mb-0">
                                        <h3 class="mb-0 font-weight-normal">
                                            <sup>Rs. </sup>1500
                                        </h3>
                                        <!-- <small class="ts-opacity__50">per month</small > -->
                                    </div>
                                </div>
                                <!--end card-header-->
                                <div class="card-body p-0">
                                    <ul class="list-unstyled ts-list-divided">
                                        <li>वार्षिक वर्गणी</li>
                                        <li>अनलिमिटेड प्रोफाईल</li>
                                        <li>365 दिवस सपोर्ट</li>
                                    </ul>
                                    <!--end list-->
                                </div>
                                <!--end card-body-->
                                <div class="card-footer bg-transparent pt-0 ts-border-none">
                                    <a href="#" class="btn btn-primary">Select Now</a>
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                        <!--end price-box col-md-4-->

                        <!--Price Box-->
                        <div class="col-sm-8 col-lg-8">
                                
                           <div id="cartProfileSession" class="profile-search-card ts-box row ">
                                    
                            </div>
                        </div>
                        <!--end price-box col-md-8-->
                    </div>
      </div>
      <div class="modal-footer">
        <a href="checkout.php" class="btn btn-sm btn-secondary">Checkout</a>
        <span id="cartButton"></span> 
      </div>
    </div>
  </div>
</div>
    <script>
        if( document.getElementsByClassName("ts-full-screen").length ) {
            document.getElementsByClassName("ts-full-screen")[0].style.height = window.innerHeight + "px";
        }

       
    </script>
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

    <script type="text/javascript" >
        function changeStatus(profileId, status){

            $.post("ajax.php", {action: "changeStatus", profileId: ""+profileId, status: ""+status}, function(result){
                // var res = result.split("#PART#");
                // document.getElementById("searchCity").innerHTML = res[0];
                document.getElementById("buttonSection"+profileId).innerHTML = result;
                document.getElementById("statusText"+profileId).innerHTML = status;
                
            });
        }

        

        // Ajax calls
        function getCity(state){
            $.post("process.php", {action: "getCity", state: ""+state}, function(result){
                var res = result.split("#PART#");
                document.getElementById("searchCity").innerHTML = res[0];
                // document.getElementById("currentDistrict").innerHTML = res[1];
                // alert(result);
            });
        }
        </script>
</body>
</html>


