    <!-- login -->
    <div id="login-modal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close login-close">&times;</span>
          <h2>Login</h2>
        </div>
        <div class="modal-body">
            <center>
                <img src="assets/imgs/user.png" alt="" width="100" height="100"><br><br>
                <form action="#" method="post" autocomplete="off" accept-charset="utf-8">
                    <input type="text" name="user" class="input_fld" placeholder="Enter Username." required />
                    <input type="password" name="pass" class="input_fld" placeholder="Enter Password." required />
                    <button type="submit">Login</button>
                </form>
            </center>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
    <!-- register -->
    <div id="reg-modal" class="modal">
      <div class="modal-content">
        <div class="modal-header">
          <span class="close reg-close">&times;</span>
          <h2>Register</h2>
        </div>
        <div class="modal-body">
            <center>
                <img src="assets/imgs/user.png" alt="" width="100" height="100"><br><br>
                <form action="#" method="post" autocomplete="off" id="reg_form" accept-charset="utf-8">
                    <input type="text" name="user" class="input_fld" id="fullName" placeholder="Enter Full Name." />
                    <input type="text" name="user" class="input_fld" id="email" placeholder="Email Address." />
                    <input type="password" name="pass1" class="input_fld" id="n_pass" placeholder="Create Password." />
                    <input type="password" name="pass1" class="input_fld" id="c_pass" placeholder="Re-type Password." />
                    <button type="submit" id="reg_submit_btn">Register</button>
                </form>
                <span id="message"></span>
            </center>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>