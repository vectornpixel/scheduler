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
               <?php }; ?>
 
            </div>
        </div>
        <div class="clearfix"></div>
      <!-- Example row of columns -->
      <hr>
       <ul class="nav nav-tabs" style="float:left !important; width:100% !important;">
        <li><a href="#portfolio" data-toggle="tab">Portfolio</a></li>
        <li><a href="#projects" data-toggle="tab">Projects</a></li>
        </ul>

   <div class="clearfix"></div>
        <div class="tab-content">
<div class="tab-pane active" id="portfolio">
      <div class="row offsetbottom">
               
                <?php 
                // images variable grabbed from gallery model
                if(isset($images) && count($images)){
                foreach($images as $image){ ?>  
                 <div class="span4">
                    <div class="item">
                        <div class="thumb">
                            <a href="<?php echo $image['url']; ?>">
                            <img src="<?php echo $image['thumb_url'];?>">
                            </a>
                            <div class="info">
                            <h3>Logo Design</h3>
                        </div>
                        </div>
                    </div>
                </div>
                <?php } }else{ ?>
                <img src="<?php echo (URL.'images/holder-item.jpg');?>">
                <div id="blank_gallery">Please Upload an Image</div>
                <div class="info">
                <h3>No Title Added</h3>
                 </div>
                <?php }; ?>
               
        
      </div>
</div>
        <div class="tab-pane active" id="projects">
</div>
        </div>
 

      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div>