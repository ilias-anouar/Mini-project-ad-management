{/* <div class="input-group mb-3">
    <div class="input-group-text">
        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
    </div>
    <input type="text" class="form-control" aria-label="Text input with checkbox">
</div> */}
let addedimages = document.getElementById("inputGroupFileAddon04")
addedimages.addEventListener('click', function () {
    let image = document.getElementById("Image").value;
    let input = `<div class="input-group mb-3">
    <div class="input-group-text">
        <input class="form-check-input mt-0" type="checkbox" value="" aria-label="Checkbox for following text input">
    </div>
    <input type="text" class="form-control" aria-label="Text input with checkbox" value="${image}">
</div>`;
    let div = document.getElementById("upload");
    div.appendChild(input);
})