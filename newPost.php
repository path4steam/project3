<?php
session_start();
if(!$_SESSION['logged']){
    header("Location: index.php");
    die;
}

include("header.php");
?>


    
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="createPost.php" method="post" accept-charset="utf-8" class="form-horizontal" role="form">

                    <!-- Form Name -->
                    <legend>New Post</legend>

                    <h4>Create a new post to be placed in inventory.</h4>
                    <!-- Item Title-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="item_title">Title</label>  
                      <div class="col-md-4">
                          <input id="item_title" name="item_title" type="text" placeholder="" class="form-control input-md">
                          <!--   <span class="help-block">help</span>   -->
                      </div>
                  </div>

                  <!-- Item Price -->
                  <div class="form-group">
                      <label class="col-md-4 control-label" for="item_price">Price</label>
                      <div class="col-md-4">
                        <div class="input-group">
                          <span class="input-group-addon">$</span>
                          <input id="item_price" name="item_price" class="form-control prepended" placeholder="" type="text">
                      </div>
                      <!--     <p class="help-block">help</p> -->
                  </div>
              </div>

              <!-- Upload Image --> 
              <div class="form-group">
                  <label class="col-md-4 control-label" for="item_image">Image Upload</label>
                  <div class="col-md-4">
                    <input id="item_image" name="item_image" class="input-file" type="file">
                </div>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="item_description">Description</label>
                <div class="col-md-4">                     
                    <textarea class="form-control" id="item_description" name="item_description"></textarea>
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="submitPost">Create New Post</button>

        </form>

    </div>
    <!-- /.col-md-6 -->
</div>
<!-- /.row -->
</div>
<!-- /.container -->

<?php
include("footer.html");
?>