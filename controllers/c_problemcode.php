<?php 

public function profile() {
       
        # If user is blank, they're not logged in; redirect them to the login page
        if(!$this->user) {
        Router::redirect('/users/login');
        }
        
        $this->template->content = View::instance('v_users_profile');
        $this->template->title = "Profile of".$this->user->first_name;
        
        $client_files_head = Array(
        '/css/widgets.css'
        '/css/profile.css'
        );

    # Use load_client_files to generate the links from the above array
        $this->template->client_files_head = Utils::load_client_files($client_files_head);  

    # Create an array of 1 or many client files to be included before the closing </body> tag
        $client_files_body = Array(
            '/js/widgets.min.js',
            '/js/profile.min.js'
        );

    # Use load_client_files to generate the links from the above array
        $this->template->client_files_body = Utils::load_client_files($client_files_body);  

        $this->template->content->user_name = $user_name;
    # I think this might've been part of the issue? the lack of a ">" below
        echo $this-template;

## This is the older code for login fuction, and it worked.
public function login() {
        # Setup view
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        # Search the db for this email and password
        # Retrieve the token if it's available

        $q = "SELECT token 
            FROM users 
            WHERE email = '".$_POST['email']."' 
            AND password = '".$_POST['password']."'";

        $token = DB::instance(DB_NAME)->select_field($q);

        # If we didn't find a matching token in the database, it means login failed
        if(!$token) {

            # Send them back to the login page
            Router::redirect("/users/login/error");

        # But if we did, login succeeded! 
        } else {

            /* 
            Store this token in a cookie using setcookie()
            Important Note: *Nothing* else can echo to the page before setcookie is called
            Not even one single white space.
            param 1 = name of the cookie
            param 2 = the value of the cookie
            param 3 = when to expire
            param 4 = the path of the cooke (a single forward slash sets it for the entire domain)
            */
            setcookie("token", $token, strtotime('+1 year'), '/');

            # Send them to the main page - or whever you want them to go
            Router::redirect("/");

        }
        # Commenting this out to see if it helps display content.
        # $this->template->content = View::instance('v_users_login');
        # $this->template->title   = "Login";

    # Render template
        # echo $this->template;
    }
?php>

