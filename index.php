<?php $name = "Tax Evaderpedia" ?>

<!DOCTYPE html>
<html>
<head>
    <title><?php if (isset($_GET['topic'])) { echo $_GET['topic'] . ' - ' . $name; } else { echo $name; } ?></title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Verdana;
			background-color: #222;
			color: white;
        }

        .sidebar {
            width: 150px;
            height: 100%;
            background-color: #333;
            position: fixed;
            top: 0;
            left: 0;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            padding: 10px 20px;
            text-align: center;
        }

        .sidebar a {
            text-decoration: none;
            color: #fff;
            display: block;
        }

        .sidebar a:hover {
            background-color: #555;
        }
		
		.sidebar img {
            margin-left: 25%;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }
		
		footer {
            background-color: #444;
            color: white;
            text-align: center;
            padding: 5px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        @media screen and (max-width: 600px) {
            .sidebar {
                width: 100%;
                padding: 10px;
            }
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
      <ul>
	    <img id="logo" src="logo.png" width="50%">
        <li><a href="./">Home</a></li>
      </ul>
    </div>
	
	<div class="content">
        <?php
		if (!isset($_GET['topic'])) {
		  echo '<h1>Topics</h1>';
          $topicFolder = 'topic/';
          $topicFiles = scandir($topicFolder);
          foreach ($topicFiles as $file) {
               if ($file !== '.' && $file !== '..' && is_file($topicFolder . $file)) {
                  $topicName = pathinfo($file, PATHINFO_FILENAME);
                  echo "<li><a style='color:white;' href='index.php?topic=$topicName'>$topicName</a></li>";
              }
           }
		}
        ?>

        <?php
        if (isset($_GET['topic'])) {
            $requestedTopic = $_GET['topic'];
            $topicFolder = __DIR__ . '/topic/';
            $topicFile = $topicFolder . $requestedTopic . '.txt';

            if (file_exists($topicFile)) {
                $topicContent = file_get_contents($topicFile);
                echo "<h2>$requestedTopic</h2><hr>";
                echo "<p>$topicContent</p>";
            } else {
                echo "<p>Topic not found.</p>";
            }
        }
        ?>
	</div>
<footer><b><a style="color:white;" href="https://github.com/SevenworksDev/BabyWiki"><?php echo $name; ?> is powered by BabyWiki, an Open-Source one-file PHP wiki script made for beginners to setup their wiki without any advanced coding knowledge.</a></b></footer>
</body>
</html>
