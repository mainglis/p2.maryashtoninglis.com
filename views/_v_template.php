<!DOCTYPE html>
<html>
<head>
        <title><?php if(isset($title)) echo $title; ?></title>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />                                      
        <!-- JS/CSS File we want on every page -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>                                                                                    
        <link rel="stylesheet" href="/css/carousel.css" type="text/css">
        <script src="/js/bootstrap.min.js"></script>
        <!-- <script src="/js/carousel.js"></script> -->
<script>
  $(document).ready(function(){
    $('.carousel').carousel();
    interval: 2000
  });
</script>
        <!-- Bootstrap core CSS -->
        <link href="/css/bootstrap.css" rel="stylesheet">
        <!-- Controller Specific JS/CSS -->
        <?php if(isset($client_files_head)) echo $client_files_head; ?>  
</head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href='/'>FriedEggs</a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href='/'>Home</a></li>
                 <?php if($user): ?>
                        <li><a href='/posts/add'>Add Post</a></li>
                        <li><a href='/posts/'>View Posts</a></li>
                        <li><a href='/posts/users'>Follow Users</a></li>
                        <li><a href='/users/logout'>Logout</a></li>
                        <li>You are logged in as <?=$user->first_name?> <?=$user->last_name?></li>
                <?php else: ?>
                        <li><a href='/users/signup'>Sign Up</a></li>
                        <li><a href='/users/login'>Log In</a></li>
                <?php endif; ?>
                
                <!-- <?php if($user): ?>
                <li>You are logged in as <?=$user->first_name?> <?=$user->last_name?></li>
                <?php endif; ?> -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Plus 1's <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="/users/profile">Edit Profile</a></li>
                    <li><a href="/link">2nd Plus 1</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>

      </div>
    </div>

        <?php if($user): ?>
                You are logged in as <?=$user->first_name?> <?=$user->last_name?><br>
        <?php endif; ?>
        
        <br><br>
        
        <?php if(isset($content)) echo $content; ?>

        <?php if(isset($client_files_body)) echo $client_files_body; ?>

</body>
</html>