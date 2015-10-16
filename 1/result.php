<?php
/*
    *   IndusQuiz - Quiz generating script
    *   Developer: Murtaza Bhurgri
    *   gmbhurgri.com
*/

// Include Config files of the quiz
require_once 'config/config.php';
session_name('quiz_'.$config['quiz_number']);
session_start();

// Count Total Number Questions
$total_questions = count($questions);

// Total question attempted 
$total_attmepted = count(array_filter($_SESSION));

// Attempted question
$attempted_questions = array_filter($_SESSION);

// Attempted question array
//$attempted_question = array_filter($_SESSION);
// Array of correct answers
$answers = "";

// Store all correct answers in one array
$i = 1;
foreach ($questions as $question)
{
    $answers['q' . $i] = $question['Answer'];
    $i++;
}


$correct_answers = 0; // Count correct answers
$wronge_answers = array(); // array of wrong asnwers
// Logic to count correct answers and build array of wrong answers
foreach ($attempted_questions as $key => $value)
{
    if ($value == $answers[$key])
    {
        $correct_answers++;
    } else
    {
        //Get only question numbers not concatenated q
        $temp = substr($key, 1);
        array_push($wronge_answers, $temp);
    }
}

// Handle division by zero error
$total_attmepted = ( $total_attmepted == 0 ) ? 1 : $total_attmepted;

// Get percentages
$percentage = ($correct_answers * 100) / $total_attmepted;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
       <title><?php echo $config['TITLE'];?> | <?php echo $config['DOMAINNAME'];?></title>
        <meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
        <meta name='subtitle' content='<?php echo $config['SUBTITLE'];?>'/>
        <meta name='subject' content='<?php echo $config['SUBJECT'];?>'/>
        <meta name="description" content="<?php echo $config['DESCRIPTION'];?>"/>
        <meta name="keywords" content="<?php echo $config['KEYWORDS'];?>"/>
        <meta name='target' content='all'/>
        <meta name='HandheldFriendly' content='True'/>
        <meta name='MobileOptimized' content='320'/>
        <meta name="robots" content="index, follow"/>
        <meta name="revisit-after" content="30 days"/>
        <meta name="copyright" content="<?php echo $config['DOMAINNAME'];?>"/>
        <meta name="distribution" content="global"/>
        <meta name="language" content="english"/> 
        <meta name="rating" content="safe for kids"/>
        <meta http-equiv="Cache-control" content="public"/>
        <meta name='Classification' content='Business'/>
        <meta http-equiv='Expires' content='0'/>
        <meta http-equiv='Pragma' content='no-cache'/>
        <meta http-equiv='Cache-Control' content='no-cache'/>
        <meta http-equiv='imagetoolbar' content='no'/>
        <meta http-equiv='x-dns-prefetch-control' content='off'/>
        <link rel="shortcut icon" type="image/x-icon" href="../common_pages/images/favicon.ico"/>
        <link rel="stylesheet" href="../common_pages/style.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" media="screen" />
        <style type="text/css">
            .adslot_1 { display:inline-block; width: 320px; height: 50px; }
            @media (max-width: 400px) 
            {
             //.adslot_1 { display: none; } 
             #left-side-bar{display: none;}
             #right-side-bar{display: none;}
             #hidden-bottom{display: block; clear: both;} 
             #break-overloadded{display: none;}
            }
            @media (min-width:500px) 
            { 
                .adslot_1 { width: 468px; height: 60px; } 
                #hidden-bottom{display: none;}
                #break-overloadded{display: block; clear: both;}
            }
            @media (min-width:800px) 
            { 
                .adslot_1 { width: 728px; height: 90px; } 
                #hidden-bottom{display: none;}
                #break-overloadded{display: none;}
            }
            img.quiz-image
            {
                width: 100%;
            }

        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <!--Header-->
                <div class="col-lg-12 gray">
                   <?php include '../common_pages/header.php'; ?>
                </div>
                <!--Header-->
            </div>
            <div class="row-fluid">
                <div class="col-md-3 gray" id="left-side-bar">
                    <?php include '../common_pages/sidebar_left.php'; ?>
                </div>
                <div class="col-md-6">
                    <div class="main" style="padding:20px">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label class="control-label col-sm-4">
                                   Number of question you have attempted
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo $total_attmepted . " Out of " . $total_questions ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">
                                    Number of question you got right
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo $correct_answers . " Out of " . $total_attmepted ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">
                                    The questions you get wrong
                                </label>
                                <div class="col-sm-8">
                                    <textarea class="form-control"><?php echo implode(', ', $wronge_answers) ?></textarea>
                                    <!--<input type="text" class="form-control" value="<?php echo implode(',', $wronge_answers) ?>">-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">
                                    Grade in percentage
                                </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="<?php echo number_format($percentage,2) . "%" ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">
                                    &nbsp;
                                </label>
                                <div class="col-sm-8">
                                    <a href="destroy_session.php" class="btn btn-default">Take the quiz again</a>
                                    <button onclick="windowpop('solution.php', 400, 400);" class="btn btn-default">View Solution</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="break-overloadded">
                </div>
                <div class="col-md-3 gray" id="right-side-bar">
                    <?php include '../common_pages/sidebar_right.php'; ?>
                </div>
                <div id="hidden-bottom" class="col-md-3" style="overflow:hidden">
                    
                </div>
            </div>
            <div class="row-fluid">
                <div class="col-lg-12 gray" style="margin-top:20px;">
                    <!-- begin #footer -->
                    <?php include '../common_pages/footer.php'; ?>
                    <!-- end #footer -->
                </div>
            </div>
        </div>      
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/custom.js"></script>
    </body>
</html>
