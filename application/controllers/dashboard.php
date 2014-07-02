<?php


class Dashboard extends Controller
{

    function __construct()
    {
        parent::__construct();

        Auth::handleLogin();
    }

    function returndisparr($arr){

        if(is_array($arr)){
            $str="<ul>";
            foreach ($arr as $key => $value) {
                $str=$str."<li>".$value."</li>";
            }
            $str=$str."</ul></br>";


            return $str;
        }
        else{
            $str = "Empty";
            return $str;
        }

    }


    function index()
    {   $appschema = new Appschema();
        
        $login_model = $this->loadModel('login');
        $user_roles_exists = $login_model->getuserroles($_SESSION['user_id']);

        if(!$user_roles_exists){
            echo "Something went wrong while getting Your access rights";
            return false;
        }
        

        $this->view->msg = "Application Dashboard";


        $this->view->render('dashboard/index');
    }



    function menu($approle,$operation){


        switch ($operation) {
            case 1: $str = "Create Menu for ".$approle."    <br/>";
                # code...
                break;
            case 2: $str = " Pending Menu for ".$approle."    <br/>";
                # code...
                break;
                
            
            default:
                $str = "Error";
                break;
        }

        $this->view->msg = $str." Create documents here";
        $this->view->render('dashboard/menu');




    }



   
}

