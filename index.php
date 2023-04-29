<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
   <style>
    * {
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

section {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin: 20px;
}

a {
    text-decoration: none;
    color: #333;
    background-color: #f9f9f9;
    padding: 10px 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 10px;
    width: 100%;
    text-align: center;
}

h3 {
    margin: 0;
}

@media (min-width: 768px) {
    section {
        flex-direction: row;
    }

    a {
        margin-right: 10px;
        width: auto;
    }
}

   </style>
</head>
<body>
<section>
        <a href="administrator/adminlogin.php"><h3>Login Administrator</h3></a>
        <a href="administrator/adminsignup.php"><h3>Signup Administrator</h3></a>
        
    </section>

    <section>
        <a href="student/stlogin.php"><h3>Login Student</h3></a>
        <a href="student/stsignup.php"><h3>Signup Student</h3></a>
    </section>
</body>
</html>
