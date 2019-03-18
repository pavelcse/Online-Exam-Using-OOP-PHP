<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
    include_once ("../classes/User.php");
    $usr = new User();

    if(isset($_GET['desable'])){
        $desableid = (int)$_GET['desable'];
        $desableuser = $usr->desableUser($desableid);
    }
    if(isset($_GET['enable'])){
        $enableid = (int)$_GET['enable'];
        $enableuser = $usr->enableUser($enableid);
    }
    if(isset($_GET['remove'])){
        $removeid = (int)$_GET['remove'];
        $removeuser = $usr->removeUser($removeid);
    }
?>
<div class="main">
    <h1>User Management</h1>
    <?php
        if(isset($desableuser)){
            echo $desableuser;
        }
        if(isset($enableuser)){
            echo $enableuser;
        }
        if(isset($removeuser)){
            echo $removeuser;
        }
    ?>
    <div class="manageuser">
    	<table class="tblone">
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th> 
            </tr>
            <?php 
                $allUser = $usr->getAllUser();
                if($allUser){
                    $i = 0;
                    while ($data = $allUser->fetch_assoc()) {
                        $i++;
            ?>
            <tr>
                <td>
                    <?php
                        if($data['status'] == 1){ 
                            echo "<span style='color: red'>".$i."</span>";
                        } else{
                            echo $i;
                        }
                    ?>
                </td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td>
                <?php 
                    if($data['status'] == 0){
                ?>
                    <a onclick="return confirm('Are You Sure To Desable?')" href="?desable=<?php echo $data['userid']; ?>">Desable</a>
                <?php    
                    }else{
                ?>
                    <a onclick="return confirm('Are You Sure To Enable?')" href="?enable=<?php echo $data['userid']; ?>">Enable</a>
                <?php
                    }
                ?>
                    || <a onclick="return confirm('Are You Sure To Remove?')" href="?remove=<?php echo $data['userid']; ?>">Remove</a>
                </td>
            </tr>
            <?php
                    }
                }
            ?>
        </table>
    </div>


	
</div>
<?php include 'inc/footer.php'; ?>