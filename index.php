<?php
function randomPassword() {
$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
$pass = array(); //remember to declare $pass as an array
$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
for ($i = 0; $i < 8; $i++) {
$n = rand(0, $alphaLength);
$pass[] = $alphabet[$n];
}
return implode($pass); //turn the array into a string
}

function background(){
    return rand(1, 7);
}

session_start();
$_SESSION['sessionID'] = randomPassword();

if (isset($_SESSION['sessionBG'])){
} else {
$_SESSION['sessionBG'] = background();    
}


?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Story Card by Maneesh Chiba</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" href="css/normalize.css">
        
        <!-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/> -->
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <svg style="display:none;">
            <defs>
                <svg version="1.1" id="plus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                <polygon points="498,210 288,210 288,0 210,0 210,210 0,210 0,288 210,288 210,498 288,498 288,288 498,288 "/>
                </svg>

                <svg version="1.1" id="up-arrow" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" enable-background="new 0 0 500 500" xml:space="preserve">
                    <path id="cricle" d="M343.935,211.576c-29.181-35.055-58.354-70.108-87.534-105.164c-2.143-2.573-4.668-3.512-7.103-3.343 c-2.44-0.168-4.972,0.77-7.108,3.343c-29.177,35.049-58.357,70.108-87.533,105.164c-5.403,6.478-2.263,17.157,7.102,17.157 c12.247,0,24.486,0,36.729,0c0,53.015,0,106.027,0,159.046c0,5.483,4.571,10.056,10.052,10.056c27.163,0,54.33,0,81.509,0 c5.484,0,10.055-4.572,10.055-10.056c0-53.019,0-106.031,0-159.046c12.243,0,24.479,0,36.729,0 C346.193,228.732,349.334,218.053,343.935,211.576z"/>
                    <path id="arrow" d="M249.298,4.897C113.683,4.897,3.749,114.836,3.749,250.444c0,135.612,109.935,245.547,245.549,245.547 c135.606,0,245.547-109.935,245.547-245.547C494.845,114.836,384.904,4.897,249.298,4.897z M249.298,456.704 c-113.916,0-206.263-92.35-206.263-206.26c0-113.913,92.347-206.257,206.263-206.257c113.903,0,206.254,92.344,206.254,206.257
                    C455.552,364.354,363.201,456.704,249.298,456.704z"/>
                </svg>
            </defs>

        </svg>
    </head>
    <body class="upload <?php echo 'bg'.$_SESSION['sessionBG'] ?>">
        <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Add your site or application content here -->
        <div class="toast error">
            <div class="row">
                <div class="max-16 desktop-12 tablet-6 mobile-3">
                    <p>Don't get fancy mister! Only upload XLS files directly output from JIRA. Only one file at a time.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="max-16 desktop-12 tablet-6 mobile-3">
                <div class="m-card">
                    <h1>
                        <img src="img/logo.svg" alt="Story Card" id="logo">
                        <span id="because">...because you have better things to do</span>
                    </h1>
                    
                    <div id="upload-animation">
                        <h3>Just a moment</h3>
                        <h4>Uploading your file</h4>
                        <img src="img/loading.gif" alt="Uploading File">
                    </div>

                    <div class="card upload-xls">
                        <h5>Upload your JIRA exported XLS</h5>
                        <form action='upload.php' method='POST' enctype='multipart/form-data'>
                            <input type="hidden" name="MAX_FILE_SIZE" value="4194304" />
                            <label for="upload" id="file-upload-container">
                                <input type="file" name='userFile' id="upload"/>
                                <svg width="100%" height="100%" id="add-symbol">
                                    <use xlink:href="#plus" />
                                </svg>
                                <span id="file-name">Click here to upload a file</span>
                            </label>
                            </div>
                            <div class="center-button">
                                <button class="disabled" type="submit" name="action" id="submit-button">
                                    <svg width="100%" height="100%" id="upload-symbol">
                                        <use xlink:href="#up-arrow" />
                                    </svg>
                                    <span>
                                        Upload file
                                    </span>
                                </button>
                            </div>
                        </form>
                        <a href="#" class="how-to">How to use this bad boy</a>
                        <div id="how-to">
                            <a href="#" id="close">
                                <svg width="100%" height="100%" id="close-symbol">
                                    <use xlink:href="#plus" />
                                </svg>
                            </a>
                            <h3>How to Use</h3>
                            <div class="step" id="step1">
                                <img src="img/step-01.jpg" alt="">
                                <h6>Export from JIRA</h6>
                                <p>Export the stories you need printed from JIRA by selecting them in sprint view, right click and select 'View in Excel'</p>
                            </div>
                            <div class="step" id="step2">
                                <img src="img/step-02.jpg" alt="">
                                <h6>Upload here</h6>
                                <p>Upload the file that gets downloaded to your computer from JIRA</p>
                            </div>
                            <div class="step" id="step3">
                                <img src="img/step-03.jpg" alt="">
                                <h6>Print Your Cards</h6>
                                <p>Print your cards directly from the browser, or print to PDF for use later.</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <footer>
            <p>Made with &hearts; by Maneesh Chiba</p>
        </footer>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')
        </script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>