<div class="container">

<?php foreach($posts as $post): ?>

        <strong><?=$post['first_name']?> posted on <?=Time::display($post['created'])?></strong><br>
        <?=$post['content']?><br><br>
        <img id="avatar" src="/uploads/avatars/<?=$post[0]['img_url']?>" alt="avatar" height="100" width="100"/>

        
<?php endforeach; ?>

</div>