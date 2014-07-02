<?php

/**
 * LoginModel
 *
 * Handles the user's login / logout / registration stuff
 */

class PatentModel
{
    /**
     * Constructor, expects a Database connection
     * @param Database $db The Database object
     */
    public function __construct(Database $db)
    {
        $this->db = $db;

    }

    /**
     * Login process (for DEFAULT user accounts).
     * Users who login with Facebook etc. are handled with loginWithFacebook()
     * @return bool success state
     */
    public function create()
    {     
        echo "<br/>".$_POST['elem1']." in model";

        if (!isset($_POST['elem1']) OR empty($_POST['elem1'])) {
            $_SESSION["feedback_negative"][] = FEEDBACK_FIELD_EMPTY_FORM;
            return false;
        }


        $elem1  = $_POST['elem1'];
        $elem2 =  $_POST['elem2'];
        

        $sql = "insert into patent_form1 values(:form_id,:textcontent,'pl','pending')";
        $sth = $this->db->prepare($sql);
        $sth->execute(array('form_id' => $elem1, 'textcontent' => $elem2));

        echo "Inserted";

        return true;
      
      
    }


    function getform($formname,$role,$status,$ifcount=false){


        $sql = "select * from ".$formname." where status=:status and cs=:role";
        $sth = $this->db->prepare($sql);
        $sth->execute(array('status' => $status,'role' => $role));

        $count =  $sth->rowCount();

        if($ifcount){

            return $count;

        }

        else{

            $result = $sth->fetchall();
            return $result;


        }
        

        
    }










    
}
