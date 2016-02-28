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
        $insertComm = "INSERT INTO POST2 (name, comment)
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
            Changing Years, Changing Times
        </h1>

        <p style="font-family: sans-serif;font-size: 17px;">
            February 28, 2016
        </p>

        <hr align="left" color ="black" style="width:60%; height: 0.1px;"></hr>

        <img src="hongbaosResize.jpg" alt="Red envelopes" style="border:2px solid black;margin-top: 20px;">
		<!--Date-->
		<p>
            The start of a new year is a good time to talk about the future. 
        </p>
        <p>
            This is, of course, a late reference to the lunar New Year, the most
            important holiday in China, when people return to their hometowns for
            food, family, and friends. I froze my cells about a month ago, grateful
            for some time out of the lab, and visited some new destinations in 
            Guangzhou with my cousin and her very energetic daughter, 多多(Duōduō).
            We went to光孝寺(guāngxiàosì), the oldest Buddhist temple in Guangzhou,
            to ask the gods to bring happiness and good fortune in the coming year.
            At lunch time, the temple sells a delicious vegetarian dish for only 5 RMB,
            and while we ate, a stranger took a particular liking to 多多. “Will I 
            have a happy life?” she asked. “Yes,” 多多replied in the knowing voice 
            of a three-year-old. As we walked away, the stranger handed her 100 RMB 
            (about 15 dollars, although my cousin protested vigorously), presumably 
            satisfied that her generosity would make多多’s prediction come true.
            <figure style="float: right; width: 50%">
            <img src="guangxiaosi.jpg" alt="光孝寺" width="99%">
                <figcaption>
                    光孝寺，the oldest Buddhist temple in Guangzhou, a few days before the New Year
                </figcaption> 
            </figure>
        </p>
        <p>
            In actuality, though, gifts of money are common during the lunar New Year, 
            especially among family and close friends. Those who are married give red 
            envelopes filled with money (红包，hóngbāo) to those who are unmarried, and 
            as someone on the receiving end, I could hardly believe the number of 红包 
            that I received in just a few days. The New Year is about more than just 
            money though—it is also crowding with your whole family around a hotpot and 
            convincing everyone that even though you are a vegetarian, there are plenty 
            of things to eat. It is marveling at the number of people that managed to look 
            good in this year’s family photo. It is taking the time to think about your 
            hopes and dreams for the future. 
        </p>
        <p>
            And so now that we are a little more than two weeks into the year of the monkey, 
            I’d like to talk about the future of TCM. 
        </p>
        <p>
            It seems a little strange to talk about the future before having said much 
            about the present, and so first, some quick background: TCM has been in China 
            for over 2,000 years, encompassing a wide range of medical practices, including
             herbal medicine, acupuncture, cupping, massage, and many others. Today, both TCM 
            and modern medicine (what we would call allopathic medicine in the states) are 
            readily available in China’s cities and both are government-supported. From personal
             experience, I can attest to the prominence of TCM in both hospitals and households—I 
            rarely go a day without hearing that I shouldn’t drink cold water because it will
             allow 寒气(hánqì, roughly translated as unwanted cold energy) to enter my body, or 
            that eating too much of something will cause 上火 (shànghuǒ, excessive internal heat).
            <figure style="float: left; width: 30%">
            <img src="NYhotpot.jpg" alt="Hotpot with the family" width="99%">
                <figcaption>
                    Hotpot with my family on 除夕, the eve of the lunar New Year
                </figcaption> 
            </figure>  
        </p>
        <p>
            However, during the 1950s, TCM entered an era of “modernization,” that saw the opening 
            of new education and research institutions, the industrialization of TCM pharmaceutical 
            production, and efforts to legitimize and improve TCM practices using modern science 
            and technology. Today, the initiative to modernize is still in full force, with labs
             like mine all over the country using modern scientific techniques to research TCM
             remedies. TCM continues to grow—one <a href="http://en.ce.cn/main/latest/201601/14/t20160114_8287665.shtml" 
            target="_blank"> report </a> suggests that China has opened 500 new TCM hospitals
             in the past five years—but it is also changing in a way that might not make everyone
             so comfortable, that some would argue contradicts the very conceptual basis of TCM. 
            “You must learn the TCM way of thinking. You cannot use a western medicine perspective
             to analyze TCM.” A TCM professor who I worked with in Harbin last fall would say 
            this again and again, and likewise, it was a constant theme in “Basic Principles of
             TCM,” the class that I audited at my university soon after arriving in Guangzhou. 
            “Even some TCM professors look at TCM from a western medicine perspective. That is
             why you must learn the right way to think now.”
        </p>
        <p>
           Yet, along these lines, I have encountered little criticism for Tu Youyou, the
             2015 Nobel Prize Winner who took an herbal medicine and showed that just one
             molecule in its extract was responsible for its anti-malarial activity. This 
            idea is thoroughly counter to basic TCM principles, which suggest that an herb’s
             functionality comes from its properties: hot, cold, bitter, sweet, etc. If 
            someone has a “cold” sickness, for example, a “hot” remedy can restore them to 
            equilibrium. TCM doctors then prescribe mixtures of herbs with the appropriate 
            properties, creating customized remedies for each patient according to his or her 
            condition. In curing malaria, to look not for a single herb, but for a single 
            molecule, certainly breaks rules within that framework.
        </p>
        <p>
            So how does TCM make room for modern scientific research? Certainly 中西医结合 
            (zhōngxīyī jiéhé, the combination of TCM and western medicine) requires some
             amount of compromise. 
        </p>
        <p>
           “TCM cannot be combined with western medicine!” an old Chinese doctor barked at me sternly. I was eating hotpot with a family friend, who had proudly introduced me to this graduate of my current university, and told him I was studying TCM (note that this isn’t quite true; I am really doing TCM-<em>related</em> biology research). Prior to the aforementioned assertion, I had just mentioned that I might attend allopathic medical school in the US, and apparently, he was disappointed. Most people that I talk to, however, seem to think that中西医结合is the way forward. Both TCM and western medicine have their advantages and disadvantages. Why not make the best use of both? Nothing wrong with a patient getting a TCM pulse-reading AND a CT scan. Modernization has certainly begun to change the way that TCM is practiced today, and it will be interesting to see how it continues to transform the field.
        </p>
        <p>
A little while ago, my 师姐(shījiě, an older female labmate; note that 姐姐, or jiějiě, meaning older sister, is part of the word, since all student labmates are brothers and sisters here in China) told me that she was worried about the future, worried about the fuss everyone was making about testing single molecules. “We shouldn’t look at TCM from a western perspective like this…I don’t see why we can’t just test the herb mixtures.” And yet there she was, standing in a biology lab, one of the prime offenders. 
        </p>
        <p>
        For me, it is young doctors and researchers like her that epitomize the clash between a two thousand-year-old tradition and modernization. They will be forced to handle the contradicting theories and practices, they will analyze the data, and they will pave the way forward.
        </p>
        <p>
            Whatever that way forward may be, may it be filled with luck, fortune, happiness, and of course, good health.
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
        $getComments = $conn->prepare("SELECT name, comment, reg_date, id FROM POST2");
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