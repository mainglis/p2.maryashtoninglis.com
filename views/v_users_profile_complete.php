<div class="container">
<?php if(isset($user_name)): ?>
    <h1>Editing profile for <?=$user->first_name?></h1>
    <div id="image_upload">

        <form method='POST' enctype="multipart/form-data" action='/users/p_upload/'>
                <h3>Upload an avatar image:</h3><p id="filetypes">(only jpg, jpeg, gif, or png file types allowed)</p>
            
                        <input type='file' name='uploads'>
                        <input type='submit'>
        </form>
    </div>

    <div id="profile_form">
        <h3>Please add or edit your profile, <?=$user->first_name?>:</h3>

        <form method='POST' action='/users/p_profile'>
                        
            Location<i> (State)</i><br/>
            <input type='text' name='location' maxlength="25">
            <br/><br/>

            Birth Year<br/>
            <input type='text' name='birthyear'>
            <br/><br/>

            Gender(m/f)<br/>
            <input type='text' name='gender'>
            <br/><br/>

            About <i> (25 character max)</i><br/>
            <input type='text' name='about' maxlength="100">
            <br/><br/>

            <input type='submit' value='Submit Profile' onclick="submit()";>

        </form>
    </div>
</div>
<!-- 

        <form method="POST" action='users/p_profile'>
                    
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
             <?php if($message == "success"): ?>
                                            <div class='message'>
                                                <p>Success! Your profile has been submitted.</p>
                                            </div>
                                            <br/>
                                    <?php endif; ?>
                                    <?php if($message == "blank"): ?>
                                            <div class='blank'>
                                                <p>Submitted Location Only. Do you work for the CIA?</p>  
                                            </div>
                                            <br/>
                                    <?php endif; ?>
        </form>
        <div class="col-1-2" id="image_upload">
        
            <form method='POST' enctype="multipart/form-data" action='/users/p_upload/'>
                    <h3>Upload an avatar image:</h3><p id="filetypes">(only jpg, jpeg, gif, or png file types allowed)</p>
                    
                            <input type='file' name='uploads'>
                            <input type='submit'>
            </form>  
            
                     <?php if($message == "filetype_error"): ?>
                    <div class='error'>
                        <p>Upload failed. Invalid file type. Please try again.</p>
                    </div>
                    <br/>
                <?php endif; ?>   
                
        </div>

<?php else: ?>
        <h1>No user has been specified</h1>
<?php endif; ?>



</div>
 -->