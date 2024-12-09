<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Generate OTP</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body my-form-body">
                    <?php if(validation_errors() !== ''): ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                        <?= validation_errors();?>
                    </div>
                    <?php endif; ?>
                    <form class="form-horizontal" method="post"
                        action="<?= base_url('admin/users/generateOtp'); ?>">
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">New Password</label>
                            <div class="col-sm-8">
                                <input type="text" name="password" class="form-control" id="password" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-11">
                                <input type="submit" name="submit" value="Change Password"
                                    class="btn btn-info pull-right">
                            </div>
                        </div>
					</form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>

</section>