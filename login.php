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

body, html{
    height:100%;
    width:100%;
    overflow:hidden;
    position: relative;
}

/* Video Background */
#bg-video {
    position: fixed;
    right: 0;
    bottom: 0;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -3;
    object-fit: cover;
    filter: brightness(0.5);
}

/* Overlay Glow Gradient */
body::before{
    content:"";
    position:absolute;
    top:0; left:0;
    width:100%; height:100%;
    background: radial-gradient(circle at top right,#00f5ff33,#008cff33,transparent);
    z-index:-2;
    animation: glowPulse 6s ease-in-out infinite;
}

@keyframes glowPulse {
    0%,100%{opacity:0.7;}
    50%{opacity:1;}
}

/* Partikel bergerak */
body::after{
    content:"";
    position:absolute;
    width:100%;
    height:100%;
    background: transparent url('https://i.ibb.co/7G9sjpX/particles.png') repeat;
    animation: moveParticles 60s linear infinite;
    z-index:-1;
}

@keyframes moveParticles {
    0%{background-position:0 0;}
    100%{background-position:1000px 1000px;}
}

/* Login Box */
.login-box{
    position:absolute;
    top:50%;
    left:50%;
    transform: translate(-50%,-50%);
    width:350px;
    padding:40px;
    background: rgba(0,0,0,0.5);
    backdrop-filter: blur(10px);
    border-radius:20px;
    border:1px solid rgba(255,255,255,0.2);
    box-shadow:0 0 25px rgba(0,255,255,0.4);
    color:white;
    z-index: 10;
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

<!-- Video Background -->
<video autoplay muted loop id="bg-video">
  <source src="video-background.mp4" type="video/mp4">
  Browser Anda tidak mendukung video.
</video>

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