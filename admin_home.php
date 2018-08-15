<?php include 'snippets/head.php';
if(!isset($_COOKIE['session'])){ 
  header("location:index.php");
}
  ?>



<div class="body-container">
  <input type="hidden" id="theme-color"  value="dark">
    <div class="columns">
        <div class="column is-1">&nbsp;</div>
        <div class="column is-10" >
            <section id="page-header" default-class="is-dark" class="hero is-dark welcome is-small">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            Hello, <?=$_COOKIE['session']?>.
                        </h1>
                        <h2 class="subtitle">
                            I hope you are having a great day!
                        </h2>
                    </div>
                </div>
            </section>
            <section class="info-tiles link-container">
          <div class="tile is-ancestor has-text-centered">
            <div class="tile is-parent">
              <article id="admin_panel" class="tile is-child box box-dark">
                <p class="title"><i class="tile-icon has-text-white icon-th"></i> </p>
                <p class="tile-text has-text-white subtitle">Admin Panel</p>
              </article>
            </div>
            <div class="tile is-parent">
              <article id="new_qnr" class="tile is-child box">
                <p class="title"><i class="tile-icon   icon-edit"></i> </p>
                <p class="tile-text   subtitle">Create New Questionaire</p>
              </article>
            </div>
            
            <div class="tile is-parent">
              <article  id="view_qnrs" class="tile is-child box">
                <p class=" title"><i class="tile-icon   icon-folder-close"></i> </p>
                <p class="tile-text   subtitle">Explore Saved Questionares</p>
              </article>
            </div>
            <div class="tile is-link is-parent">
              <article id="view_ans" class="tile is-child box">
                <p class="title"><i class="tile-icon   icon-eye-open"></i></p>
                <p class="tile-text   subtitle">View Answered Questionaire</p>
              </article>
            </div>
            
          </div>
        </section>
<br>
<section>
  
<div class="columns">
<div class="column is-2">
  <div id="theme-link-trigger" class="notification is-white" stye="height:55px;" ><h4 id="theme-link-trigger-text" class="title is-4 has-text-black has-text-centered">Themes <i class="icon-double-angle-right"></i> </h4></div>
</div>
<div class="column">
  <div class="notification is-danger theme-button" title="Light Red" target-class="danger" >&nbsp;</div>
</div>
<div class="column">
  <div class="notification is-success theme-button" title="Light Green" target-class="success" >&nbsp;</div>
</div>
<div class="column">
  <div class="notification is-primary theme-button" title="Pale Green" target-class="primary" >&nbsp;</div>
</div>
<div class="column">
  <div class="notification is-info theme-button" title="Light Blue" target-class="info" >&nbsp;</div>
</div>
<div class="column">
  <div class="notification is-link theme-button" title="Deep Blue" target-class="link" >&nbsp;</div>
</div>
<div class="column">
  <div class="notification is-online is-dark theme-button" title="Dark Grey" target-class="dark" >&nbsp;</div>
</div>
<div class="column">
  <div class="notification is-black theme-button" title="Black" target-class="black" >&nbsp;</div>
</div>
<div class="column">
  <div class="notification is-warning theme-button" title="Yellow" target-class="warning" >&nbsp;</div>
</div>
</div>
</section>

<section id="content-container" class="content-container">



      <div class="hero-body" id="form-wrapper">
    







        </div>
        
  <div class="modal" id="myModal">
    <div class="modal-background"></div>
    <div class="modal-card">
      <header class="modal-card-head">
        <p class="modal-card-title"><i class="icon-weibo"></i>&nbsp;|&nbsp;Preview Questionaire</p>
        <button class="delete"></button>
      </header>
      <section id="" class="modal-card-body">
<h2 class="has-text-centered title" id="form_title_copy">Form Title</h2>
<h3 class="has-text-centered subtitle" id="form_description_copy">This Is A Sample Form Description</h3>

<hr>
<div id="qn_holder" class="questions">

</div>

      </section>
      <footer class="modal-card-foot">
        <form id="save_qnr" class="hidden" action="query_db/save_qnr.php" method="post">
          <input type="text" name="qnr-title" value="" id="qnr-title">
          <input type="text" name="qnr-desc" value="" id="qnr-desc">
          <input type="text" name="qnr-form" value="" id="qnr-form">
          <input type="text" name="qnr-theme" value="" id="qnr-theme">
          <input class="" id="submit_qnr" type="submit" value="Save Questionaire"/>
        </form>
        <a id="create_qnr" class="submit button is-dark button"> <i class="icon-save"></i> &nbsp; Save Questionaire</a>
        &nbsp;|&nbsp;
        <a class="cancel button"> <i class="icon-return"></i> &nbsp; Back</a>
      </footer>
    </div>
  </div>
</section>

<script>
    $('.delete, .cancel').on("click",function() {
    $(this).parent().parent().parent().removeClass('is-active');
  });
  //   $('.modal-background, .modal-close, .delete').click(function() {
  //   $(this).parent().removeClass('is-active');
  // });
</script>





















        </div>
        
        <div class="column is-1">&nbsp;</div>
    </div>
</div>
    
    
<?php

 include 'snippets/footer.php'; ?>