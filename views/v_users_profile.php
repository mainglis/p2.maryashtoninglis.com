<div class="container">

 <img id="avatar" src="/uploads/avatars/<?=$profile[0]['img_url']?>" alt="avatar" height="100" width="100"/>&nbsp;&nbsp;
    
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

            <!-- <p>Profile image: <?=($profile[0]['img_url']);?>
            </p> -->
            
            <a id="edit_profile" href='/users/p-profile'>Edit Profile</a>
            
        </article>
    </div>
       

</div>