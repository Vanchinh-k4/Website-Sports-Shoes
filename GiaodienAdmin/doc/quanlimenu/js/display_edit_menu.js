$(document).ready(function() {
    $('.editButton').click(function(e) {
        e.preventDefault();
    var table = document.getElementById("table4");
    var tablee = document.getElementById("table1");
	var tableee = document.getElementById("table5");
        table.style.display = "block"; 
		tablee.style.display = "none";
		tableee.style.display = "none";
});
})