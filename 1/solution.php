<?php
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
        //Get only question numbers  concatenated q
        array_push($wronge_answers, $key);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Solution of the quiz</title>

        <!-- Bootstrap -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .form-bg
            {
                -webkit-box-shadow: 0px 12px 34px -6px rgba(148,145,148,1);
                -moz-box-shadow: 0px 12px 34px -6px rgba(148,145,148,1);
                box-shadow: 0px 12px 34px -6px rgba(148,145,148,1);
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div>
                    &nbsp;
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                        <?php
                        foreach ($answers as $key => $value)
                        {
                            if (in_array($key, $wronge_answers)) 
                            {
                                echo strtoupper($key)." : <span style='color:red'>". $value . "</span><br>";
                            }
                            else
                            {
                                echo strtoupper($key)." : <span style='color:black'>". $value . "</span><br>";
                            }
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        Note: The red questions are wrong attempted
                    </div>
                </div>
            </div>
        </div>      

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="assets/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/custom.js"></script>
    </body>
</html>
