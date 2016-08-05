<?php
/**
 * Recursive
 * array_replace_recursive
 * @author  AllenSun <sunyujiebj@gmail.com>
 * @since   1.0.0
 */

// $base = array('citrus' => array( "orange") , 'berries' => array("blackberry", "raspberry"));
// $replacements = array('citrus' => array('pineapple'), 'berries' => array('blueberry'));

// // $basket = array_replace_recursive($base, $replacements);
// // print_r($basket);

// $basket = array_replace($base, $replacements);
// print_r($basket);


// $base = array('citrus' => array("orange") , 'berries' => array("blackberry", "raspberry"), 'others' => 'banana' );
// $replacements = array('citrus' => 'pineapple', 'berries' => array('blueberry'), 'others' => array('litchis'));
// $replacements2 = array('citrus' => array('pineapple'), 'berries' => array('blueberry'), 'others' => 'litchis');

// $basket = array_replace_recursive($base, $replacements, $replacements2);
// print_r($basket);

// $forecast =array('citrus' => array('pineapple'), 'berries' => array('blueberry', 'raspberry'), 'others' => 'litchis');


/***********************************************************************************/

/**
 * array_merge_recursive
 * @author  AllenSun <sunyujiebj@gmail.com>
 * @since   1.0.0
 */
$ar1 = array("color" => array("favorite" => "red"), 5);
$ar2 = array(10, "color" => array("favorite" => "green", "blue"));
$result = array_merge_recursive($ar1, $ar2);

print_r($result);
echo "This array_merge_recursive Result<br/>";

print_r(array_merge($ar1, $ar2));
echo "This array_merge Result<br/>";

$forecast = array("color" =>  array("favorite" => array("green", "red"), "blue"), 5, 10);
print_r($forecast);