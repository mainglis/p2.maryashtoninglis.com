<div id="wrapper">
    <img id="avatar" src="/uploads/avatars/<?=$profile[0]['img_url']?>" alt="avatar" height="100" width="100"/>&nbsp;&nbsp;

    <div id="profile_info">
        <h1>
            <?=$profile[0]['first_name']?>
            <?=$profile[0]['last_name']?>
        </h1>

        <article id="profile_article">
        
            <p>Location: <?=($profile[0]['location']);?>
            </p>

            <p>Birth Year: <?=($profile[0]['birthyear']);?>
            </p>

            <p>Gender: <?=($profile[0]['gender']);?>
            </p>

            <p>About: <?=($profile[0]['about']);?>
            </p>
            
        </article>
    </div>
</div>
