var ajaxku = buatajax();

function ajaxkota(id) {
	var url = "checkout/getKab/" + id + "/" + Math.random();
	ajaxku.onreadystatechange = stateChanged;
	ajaxku.open("GET", url, true);
	ajaxku.send(null);
}

function ajaxkec(id) {
	var url = "checkout/getKec/" + id + "/" + Math.random();
	ajaxku.onreadystatechange = stateChangedKec;
	ajaxku.open("GET", url, true);
	ajaxku.send(null);
}

function ajaxkel(id) {
	var url = "checkout/getKel/" + id + "/" + Math.random();
	ajaxku.onreadystatechange = stateChangedKel;
	ajaxku.open("GET", url, true);
	ajaxku.send(null);
}

function buatajax() {
	if (window.XMLHttpRequest) {
		return new XMLHttpRequest();
	}
	if (window.ActiveXObject) {
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
	return null;
}

function stateChanged() {
	var data;
	if (ajaxku.readyState == 4) {
		data = ajaxku.responseText;
		if (data.length >= 0) {
			document.getElementById("kota").innerHTML = data
		} else {
			document.getElementById("kota").value = "<option selected>Pilih Kota/Kab</option>";
		}
		document.getElementById("kab_box").style.display = 'table-row';
		document.getElementById("kec_box").style.display = 'none';
		document.getElementById("kel_box").style.display = 'none';
		document.getElementById("lat_box").style.display = 'none';
		document.getElementById("lng_box").style.display = 'none';
	}
}

function stateChangedKec() {
	var data;
	if (ajaxku.readyState == 4) {
		data = ajaxku.responseText;
		if (data.length >= 0) {
			document.getElementById("kec").innerHTML = data
		} else {
			document.getElementById("kec").value = "<option selected>Pilih Kecamatan</option>";
		}
		document.getElementById("kec_box").style.display = 'table-row';
		document.getElementById("kel_box").style.display = 'none';
		document.getElementById("lat_box").style.display = 'none';
		document.getElementById("lng_box").style.display = 'none';
	}
}

function stateChangedKel() {
	var data;
	if (ajaxku.readyState == 4) {
		data = ajaxku.responseText;
		if (data.length >= 0) {
			document.getElementById("kel").innerHTML = data
		} else {
			document.getElementById("kel").value = "<option selected>Pilih Kelurahan/Desa</option>";
		}
		document.getElementById("kel_box").style.display = 'table-row';
		document.getElementById("lat_box").style.display = 'none';
		document.getElementById("lng_box").style.display = 'none';
	}
}
