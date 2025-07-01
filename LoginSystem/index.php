<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome - Login or Signup</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      height: 100vh;
      background: linear-gradient(to right, #6a11cb, #2575fc);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container {
      text-align: center;
      background-color: white;
      padding: 60px 40px;
      border-radius: 16px;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }

    .container h1 {
      margin-bottom: 30px;
      color: #333;
    }

    .btn {
      display: inline-block;
      padding: 15px 35px;
      margin: 10px;
      font-size: 16px;
      font-weight: 600;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      color: white;
      transition: background-color 0.3s ease;
      cursor: pointer;
    }

    .btn-login {
      background-color:rgb(17, 203, 135);
    }

    .btn-login:hover {
      background-color: #5012a6;
    }

    .btn-signup {
      background-color: #2575fc;
    }

    .btn-signup:hover {
      background-color: #1e60cc;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Welcome!</h1>
    <a href="login.php" class="btn btn-login">Login</a>
    <a href="signup.php" class="btn btn-signup">Signup</a>
  </div>
</body>
</html> -->

<!DOCTYPE html>
<html>
<head>
  <title>PHP with AJAX</title>
  <!-- ✅ jQuery from official CDN -->
 <!DOCTYPE html>
<html>
<head>
  <title>PHP with AJAX</title>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

  <h1>PHP with AJAX</h1>

  <label>Search:</label>
  <input type="text" id="search" autocomplete="off">

  <br><br>
  <input type="button" id="load-button" value="Load Data">

  <br><br>
  <div id="load-data"></div>

  <script type="text/javascript">
    $(document).ready(function () {

      // Load button
      $("#load-button").on("click", function () {
        $.ajax({
          url: "ajax-load.php",
          type: "POST",
          success: function (data) {
            $("#load-data").html(data);
          },
          error: function () {
            alert("Failed to load data via AJAX");
          }
        });
      });

      // Live search
      $("#search").on("keyup", function () {
        var search_term = $(this).val();
        $.ajax({
          url: "ajax-search.php",
          type: "POST",
          data: { search: search_term },
          success: function (data) {
            $("#load-data").html(data);
          },
          error: function () {
            alert("Search AJAX failed");
          }
        });
      });

    });
  </script>
</body>
</html>




<!-- $xml=simplexml_load_file("books.xml") or die("Error: Cannot create object");
foreach($xml->children() as $books) {
  echo $books->title . ", ";
  echo $books->author . ", ";
  echo $books->year . ", ";
  echo $books->price . "<br>";
}
print_r($xml);
 -->

