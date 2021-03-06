<?php
session_start();
 if(!isset($_SESSION['admin'])){
  header("location:Login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Twitter admin index</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
        <a class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
              aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
              <i class="bi bi-twitter text-primary p-2"></i>
            </a>

          <a class="navbar-brand text-primary" href="#"> <i class="bi bi-twitter text-primary p-2"></i>Twitter Admin</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-envelope-fill"></i>
                  Tin nhắn
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-bell-fill"></i>
                  Thông báo
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-gear-fill"></i>
                  Cài đặt
                </a>
              </li>
              </a>
              </li>

            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
     <div class="container-fluid">
       <div class="row">
        <div class="col-md-3 sidebar bg-dark">
          <nav class="navbar navbar-expand-md ">
            <div class="collapse navbar-collapse" id="sidebarMenu">
              <ul class="navbar-nav flex-column mt-5">
              <li class="nav-item fs-5  p-0,5 mb-2 mt-5">
                  <a class="nav-link " href="index.php"><i class="bi bi-sliders"></i>
                    Quản lý người dùng
                  </a>
                </li>
                <hr>
                <li class="nav-item fs-5 p-0,5 mb-2">
                  <a class="nav-link " href="tweet.php"><i class="bi bi-file-earmark-text-fill"></i>
                  Quản lý bài viết</a>
                  
                </li>
                <hr>
                <li class="nav-item fs-5 p-0,5 mb-2">
                  <a class="nav-link " href="comment.php"><i class="bi bi-file-earmark-text-fill"></i>
                  Quản lý bình luận</a>
                  
                </li>
                <hr>
                <li class="nav-item fs-5  p-0,5 mb-2">
                  <a class="nav-link " href=""><i class="bi bi-info-circle"></i>
                    Hỗ trợ</a>
                </li>
                <li class="nav-link dropup p-2 fs-4 p-0,5" style="margin-top: 270px;">
                  <a href="#"
                      class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                      id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="text-primary"><i class="bi bi-person-circle"></i>Admin</span><br>
                  </a>
                  <ul class="dropdown-menu text-small shadow " aria-labelledby="dropdownUser2">
                      <li><a class="dropdown-item" href="#">
                              <span><i class="bi bi-person-circle"></i>Admin</span><br>
                          </a>
                      </li>
                      <li><a class="dropdown-item" href="#">Cài Đặt</a></li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                  </ul>
                </li>
                <hr>
            </div>
        </div>


        <div class="col-md-9  mainqlbv">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Mã bài viết</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Mã người dùng</th>
                <th scope="col">Giờ đăng bài</th>
                <th scope="col">Xoá</th>

              </tr>
            </thead>
            <tbody>
            <?php 
            $conn = mysqli_connect('localhost','root','','twitter');
            if(!$conn){
              die("kết nối thất bại");
            }
            $sql = "SELECT * FROM tweet";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){
            ?>
                   <tr> 
                     <th scope="row"><?php echo $row['tweetID'];?></th>
                     <td><?php echo $row['content_status'];?></td>
                     <td><?php echo $row['ma_nguoidung'];?></td>
                     <td> <?php echo $row['postedOn'];?></td>
                     <td><a href="deleteBV.php?id=<?php echo $row['tweetID'];?>"><i class="bi bi-trash-fill"></i></td>
                   <tr>
            
            
            <?php
              }
            }
            ?>

                 
                       

              
            </tbody>
          </table>
        </div>


      
     </div>
      
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>
</body>

</html>