<div class="container">
<h1>This is the profile of <?=$user->first_name?></h1>
<p>If you'd like to edit your profile, click <a href="users/profile/edit">here</a></p>
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
</div>