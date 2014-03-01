
<div class="container">
<div class="break"></div>

        <div class="userinfo">
            <div class="usercontact">
                <div class="userphoto">
                    <img src="<?php echo (URL.'images/user-photo.jpg');?>">
                 </div>
                <div class="usericons"> 
                    <h4>OPEN</h4>
                    <div class="icons2">
                   <h4><img src="<?php echo (URL.'images/icon-mail.png');?>"></h4>
                   <h4><img src="<?php echo (URL.'images/icon-views2.png');?>"> 21</h4>

                    
                    </div>
                 </div>
            </div>
            <div class="userbio">
               <?php if(isset($records)) {
                foreach($records as $row) { ?>
                <h2><?php echo anchor('site/edit/'. $row->username, $row->firstname); $row->firstname; ?> <?php echo $row->lastname; ?></h2>
                <h5><?php echo $row->location; ?></h3>
                <?php echo anchor($row->website);  $row->website; ?>
                <p><b>Experience: </b><?php echo $row->industry; ?></p>
                <p><?php echo $row->bio; ?></p>
            
                
                <?php } ?>
               <?php }else{ ?>
                <h2> No records </h2>
               <?php } ?>
 
            </div>
        </div>
        <div class="clearfix"></div>
      <!-- Example row of columns -->
      <br><br>
          <ul class="nav nav-tabs" style="float:left !important; width:100% !important;">
        <li><a href="#account" data-toggle="tab">Account Information</a></li>
        <li><a href="#password" data-toggle="tab">Change Password</a></li>
        </ul>
 <div class="clearfix"></div>
  <div class="tab-content">
<div class="tab-pane active" id="account"><h2>Account Information</h2>
       <hr>
       <div class="span7">
           <div id="upload">
                <label>Category</label>
                
                <?php
                // loads gallery controller
                echo form_open_multipart('site/update');?>
                <?php
                
                echo form_upload('userfile');
                echo form_submit('upload', 'Upload');
                echo form_close();
                ?>
            </div>
       
          <?php echo form_open('site/update/')?>
                <fieldset>
                 <label>First Name</label>
                 <input type="text" placeholder="<?php echo $row->firstname; ?>" name="firstname" id="firstname">
                 <label>Last Name</label>
                 <input type="text" placeholder="<?php echo $row->lastname; ?>" name="lastname" id="lastname">
                 <label>Email</label>
                 <input type="text" placeholder="<?php echo $row->email; ?>" name="email" id="email">
                 
                <label>Design Experience</label>
                <select name="industry" id="industry">
                    <option>Graphic Designer</option>
                    <option>Web Designer</option>
                </select>
                <label>City</label>
                <input type="text" placeholder="<?php echo $row->location; ?>" name="location" id="location">
                <label>State</label>
                <select name="state" id="state">
                    <option>Michigan</option>
                </select>
                <label>Web Site</label>
                 <input type="text" placeholder="<?php echo $row->website; ?>" name="website" id="website">
                 <label class="radio">
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Open for projects
                </label>
                <label class="radio">
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                Closed for projects ( businesses cannot contact you )
                </label>
                <label>Designer Summary</label>
                <textarea rows="3" placeholder="<?php echo $row->bio; ?>" name="bio" id="bio"></textarea>
                <br>
                <button type="submit" class="btn">Submit</button>
                </fieldset>
             <?php echo form_close();?>
       </div></div>
<div class="tab-pane" id="password"><h2>Change Password</h2>
       <hr>
       <div class="span7">

           <form>
                <fieldset>
                 <label>New Password</label>
                 <input type="text" name="password" id="password" placeholder="">
                 <label>Confirm Password</label>
                 <input type="text" name="password2" id="password2" placeholder="">
                <br>
                <button type="submit" class="btn">Submit</button>
                </fieldset>
               </form>
       </div></div>

</div>

       
 

    </div>