<?php


$servername="localhost";
$username="root";
$password="";
$database="notes";

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn)
{
  die ("not connect database");

}

if ($_SERVER ['REQUEST_METHOD']== 'POST')
{
    if(isset($_POST["idsEdit"]))
    {   $titel=$_POST["titelEdit"];
        $desc=$_POST["descEdit"];
        $id=$_POST["idsEdit"];
        

$sql="UPDATE note SET titel = '$titel',desc='$desc' WHERE ids = $ids";
 
$r=mysqli_query($conn,$sql);
if($r)
{
    echo  "update is seccussefully ";
}
else
{
   echo "not is upadate is note";
}
    }
  else{
    
     $titel=$_POST["titel"];
    $desc=$_POST["desc"];

$sql="INSERT INTO `note` ( `titel`, `desc`) VALUES ( '$titel', '$desc' )";
 $r=mysqli_query($conn,$sql);
      
if
($r)
{
  $inset=true;
  //echo"record in insert ";
  $update=true;
  $edit=true;
}
else
{
  $inset=false;
  $update=false;
  $delete=false;
  //echo "not in insert the rocord".mysqli_error($conn);
}
}  
}     
?>

    <!doctype html>
    <html lang="eng" dir="ltr">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

        <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
        <title>inotes </title>

    </head>

    <body>

        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel">edit note</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="http://localhost/vivek/crud/index.php" method="POST">
                            <input type="hidden" name="idEdit" id="idEdit" Required>

                            <div class="mb-3">
                                <label for="notet" class="form-label">note titel</label>
                                <input type="text" class="form-control" id="titelEdit " name="titelEdit" Required>
                            </div>

                            <div class="mb-3">
                                <label for="desc" class="form-label">note descretion</label>
                                <textarea class="form-control" placeholder="Leave a comment here" name="descEdit" id="descEdit" style="height: 100px"></textarea>

                            </div>
                            <button type="submit" class="u btn btn-primary">update note</button>
                    </div>

                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>

        <!-- navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">I NOTES  </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">about As </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">content As </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <?php
      if($inset=true)
      {
        echo"<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>success</strong> you note has been successfuly .
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
      }
      
      
      ?>
            <div class="container my-5">
                <h2> Add to note </h2>
                <form action="http://localhost/vivek/crud/index.php" method="post">
                    <div class="mb-3">
                        <label for="notet" class="form-label">note titel</label>
                        <input type="text" class="form-control" id="titel" name="titel" Required>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">note descretion</label>
                        <textarea class="form-control" placeholder="Leave a comment here" name="desc" id="desc" style="height: 100px" Required></textarea>

                    </div>
                    <button type="submit" class="btn btn-primary">Add note</button>
            </div>

            </form>
            </div>
            <div class="container" my-5>

                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">notes titel</th>
                            <th scope="col">Descretion</th>
                            <th scope="col">Action's</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
      
      $sql="select * from note";
      $r=mysqli_query($conn,$sql);
     $ids=0;
     while($row=mysqli_fetch_assoc($r))
          {$ids=$ids+1;
            echo "<tr>
      <th scope='row'>".$ids."</th>
      <td>".$row['titel']."</td>
      <td>".$row['desc']."</td>
      <td><button class='edit btn btn-sm btn-primary' id=".$row['ids']."> edit </button> 
      <button class='delete btn btn-sm btn-primary' id=d".$row['ids']."> delete </button></td>
    </t>";
       }
      ?>

                            <div class="container my-5">
                    </tbody>
                </table>
                </div>
                <hr>

                <!-- Optional Jquery; choose one of the two! -->
                <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

                <!-- Option 1: Bootstrap Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

                <!-- Option 2: Separate Popper and Bootstrap JS -->

                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
                <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
                <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#myTable').DataTable();
                    });
                </script>
                <script>
                    const $edit = document.getElementsByClassName('edit');

                    // Convert the HTMLCollection to an array
                    Array.from($('edit')).forEach((element) => { // Corrected: Array.from($edit)
                        element.addEventListener("click", (e) => { //Corrected: addEventListener
                            console.log("edit");
                            const tr = e.target.parentNode.parentNode;
                            const titel = tr.getElementsByTagName('td')[0].innerText; // Corrected: getElementsByTagName, innerText
                            const desc = tr.getElementsByTagName('td')[1].innerText; // Corrected: getElementsByTagName, innerText
                            console.log(titel, desc);
                            titelEdit.value = titel;
                            descEdit.value = desc;
                            idEdit.value = e.target.id;
                            console.log(e.target.id);
                            $('#editModal').modal('toggle');

                        });
                    });


                    const $delete = document.getElementsByClassName('delete');

                    // Convert the HTMLCollection to an array
                    Array.from($('.delete')).forEach((element) => { // Corrected: Array.from($edit)
                        element.addEventListener("click", (e) => { //Corrected: addEventListener
                            console.log("delete");
                            const tr = e.target.parentNode.parentNode;
                            const titel = tr.getElementsByTagName('td')[0].innerText; // Corrected: getElementsByTagName, innerText
                            const desc = tr.getElementsByTagName('td')[1].innerText; // Corrected: getElementsByTagName, innerText
                            const $ids = e.target.id;
                            const idvalue = $ids.substr(1);
                            window.location = 'http://localhost/vivek/crud/index.php?delete= +$idvalue';
                            if (confirm("delete the note !")) {
                                console.log("yes");
                                
                            } else(
                                console.log("no")
                            )
                        });
                    });
                </script>

    </body>

    </html>