<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="ThemeStarz">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,500,600">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <title>सरल मिलन</title>

</head>
<body data-spy="scroll" data-target=".navbar" class="has-loading-screen" data-bg-parallax="scroll" data-bg-parallax-speed="3">
    <div class="ts-page-wrapper" id="page-top">
        <header >
            <!--NAVIGATION ******************************************************************************************-->
            <?php
                include("inc/header.php");
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
                        <button class="btn btn-primary collapsed m-2" data-toggle="collapse" data-target="#SearchByInterCaste" aria-expanded="false" aria-controls="SearchByInterCaste">
                            Inter Caste Search
                        </button>
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
                                      <div id="SearchByProfileID" class="collapse" aria-labelledby="headingTwo" data-parent="#SearchOptionsAccordion">
                                        <div class="card-body">
                                            <form action="#">
                                                <div class="form-group form-row">
                                                    <label class="col-md-2 col-form-label">प्रोफाइल आयडी </label>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" >
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
                            <div class="col-md-8 ">

                                <div class="profile-search-card ts-box row ">
                                    <div class="col-md-3 profile-img">
                                        <img src="./assets/images/profile-img.jpeg" class="img-responsive" />
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
                                </div>

                                <div class="profile-search-card ts-box row ">
                                    <div class="col-md-3 profile-img">
                                        <img src="./assets/images/profile-img.jpeg" class="img-responsive" />
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
                                </div>

                                <div class="profile-search-card ts-box row ">
                                    <div class="col-md-3 profile-img">
                                        <img src="./assets/images/profile-img.jpeg" class="img-responsive" />
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
                                </div>


                                
                                
                                

                                 <!-- Pagination:s-->
                                 <nav aria-label="Page navigation example">
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
                                  </nav>
                                <!-- Pagination:e -->
                            </div>
                            <div class="col-md-4">
                                <div class="adv-img-1 mb-4">
                                    <img src="./assets/images/google-ads.jpeg" class="img-responsive" />
                                </div>
                                <div class="adv-img-1 mb-4">
                                    <img src="./assets/images/custom-ads.jpeg" class="img-responsive" />
                                </div>
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

    <script>
        if( document.getElementsByClassName("ts-full-screen").length ) {
            document.getElementsByClassName("ts-full-screen")[0].style.height = window.innerHeight + "px";
        }
    </script>
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyBEDfNcQRmKQEyulDN8nGWjLYPm8s4YB58"></script> -->
	<script src="assets/js/isInViewport.jquery.js"></script>
	<!-- <script src="assets/js/jquery.particleground.min.js"></script> -->
	<!-- <script src="assets/js/owl.carousel.min.js"></script> -->
	<script src="assets/js/scrolla.jquery.min.js"></script>
	<!-- <script src="assets/js/jquery.validate.min.js"></script> -->
	<!-- <script src="assets/js/jquery-validate.bootstrap-tooltip.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>
    <script src="assets/js/jquery.wavify.js"></script>
    <script src="assets/js/custom.js"></script>


</body>
</html>
