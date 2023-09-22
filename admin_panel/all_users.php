<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-secondary text-light">
        <?php
        $get_users="select * from `user_details`";
        $result=mysqli_query($con,$get_users);
        $row_count=mysqli_num_rows($result);
        
        echo" <tr>
        <th>Slno.</th>
        <th>usename</th>
        <th>email</th>
        <th>image</th>
        <th>address</th>
        <th>mobile</th>
        <th>delete</th>
    </tr>
    </thead>
    <tbody>";
    if($row_count==0)
    {
        echo "<h2 class='bg-danger text-center mt-5'>No users</h2>";
    }
    else{
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $user_id=$row_data['user_id'];
            $username=$row_data['username'];
            $user_email=$row_data['user_email'];
            $user_image=$row_data['user_image'];
            $user_address=$row_data['user_address'];
            $user_contact=$row_data['user_contact'];
            $number++;
            echo "<tr>
            <td>$number</td>
            <td>$username</td>
            <td>$user_email</td>
            <td><img style='width:50%;text-align:center;'src='../user_panel/user_images/$user_image'</td>
            <td>$user_address</td>
            <td>$user_contact</td>
            <td><a href='./index.php?delete_users=<?php echo $user_id?>' class='text-dark'type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
        }
    }
        ?>
       
  
      
    </tbody>
</table>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>Are you sure?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><a class="text-light text-decoration-none"href="./index.php?all_users">No</a></button>
        <button type="button" class="btn btn-primary"><a href="./index.php?delete_users=<?php echo $user_id?>"class=" text-decoration-none text-light">Yes</a></button>
      </div>
    </div>
  </div>
</div>