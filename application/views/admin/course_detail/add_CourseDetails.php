<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Add Course Details</h5>
                        <?php if (isset($msg) || validation_errors() !== ''): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?= validation_errors(); ?>
                                <?= isset($msg) ? $msg : ''; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">

                        <form class="form-horizontal"
                            action="<?= base_url('admin/Course_Detail/course_detail_submit_data') ?>" method="post"
                            enctype="multipart/form-data">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                value="<?php echo $this->security->get_csrf_hash(); ?>">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="form-label">Seo Title<span
                                            class="text-danger">*</span> </label>
                                    <input type="text" name="seo_title" parsley-trigger="change" class="form-control"
                                        id="seo_title" placeholder="Seo Title" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlTextarea1">Seo Description</label>
                                    <textarea class="form-control" name="seo_desc"
                                        id="seo_desc" rows="3"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="form-label">Seo Keywords<span
                                            class="text-danger">*</span> </label>
                                    <input type="text" name="seo_keywords" parsley-trigger="change"
                                        class="form-control" id="seo_keywords" placeholder="Keywords" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="form-label">Course Name<span
                                            class="text-danger">*</span> </label>
                                    <input type="text" name="course_name" parsley-trigger="change" class="form-control"
                                        id="course_name" placeholder="Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="formFileMultiple" class="form-label">Course Image</label>
                                    <input class="form-control" name="course_image" type="file" id="course_image"
                                        multiple>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="form-label">Course Author<span
                                            class="text-danger">*</span> </label>
                                    <input type="text" name="course_author" parsley-trigger="change"
                                        class="form-control" id="course_author" placeholder="Course Author" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="c_category">Course Category</label>
                                    <select id="c_category" name="c_category" class="form-control">
                                        <option selected>Select Course Category</option>
                                        <?php
                                        $role_fetch_data = $this->Course_Detail_Model->role_fetch();
                                        foreach ($role_fetch_data as $data) { ?>
                                            <option value="<?php echo $data['id']; ?>"><?php echo $data['c_category']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="course_mode">Course Mode</label>
                                    <select id="course_mode" name="course_mode" class="form-control">
                                        <option selected>Select Course Mode</option>
                                        <option value="online">Online</option>
                                        <option value="offline">Offline</option>
                                        <option value="recorded">Recorded</option>
                                        <option value="E-Book">E-Book</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="course_language">Course Language</label>
                                    <select id="course_language" name="course_language" class="form-control">
                                        <option selected>Select Course Language</option>
                                        <?php
                                        $role_fetch_data = $this->Course_Detail_Model->language_fetch();
                                        foreach ($role_fetch_data as $data) { ?>
                                            <option value="<?php echo $data['id']; ?>"><?php echo $data['Language']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="form-label">Course Lessons<span
                                            class="text-danger">*</span> </label>
                                    <input type="text" name="course_lessons" parsley-trigger="change"
                                        class="form-control" id="course_lessons" placeholder="Course Lessons" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="formFileMultiple" class="form-label">Course Introduction Video</label>
                                    <input class="form-control" name="intro_video" type="file" id="intro_video"
                                        multiple>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="form-label">Course Duration<span
                                            class="text-danger">*</span> </label>
                                    <input type="text" name="course_duration" parsley-trigger="change"
                                        class="form-control" id="course_duration" placeholder="Course Duration"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="form-label">Course Status<span
                                            class="text-danger">*</span> </label>
                                    <input type="text" name="course_status" parsley-trigger="change"
                                        class="form-control" id="course_status" name="course_status"
                                        placeholder="Status" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="form-label">Course Price<span
                                            class="text-danger">*</span> </label>
                                    <input type="text" name="course_price" parsley-trigger="change" class="form-control"
                                        id="course_price" placeholder="Course Price" required>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleFormControlTextarea1">Long Description</label>
                                <textarea class="form-control" name="long_description" id="long_description"></textarea>
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

    CKEDITOR.replace('long_description', {

        format_tags: 'p;h1;h2;h3;h4;h5;h6'

    });

</script>