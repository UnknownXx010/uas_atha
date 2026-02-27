<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login Dealer</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Poppins', sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
    overflow:hidden;
}

/* Background glow */
body::before{
    content:"";
    position:absolute;
    width:600px;
    height:600px;
    background:radial-gradient(circle,#00f5ff33,transparent);
    top:-200px;
    right:-200px;
    border-radius:50%;
}

.login-box{
    position:relative;
    width:350px;
    padding:40px;
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(20px);
    border-radius:20px;
    border:1px solid rgba(255,255,255,0.2);
    box-shadow:0 0 40px rgba(0,255,255,0.2);
    color:white;
}

.login-box h2{
    text-align:center;
    margin-bottom:30px;
    font-weight:600;
    letter-spacing:1px;
}

.input-group{
    margin-bottom:20px;
}

.input-group label{
    font-size:14px;
}

.input-group input{
    width:100%;
    padding:10px;
    margin-top:5px;
    border:none;
    outline:none;
    border-radius:10px;
    background:rgba(255,255,255,0.1);
    color:white;
    transition:0.3s;
}

.input-group input:focus{
    background:rgba(0,255,255,0.2);
    box-shadow:0 0 10px #00f5ff;
}

button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    background:linear-gradient(45deg,#00f5ff,#008cff);
    color:white;
    font-weight:600;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:translateY(-2px);
    box-shadow:0 0 15px #00f5ff;
}

.footer{
    margin-top:20px;
    text-align:center;
    font-size:12px;
    opacity:0.7;
}
</style>

</head>
<body>

<div class="login-box">
    <h2>🚘 Dealer System</h2>

    <form method="POST" action="cek_login.php">
        
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">LOGIN</button>
    </form>

    <div class="footer">
        © 2026 UAS Web Programming - Atha
    </div>
</div>

</body>
</html>