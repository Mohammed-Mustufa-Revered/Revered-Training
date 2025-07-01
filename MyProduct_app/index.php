<!DOCTYPE html>
<html>

<head>
    <title>Product Form</title>
  
</head>

<body>
    <form action="product_app.php" method="POST" enctype="multipart/form-data" onsubmit="return validateFormById();">
        <table>
            <tr>
                <td>Product Name:</td>
                <td><input type="text" id="p_name" name="p_name"></td>
            </tr>
            <tr>
                <td>Product SKU:</td>
                <td><input type="text" id="psku_name" name="psku_name"></td>
            </tr>
            <tr>
                <td>Categories:</td>
                <td>
                    <select id="categories" name="p_categories[]" multiple required>
                        <option value="electronics">Electronics</option>
                        <option value="furniture">Furniture</option>
                        <option value="clothing">Clothing</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Created Date:</td>
                <td><input type="date" id="p_createddate" name="p_createddate"></td>
            </tr>
            <tr>
                <td>Updated Date:</td>
                <td><input type="date" id="p_updateddate" name="p_updateddate"></td>
            </tr>
            <tr>
                <td>Upload:</td>
                <td><input type="file" id="p_manual" name="p_manual" accept="application/pdf"></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>
                    <input type="radio" id="active" name="p_status" value="active" checked> Active
                    <input type="radio" id="inactive" name="p_status" value="inactive"> Inactive
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Save Data"></td>
            </tr>
        </table>
          <script>
        function validateFormById() {
            const p_name = document.getElementById("p_name").value.trim();
            const sku = document.getElementById("psku_name").value.trim();
            const categories = document.getElementById("categories");
            const c_date = document.getElementById("p_createddate").value;
            const u_date = document.getElementById("p_updateddate").value;
            const upload = document.getElementById("p_manual").value;
            const statusActive = document.getElementById("active").checked;
            const statusInActive = document.getElementById("inactive").checked;

            if (p_name === "") {
               alert("Please enter the Product Name.");
                return false;
            }

            if (sku === "") {
                alert("Please enter the Product SKU.");
                return false;
            }

            let selected = false;
            for (let i = 0; i < categories.options.length; i++) {
                if (categories.options[i].selected) {
                    selected = true;
                    break;
                }
            }
            if (!selected) {
                alert("Please select at least one category.");
                return false;
            }

            if (c_date === "") {
                alert("Please select the Created Date.");
                return false;
            }

            if (u_date === "") {
                alert("Please select the Updated Date.");
                return false;
            }

            if (u_date < c_date) {
                alert("Updated Date cannot be before Created Date.");
                return false;
            }

            if (upload === "") {
                alert("Please upload a PDF manual.");
                return false;
            }

            if (!statusActive && !statusInActive) {
                alert("Please select a status.");
                return false;
            }

            // If everything is valid, allow form to submit
            return true;
        }
    </script>
    </form>
    <a href="ajax_show_data.php">Show Data</a>
</body>

</html> 
<html>
<body>

<form action="index.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
