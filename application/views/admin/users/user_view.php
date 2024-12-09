
<div class="pcoded-main-container">
  <div class="pcoded-content"> 
    <!-- [ Main Content ] start -->
    <div class="row">
      <!-- [ sample-page ] start -->
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5>View User</h5>
            <button id="downloadExcel">Download Excel</button>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table id="table_id" class="table" style="width: 100%; overflow: scroll">
          <thead>
            <tr> 
              <th>Sr No</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Mobile No.</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $c=1;
            foreach($user_view as $row): ?>
            <tr>
              <td><?= $c++; ?></td>
              <td><?= $row->firstname; ?></td>
              <td><?= $row->lastname; ?></td>
              <td><?= $row->email; ?></td>
              <td><?= $row->mobile_no; ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <!-- Button to download Excel -->
      </div>
    </div>
  </div>
 
</div>

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
