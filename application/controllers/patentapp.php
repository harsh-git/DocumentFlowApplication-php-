<?php


class PatentAPP extends Controller
{
    
    function __construct()
    {
        parent::__construct();

        Auth::handleLogin();
    }

    
    function index($role,$operation="nop")
    {   
        $patent_model = $this->loadModel('patent');


        // to do - --   add constraints for role , department 

        $constraints = array('department');






        
        if($operation != "nop"){

            if($operation == 'left'){
                $operation = "pending";

                $this->view->pending =  $patent_model->getform('patent_form1',$role,'pending');
            }
            elseif ($operation == 'approved') {
                $this->view->approved =  $patent_model->getform('patent_form1',$role,'approved');                
            }

            $app = new appschema();
            $this->view->nextstations = $app->nextstations('patent',$role);
            $this->view->prevstations = $app->prevstations('patent',$role);



            $this->view->msg = "Patent -> ".$role." -> ".$operation;
            $this->view->render('app/patent/'.$role.'/'.$operation,true);


        }

        else{
            $this->view->msg = "Patent Application  ->   ".$role;
            
            $this->view->role = $role;


            $pending =  $patent_model->getform('patent_form1',$role,'pending',true);
            $approved =  $patent_model->getform('patent_form1',$role,'approved',true);

            $this->view->pending =  $pending;
            $this->view->approved =  $approved;




            $this->view->render('app/patent/'.$role.'/'.$role);
        }
    }


    function pl($operation){



   $patent_model = $this->loadModel('patent');




        echo "reaching in patentapp -> pl ($operation) <br/> ";

        if($operation=='create'){

            $saved = $patent_model->create();

            if ($saved) {
                $url ="*".URL."patentapp/index/pl*";
                echo  $url;
               
            } else {
                
                echo "not saved";





            }

            return false;



        }
        else{
        echo "function  not crated Yet";

        }




        return false;

        



    }






    function hod($operation){



   $patent_model = $this->loadModel('patent');




        echo "reaching in patentapp -> pl ($operation)";

        if($operation=='pending'){

            $saved = $patent_model->create();

            if ($saved) {
                
                header('location: ' . URL . 'patentapp/index/pl');
            } else {
                
                echo "not saved";





            }

            return false;



        }
        else{
        echo "function  not crated Yet";

        }




        return false;

        



    }



























  


   
}

