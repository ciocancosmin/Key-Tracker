<?php
$title='User';
include_once("header.php");
?>
<!-- Page Content -->
<!--       <h1 id="user_welcome_message">Bine ai venit</h1> -->
        <hr>

        <div class="row">
            
        <div class="col-md-12">
            <button class="btn btn-success" onclick="show_change_pass();" id="change_pass_btn">Schimba parola</button>
        </div>


        </div>

        <div class="row">
          
          <div class="col-md-4"></div>
          <div class="col-md-4" id="main_col" style="z-index: 2;">
            
          

          <div id="admin_users_div">
              
            <!-- <div class="small_user_div">
              <p class="small_user_div_p">Utilizator: </p>
              <hr>
              <p class="small_user_div_p">Nume: </p>
              <hr>
              <p class="small_user_div_p">Prenume: </p>
              <hr>
              <input type="password" name="" placeholder="Seteaza noua parola" class="small_user_div_input">
              <hr>
              <p class="small_user_div_p">Card: </p>
              <hr>
              <div class="small_user_div_buttons">
                <button class="btn btn-danger">Scaneaza card</button>
                <button class="btn btn-success">Salveaza setarile</button>
                <button class="btn btn-info">Invalideaza user</button>
              </div>
            </div> -->

          </div>


          </div>
          <div class="col-md-4"></div>

        </div>

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <!-- <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer> -->

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="">Logout</a>
        </div>
      </div>
    </div>
  </div>

</body>

</html>