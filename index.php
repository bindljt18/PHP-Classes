<?php

include "config.php";
include "Models/classModel.php";
include "Views/classView.php";

//autoload classes within directory
function __autoload($class)
{
	if(file_exists('class'.$class.'.php')){
		require_once('class'.$class.'.php');
	}
}

//create controller instance
$controller = new Controller();

//declare variables
$mode = '-1';
$type = '-1';
$result = array();
$title = "";
$sql = '-1';
$result_set = array();
$parameter_values = null;

//get the mode
if (isset($_GET['mode']))
	$mode = $_GET['mode'];

switch($mode){
	case 'products' :
		//set the model
		$controller->setModel('ProductModel');
		
		//get the type
		if (isset($_GET['type']))
			$type = $_GET['type'];
		
		if ($type != 'all'){
			
			//get data
			$result_set = $controller->model->getSelectProducts($type);
			
			//define output file
			$file = 'Views/viewProduct.php';
			
			//define title
			$title = ucfirst($type)." Products";
		
		} else {
			
			//get data
			$result_set = $controller->model->getAllProducts();
			
			//define output file
			$file = 'Views/viewProduct.php';
			
			//define title
			$title = "All Products";
			
		}

		break;
	
	default :
		//display default view
		$file = 'Views/viewDefault.php';
		break;
}

/***********************************************************************/
/************** Define output data and display the result **************/
/***********************************************************************/
			
//define output data
$output_data = array('title'=>$title, 'result_set'=>$result_set);

//set template
$controller->setView($file);

//set data for the template
$controller->view->setData($output_data);		

//display output
$controller->view->output();
?>
