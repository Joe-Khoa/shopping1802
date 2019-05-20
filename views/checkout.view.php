<section class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-12 col-xs-12">
        <div class="page-content checkout-page">
          <div class="page-title">
            <h2>Thanh toán</h2>
          </div>
          <?php if(isset($_SESSION['error_checkout'])):?>
            <div class="row">
              <div class="col-md-4 col-md-offset-4">
                <div class="alert alert-danger">
                  <div class="text-center">
                    <p><?php
                    echo $_SESSION['error_checkout'];
                    unset($_SESSION['error_checkout']);
                    ?></p>
                  </div>
                </div>
              </div>
            </div>
          <?php endif?>
          <div class="box-border">
            <form method="post">
              <div class="col-sm-6">
                <label for="first_name" class="required">Họ tên</label>
                <input type="text" class="input form-control" name="txtName" id="first_name">
              </div>
              <!--/ [col] -->
              <div class="col-sm-6">
                <label for="email_address" class="required">Email Address</label>
                <input type="text" class="input form-control" name="txtEmail" id="email_address">
              </div>
              <!--/ [col] -->
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-check-input" type="radio" name="gender" value="Nam" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Nam
                  </label>
                  <input class="form-check-input" type="radio" name="gender" value="Nữ" id="defaultCheck2">
                  <label class="form-check-label" for="defaultCheck2">
                    Nữ
                  </label>
                </div>
              </div>
              <!--/ [col] -->
              <div class="col-sm-6">

                <label for="city" class="required">Địa chỉ</label>
                <input class="input form-control" type="text" name="txtAddress" id="city">

              </div>
              <!--/ [col] -->
              <div class="col-sm-6">
                <label for="telephone" class="required">Phone</label>
                <input class="input form-control" type="text" name="txtPhone" id="telephone">
              </div>
              <!--/ [col] -->
              <div class="col-sm-6">
                <label for="" class="required">HTTT</label>
                <select name="payment_method" class="form-control">
                  <option value="COD">COD</option>
                  <option value="NHAN_TAI_CUA_HANG">Nhận tại cửa hàng</option>
                  <option value="CHUYEN_KHOAN">Chuyển khoản</option>
                </select>
              </div>
              <!--/ [col] -->
              <div class="col-sm-12">
                <label class="required">Ghi chú</label>
                <textarea rows="5" class="form-control" type="text" name="txtNote"></textarea>
              </div>
              <!--/ [col] -->

              <button type="submit" name="btnCheckout" class="button"><i class="fa fa-angle-double-right"></i>&nbsp; <span>Đặt hàng</span></button>
            </form>
          </div>
          <div class="row">
          <p>Show thông tin thanh toán chuyển khoản</p>    
        </div>
        </div>
      </div>

    </div>
  </div>
</section>