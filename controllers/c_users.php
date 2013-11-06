<?php
class users_controller extends base_controller {

        /*-------------------------------------------------------------------------------------------------
        
        -------------------------------------------------------------------------------------------------*/
    public function __construct() {
    
            # Make sure the base controller construct gets called
                parent::__construct();
    } 


        /*-------------------------------------------------------------------------------------------------
        Display a form so users can sign up        
        -------------------------------------------------------------------------------------------------*/
    public function signup() {
       
       # Set up the view
       $this->template->content = View::instance('v_users_signup');
       
       # Render the view
       echo $this->template;
       
    }
    
    
    /*-------------------------------------------------------------------------------------------------
    Process the sign up form
    -------------------------------------------------------------------------------------------------*/
    public function p_signup() {
                        
            # Mark the time
            $_POST['created']  = Time::now();
            
            # Hash password
            $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
            
            # Create a hashed token
            $_POST['token']    = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());
            
            # Insert the new user    
            DB::instance(DB_NAME)->insert_row('users', $_POST);
            
            # Send them to the login page
            Router::redirect('/users/login');
            
    }


        /*-------------------------------------------------------------------------------------------------
        Display a form so users can login
        -------------------------------------------------------------------------------------------------*/
    public function login() {
    
            $this->template->content = View::instance('v_users_login');            
            echo $this->template;   
       
    }
    
    
    /*-------------------------------------------------------------------------------------------------
    Process the login form
    -------------------------------------------------------------------------------------------------*/
    public function p_login() {
                      
                   # Hash the password they entered so we can compare it with the ones in the database
                $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);
                
                # Set up the query to see if there's a matching email/password in the DB
                $q = 
                        'SELECT token 
                        FROM users
                        WHERE email = "'.$_POST['email'].'"
                        AND password = "'.$_POST['password'].'"';
                
                # echo $q;        
                
                # If there was, this will return the token           
                $token = DB::instance(DB_NAME)->select_field($q);
                
                # Success
                if($token) {
                
                        # Don't echo anything to the page before setting this cookie!
                        setcookie('token',$token, strtotime('+1 year'), '/');
                        
                        # Send them to the homepage
                        Router::redirect('/');
                }
                # Fail
                else {
                        echo "Login failed! <a href='/users/login'>Try again?</a>";
                }
           
    }


        /*-------------------------------------------------------------------------------------------------
        No view needed here, they just goto /users/logout, it logs them out and sends them
        back to the homepage.        
        -------------------------------------------------------------------------------------------------*/
    public function logout() {
       
       # Generate a new token they'll use next time they login
       $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());
       
       # Update their row in the DB with the new token
       $data = Array(
               'token' => $new_token
       );
       DB::instance(DB_NAME)->update('users',$data, 'WHERE user_id ='. $this->user->user_id);
       
       # Delete their old token cookie by expiring it
       setcookie('token', '', strtotime('-1 year'), '/');
       
       # Send them back to the homepage
       Router::redirect('/');
       
    }

        /*-------------------------------------------------------------------------------------------------
        
        -------------------------------------------------------------------------------------------------*/

    public function profile() {

               # If user is blank, they're not logged in; redirect them to the home page
               if(!$this->user) {
                       Router::redirect('/users/login');
               }

               # If they weren't redirected away, continue:

               # Setup view
               $this->template->content = View::instance('v_users_profile');
               $this->template->title   = "Profile of ".$this->user->first_name;

               # Build the query for users and profiles
               $q = 'SELECT first_name, last_name, age, location, favorite_breakfast, img_url
                               FROM users
                               WHERE users.user_id = '.$this->user->user_id;

               # Run the query
               $profile = DB::instance(DB_NAME)->select_rows($q);


               # Pass data to the view
               $this->template->content->profile = $profile;

               # Render template
               echo $this->template;
       }
 /*-------------------------------------------------------------------------------------------------
        Creating capacity to edit profiles
 -------------------------------------------------------------------------------------------------*/


    public function p_profile($message = NULL, $user_id = NULL) {
        
                 # If user is blank, they're not logged in; redirect them to the login page
                 if(!$this->user) {
                         Router::redirect('/users/login');
                 }
              
                 # Setup view
                 $this->template->content = View::instance('v_profile_complete');
                 $this->template->title   = "Profile of ".$this->user->first_name;
              
                 $this->template->content->message = $message;        
                        
        //         # Don't allow all profile fields to be blank without at least saying something to the user
        //         if(!empty($_POST['age'])) {
        //                 if(empty($_POST['location'])) {                
        //                         if(empty($_POST['favorite_breakfast'])) {
        //                 
                                    
        //                                     # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
        //                                                 $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        //                                                 # Insert this proile into the database
        //                                                 $q = DB::instance(DB_NAME)->update('users', $_POST, "WHERE user_id = '".$this->user->user_id."'");                                    
        //                                         Router::redirect('/users/p_profile/blank');
        //                             }
        //                         }
        //                 }
        // }        
                        
                # If post data exists, update the users table with the profile data
                if($_POST) {                
                        
                        
                        # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
                        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

                        # Insert this proile into the database
                        $q = DB::instance(DB_NAME)->update('users', $_POST, "WHERE user_id = '".$this->user->user_id."'");
                        
                        Router::redirect('/users/p_profile/success');
                }        
                
                # Render template
                echo $this->template;        
        }
/* Creating capacity upload images ---------------------------------- */    

    public function p_upload() {
            
                    # Upload an image file into the uploads/avatars folder
                    $img = @Upload::upload($_FILES, "/uploads/avatars/", 
                    array("jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG"), $_FILES['uploads']['name']);
                    
                    # Check if image is a valid type, if so, insert image into db   
            if($img != 'Invalid file type.') {
                         
                            # Getting the file name, without the extension
                            $file = $_FILES['uploads']['name'];          
                            $info = pathinfo($file);
                            
                            # Add the extension again after the file name to match how the file is uploaded        
                            $file_name =  $file.'.'.$info['extension'];        
                     
                            # Set the name of the image file to be the user_id.jpg
                            $img_url = $file_name; 
                                    
                            # Prepare the image_url for upadate into users table
                            $data = array("img_url" => $img_url);
                    
                            # Insert the image url into the database
                            DB::instance(DB_NAME)->update('users', $data, "WHERE user_id = '".$this->user->user_id."'");
            
                            # Send them to the login page
                            Router::redirect("/users/profile/");
                    
                    }
                    else {
                            
                            Router::redirect("/users/p_profile/filetype_error"); 
            } 
                    
            }

    
} # end of the class