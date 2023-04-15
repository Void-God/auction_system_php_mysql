<!-- The Modal for change the person information-->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 style="margin:0px 106px" class="modal-title center">Personal Detail</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="personalForm" class="log-label" method="post" enctype="multipart/form-data" action="">
            <label style="color:black;">Your Name</label><br>
            <input id="changedName" class="log-input" type="text" name="Name" placeholder="Email Address" value="<?php echo $detail['userName'] ?>" required><br>

            <label class="log-label" for="login-pass">Address</label>
             <textarea id="changedAddress" value="cxs" class="log-input" name="address" rows="5" placeholder="Address" style="height:auto;" required></textarea>

             <label style="color:black;">Confirm Password</label><br>
            <input id="Pswd1" class="log-input" type="password" name="password" placeholder="Password" required><br>

             <input class="log-submit" type="submit" name="submit" value="Save Changes">
        </form>
      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>


<!-- The Modal for change the person information-->
<div class="modal" id="myModalPhone">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 style="margin:0px 150px" class="modal-title">Contact</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="changePhone" class="log-label" method="post" enctype="multipart/form-data" action="">
            <label>Mobile Number</label><br>
            <input id="changedPhone" class="log-input" type="text" name="mobile" pattern="[0-9]+" placeholder="Mobile Number" value="<?php echo $detail['mobile'] ?>" required><br>


             <label>Password</label><br>
            <input id="Pswd2" class="log-input" type="password" name="password" placeholder="Password" required><br>

             <input class="log-submit" type="submit" name="submit" value="Save Changes">
        </form>
      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>





<!-- The Modal for change the person information-->
<div class="modal" id="myModalPswd">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 style="margin:0px 87px"class="modal-title">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="changePswd" class="log-label" method="post" enctype="multipart/form-data" action="">


            <label>Current Password</label><br>
            <input id="Pswd3" class="log-input" type="password" name="password" placeholder="Password" required><br>

            <label>New Password</label><br>
            <input id="Pswd4" class="log-input" type="password" name="newpassword" placeholder="New Password" required><br>

            <label>Confirm Password</label><br>
            <input id="Pswd5" class="log-input" type="password" name="cfmpassword" placeholder="Confirm Password" required><br>

             <input class="log-submit" type="submit" name="submit" value="Save Changes">
        </form>
      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>


<!-- The Modal -->
<div class="modal" id="myError">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          
      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>
