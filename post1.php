<!DOCTYPE html>
<html>

<head>

<title>Cell Culture | People Culture</title>
<meta charset="utf-8" />

<?php   
//define variables and set to empty values
$name = $comment = "";
$nameErr = $commentErr = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	if (empty($_POST["name"])) {
		$nameErr = "Name is required";
	} else {
		$name = test_input($_POST["name"]);
		if (!preg_match("/^[a-zA-Z]*$/",$name)){
			$nameErr = "Only letters and white spaces allowed";
		}
	}
	
	if (empty($_POST["comment"])) {
		$commentErr = "Comment is required";
	} else{
	$comment = test_input($_POST["comment"]);
	}
    // redirect to the same page to clear $_POST
    header ('Location: ' . $_SERVER['REQUEST_URI']);

    include 'DatabaseInfo.php';

    try {
        // login
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //account for responses with single quotes
        $quotedName = $conn->quote($name);
        $quotedComm = $conn->quote($comment);
        $insertComm = "INSERT INTO POST1 (name, comment)
        VALUES ($quotedName, $quotedComm)";
        $conn->exec($insertComm);
        $last_id = $conn->lastInsertId();
    }

    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?> 

<link rel="stylesheet" href="website2.css">
</head>

<body>

	<div id="wrapperHeader">
		<div id="header">
			<h1>Cell Culture | People Culture</h1>
		</div>
        <div id="subheader">
            <h1>A year of cancer research in Guangzhou</h1>
        </div>
	</div>

	<div id="nav1">
	</div>
	
    <div id="postWrapper">
	<div class="post">
		<h1>
            The Yellow Emperor and a Microscope Meet in a Bar
        </h1>

        <p style="font-family: sans-serif;font-size: 17px;">
            December 30, 2015
        </p>

        <hr align="left" color ="black" style="width:60%; height: 0.1px;"></hr>

        <img src="Yellow_EmperorMicroscope.png" alt="Great Wall" style="border:2px solid black;margin-top: 20px;">
		<!--Date-->
		<p>
            Hey world.
        </p>
        <p>
            I’ve been in Guangzhou for about two months now, and we are quickly 
            approaching 2016. Last week was a festive one—on Monday, I headed 
            home early to celebrate 冬至(dōngzhì, the winter solstice) with my 
            family, and later in the week, friends congregated in Guangzhou for 
            Christmas. 冬至 marks the beginning of the cold winter, and from here
            onward, the days begin to get longer. We celebrate here in the south
            of China with 汤圆 (tāngyuán), a type of rice flour ball with a sweet
            filling, like sesame, peanut, or red bean. Meanwhile, Guangzhou is 
            unusually warm and sunny, and life in the lab moves onward.
        </p>
        <p>
            Two months in and at times I'm still feeling my way around in the 
            dark. I’ve picked up a lot of the words that I need here—cell 
            culture, medium, enzyme, microscope—and yet it is often not enough. 
            Every day is a joint lesson in biology, Chinese language, and 
            Chinese culture, and I strain my ears during conversations, focusing
            my brain power into streams of words that shoot out at me at the 
            speed of light. As I learn to use new lab techniques, I agonize over
            who to ask for help, who will be too busy, whether my questions are
            too simple to ask a Chinese professor, whether or not I need 
            permission to start an experiment…the list goes on and on. 
        </p>
        <p>
            So what does life look like in a Chinese lab, and in particular, a 
            lab at a Traditional Chinese Medicine (TCM) university? Here, we 
            take traditional Chinese herbal medicines, extract potential active 
            ingredients, and explore their potential in disease treatment. 
            Notably, Chinese chemist 屠呦呦(Tú Yōuyōu) used this approach in the
            discovery of Artemisinin, which recently 
            <a href="http://www.theguardian.com/science/2015/oct/05/william-c-campbell-satoshi-omura-and-youyou-tu-win-nobel-prize-in-medicine" 
            target="_blank">
            won her the 2015 Nobel Prize in Physiology or Medicine</a>. 
            Essentially, we take traditional Chinese medicines and 
            study them from a modern scientific perspective. Note that
            this is what students are taught not to do in basic TCM 
            theory classes, but more on that on a later date.
        </p>
        <p>
            Specifically, I am interested in using TCM-derived compounds to 
            combat multi-drug resistance in cancer cells. Multi-drug resistance 
            is probably what you think it is—cancer cells evolve resistance to
            many different chemotherapy drugs. In many cases, these cells are 
            equipped with <a href="https://en.wikipedia.org/wiki/P-glycoprotein" target="_blank">
            a molecular pump </a> that keeps toxic drugs out of the cell, 
            really a pretty impressive move on the cell’s part. I’m looking at 
            compounds that can prevent the function of that pump, and in theory,
            can be administered alongside chemotherapy to ensure its 
            effectiveness. I test these compounds on both resistant and 
            sensitive cancer cells, which we culture here in the lab.

            <figure>
            <img src="P-gpCartoonResized.jpg" alt="P-gpCartoon" width="85%">
                <figcaption>
                    A chemosensitizer plugs the pump that would kick chemotherapy 
                    out of the cell. Keep in mind that shapes are not depicted accurately, and
                    that directly "plugging" the "pump" is not the only way to hinder its function.
                </figcaption> 
            </figure>
        </p>
        <p>
            It is an exciting time to be exploring this piece of China, at the 
            intersection of modern scientific research and a medical system 
            thousands of years old (the Yellow Emperor’s Internal Canon, a 
            classic fundamental TCM text, dates to around 300BC). Over the next 
            8 months, I’m looking forward to sharing experiences and thoughts 
            from Guangzhou’s labs, subways, classrooms, hospitals, streets…
        </p>
	</div>

    <div class="hline"></div>

    <h1 class="commentHeading">Comments</h1>

    <script src="site2script.js"></script>
    	
    <div id="commentPrompt">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			Name: <input id="nameInput" type="text" name="name"><br>
			<span class="error"><br><?php echo $nameErr;?></span>
			Comment: <br>
			<textarea name="comment" rows="5">
			What do you think?
			</textarea>
			<span class="error"><?php echo $commentErr;?></span>
			<input type="submit" value="Submit">
		</form>
    </div>

    <div id="commentSect">

    <!--Post Comments-->
    <?php
    try {
        // comment output
        $nameOutput = $commOutput = $dateTime = $idOutput = ""; 

       include 'DatabaseInfo.php';

        // login
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $getComments = $conn->prepare("SELECT name, comment, reg_date, id FROM POST1");
        $getComments->execute();
        
        // Bind by column number
        $getComments->bindColumn('name', $nameOutput);
        $getComments->bindColumn('comment', $commOutput);
        $getComments->bindColumn('reg_date', $dateTime);
        $getComments->bindColumn('id', $idOutput);

        while ($getComments->fetch(PDO::FETCH_BOUND)) {
            echo '<div class="comment">'
            , '<h1>' . $nameOutput . '</h1>'
            , '<h2>' . $dateTime . '</h2>'
            , '<p>' . $commOutput . '</p>'
            , '</div>';
        }
    }

    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
    ?>

    </div>
    </div>
	<div id="footer">
	<!--Pageview counter-->
	<!--Subscribe button-->
	</div>
	
</body>

</html>