<div class="pcoded-main-container dataTables_wrapper">
    <div class="pcoded-content">
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="me-auto p-2">
                            <h3>View Enquiry data</h3>
                        </div>
                        <span class="p-2">
                            <button id="downloadExcel"><i class="feather icon-file-text"></i></button>
                        </span>
                    </div>
                    <div class="card-body">
                        <table id="table_id" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile Number</th>
                                    <th scope="col">Service </th>
                                    <th scope="col"> Message</th>
                                    <th scope="col">Date</th>
                                   
                                    <th scope="col">Option</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $c = 1;
                                foreach ($consultation_view as $row): ?>
                                <tr>
                                    <th scope="row">
                                        <?= $c++; ?>
                                    </th>
                                    <td><?= $row->name ?></td>
                                    <td><?= $row->email ?></td>
                                    <td><?= $row->mobile ?></td>
                                    <td><?= $row->service ?></td>
                                    <td><?= $row->message ?></td>
                                    <td><?= $row->date ?></td>
                                  
                                    <td>
                                        <a href="<?= base_url('admin/contact/consultation_delete/' . $row->id); ?>"
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
<script>
document.getElementById('downloadExcel').addEventListener('click', function() {
    var table = document.getElementById('table_id');
    var sheet = XLSX.utils.table_to_sheet(table);
    var workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, sheet, 'Sheet1');
    XLSX.writeFile(workbook, 'users.xlsx');
});
</script>