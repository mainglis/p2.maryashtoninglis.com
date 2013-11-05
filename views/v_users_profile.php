<div class="container">
<!-- <h3>Displaying profile for <?=$user->first_name?></h3>

<p>If you'd like to edit your profile, click <a href="profile/complete">here</a></p>
 -->

    <img id="avatar" src="/uploads/avatars/<?=$profile[0]['img_url']?>" height="100" width="100" alt="avatar"/>&nbsp;&nbsp;

    <div id="profile_info">
        <h1>
            <?=$profile[0]['first_name']?>
                    <?=$profile[0]['last_name']?>
        </h1>

        <article id="profile_article">
        
             <p>Age: <?=($profile[0]['age']);?>
            </p>

            <p>Location: <?=($profile[0]['location']);?>
            </p>

            <p>Favorite Breakfast: <?=($profile[0]['gender']);?>
            </p>
            
            <a id="edit_profile" href='profile/complete'>Edit Profile</a>
            
        </article>
    </div>
       

</div>