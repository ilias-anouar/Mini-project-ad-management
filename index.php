<?php
include "header.php";
// include_once "./component.php";
include "component.php"
?>
<?php
    // $sql = "SELECT client_id FROM `client` WHERE client_id LIKE 1";
    // $stmt = $conn->prepare($sql);
    // $stmt->execute();
    // $client_id = $stmt->fetch(PDO::FETCH_ASSOC);
    // if ($client_id) {
    //     $client_id = $client_id['client_id'];
    // }
  require "connect.php";
  $sql = "SELECT * FROM `annonce`";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
 $result = $stmt->fetch(PDO::FETCH_ASSOC);
 if ($result) {
  // var_dump($result);
  echo "<pre>";
  foreach($result as $key => $value){
    // var_dump($key);
    echo $value;

  }
  echo "</pre>";
  // output data of each row
  foreach ($result  as $key => $value)  {
    ?>
<div class="container">
                <div class="col-auto col-sm-12 col-md-12 col-lg-4 col-xl-4" style="padding-top: 15px;padding-bottom: 15px;padding-right: 15px;padding-left: 15px;">
                    <div class="bg-light border rounded shadow card" data-bss-hover-animate="pulse">
                        <img class="card-img-top mb-3" src="#" width="400" height="278">
                        <div class="card-body">
                            <div id="icon-span"> <p id="type-an"><?php echo $value ?></p></div>
                            <h3 class="card-title" style="font-family: Antic, sans-serif;color: rgb(81,87,94);"><?php echo $value['Category'] ?></h3>
                            <h5 class="card-sub-title" style="font-family: Antic, sans-serif;color: #38ae53;margin: 13px;margin-top: 10px;margin-right: 20px;margin-bottom: 18px;margin-left: 43px;font-size: 23px; width: 100%; ">
                                <strong><?php echo $value['$price'] ?> | <?php echo $value['$type'] ?> </strong></h5>
                                <p class="card-text" style="font-family: Antic, sans-serif;color: rgb(81,87,94);">Boston</p>
                                <button class="btn btn-danger" id="Edit" style="border: none;width: 100px;height: 38px;background: #9ecad5;" type="button" data-target="#Edit<?php echo $value['Category'] ?>">Edite</button>
                                <button class="btn btn-danger" id ="Details" style="border: none;width: 100px;height: 38px;margin-left: 14px;color: A63F04;background: #A63F04;" type="button" data-target="#Details<?php echo $value['Category'] ?>">Details</button>
                                <button class="btn btn-outline-success" id="Delete" type="button" style="font-weight: normal;font-family: Antic, sans-serif;width: 100px;margin: 22px;" data-target="#Delete<?php echo $value['Category'] ?>">Delete</button></div>
                            </div>
                        </div>
                    </div>
<?php  
 
  };
 
  // $row = $result;
  // component($row['title'],$row['category'],$row['price'],$row['type'],$row["ad_id"] );

} else {
  echo "0 results";
}



?>
















//  foreach($result as $key => $value) {
//                           echo "$value<br>";
//                       //  component($title, $image,$Category,$price, $type, $id)
                            

//  }

                      //   if ($result->num_rows > 0) {
                      //     // output data of each row
                      //     foreach ($row = $result->fetch_assoc()) {
                      //         component($row['title'], $row['image'], $row['Area'], $row['address'], $row['amount'], $row['type'], $row['ID']);
                      //     }
                      // } else {
                      //     echo "0 results";
                      // }
                      // $conn->close();