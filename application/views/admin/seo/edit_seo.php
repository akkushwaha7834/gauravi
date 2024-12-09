<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <?php
                        foreach ($seo_view as $row) { ?>
                            <h5>Edit SEO</h5>
                            <?php if (isset($msg) || validation_errors() !== ''): ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <?= validation_errors(); ?>
                                    <?= isset($msg) ? $msg : ''; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                </div>
                            <?php endif; ?>
                    </div>
                    <div class="card-body font-weight-bold">
                        <form class="form-horizontal" action="<?= base_url('admin/seo/seo_update_data') ?>"
                            method="post" enctype="multipart/form-data">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <input type="hidden" name="id" value="<?= $row->id ?>">
                            <div class="form-group col-md-6">
                                <label for="page_name" class="form-label">Page Name <span
                                        class="text-danger">*</span></label>
                                <select id="page_name" name="page_name" class="form-control" required>
                                    <option selected>Select Page Name</option>
                                    <?php
                                    $role_fetch_data = $this->Seo_model->role_fetch();
                                    foreach ($role_fetch_data as $data) { ?>
                                        <option value="<?php echo $data['page_name']; ?>" <?php if($data['page_name']==$row->page_name){echo "selected";} ?>><?php echo $data['page_name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('page_name'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="seo_title" class="form-label">SEO Title <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="seo_title" class="form-control" id="seo_title"
                                    value="<?= $row->seo_title ?>" placeholder="SEO Title" required>
                                <?php echo form_error('seo_title'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="seo_desc" class="form-label">SEO Description <span
                                        class="text-danger">*</span></label>
                                <textarea name="seo_desc" class="form-control" id="seo_desc"
                                    placeholder="SEO Description" required><?= $row->seo_desc ?></textarea>
                                <?php echo form_error('seo_desc'); ?>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="seo_keywords" class="form-label">SEO Keywords <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="seo_keywords" class="form-control" id="seo_keywords"
                                    value="<?= $row->seo_keywords ?>" placeholder="SEO Keywords" required>
                                <?php echo form_error('seo_keywords'); ?>
                            </div>
                            <input type="submit" class="btn btn-dark" id='submit' name="submit" value="Update">
                        </form>

                    </div>
                <?php } ?>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->