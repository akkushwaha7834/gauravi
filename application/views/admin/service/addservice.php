<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Add service</h5>
                        <?php if (isset($msg) || validation_errors() !== '') : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?= validation_errors(); ?>
                            <?= isset($msg) ? $msg : ''; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="<?= base_url('admin/Service/service_submit_data') ?>"
                            method="post" enctype="multipart/form-data">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="form-row">
                                <!-- <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="form-label">Seo Title<span class="text-danger">*</span> </label>
                                    <input type="text" name="seo_title" parsley-trigger="change" class="form-control" id="seo_title" placeholder="Seo Ttitle" required>
                                </div> -->
                                <div class="form-group col-md-6">
                                    <label for="seo_desc">Seo Title</label>
                                    <input type="text" name="seo_title" class="form-control"
                                        value="<?= $row->seo_title ?>" id="seo_title" placeholder="Enter Seo Title">
                                    <?php echo form_error('seo_title'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="form-label">Seo Description<span
                                            class="text-danger">*</span> </label>
                                    <input type="text" name="seo_desc" parsley-trigger="change" class="form-control"
                                        id="seo_desc" placeholder="Seo Description" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="form-label">Meta Tags<span
                                            class="text-danger">*</span> </label>
                                    <input type="text" name="seo_keywords" parsley-trigger="change" class="form-control"
                                        id="seo_keywords" placeholder="Meta Tags" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="form-label">Slug<span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="slug" parsley-trigger="change" class="form-control"
                                        id="slug" placeholder="Slug" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="formFileMultiple" class="form-label">service Image</label>
                                    <input class="form-control" name="service_image" type="file" id="service_image" multiple>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="form-label">service Name<span
                                            class="text-danger">*</span> </label>
                                    <input type="text" name="service_name" parsley-trigger="change" class="form-control"
                                        id="service_name" placeholder="service" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="form-label"> Long Description<span
                                            class="text-danger">*</span> </label>
                                    <textarea type="text" name="long_desc" parsley-trigger="change" class="form-control"
                                        id="long_desc" placeholder="write description" required></textarea>
                                </div>
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
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('long_desc', {
    format_tags: 'p;h1;h2;h3;h4;h5;h6'
});
</script>