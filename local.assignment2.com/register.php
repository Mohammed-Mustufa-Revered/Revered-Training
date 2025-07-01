<?php
// Server-side: Handle submitted data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>✅ Registration Successful!</h2>";
    echo "<p><strong>Name:</strong> " . htmlspecialchars($_POST["name"]) . "</p>";
    echo "<p><strong>Email:</strong> " . htmlspecialchars($_POST["email"]) . "</p>";
    echo "<p><strong>Phone:</strong> " . htmlspecialchars($_POST["phone"]) . "</p>";
    echo "<p><strong>Address:</strong> " . htmlspecialchars($_POST["address"]) . "</p>";
    echo "<p><strong>Gender:</strong> " . htmlspecialchars($_POST["gender"]) . "</p>";
    echo "<p><strong>Country:</strong> " . htmlspecialchars($_POST["country"]) . "</p>";

    if (isset($_POST["hobbies"])) {
        $hobbies = $_POST["hobbies"];
    } else {
        $hobbies = [];
    }

    if (isset($_POST["skills"])) {
        $skills = $_POST["skills"];
    } else {
        $skills = [];
    }


    echo "<p><strong>Hobbies:</strong> " . htmlspecialchars(implode(", ", $hobbies)) . "</p>";
    echo "<p><strong>Skills:</strong> " . htmlspecialchars(implode(", ", $skills)) . "</p>";
    exit; // Stop rendering the form
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Simple Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }

        form {
            max-width: 500px;
            background: #fff;
            padding: 20px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            resize: vertical;
        }

        .inline {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .inline input {
            width: auto;
        }

        button {
            background: green;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: darkgreen;
        }
    </style>
</head>

<body>

    <h2>Registration Form</h2>

    <form id="registrationForm" method="POST" novalidate>
        <div class="form-group">
            <label for="name">Full Name *</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email Address *</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number (digits only) *</label>
            <input type="text" id="phone" name="phone" required pattern="\d+">
        </div>

        <div class="form-group">
            <label for="address">Address *</label>
            <textarea id="address" name="address" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label>Gender *</label>
            <div class="inline">
                <input type="radio" name="gender" value="Male" required> Male
                <input type="radio" name="gender" value="Female"> Female
            </div>
        </div>

        <div class="form-group">
            <label>Hobbies *</label>
            <div class="inline">
                <input type="checkbox" name="hobbies[]" value="Reading" required> Reading
                <input type="checkbox" name="hobbies[]" value="Gaming"> Gaming
                <input type="checkbox" name="hobbies[]" value="Sports"> Sports
            </div>
        </div>

        <div class="form-group">
            <label for="country">Country *</label>
            <select id="country" name="country" required>
                <option value="">-- Select Country --</option>
                <option value="India">India</option>
                <option value="USA">USA</option>
                <option value="UK">UK</option>
            </select>
        </div>

        <div class="form-group">
            <label for="skills">Skills *</label>
            <select id="skills" name="skills[]" multiple size="4" required>
                <option value="HTML">HTML</option>
                <option value="CSS">CSS</option>
                <option value="JavaScript">JavaScript</option>
                <option value="PHP">PHP</option>
            </select>
        </div>

        <button type="submit">Submit</button>
    </form>

    <script>
        const form = document.getElementById("registrationForm");
        const phone = document.getElementById("phone");

        form.addEventListener("submit", function (e) {
            phone.setCustomValidity(""); // clear any old message

            // Custom phone validation
            if (!/^\d+$/.test(phone.value)) {
                phone.setCustomValidity("Phone number must contain digits only.");
            }

            // Run native validation
            if (!form.checkValidity()) {
                e.preventDefault(); // block form
                form.reportValidity(); // show built-in errors
            }
        });
    </script>

</body>

</html>