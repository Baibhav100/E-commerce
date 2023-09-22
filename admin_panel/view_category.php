<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="text-center bg-secondary text-light">
       <tr>
       <th>Slno.</th>
        <th>Category Title</th>
        <th>Edit</th>
        <th>delete</th>
       </tr>
    </thead>
    <tbody class="text-center">
        <?php
        $select_cat="select * from `categories`";
        $result_cat=mysqli_query($con,$select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($result_cat))
        {
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];
            $number++;
     
        ?>
        <tr>
            <td><?php echo $number?></td>
            <td><?php echo $category_title?></td>
            <td><a href='./index.php?edit_category=<?php echo $category_id?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='./index.php?delete_category=<?php echo $category_id?>' class='text-dark'type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }?>
        
    </tbody>

</table>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>Are you sure?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a class="text-light text-decoration-none"href="./index.php?view_category">No</a></button>
        <button type="button" class="btn btn-primary"><a href="./index.php?delete_category=<?php echo $category_id?>"class=" text-decoration-none text-light">Yes</a></button>
      </div>
    </div>
  </div>
</div>