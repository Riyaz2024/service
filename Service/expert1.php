<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 400px;
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Update Information</h1>
    <form method="post" id="google-sheet-form">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="aadhar">Aadhar Number:</label>
        <input type="text" id="aadhar" name="aadhar" pattern="[0-9]{12}" required>
        <small>Enter a 12-digit Aadhar number</small>

        <label for="mobile">Mobile Number:</label>
        <input type="tel" id="mobile" name="mobile" pattern="[0-9]{10}" required>
        <small>Enter a 10-digit mobile number</small>

        <label for="updateType">Type of Update:</label>
        <select id="updateType" name="updateType" required>
            <option value="voter">Voter</option>
            <option value="pan">PAN</option>
        </select>

        <button type="submit">Submit Update</button>
    </form>

    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbx_x5bVzLPiOSrKWZbQoOO7cvgNPOZ_MdI0OnQQz5t1aFSFtvyKbgLT2w44D0Olv_t3Tw/exec';
        const form = document.getElementById('expert');

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            fetch(scriptURL, { method: 'POST', body: new FormData(form) })
                .then(response => alert("Thank you for contacting us."))
                .catch(error => console.error('Error!', error.message));
        });
    </script>
</body>
</html>
