<?php
// $conn = new DBConfig();
// $sqlbr = "select wallet_balance from branch_details where branch_id = $_SESSION[branch_id]";
// $resultbr = $conn -> db ->query($sqlbr);
// $rowbr = $resultbr->fetch();
// $_SESSION['wallet_balance'] = $rowbr['wallet_balance'];
?>

<nav class="navbar navbar-expand-lg navbar-light fixed-top ts-separate-bg-element" data-bg-color="#fff">
    <div class="container">
        <a class="navbar-brand" href="index.php#page-top">
            <img src="assets/img/logo.png" alt="">
        </a>
        <!--end navbar-brand-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--end navbar-toggler-->
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link active ts-scroll" href="index.php">मुख्यपान <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link ts-scroll" href="samaj.php">समाज</a>
                <!-- <a class="nav-item nav-link ts-scroll" href="vendors.php">वेंडर्स</a> -->
                <a class="nav-item nav-link ts-scroll" href="about.php">आमच्याविषयी</a>
                <a class="nav-item nav-link ts-scroll" href="contact.php">संपर्क</a>
                <!-- <a class="nav-item nav-link ts-scroll" href="edit-profile.php">प्रोफाइल</a> -->
                <!-- <a class="nav-item nav-link ts-scroll" href="login.php">लॉगिन अकाउंट</a> -->
                <a class="nav-item nav-link ts-scroll btn btn-primary btn-sm text-white ml-3 px-3 ts-width__auto" href="login.php">लॉगिन अकाउंट</a>
            </div>
            <!--end navbar-nav-->
        </div>
        <!--end collapse-->
    </div>
    <!--end container-->
</nav>
                
