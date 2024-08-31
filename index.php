<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRFileMin</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .logo {
            font-size: 3em;
            font-weight: bold;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .logo span {
            color: var(--primary-color);
        }
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --text-color: #34495e;
        }
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --text-color: #34495e;
        }
        body {
            font-family: 'Noto Sans SC', sans-serif;
            color: var(--text-color);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --background-color: #ecf0f1;
            --text-color: #34495e;
        }
        body {
            font-family: 'Noto Sans SC', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        header {
            background-color: var(--secondary-color);
            color: white;
            text-align: center;
            padding: 60px 0;
            margin-bottom: 40px;
        }
        h1 {
            font-size: 2.5em;
            margin: 0;
        }
        .subtitle {
            font-size: 1.2em;
            margin-top: 10px;
            opacity: 0.8;
        }
        .download-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        .download-item {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .download-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        .download-item-header {
            background-color: var(--primary-color);
            color: white;
            padding: 20px;
        }
        .download-item-header h2 {
            margin: 0;
            font-size: 1.5em;
        }
        .download-item-body {
            padding: 20px;
        }
        .download-item p {
            margin: 0 0 20px 0;
        }
        .download-btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            font-weight: bold;
        }
        .download-btn:hover {
            background-color: #2980b9;
        }
        header {
            background-color: var(--secondary-color);
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(255,255,255,0.2) 2%, transparent 0%),
                radial-gradient(circle at 75% 75%, rgba(255,255,255,0.2) 2%, transparent 0%);
            background-size: 100px 100px;
            animation: waterDots 10s linear infinite;
            color: white;
            text-align: center;
            padding: 60px 0;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ecf0f1" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') repeat-x;
            background-size: 1440px 100px;
            animation: wave 10s linear infinite;
        }

        @keyframes wave {
            0% {
                background-position-x: 0;
            }
            100% {
                background-position-x: 1440px;
            }
        }

        @keyframes waterDots {
            0% {
                background-position: 0 0;
            }
            100% {
                background-position: 100px 100px;
            }
        }
        .logo span {
            color: var(--primary-color);
        }
        .logo {
            font-size: 3em;
            font-weight: bold;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>
    <header>
        <h1 class="logo">DR<span>File</span>Min</h1>
        <p class="subtitle">高质量资源，尽在掌握</p>
        <div class="wave"></div>
    </header>
    
    <div class="container">
        <div class="download-container">
            <div class="download-item">
                <div class="download-item-header">
                    <h2>专业电子书集合</h2>
                </div>
                <div class="download-item-body">
                    <p>包含多个领域的高质量电子书，涵盖技术、管理、设计等方面。适合各行业专业人士提升知识储备。</p>
                    <a href="path/to/ebooks.zip" download class="download-btn">立即下载</a>
                </div>
            </div>

            <div class="download-item">
                <div class="download-item-header">
                    <h2>高清视频教程</h2>
                </div>
                <div class="download-item-body">
                    <p>由行业专家录制的精品视频教程，内容涉及编程、设计、营销等多个热门领域。适合自学者和职场人士。</p>
                    <a href="path/to/video-tutorials.zip" download class="download-btn">立即下载</a>
                </div>
            </div>

            <div class="download-item">
                <div class="download-item-header">
                    <h2>商业模板套件</h2>
                </div>
                <div class="download-item-body">
                    <p>精心设计的商业文档模板，包括PPT、Word、Excel等格式。让您的工作文档更加专业和高效。</p>
                    <a href="path/to/business-templates.zip" download class="download-btn">立即下载</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('mousemove', (e) => {
            const x = e.clientX / window.innerWidth;
            const y = e.clientY / window.innerHeight;
            
            document.body.style.backgroundPosition = `${x * 100}% ${y * 100}%`;
        });
        </script>
</body>
</html>