<div class="container">
<!-- <h3>Displaying profile for <?=$user->first_name?></h3>

<p>If you'd like to edit your profile, click <a href="profile/complete">here</a></p>
 -->

    <img id="eggs" src="/images/fried-egg-md.png"<?=$profile[0]['img_url']?>" height="100" width="100" alt="egg"/>&nbsp;&nbsp;

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

            <p>Favorite Breakfast: <?=($profile[0]['favorite_breakfast']);?>
            </p>
            
            <a id="edit_profile" href='/users/p-profile'>Edit Profile</a>
            
        </article>
    </div>
       

</div>