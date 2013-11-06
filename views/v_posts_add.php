<div class="container">
<h4>What did you have for breakfast today?</h4>

<form method='post' action='/posts/p_add'>

        <textarea class="input.lg" name='content'></textarea>
        
        <br><br>
        
        <input type='Submit' value='Add new post'>

</form>
<form method='POST' enctype="multipart/form-data" action='/posts/p_upload/'>
                    <h3>Upload photo of your breakfast:</h3><p id="filetypes">(only jpg, jpeg, gif, or png file types allowed)</p>
                    
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