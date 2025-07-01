<!DOCTYPE html>
<html>
<head>
    <title>Show Data (AJAX)</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<h2>Product List (AJAX Pagination)</h2>
<div id="product-table">
    <!-- Data will be loaded here -->
</div>

<script>
$(document).ready(function(){
    function loadData(page = 1){
        $.ajax({
            url: "show_data.php",
            type: "GET",
            data: { page: page },
            success: function(data){
                $("#product-table").html(data);
            }
        });
    }

    // Initial load
    loadData();

    // Delegate pagination click
    $(document).on("click", ".page-link", function(e){
        e.preventDefault();
        const page = $(this).data("page");
        loadData(page);
    });
});
</script>

</body>
</html>
