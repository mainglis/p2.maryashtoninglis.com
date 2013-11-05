<div class="container">
<?php if(isset($user_name)): ?>
        <h1>Editing profile for <?=$user->first_name?></h1>
        <form method="POST" action='/users/p_profile'>
                    
            Location <i>(City, State)</i><br/>
            <input type='varchar' name='location' maxlength="25">
            <br/><br/>

            Age<br/>
            <input type='int' name='age'>
            <br/><br/>

            Favorite Breakfast <i> (255 character max)</i><br/>
            <input type='text' name='favorite_breakfast' maxlength="255">
            <br/><br/>

            <input type='submit' value='Submit Profile' onclick="submit()";>>

        </form>
<?php else: ?>
        <h1>No user has been specified</h1>
<?php endif; ?>



</div>
