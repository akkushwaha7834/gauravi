<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <?php
                        foreach ($service_view as $row) { ?>
                            <h5>Edit service</h5>
                            <?php if (isset($msg) || validation_errors() !== '') : ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <?= validation_errors(); ?>
                                    <?= isset($msg) ? $msg : ''; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                </div>
                            <?php endif; ?>
                    </div>
                    <div class="card-body font-weight-bold">
                        <form class="form-horizontal" action="<?= base_url('admin/service/service_update_data') ?>"
                            method="post" enctype="multipart/form-data">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                    <label for="seo_desc">Seo Title</label>
                                    <input type="text" name="seo_title" class="form-control"
                                        value="<?= $row->seo_title ?>" id="seo_title" placeholder="Enter Seo Title">
                                    <?php echo form_error('seo_title'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="seo_desc">Seo Desc</label>
                                    <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                    <input type="text" name="seo_desc" class="form-control"
                                        value="<?= $row->seo_desc ?>" id="seo_desc" placeholder="Enter Seo Desc">
                                    <?php echo form_error('seo_desc'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="seo_keywords">Meta Tags</label>
                                    <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                    <input type="text" name="seo_keywords" class="form-control"
                                        value="<?= $row->seo_keywords ?>" id="seo_keywords"
                                        placeholder="Enter seo keywords">
                                    <?php echo form_error('seo_keywords'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="slug">Slug</label>
                                    <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                    <input type="text" name="slug" class="form-control" value="<?= $row->slug ?>"
                                        id="slug" placeholder="Enter Slug">
                                    <?php echo form_error('slug'); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="service_image">service Image</label>
                                    <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                    <input type="file" name="service_image" class="form-control"
                                        value="<?= $row->service_image ?>" id="service_image" placeholder="Enter service Image">
                                    <?php echo form_error('service_image'); ?>
                                </div>
                                <?php if (isset($row->service_image)) { ?>
                                    <label for="service_image"> </label>
                                    <div class="form-group col-md-2">
                                        <img src="<?php echo base_url('images/') . $row->service_image; ?>"
                                            style="width:50px;height:80px">
                                        <input type="hidden" value="<?= $row->service_image ?>" name="update_image" id="update_image">
                                    </div>
                                <?php } ?>
                                <div class="form-group col-md-6">
                                    <label for="service_name">service Name</label>
                                    <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                    <input type="text" name="service_name" class="form-control"
                                        value="<?= $row->service_name ?>" id="service_name" placeholder="Enter service_name">
                                    <?php echo form_error('service_name'); ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="long_desc">Long Description</label>
                                    <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                    <textarea type="text" name="long_desc" class="form-control" id="service_desc"
                                        placeholder="Enter service Description"><?= $row->long_desc ?></textarea>
                                    <?php echo form_error('long_description'); ?>
                                </div>
                            </div>
                            <input type="submit" class="btn  btn-dark" name="submit" value="Add">
                        </form>
                    </div>
                <?php } ?>
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