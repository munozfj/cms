
<!--
<div id="myModalLogin" class="modal hide fade"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel">Edit Introduction</h3>
    </div>
    <div class="modal-body">
  
      <form id="InfroText" method="POST">
  
      <input name="InfroText" value="1" type="hidden">
  
      <table>
        <tbody><tr><td>Title</td><td><input name="title" id="title" style="width:300px" type="text"><span class="hide help-inline">This is required</span></td></tr>
        <tr><td>Introudction</td><td><textarea name="contect" style="width:300px;height:100px"></textarea></td></tr>
      </tbody></table>
      </form>
    </div>
      <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
      <button class="btn btn-primary" data-dismiss="modal" id="InfroTextSubmit">Save changes</button>
    </div>
</div>
-->
 
<!-- Modal Login -->

<div class="modal fade" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Header que siempre tiene que estar -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Application access</h4>
      </div>

      <!-- Cuerpo de la ventana modal -->
      <div class="modal-body">
          <form id="formLogin" class="form form-horizontal" role="form"  > 


            <div class="form-group">
              <label for="username" class="col-sm-2 control-label">Login</label>
              <div class="col-sm-10">
                <input name="username" id="username" type="text" placeholder="Username" pattern="^[a-z,A-Z,0-9,_]{6,15}$" data-valid-min="6" title="Enter your username" required="">
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input name="password" id="password" type="password" placeholder="Password" title="Enter your password" required=""><br>
              </div>
            </div>


          </form>

      </div>
      <!-- Fin cuerpo modal -->

      <!-- Footer que siempre tiene que estar -->
      <div class="modal-footer">
        <button type="button" name="cancel" class="btn btn-danger " data-dismiss="modal" >Cancel</button>
        <a href="login.php?username="<?php echo action="post"><button type="button" name="submit" class="btn btn-primary"  >Access</button> </a> 
      </div>
      <!-- Fin footer -->

    </div>
  </div>
</div>
<!-- Fin modal login-->

