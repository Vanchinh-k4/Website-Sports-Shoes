$(document).ready(function() {
    $('.editButton2').click(function(e) {
        e.preventDefault();
    var table = document.getElementById("table2");
    var tablee = document.getElementById("table6");
	var tableee = document.getElementById("table7");
        table.style.display = "none"; 
		tablee.style.display = "none";
		tableee.style.display = "block";
});
})