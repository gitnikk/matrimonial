<nav data-bg-color="#fff" class="navbar navbar-expand-lg navbar-light fixed-top ">
<div class="container">
  <a class="navbar-brand" href="#"><img src="../assets/img/logo.png" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">        
        <li class="nav-item">
          <a class="nav-link" href="search.php">प्रोफाइल्स</a>
        </li>
        <li class="nav-item "> <!-- active -->
            <!-- <a class="nav-link" href="search.php">प्रोफाइल शोधा <span class="sr-only">(current)</span></a> -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="transactions.php">Transactions</a>
        </li>
        <li class="nav-item">
            <!-- <a class="nav-link" href="contact.php">संपर्क</a> -->
        </li>
        <li class="nav-item dropdown">
            <a class="dropdown-toggle btn btn-primary btn-sm" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['user_firstName']; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <!-- <a class="dropdown-item" href="my-profile.php">माझी प्रोफाइल</a> -->
            <!-- <a class="dropdown-item" href="contact-requests.php">संपर्क रिक्वेस्ट</a> -->
            <!-- <a class="dropdown-item" href="set-password.php">पासवर्ड रिसेट</a> -->
            <a class="dropdown-item" href="logout.php">लॉगआउट</a>
            </div>
        </li>
    </ul>
  </div>
</div>
</nav>
