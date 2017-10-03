function previewImage() {
	document.getElementById("image-preview").style.display = "block";
	var oFReader = new FileReader();
 		oFReader.readAsDataURL(document.getElementById("image-source").files[0]);

	oFReader.onload = function(oFREvent) {
  		document.getElementById("image-preview").src = oFREvent.target.result;
	};
};

function konfirmasi_edit() {
    tanya2 = confirm("Anda yakin ingin mengedit data ini ?");
    if (tanya2==true) return true;
    else return false;
};