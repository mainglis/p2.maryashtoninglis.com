<div class="container">


        <div class="row">
            <h3>Hey, <?=$user->first_name?>! Complete your profile here:</h3>
        
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
                                        <!-- How to get from http://localhost/users/p_profile/success to http://localhost/users/profile/ -->
                                        <h4>Success! View your updated profile <a href='/users/profile'>here</a>.</h4>
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


        <div class="row">
        
            <form method='POST' enctype="multipart/form-data" action='/users/p_upload/'>
                    <h3>Upload a profile image:</h3><p id="filetypes">(only jpg, jpeg, gif, or png file types allowed)</p>
                    
                            <input type='file' name='uploads'></br>
                            <input type='submit'>

                     <?php if($message == "filetype_error"): ?>
                    <div class='error'>
                        <p>Upload failed. Invalid file type. Please try again.</p>
                    </div>
                    <br/>
                <?php endif; ?>   
            </form>   
        </div>

</div>