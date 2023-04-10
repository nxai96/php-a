<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <?php 
    // var_dump($_GET);
    if(isset($_GET['id'])){
        require_once("./condb.php");
        $sql =$conn->prepare("SELECT * FROM users WHERE id=?");
        $sql->execute([$_GET['id']]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        if($sql->rowCount()<1){
            header("location:admin_page.php");
            exit();
        }
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>ຟອມແກ້ໄຂຂໍ້ມູນ</h4>
                <form action="formedit_db.php" method="post">
                <div class="mb-1">
                    <label for="username">username</label>
                    <input type="text" name="username" class="form-control" value="<?= $row['username'] ?>" >
                </div>
                <div class="mb-1">
                    <label for="password">password</label>
                    <input type="password" name="password" class="form-control" value="<?= $row['password'] ?>" >
                </div>
                <div class="mb-1">
                    <label for="firstname">firstname</label>
                    <input type="text" name="firstname" class="form-control" value="<?= $row['firstname'] ?>" >
                </div>
                <div class="mb-1">
                    <label for="lastname">lastname</label>
                    <input  type="text" name="lastname" class="form-control" value="<?= $row['lastname'] ?>" >
                </div>
                <div class="mb-1">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit" class="btn btn-success">ບັນທຶກຂໍ້ມູນ</button>
                    <a href="./admin_page.php" class="btn btn-warning">ກັບຄືນ</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>