<?php
session_start();
include "header.php"
    ?>
<body>
    <form class="text-center" method="post">
        <h2 class="fw-bold">Add advert</h2>
        <div class="d-flex justify-content-evenly">
            <div>
                <div class="form-floating mb-3">
                    <input name="title" type="text" class="form-control shadow-none" id="floatingInput"
                        placeholder="Title"></input>
                    <label for="floatingInput">Title</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="city" class="form-control shadow-none" placeholder="City"
                        id="floating"></input>
                    <label for="floating">City</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="country" type="text" class="form-control shadow-none" id="floating"
                        placeholder="Country"></input>
                    <label for="floating">Country</label>
                </div>
                <div class="form-floating mb-3">
                    <input name="date" type="date" class="form-control shadow-none" id="floating"
                        placeholder="Date"></input>
                    <label for="floating">Date</label>
                </div>
            </div>
            <div>
                <div class="form-floating mb-3">
                    <input name="price" type="number" class="form-control shadow-none" id="floatingPassword"
                        placeholder="Price"></input>
                    <label for="floatingPassword">Price</label>
                </div>
                <div class="form-floating mb-3">
                    <select name="type" class="form-control shadow-none" aria-label=".form-select" id="type">
                        <option value="#"></option>
                        <option value="sale">Selling</option>
                        <option value="rent">Renting</option>
                    </select>
                    <label for="Type">Type</label>
                </div>
                <div class="form-floating mb-3">
                    <select name="Category" class="form-control shadow-none" aria-label=".form-select" id="Category">
                        <option value="#"></option>
                        <option value="apartment">Apartment</option>
                        <option value="house">House</option>
                        <option value="villa">Villa</option>
                        <option value="office">Office</option>
                        <option value="land">land</option>
                    </select>
                    <label for="Category">Category</label>
                </div>
                <div class="input-group mb-3">
                    <input type="file" id="Image" class="form-control" 
                        aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
                </div>
                <div id="upload">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center mb-3 mt-3">
            <button name="add" type="submit" class="btn btn-primary">ADD</button>
        </div>
    </form>
    <script>
        let i = 0;
        let addedimages = document.getElementById("inputGroupFileAddon04")
        addedimages.addEventListener('click', function () {
            i++
            let image = document.getElementById("Image");
            let div = document.getElementById("upload");
            let input = document.createElement('div')
            input.innerHTML = `<div class="input-group mb-3">
    <div class="input-group-text">
        <input class="form-check-input mt-0" type="Radio" value="${image.value}" name="is_principal" aria-label="Checkbox for following text input">
    </div>
    <input name='image${i}' type="text" class="form-control" aria-label="Text input with checkbox" value="${image.value}">
</div>`;
            image.value = ""
            div.append(input);
        })
    </script>
</body>
<?php
class Announcement
{
    public $title;
    public $price;
    public $publication_date;
    public $City;
    public $Country;
    public $category;
    public $type;
    public $images;
    public function __construct($title, $price, $publication_date, $City, $Country, $category, $type, $images)
    {
        $this->title = $title;
        $this->price = $price;
        $this->publication_date = $publication_date;
        $this->City = $City;
        $this->Country = $Country;
        $this->category = $category;
        $this->type = $type;
        $this->images = $images;
    }
}
function check_type($var, $image_principal)
{
    if ($var == $image_principal) {
        $type = true;
    } else {
        $type = false;
    }
    return $type;
}
if (isset($_POST["add"])) {
    $title = $_POST["title"];
    $city = $_POST["city"];
    $country = $_POST["country"];
    $date = $_POST["date"];
    $price = $_POST["price"];
    $type = $_POST["type"];
    $Category = $_POST["Category"];
    $image_principal = $_POST["is_principal"];
    $images = array();
    for ($i = 1; $i <= 5; $i++) {
        $image['name'] = "image$i";
        $image['path'] = $_POST["image$i"];
        $image['type'] = check_type($_POST["image$i"], $image_principal);
        array_push($images, $image);
    }
    $ad = new Announcement($title, $price, $date, $city, $country, $Category, $type, $images);
    // echo "<pre>";
    // var_dump($ad->type);
    // var_dump($ad->category);
    // var_dump($ad->Country);
    // var_dump($ad->City);
    // echo "</pre>";
    require 'connect.php';
    // $sql = "SELECT client_id FROM `client` WHERE client_id LIKE 1";
    // $stmt = $conn->prepare($sql);
    // $stmt->execute();
    // $client_id = $stmt->fetch(PDO::FETCH_ASSOC);
    // if ($client_id) {
    //     $client_id = $client_id['client_id'];
    // }
    $client_id = $_SESSION['client_id'];
    
    $sql = "INSERT INTO `annonce`(`ad_id`, `title`, `price`, `publication_date`, `last_modification_date`, `address`, `City`, `Contry`, `category`, `type`, `client_id`) VALUES (null,'$ad->title','$ad->price','$ad->publication_date',NOW(),'$ad->City,$ad->Country','$ad->City','$ad->Country','$ad->category','$ad->type','$client_id')";
    $conn->exec($sql);
    $last_id = $conn->lastInsertId();

    for ($i = 0; $i < count($ad->images); $i++) {
        $sql = "INSERT INTO `image_d_annonce`(`Id_Image_d_annonce`, `image_url`, `Is_principale`, `ad_id`)
    VALUES (null, '{$ad->images[$i]['path']}', '{$ad->images[$i]['type']}', '$last_id')";
        $conn->exec($sql);
    }

}
?>