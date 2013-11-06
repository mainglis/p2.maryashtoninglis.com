<?php

class posts_controller extends base_controller {
        
        /*-------------------------------------------------------------------------------------------------
        
        -------------------------------------------------------------------------------------------------*/
       

        public function __construct() {
                
                # Make sure the base controller construct gets called
                parent::__construct();
                
                # Only let logged in users access the methods in this controller
                if(!$this->user) {
                        Router::redirect("/users/login");
                }
                
        } 
        
         
        /*-------------------------------------------------------------------------------------------------
        Display a new post form
        -------------------------------------------------------------------------------------------------*/
        public function add() {
                
                $this->template->content = View::instance("v_posts_add");
                $this->template->title   = "Add Posts";
                
                echo $this->template;
                
        }        
        
        
        /*-------------------------------------------------------------------------------------------------
        Process new posts
        -------------------------------------------------------------------------------------------------*/
        public function p_add() {
                
                $_POST['user_id']  = $this->user->user_id;
                $_POST['created']  = Time::now();
                $_POST['modified'] = Time::now();
                
                DB::instance(DB_NAME)->insert('posts',$_POST);
                
                Router::redirect('/posts/');
                
        }
        
        
        /*-------------------------------------------------------------------------------------------------
        View all posts
        -------------------------------------------------------------------------------------------------*/
        public function index() {
                
                # Set up view
                $this->template->content = View::instance('v_posts_index');
                $this->template->title   = "Posts";
                
                # Set up query
                $q = 'SELECT 
                            posts.img_url,
                            posts.content,
                            posts.created,
                            posts.user_id AS post_user_id,
                            users_users.user_id AS follower_id,
                            users.first_name,
                            users.last_name
                        FROM posts
                        INNER JOIN users_users 
                            ON posts.user_id = users_users.user_id_followed
                        INNER JOIN users 
                            ON posts.user_id = users.user_id
                        WHERE users_users.user_id = '.$this->user->user_id;
                
                # Run query        
                $posts = DB::instance(DB_NAME)->select_rows($q);
                
                # Pass $posts array to the view
                $this->template->content->posts = $posts;
                
                # Render view
                echo $this->template;
                
        }
        
        
        /*-------------------------------------------------------------------------------------------------
        
        -------------------------------------------------------------------------------------------------*/
        public function users() {
                
                # Set up view
                $this->template->content = View::instance("v_posts_users");
                
                # Set up query to get all users
                $q = 'SELECT *
                        FROM users';
                        
                # Run query
                $users = DB::instance(DB_NAME)->select_rows($q);
                
                # Set up query to get all connections from users_users table
                $q = 'SELECT *
                        FROM users_users
                        WHERE user_id = '.$this->user->user_id;
                        
                # Run query
                $connections = DB::instance(DB_NAME)->select_array($q,'user_id_followed');
                
                # Pass data to the view
                $this->template->content->users       = $users;
                $this->template->content->connections = $connections;
                
                # Render view
                echo $this->template;
                
        }
        
        
        /*-------------------------------------------------------------------------------------------------
        Creates a row in the users_users table representing that one user is following another
        -------------------------------------------------------------------------------------------------*/
        public function follow($user_id_followed) {
        
            # Prepare the data array to be inserted
            $data = Array(
                "created"          => Time::now(),
                "user_id"          => $this->user->user_id,
                "user_id_followed" => $user_id_followed
                );
        
            # Do the insert
            DB::instance(DB_NAME)->insert('users_users', $data);
        
            # Send them back
            Router::redirect("/posts/users");
        
        }
        
        
        /*-------------------------------------------------------------------------------------------------
        Removes the specified row in the users_users table, removing the follow between two users
        -------------------------------------------------------------------------------------------------*/
        public function unfollow($user_id_followed) {
        
            # Set up the where condition
            $where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
            
            # Run the delete
            DB::instance(DB_NAME)->delete('users_users', $where_condition);
        
            # Send them back
            Router::redirect("/posts/users");
        
        }
/*-------------------------------------------------------------------------------------------------
        Adding like funcationality
---------------------------------------------------------------------------------*/
        public function fb_like() {
            if (is_single()) { ?>
                <iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:450px; height:60px;"></iframe>

                <?php }
        }
        // add_action('thesis_hook_after_post','fb_like');
        
        public function test() {
                echo "This is a test page";
            }

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
                            DB::instance(DB_NAME)->update('posts', $data, "WHERE user_id = '".$this->user->user_id."'");
            
                            # Send them to the login page
                            Router::redirect("/posts");
                    
                    }
                    else {
                            
                            Router::redirect("/posts/filetype_error"); 
            } 
                    
            }
        
} # eoc