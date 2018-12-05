//SELECT CATEGORIES
function selectCategory() {
    
    document.location.href = "/blog/main.php?cat=" + document.getElementById("selectcategory").value;
    
}