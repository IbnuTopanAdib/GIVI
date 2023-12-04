function updatePreview() {
    
    const itemName = document.getElementById('item-name').value;
    const itemDescription = document.getElementById('item-description').value;
    const itemLocation = document.getElementById('item-location').value;
    const itemImage = document.getElementById('item-image').files[0];

    
    document.getElementById('preview-name').innerHTML = 'Nama Barang: ' + itemName;
    document.getElementById('preview-description').innerHTML = 'Deskripsi: ' + itemDescription;
    document.getElementById('preview-location').innerHTML = 'Lokasi: ' + itemLocation;

    
    if (itemImage) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('preview-image').src = e.target.result;
        };
        reader.readAsDataURL(itemImage);
    } else {
        document.getElementById('preview-image').src = ''; 
    }
}


document.getElementById('item-name').addEventListener('input', updatePreview);
document.getElementById('item-description').addEventListener('input', updatePreview);
document.getElementById('item-location').addEventListener('change', updatePreview);
document.getElementById('item-image').addEventListener('change', updatePreview);