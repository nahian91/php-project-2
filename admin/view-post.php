<?php 

include 'inc/config.php';
include 'inc/header.php'; 

?>

<?php
    $id = $_GET['id'];
    $single_post_sql = "SELECT * FROM post
    LEFT JOIN users ON post.author = users.id
    LEFT JOIN category ON post.category = category.cat_id
    WHERE post_id = '$id'";
    $single_post_query = mysqli_query($con, $single_post_sql);

    $row = mysqli_fetch_assoc($single_post_query);
    $sqldate = strtotime($row['date']);
    $date = date('d M, Y', $sqldate);
?>

<div class="col-xxl-9">
    <table class="table table-border">
        <tr>
            <th>Title</th>
            <td><?php echo $row['title'];?></td>
        </tr>
        <tr>
            <th>Description</th>
            <td><?php echo $row['description'];?></td>
        </tr>
        <tr>
            <th>Image</th>
            <td><img src="images/<?php echo $row['image'];?>" alt="" style="width:100px"></td>
        </tr>
        <tr>
            <th>Category</th>
            <td><?php echo $row['cat_name'];?></td>
        </tr>
        <tr>
            <th>Author</th>
            <td><?php echo $row['username'];?></td>
        </tr>
        <tr>
            <th>Date</th>
            <td><?php echo $date;?></td>
        </tr>
    </table>
</div>

<?php include 'inc/footer.php'; ?>