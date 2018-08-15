  <?php include 'snippets/head.php'; ?>
  <?php include 'query_db/functions.php'; ?>
  
  
  <section class="hero is-dark is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-6 is-offset-3">
          <h1 class="title has-text-gray"><i class="icon-suitcase icon-3x"></i></h1>
          <h1 class="title has-text-gray">Survey Slave</h1>
          <p class="subtitle has-text-grey">Please login to proceed.</p>
          <div class="box" style="box-shadow: 0 2px 4px rgba(254, 254, 254, 0.8), 0 0 0 4px rgba(230, 230, 230, 0.2);">
            <figure class="avatar">
              <img src="assets/images/BlankUserPhoto.png">
            </figure>
            <form method="POST" action="">
              <div class="field">
                <div class="control">
                  <input class="input is-dark is-large" id="username" name="username" type="text" placeholder="Your Username">
                </div>
              </div>

              <div class="field">
                <div class="control">
                  <input class="input is-dark is-large" id="password" name="password" type="password" required="required" placeholder="Your Password">
                </div>
              </div>
              <div class="field">
                <label class="checkbox">
                  <input type="checkbox">
                  Remember me
                </label>
              </div>
              <input type="submit" id="login" class="button is-block is-info is-large is-fullwidth" required="required" name="login" value="log In"  />
            </form>
          </div>
          <p class="has-text-white">
            <a href="../">Sign Up</a> &nbsp;·&nbsp;
            <a href="../">Forgot Password</a> &nbsp;·&nbsp;
            <a href="../">Need Help?</a>
          </p>
        </div>
      </div>
    </div>
  </section>


  <?php

  include 'snippets/footer.php';
  
  if (isset($_POST['login'])) {
    
  $user = select("users","1");

  $auth=0;
for ($users=0; $users < count($user) ; $users ++) { 
    extract($user[$users]);
    if (($username == $_POST['username']) && ($password == MD5($_POST['password'])) ) {
      $auth = 1;
      setcookie("session",$_POST['username'],0,'/');
      // echo "User ". $user_id ." authenticated";
      header("location:admin_home.php");
    }
  
}

if($auth==0){

  ?>
    <script>
    $(document).ready(function () {
      $("#username").switchClass( "is-dark", "is-danger").on("click",function(){$(this).removeClass("is-danger")});
      $("#password").switchClass( "is-dark", "is-danger").on("click",function(){$(this).removeClass("is-danger")});
      alert("Password And Username Dont match");
    });
    
    </script>

  <?php

  }
  
} 
  ?>