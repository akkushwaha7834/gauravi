<div class="pcoded-main-container dataTables_wrapper">
    <div class="pcoded-content">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>View Course Details</h5>
                    </div>
                    <div class="card-body">
                        <table id="table_id" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Course Name</th>
                                    <th scope="col">Course Image</th>
                                    <th scope="col">Course Author</th>
                                    <th scope="col">Course Category</th>
                                    <th scope="col">Course Mode</th>
                                    <th scope="col">Course Language</th>
                                    <th scope="col">Course Lessons</th>
                                    <th scope="col">Course Introduction Video</th>
                                    <th scope="col">Course Duration</th>
                                    <th scope="col">Course Status</th>
                                    <th scope="col">Course Description</th>
                                    <th scope="col">Long Description</th>
                                    <th scope="col">Course Price</th>
                                    <th scope="col">SEO Title</th>
                                    <th scope="col">Keywords</th>
                                    <th scope="col">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $c = 1;
                                foreach ($course_detail_view as $row): ?>
                                    <tr>
                                        <th scope="row">
                                            <?= $c++; ?>
                                        </th>
                                        <td><?= $row->course_name?></td>
                                        <td>
                                            <?php if ($row->course_image) { ?>
                                                <img src="<?php echo base_url('images/') . $row->course_image; ?>" style="width:50px;height:80px">
                                            <?php } ?>
                                        </td>
                                        <td><?= $row->course_author?></td>
                                        <td><?= $row->cat_name?></td>
                                        <td><?= $row->course_mode?></td>
                                        <td><?= $row->course_language?></td>
                                        <td><?= $row->course_lessons?></td>
                                        <td>
                                            <?php if ($row->intro_video) { ?>
                                                <img src="<?php echo base_url('intro_videos/') . $row->intro_video; ?>" style="width:50px;height:80px">
                                            <?php } ?>
                                        </td>
                                        <td><?= $row->course_duration?></td>
                                        <td><?= $row->course_status?></td>
                                        <td><?= substr(strip_tags($row->seo_desc),0,20),'. . .' ?></td>
                                        <td><?= substr(strip_tags($row->long_description),0,40),'. . .' ?></td>
                                        <td><?= $row->course_price?></td>
                                        <td><?= $row->seo_title?></td>
                                        <td><?= $row->seo_keywords?></td>
                                        <td>
                                            <a href="<?= base_url('admin/Course_Detail/course_Detail_edit/' . $row->id); ?>"
                                                class="btn btn-info btn-flat">
                                                Edit
                                            </a>
                                            <a href="<?= base_url('admin/Course_Detail/course_detail_delete/' . $row->id); ?>"
                                                class="btn btn-danger btn-flat"
                                                onclick="return confirm('Are you sure want to delete ?');">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<script>
    jQuery(document).ready(function ($) {
        $('#table_id').DataTable();
    });
</script>