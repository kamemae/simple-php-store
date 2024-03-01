<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Lato, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .upload-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        .upload-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .btn {
            border: 2px solid gray;
            color: gray;
            background-color: white;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }

        .file-name {
            margin-top: 10px;
            font-size: 14px;
            color: gray;
        }

        .upload-btn-wrapper .btn:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="upload-container">
        <h2>Upload Your File</h2>
        <form class="upload-form" action="#" method="post" enctype="multipart/form-data">
            <div class="upload-btn-wrapper">
                <button class="btn">Choose a file</button>
                <input type="file" name="file" id="file" accept=".pdf, .doc, .docx, .txt">
            </div>
            <span class="file-name" id="file-name">No file chosen</span>
            <button type="submit" class="btn" onclick="uploadFile()">Upload</button>
        </form>
    </div>

    <script>
        document.getElementById('file').addEventListener('change', function () {
            var fileName = this.value.split('\\').pop();
            document.getElementById('file-name').innerText = fileName || "No file chosen";
        });

        function uploadFile() {
            // Implement your file upload logic here
            alert("File uploaded!");
        }
    </script>
</body>
</html>
