<html>
	<head>
		<title>DS-Gallery</title>
    <meta content="DS-Gallery" property="og:title" />
    <meta content="Dark Souls Gallery" property="og:description" />
    <meta content="" property="og:url" />
    <meta content="" property="og:image" />
    <meta content="#99FFCA" name="theme-color" /> 
    <style>

    *{
      margin: 0 auto;
    }

    a {
      text-decoration: none;
    }

    html {
      background: #f3f3f3;
    }
    
    #cont {
      position: relative;
      max-width:1920px;
      overflow: hidden;
    }

    #cont a {
      display: flex;
      align-items: center;
      justify-content: center;
      position: absolute;
      top:0;
      width: 70px;
      height: 100%;
  
      font-size: 2em;
      font-weight: bold;
      background: #fff;
      color: #000;
      opacity: .2;
  
      transition: .5s ease;
    }

    #cont a:hover {
      opacity: 0.8;
      width: 90px;
      transition: .75s ease;
    }

    #cont img {
      object-fit: fill;
      width: 100%;
    }

    #left { left:0;}
    #right{ right:0;}

    </style>
    <script type="application/javascript">

      <?php
        
        $dir = './DS-Screenshots';
        $files = scandir($dir);

        if(isset($_GET['index']))  {
          echo "var index = " . $_GET['index'] . ";\n";
        } else {
          echo "var index = " . rand(1, sizeof($files)) . ";\n";
        }

        echo "      var images = [\n";
 				for($x = 2; $x <= sizeof($files)-2; $x++)	{
 			  	echo "        \"" . $files[$x] . "\",\n";
 			  }
        echo "        \"" . $files[sizeof($files)-1] . "\"\n";
        echo "      ];\n";

 			?>

      function update_meta()  {
        document.querySelector('meta[property="og:url"]').setAttribute("content", "http://www.xvk3.net/gallery.php?index=" + window.index);
        document.querySelector('meta[property="og:image"]').setAttribute("content", "http://www.xvk3.net/DS-Screenshots/" + window.images[window.index]);
      }

      function load()  {
        document.getElementById("image").src = "DS-Screenshots/" + window.images[window.index];
        document.getElementById("pindex").innerHTML = window.index;
        window.history.replaceState(null, null, "?index=" + window.index);
        update_meta();
      }

      function next() {
        if(window.index > window.images.length-1) {
          window.index = 0;
        } else {
          window.index = window.index + 1;
        }
        load();
      }

      function prev() {
        if(window.index == 0)  {
          window.index = window.images.length-1;
        } else {
          window.index = window.index - 1;
        }
        load();
      }
    </script>
  </head>
	<body onload="load()">
    <div id="cont">
      <img id="image" src="image.png"/>
      <a id="left"  onclick="prev()">&lt;</a>
      <a id="right" onclick="next()">&gt;</a>
    </div>
    <p id="pindex">0</p>
	</body>
</html>
