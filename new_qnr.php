      <nav id="control-nav" default-class="is-dark" class="navbar is-dark">
        <div class="container">
          <div class="navbar-brand">
            <a class="navbar-item" href="#">
              <h1>CREATE NEW QUESTIONAIRE</h1>
            </a>
           
          </div>
          <div id="navbarMenu" class="navbar-menu">
            <div class="navbar-end">
            
              <span class="navbar-item">
                <a id="add_question" class="button is-white is-outlined" style="border-radius:0px;">
                  <span class="icon">
                    <i class="icon-plus"></i>
                  </span>
                  <span>Add Question</span>
                </a>
              </span>
              <span class="navbar-item">
                <a class="button is-white is-outlined"  data-target="#myModal" id="preview" style="border-radius:0px;">
                  <span class="icon">
                    <i class="icon-weibo"></i>
                  </span>
                  <span>Preview</span>
                </a>
              </span>
              
            </div>
          </div>
        </div>
        
      </nav>


      <script>
      $(document).ready(function () {
            $("#control-nav").removeClass("is-dark").addClass("is-" + $("#theme-color").val()).attr("default-class", "is-" + $("#theme-color").val());

      });
      
      
      </script>