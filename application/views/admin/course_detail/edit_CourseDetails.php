<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <?php
                        foreach ($course_detail_view as $row) { ?>
                            <h5>Edit Course Details</h5>
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
                            <form class="form-horizontal"
                                action="<?= base_url('admin/Course_Detail/course_detail_update_data') ?>" method="post"
                                enctype="multipart/form-data">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                    value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="seo_title">Seo Title</label>
                                        <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                        <input type="text" name="seo_title" class="form-control"
                                            value="<?= $row->seo_title ?>" id="seo_title"
                                            placeholder="Enter seo title">
                                        <?php echo form_error('seo_title'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="seo_desc">Seo Description</label>
                                        <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                        <input type="text" name="seo_desc" class="form-control"
                                            value="<?= $row->seo_desc ?>" id="seo_desc"
                                            placeholder="Enter seo description">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="keywords">Seo Keywords</label>
                                        <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                        <input type="text" name="seo_keywords" class="form-control"
                                            value="<?= $row->seo_keywords ?>" id="seo_keywords"
                                            placeholder="Enter keywords">
                                        <?php echo form_error('seo_keywords'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="course_name">Course Name</label>
                                        <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                        <input type="text" name="course_name" class="form-control"
                                            value="<?= $row->course_name ?>" id="course_name"
                                            placeholder="Enter course_name">
                                        <?php echo form_error('course_name'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="course_image">Course Image</label>
                                        <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                        <input type="file" name="course_image" class="form-control"
                                            value="<?= $row->course_image ?>" id="course_image"
                                            placeholder="Enter Course Image" multiple>
                                        <?php echo form_error('course_image'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="course_author">Course Author</label>
                                        <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                        <input type="text" name="course_author" class="form-control"
                                            value="<?= $row->course_author ?>" id="course_author"
                                            placeholder="Enter Course Author">
                                        <?php echo form_error('course_author'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="c_category">Course Category</label>
                                        <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                        <input type="text" name="c_category" class="form-control"
                                            value="<?= $row->c_category ?>" id="c_category"
                                            placeholder="Enter Course Category">
                                        <?php echo form_error('c_category'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="course_mode">Course Mode</label>
                                        <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                        <input type="text" name="course_mode" class="form-control"
                                            value="<?= $row->course_mode ?>" id="course_mode"
                                            placeholder="Enter Course Mode">
                                        <?php echo form_error('course_mode'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="course_language">Course Language</label>
                                        <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                        <input type="text" name="course_language" class="form-control"
                                            value="<?= $row->course_language ?>" id="course_language"
                                            placeholder="Enter Course language">
                                        <?php echo form_error('course_language'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="course_lessons">Course Lessons</label>
                                        <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                        <input type="text" name="course_lessons" class="form-control"
                                            value="<?= $row->course_lessons ?>" id="course_lessons"
                                            placeholder="Enter Course Lessons">
                                        <?php echo form_error('course_lessons'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="intro_video">Course Introduction Video</label>
                                        <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                        <input type="file" name="intro_video" class="form-control"
                                            value="<?= $row->intro_video ?>" id="intro_video"
                                            placeholder="Enter Course Image">
                                        <?php echo form_error('intro_video'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="course_duration">Course Duration</label>
                                        <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                        <input type="text" name="course_duration" class="form-control"
                                            value="<?= $row->course_duration ?>" id="course_duration"
                                            placeholder="Enter course Duration">
                                        <?php echo form_error('course_duration'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="course_status">Course Status</label>
                                        <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                        <input type="text" name="course_status" class="form-control"
                                            value="<?= $row->course_status ?>" id="course_status"
                                            placeholder="Enter Course Status">
                                        <?php echo form_error('course_status'); ?>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="exampleFormControlTextarea1">Long Description</label>
                                        <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                        <textarea class="form-control" name="long_description"
                                            id="long_description"> <?= $row->long_description ?></textarea>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="course_price">Course price</label>
                                        <input type="hidden" id="id" name="id" value="<?= $row->id ?>" class="form-control">
                                        <input type="text" name="course_price" class="form-control"
                                            value="<?= $row->course_price ?>" id="course_price"
                                            placeholder="Enter Course price">

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
            CKEDITOR.replace('long_description', {
                format_tags: 'p;h1;h2;h3;h4;h5;h6'
            });
        </script>