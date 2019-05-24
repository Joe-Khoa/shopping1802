<section class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-12 col-xs-12">
        <div class="page-content checkout-page">
          <div class="page-title">
            <h2>Thông báo</h2>
          </div>
          <?php if(isset($_SESSION['error_order'])):?>
            <div class="row">
              <div class="col-md-4 col-md-offset-4">
                <div class="alert alert-danger">
                  <div class="text-center">
                    <p><?php
                    echo $_SESSION['error_order'];
                    unset($_SESSION['error_order']);
                    ?></p>
                  </div>
                </div>
              </div>
            </div>
          <?php endif?>
          <?php if(isset($_SESSION['success_order'])):?>
            <div class="row">
              <div class="col-md-4 col-md-offset-4">
                <div class="alert alert-success">
                  <div class="text-center">
                    <p><?php
                    echo $_SESSION['success_order'];
                    unset($_SESSION['success_order']);
                    ?></p>
                  </div>
                </div>
              </div>
            </div>
          <?php endif?>
          
        </div>
        </div>
      </div>

    </div>
  </div>
</section>