<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Add SEO</h5>
                        <?php if (isset($msg) || validation_errors() !== '') : ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?= validation_errors(); ?>
                                <?= isset($msg) ? $msg : ''; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="<?= base_url('admin/seo/seo_submit_data') ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="form-label">Page Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select id="page_name" name="page_name" class="form-control" required>
                                        <option selected>Select Page Name</option>
                                        <?php
                                        $role_fetch_data = $this->Seo_model->role_fetch();
                                        foreach ($role_fetch_data as $data) { ?>
                                            <option value="<?php echo $data['page_name']; ?>"><?php echo $data['page_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            <div class="form-group col-md-12">
                                <label for="inputEmail4" class="form-label">SEO Title<span class="text-danger">*</span> </label>
                                <input type="text" name="seo_title" parsley-trigger="change" class="form-control" id="seo_title" placeholder="SEO Title" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputEmail4" class="form-label">SEO Description<span class="text-danger">*</span> </label>
                                <textarea type="text" name="seo_desc" parsley-trigger="change" class="form-control" id="seo_desc" placeholder="SEO Description" required></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputEmail4" class="form-label">SEO Keywords<span class="text-danger">*</span> </label>
                                <input type="text" name="seo_keywords" parsley-trigger="change" class="form-control" id="seo_keywords" placeholder="SEO Keywords" required>
                            </div>
                            <input type="submit" class="btn  btn-dark" name="submit" value="Add">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->


