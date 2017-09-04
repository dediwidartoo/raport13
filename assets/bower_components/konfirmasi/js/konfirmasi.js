function previewImage() {
	document.getElementById("image-preview").style.display = "block";
	var oFReader = new FileReader();
 		oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

	oFReader.onload = function(oFREvent) {
  		document.getElementById("image-preview").src = oFREvent.target.result;
	};
};

function konfirmasi_tambah() {
    tanya = confirm("Anda yakin ingin menambah data ini ?");
    if (tanya==true) return true;
    else return false;
};