<?php
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

                <div class="form-floating  mb-3">
                    <input name="Address" type="text" class="form-control shadow-none" id="floating"
                        placeholder="Address"></input>

                    <label for="floating">Address</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" name="city" class="form-control shadow-none" placeholder="City"
                        id="floating"></input>

                    <label for="floating">City</label>
                </div>

                <div class="form-floating mb-3">
                    <input name="contry" type="text" class="form-control shadow-none" id="floating"
                        placeholder="Contry"></input>

                    <label for="floating">Contry</label>
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
                    <select name="Category" class="form-control shadow-none" aria-label=".form-select" id="type">
                        <option value="#"></option>

                        <option value="apartment">Apartment</option>

                        <option value="house">House</option>
                        <option value="villa">Villa</option>
                        <option value="office">Office</option>
                        <option value="land">land</option>
                    </select>

                    <label for="Type">Category</label>
                </div>

                <div class="input-group">
                    <input type="file" id="Image" class="form-control" id="inputGroupFile04"
                        aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center mb-3 mt-3">
            <button name="add" type="submit" class="btn btn-primary">ADD</button>
        </div>
    </form>
</body>
<?php
if (isset($_POST["add"])) {
    echo 'hiie';
}
?>