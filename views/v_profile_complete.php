<div class="container">

<div class="grid grid-pad">
        <div class="col-1-2" id="profile_form">
            <h3>Please add or edit your profile, <?=$user->first_name?>:</h3>
        
            <form method='POST' action='/users/p_profile'>
                            
                Location<i> (City, State)</i><br/>
                <input type='text' name='location' maxlength="25" required>
                <br/><br/>
        
                Age<br/>
                <input type='int' name='age'>
                <br/><br/>
        
                Favorite Breakfast<br/>
                <input type='text' name='favorite_breakfast'>
                <br/><br/>
        
                <input type='submit' value='Submit Profile'>
            
                            <?php if($message == "success"): ?>
                                    <div class='message'>
                                        <p>Success! Your profile has been updated.</p>
                                    </div>
                                    <br/>
                            <?php endif; ?>
                            <?php if($message == "blank"): ?>
                                    <div class='blank'>
                                        <p>Please fill out the entire form!</p>  
                                    </div>
                                    <br/>
                            <?php endif; ?>             
            </form>
            
            
        </div>


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
</div>
</div>