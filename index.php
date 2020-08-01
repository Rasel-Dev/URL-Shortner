<?php include 'header.php';?>
    <main class="container top-20 main-body">

        <!-- link generator -->
        <div class="shortener-form" id="shortener">
            <h2>Generate Shortener Link</h2>
            <form action="#" method="post" id="shortener_form_content" autocomplete="off" accept-charset="utf-8">
                <input type="text" name="url" id="url" placeholder="https://www.example.com" required>
                <input type="submit" name="submit" id="url_submit" value="Submit">
            </form><br><br><br><br>
            <div id="short_link_gen">
                
                <?php
                    session_start();
                    include 'app/db.php';
                    $user_id = session_id();
                    $check = $con->prepare("SELECT token_keys FROM url WHERE user_id = ?");
                    $check->execute([$user_id]);
                    while ($link = $check->fetch()) {
                        $view = $con->prepare("SELECT * FROM url_clicked WHERE url_id = ?");
                        $view->execute([$link->token_keys]);
                ?>
                <div class="shortener-data">
                    <p>
                        <img src="assets/imgs/link.png" alt="" width="30" height="30">&nbsp;&nbsp;
                        <a href="http://localhost/url_shortner/a.php?k=<?php echo $link->token_keys; ?>" target="_blank" id="short_link" title="Short Link">http://localhost/url_shortner/a.php?k=<?php echo $link->token_keys; ?></a>
                        <?php
                            if ($view->rowCount() > 0) {
                                echo '<span style="margin-left:5px;font-size:10px;padding:2px 3px;background:#40b740;color:#fff;border-radius:10px;">' . $view->rowCount() . '</span>';
                            }
                        ?>                        
                    </p>
                    <button type="button" onclick="copyDivToClipboard(this);">Copy</button>
                </div>
                <?php } ?>

            </div>
        </div>
        <?php echo $request  = str_replace("/url_shortner/", "", $_SERVER['REQUEST_URI']); ?>
    	<div class="bx-flex">
    		<div class="left-section">
    			<img src="assets/imgs/ads2.jpeg" class="ads" alt="">
    		</div>
    		<div class="right-section">
    			<div class="bottom-section">
    				<img src="assets/imgs/ads1.png" class="ads" alt="" style="width: 600px; height: 500px">
    			</div>
    		</div>
    	</div>
    </main>
<?php include "footer.php";?>