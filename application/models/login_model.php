<?php

/**
 * LoginModel
 *
 * Handles the user's login / logout / registration stuff
 */

class LoginModel
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
    public function login()
    {     
        
	
        // we do negative-first checks here
        if (!isset($_POST['user_name']) OR empty($_POST['user_name'])) {
            $_SESSION["feedback_negative"][] = FEEDBACK_FIELD_EMPTY_USERNAME;
            return false;
        }
        if (!isset($_POST['user_password']) OR empty($_POST['user_password'])) {
            $_SESSION["feedback_negative"][] = FEEDBACK_FIELD_EMPTY_PASSWORD;
            return false;
        }
		


        //Check for authentication and collect user_info (Mirrored DB)

		$sql = "select user_id,user_password,user_active,user_name,user_designation,user_department from master_users ";
        $sql = $sql." where user_id= :user_id and user_password= :user_password";
        

        $sth = $this->db->prepare($sql);
        $sth->execute(array('user_id' => $_POST['user_name'], 'user_password' => $_POST['user_password'] ));


        $count =  $sth->rowCount();

       
        // if there's NOT one result
        if ($count != 1) {
            
            $_SESSION["feedback_negative"][] = FEEDBACK_USER_NOTFOUND;
            return false;
        }

        // fetch one row (we only have one result)
        $result = $sth->fetch();
        
		if ($result->user_active != 'yes') {
                $_SESSION["feedback_negative"][] = FEEDBACK_USER_NOT_ACTIVE;
                return false;
            }

            // login process, write the user data into session
            Session::init();
            Session::set('user_logged_in', true);
            Session::set('user_id', $result->user_id);
            Session::set('user_name', $result->user_name);
            Session::set('user_designation', $result->user_designation);
            Session::set('user_department', $result->user_department);



		   $user_last_login_timestamp = time();
            // write timestamp of this login into database (we only write "real" logins via login form into the
            // database, not the session-login on every page request
            $sql = "UPDATE master_users SET user_last_login_timestamp = :user_last_login_timestamp WHERE user_id = :user_id";
            $sth = $this->db->prepare($sql);
            $sth->execute(array('user_id' => $result->user_id, 'user_last_login_timestamp' => $user_last_login_timestamp));
            
			
			
		
            // if user has checked the "remember me" checkbox, then write cookie
            if (isset($_POST['user_rememberme'])) {

                // generate 64 char random string
                $random_token_string = hash('sha256', mt_rand());

                // write that token into database
                $sql = "UPDATE master_users SET user_rememberme_token = :user_rememberme_token WHERE user_id = :user_id";
                $sth = $this->db->prepare($sql);
                $sth->execute(array(':user_rememberme_token' => $random_token_string, ':user_id' => $result->user_id));

                // generate cookie string that consists of user id, random string and combined hash of both
                $cookie_string_first_part = $result->user_id . ':' . $random_token_string;
                $cookie_string_hash = hash('sha256', $cookie_string_first_part);
                $cookie_string = $cookie_string_first_part . ':' . $cookie_string_hash;

                // set cookie
                setcookie('rememberme', $cookie_string, time() + COOKIE_RUNTIME, "/", COOKIE_DOMAIN);
            }

			
			// return true to make clear the login was successful
            return true;

      
    }


    public function getuserroles($user_id){

        $sql = "select user_application,user_role from freq_user_roles";
        $sql = $sql." where user_id= :user_id ";
        

        $sth = $this->db->prepare($sql);
        $sth->execute(array('user_id' => $user_id));


        $count =  $sth->rowCount();

        
        // if there's NOT one result
        if ($count < 1) {
            
            $_SESSION["feedback_negative"][] = FEEDBACK_USER_NOTFOUND;
            return false;
        }
        else{
            $user_role = array();
            $result = $sth->fetch();

            while($result){
                if(!array_key_exists($result->user_application,$user_role)){
                    $user_role[$result->user_application] = array();
                }
                array_push($user_role[$result->user_application],$result->user_role);
                $result  = $sth->fetch();
            }

            $_SESSION['user_roles']= $user_role;
            return true;
        }


        return false;




    }

    /**
     * performs the login via cookie (for DEFAULT user account, FACEBOOK-accounts are handled differently)
     * @return bool success state
     */
    public function loginWithCookie()
    {
        $cookie = isset($_COOKIE['rememberme']) ? $_COOKIE['rememberme'] : '';

        // do we have a cookie var ?
        if (!$cookie) {
            $_SESSION["feedback_negative"][] = FEEDBACK_COOKIE_INVALID;
            return false;
        }

        // check cookie's contents, check if cookie contents belong together
        list ($user_id, $token, $hash) = explode(':', $cookie);
        if ($hash !== hash('sha256', $user_id . ':' . $token)) {
            $_SESSION["feedback_negative"][] = FEEDBACK_COOKIE_INVALID;
            return false;
        }

        // do not log in when token is empty
        if (empty($token)) {
            $_SESSION["feedback_negative"][] = FEEDBACK_COOKIE_INVALID;
            return false;
        }

        // get real token from database (and all other data)
        $query = $this->db->prepare("SELECT user_id, user_name, user_email, user_password_hash, user_active,
                                          user_account_type,  user_has_avatar, user_failed_logins, user_last_failed_login
                                     FROM users
                                     WHERE user_id = :user_id
                                       AND user_rememberme_token = :user_rememberme_token
                                       AND user_rememberme_token IS NOT NULL
                                       AND user_provider_type = :provider_type");
        $query->execute(array(':user_id' => $user_id, ':user_rememberme_token' => $token, ':provider_type' => 'DEFAULT'));
        $count =  $query->rowCount();
        if ($count == 1) {
            // fetch one row (we only have one result)
            $result = $query->fetch();
            // TODO: this block is same/similar to the one from login(), maybe we should put this in a method
            // write data into session
            Session::init();
            Session::set('user_logged_in', true);
            Session::set('user_id', $result->user_id);
            Session::set('user_name', $result->user_name);
            Session::set('user_email', $result->user_email);
            Session::set('user_account_type', $result->user_account_type);
            Session::set('user_provider_type', 'DEFAULT');
            Session::set('user_avatar_file', $this->getUserAvatarFilePath());
            // call the setGravatarImageUrl() method which writes gravatar urls into the session
            $this->setGravatarImageUrl($result->user_email, AVATAR_SIZE);

            // generate integer-timestamp for saving of last-login date
            $user_last_login_timestamp = time();
            // write timestamp of this login into database (we only write "real" logins via login form into the
            // database, not the session-login on every page request
            $sql = "UPDATE users SET user_last_login_timestamp = :user_last_login_timestamp WHERE user_id = :user_id";
            $sth = $this->db->prepare($sql);
            $sth->execute(array(':user_id' => $user_id, ':user_last_login_timestamp' => $user_last_login_timestamp));

            // NOTE: we don't set another rememberme-cookie here as the current cookie should always
            // be invalid after a certain amount of time, so the user has to login with username/password
            // again from time to time. This is good and safe ! ;)
            $_SESSION["feedback_positive"][] = FEEDBACK_COOKIE_LOGIN_SUCCESSFUL;
            return true;
        } else {
            $_SESSION["feedback_negative"][] = FEEDBACK_COOKIE_INVALID;
            return false;
        }
    }

    /**
     * Tries to log the user in via Facebook-authentication
     * @return bool
     */
   

    /**
     * Log out process, deletes cookie, deletes session
     */
    public function logout()
    {
        // set the remember-me-cookie to ten years ago (3600sec * 365 days * 10).
        // that's obviously the best practice to kill a cookie via php
        // @see http://stackoverflow.com/a/686166/1114320
        setcookie('rememberme', false, time() - (3600 * 3650), '/', COOKIE_DOMAIN);

        // delete the session
        Session::destroy();
    }

    /**
     * Deletes the (invalid) remember-cookie to prevent infinitive login loops
     */
    public function deleteCookie()
    {
        // set the rememberme-cookie to ten years ago (3600sec * 365 days * 10).
        // that's obviously the best practice to kill a cookie via php
        // @see http://stackoverflow.com/a/686166/1114320
        setcookie('rememberme', false, time() - (3600 * 3650), '/', COOKIE_DOMAIN);
    }

    /**
     * Returns the current state of the user's login
     * @return bool user's login status
     */
    public function isUserLoggedIn()
    {
        return Session::get('user_logged_in');
    }

    /**
     * Edit the user's name, provided in the editing form
     * @return bool success status
     */
   
}
