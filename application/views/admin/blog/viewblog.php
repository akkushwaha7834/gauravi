<div class="pcoded-main-container dataTables_wrapper">
    <div class="pcoded-content">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>View Blog</h5>
                    </div>
                    <div class="card-body">
                        <table id="table_id" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <!-- <th scope="col">Seo Title</th> -->
                                    <th scope="col">Seo Description</th>
                                    <th scope="col">Meta Tags</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Blog Name</th>
                                    <th scope="col">Blog Image</th>
                                    <th scope="col">Blog Author</th>
                                    <th scope="col">Date of Posting</th>
                                    <!-- <th scope="col">Blog Description</th> -->
                                    <th scope="col">Long Description</th>
                                    <th scope="col">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $c = 1;
                                foreach ($blog_view as $row): ?>
                                <tr>
                                    <th scope="row">
                                        <?= $c++; ?>
                                    </th>
                                    <td><?= substr(strip_tags($row->seo_desc),0,30),'. . .' ?></td>
                                    <td><?= substr(strip_tags($row->seo_keywords),0,30),'. . .' ?></td>
                                    <td><?= $row->slug?></td>
                                    <td><?= $row->blog_name?></td>
                                    <td>
                                        <?php if ($row->blog_image) { ?>
                                        <img src="<?php echo base_url('images/') . $row->blog_image; ?>"
                                            style="width:50px;height:80px">
                                        <?php } ?>
                                    </td>
                                    <td><?= $row->blog_author?></td>
                                    <td><?= $row->blog_date?></td>
                                    <td><?= substr(strip_tags($row->long_desc),0,30),'. . .' ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/Blog/blog_edit/' . $row->id); ?>"
                                            class="btn btn-info btn-flat">
                                            Edit
                                        </a>
                                        <a href="<?= base_url('admin/Blog/blog_delete/' . $row->id); ?>"
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
jQuery(document).ready(function($) {
    $('#table_id').DataTable();
});
</script>