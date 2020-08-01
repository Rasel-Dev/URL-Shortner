<?php
include 'app/db.php';
if (!empty($_GET['k'])) {
    session_start();
    $key = $_GET['k'];


    $action = false;
    //link views
    $user_session = session_id();
    $link_key = $key;
    $check = $con->prepare("SELECT user_id FROM url WHERE token_keys = ? AND user_id = ?");
    $check->execute([$link_key, $user_session]);

    $check1 = $con->prepare("SELECT id FROM url_clicked WHERE user_session = ?");
    $check1->execute([$user_session]);

    if ($check->rowCount() == 0) {
        if ($check1->rowCount() == 0) {
            
            $view = $con->prepare("INSERT INTO `url_clicked`(`url_id`, `user_session`) VALUES (?, ?)");
            $view->execute([$link_key, $user_session]);

        }
    }

    //get the original link
    $stmt = $con->prepare("SELECT main_url FROM url WHERE token_keys = ?");
    $stmt->execute([$key]);
    $get_link = $stmt->fetch();
}

include 'header.php';
?>
    <main class="container top-20 main-body">
    	<div class="bx-flex">
    		<div class="left-section">
    			<img src="assets/imgs/ads2.jpeg" class="ads" alt="">
    		</div>
    		<div class="right-section">
    			<div class="shortener-form">
    				<h2 id="wait"></h2>
    			</div>
    			<div class="bottom-section">
    				<img src="assets/imgs/ads1.png" class="ads" alt="" style="width: 600px; height: 500px">
    			</div>
    		</div>
    	</div>
    </main>
    <script>
        let timer = 30;
        let el = document.querySelector('#wait');
        let timerId = setInterval(countdown, 1000);

        function countdown(){
            if (timer == 0) {
                clearInterval(timerId);
                el.innerHTML = '<button onclick="visitPage()">Skip Ads</button>';
            } else {
                el.innerHTML = 'Please wait ' + timer + ' Seconds';
                timer--;
            }
        }
        countdown();
        function visitPage(){
            window.location='<?php echo $get_link->main_url; ?>';
        }
    </script>
<?php include "footer.php";?>