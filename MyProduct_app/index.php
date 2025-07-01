<html>
    <body>
<form action="product_app.php" method ="POST" enctype="multipart/form-data">
    product name       : <input type="text" name="p_name"><br>
    product sku        : <input type="text" name="psku_name"><br>
    <label>Categories:</label>
        <select name="p_categories[]" multiple required>
            <option value="electronics">Electronics</option>
            <option value="furniture">Furniture</option>
            <option value="clothing">Clothing</option>
        </select><br>
    cretaed date       : <input type="date" name="p_createddate"><br>
    Updated date       : <input type="date" name="p_updateddate"><br>
    Pdf manual         : <input type ="file" name= "p_manual" accept = "application/pdf"><br>
    <div>
    Status             : <input type ="radio" name="p_status" value = "active" checked>Active
                       <input type ="radio" name="p_status" value= "inactive">Inactive
    </div><br>
                       : <input type = "submit" name= "Save data">
    
</form>
<a href ="show_data.php" > show data </a>
    </body>
    </html>