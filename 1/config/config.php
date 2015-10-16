<?php
error_reporting(0);

// Quiz Number
// Note: Each Quiz should have a unique number
// Two quiz have 1,2 number
$config['quiz_number'] = 1;

$config['quiz_name'] = "Abbreviation of Computer Programming";

// Note the Array indexes are Case sensitive i.e Answer is different from answer
// So follow the exact pattern of the question
/**
 * Question Pattern
 * '1' => array(
 *       'title' => 'HTML stands for?',
 *       'options' => array(
 *          'A' => 'Hyper Text Markup configuage',
 *           'B' => 'How That Man Looks',
 *           'C' => 'Hassan Teachs Multiple configuages',
 *           'D' => 'None of Above'
 *      ),
 *      'Answer' => 'A'
*  )
 */

// Questions array 
$questions = array(
    // Insert questions into array
    '1' => array(
        'title' => 'HTML stands for?',
        'options' => array(
            'A' => 'Hyper Text Markup Language',
            'B' => 'How That Man Looks',
            'C' => 'Hassan Teachs Multiple configuages',
            'D' => 'None of Above'
        ),
        'Answer' => 'A'
    ),
    '2' => array(
        'title' => 'CSS stands for?',
        'options' => array(
            'A' => 'Color Style Sheet',
            'B' => 'Copy Static Sheet',
            'C' => 'Cascading Style Sheet',
            'D' => 'None of Above'
        ),
        'Answer' => 'C'
    ),
    '3' => array(
        'title' => 'PHP stands for?',
        'options' => array(
            'A' => 'Persoanl Home Page',
            'B' => 'Pay His Price',
            'C' => 'Pakistan Health Population',
            'D' => 'None of Above'
        ),
        'Answer' => 'A'
    )
);



// Website attributes 
// Meta-Tags
$config['TITLE'] ='Hello World';
$config['SUBTITLE'] ='SUBTITLE';
$config['SUBJECT'] ='SUBJECT';
$config['DESCRIPTION'] ='DESCRIPTION';
$config['KEYWORDS'] ='KEYWORDS';
$config['DOMAINNAME'] = 'test.com';