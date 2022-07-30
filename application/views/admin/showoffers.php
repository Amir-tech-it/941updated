<div class="content-wrapper" style="min-height: 1302.4px;">
<h2 class="text-center pt-4 pb-4">All Packages </h2>
<div class="table-responsive">
<table class="table table-striped">
  <thead class="thead-dark">
  <tr>
    <th>Offer Title</th>
    <th>Feature 1</th>
    <th>Feature 2</th>
    <th>Feature 3</th>
    <th>Feature 4</th>
    <th>Feature 5</th>
    <!-- <th>Image</th> -->
    <th>Action</th>
  </tr>
</thead>
 <?php
  foreach($data as $row)
  {?>
  <tr>
  <td><?php echo $row->offertitle;?></td>
  <td><?php echo $row->feature1;?></td>
  <td><?php echo $row->feature2;?></td>
  <td><?php echo $row->feature3;?></td>
  <td><?php echo $row->feature4;?></td>
  <td><?php echo $row->feature5;?></td>
  <!--  -->
  <td><a href="admin/offers/edit?edit=<?php echo $row->id; ?>">Edit</a>&nbsp |<a href="admin/offers/delete?del=<?php echo $row->id; ?>"> &nbsp Delete</a></td>
 </tr>
 <?php
  }
   ?>
</table>
</div>
</div>