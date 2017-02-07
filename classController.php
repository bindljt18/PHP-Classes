<?php

Class Controller
{
	public $model;
	
	public $view;
	
	public function setModel($modelName)
	{
		$this->model = new $modelName();
	}
	
	public function setView($view_file)
	{
		$this->view = new View($view_file);
	}
	
	 public function default_view()

    {

        // define a method to set output

        try {

                $this->view->output();

        } catch (Exception $e) {

                echo "Application error:".$e->getMessage();

        }

    }

}
?>
