<?php
require('config.php');

$headTitle = 'Gbenga Opeyemi - UX and Web Designer';

require('include/header.php');
?>
        <section class="hero-section">
            <div class="main">
                <div class="title">Hi, I'm <span class="dot-ul">Gbenga Opeyemi</span></div>
                <div class="sub-title">A <strong style="color:yellow; font-weight:500;">Junior Web Developer and UX/UI Designer</strong>. Open to freelancing opportunities to improve user experience and help businesses achieve their goals.</div>

                <a class="cta" href="<?php echo $config_basedir . "/contact.php" ?>">Let's Connect</a>
                

            </div>
            <div class="hero-image">
                <img src="assets/Hand coding-pana.png" width="40%">
            </div> 
        </section>

<div class="tools">
    <div aria-label="figma">
        <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="figma">
                <path id="Vector" d="M33.3 100C42.5 100 50 92.5 50 83.3V66.7H33.3C24.1 66.7 16.6 74.2 16.6 83.4C16.6 92.6 24.1 100 33.3 100Z" fill="#8C8C8C"/>
                <path id="Vector_2" d="M16.7 50C16.7 40.8 24.2 33.3 33.4 33.3H50V66.6H33.3C24.1 66.7 16.7 59.2 16.7 50Z" fill="#818181"/>
                <path id="Vector_3" d="M16.7 16.7C16.7 7.5 24.1 0 33.3 0H50V33.3H33.3C24.1 33.3 16.7 25.9 16.7 16.7Z" fill="#7A7A7A"/>
                <path id="Vector_4" d="M50 0H66.7C75.9 0 83.4 7.5 83.4 16.7C83.4 25.9 75.9 33.4 66.7 33.4H50V0Z" fill="#9B9B9B"/>
                <path id="Vector_5" d="M83.3 50C83.3 59.2 75.8 66.7 66.6 66.7C57.4 66.7 50 59.2 50 50C50 40.8 57.5 33.3 66.7 33.3C75.9 33.3 83.3 40.8 83.3 50Z" fill="#939393"/>
            </g>
        </svg>
        <div class="overlay">Figma</div>
    </div>

    <div aria-label="html5">
        <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="html5">
                <path id="Vector" d="M14 90L6 0H94.2L86.2 90L50 100" fill="#767676"/>
                <path id="Vector_2" d="M50.1 92.3V7.3H86.1L79.2 84.1" fill="#888888"/>
                <path id="Vector_3" d="M22.4 18.4H50.1V29.4H34.5L35.5 40.7H50.1V51.7H25.4L22.4 18.4ZM25.9 57.3H37L37.8 66.1L50.1 69.4V80.9L27.4 74.6" fill="#EBEBEB"/>
                <path id="Vector_4" d="M77.7 18.4H50V29.4H76.6L77.7 18.4ZM75.7 40.7H50V51.7H63.6L62.3 66L50 69.4V80.9L72.6 74.6" fill="white"/>
            </g>
        </svg>
        <div class="overlay">HTML5</div>
    </div>

    <div aria-label="css3">
        <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="css3">
                <path id="Vector" d="M94.2 0L86.2 90L50 100L14 90L6 0H94.2Z" fill="#525252"/>
                <path id="Vector_2" d="M79.3 84.3L86.2 7.4H50.2V92.4L79.3 84.3Z" fill="#626262"/>
                <path id="Vector_3" d="M24.4 40.7L25.4 51.7H50.1V40.7H24.4Z" fill="#EBEBEB"/>
                <path id="Vector_4" d="M50.1 18.4H22.4L23.4 29.4H50.1V18.4Z" fill="#EBEBEB"/>
                <path id="Vector_5" d="M50.1 80.9V69.4L37.8 66.1L37 57.3H31H25.9L27.4 74.6L50.1 80.9Z" fill="#EBEBEB"/>
                <path id="Vector_6" d="M63.6 51.8L62.3 66.1L50 69.4V80.9L72.6 74.6L72.8 72.7L75.4 43.6L75.7 40.6L77.7 18.3H50V29.3H65.6L64.6 40.6H50V51.6H63.6V51.8Z" fill="white"/>
            </g>
        </svg>
        <div class="overlay">CSS</div>
    </div>

    <div aria-label="JavaScript">
        <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="js" clip-path="url(#clip0_790_8266)">
                <path id="Vector" d="M100 0H0V100H100V0Z" fill="#D1D1D1"/>
                <path id="Vector_2" d="M67.2 78.1C69.2 81.4 71.8 83.8 76.5 83.8C80.4 83.8 82.9 81.9 82.9 79.2C82.9 76 80.3 74.8 76.1 73L73.8 72C67 69.1 62.5 65.5 62.5 57.8C62.5 50.8 67.9 45.4 76.3 45.4C82.3 45.4 86.6 47.5 89.7 52.9L82.4 57.6C80.8 54.7 79.1 53.6 76.4 53.6C73.6 53.6 71.9 55.3 71.9 57.6C71.9 60.4 73.6 61.6 77.7 63.3L80 64.3C88 67.7 92.5 71.2 92.5 79.1C92.5 87.6 85.9 92.2 76.9 92.2C68.2 92.2 62.5 88 59.8 82.6L67.2 78.1ZM34 78.9C35.5 81.5 36.8 83.7 40 83.7C43.1 83.7 45 82.5 45 77.8V45.8H54.4V78C54.4 87.7 48.7 92.2 40.4 92.2C32.9 92.2 28.5 88.3 26.3 83.6L34 78.9Z" fill="black"/>
            </g>
            <defs>
                <clipPath id="clip0_790_8266">
                    <rect width="100" height="100" fill="white"/>
                </clipPath>
            </defs>
        </svg>
        <div class="overlay">JavaScript</div>
    </div>

    <div aria-label="PHP">
        <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="php">
            <path id="Vector" fill-rule="evenodd" clip-rule="evenodd" d="M50 75.7C77.6 75.7 100 64.4 100 50.4C100 36.4 77.6 25.1 50 25.1C22.4 25 0 36.3 0 50.3C0 64.3 22.4 75.7 50 75.7Z" fill="#818181"/>
            <path id="Vector_2" fill-rule="evenodd" clip-rule="evenodd" d="M60.1 58.5L62.6 45.7C63.2 42.8 62.7 40.7 61.2 39.3C59.8 38 57.3 37.3 53.8 37.3H49.5L50.7 31C50.7 30.9 50.7 30.8 50.7 30.6C50.7 30.5 50.6 30.4 50.5 30.3C50.4 30.2 50.3 30.1 50.2 30.1C50.1 30 50 30 49.9 30H44C43.6 30 43.3 30.3 43.2 30.7L40.6 44.3C40.4 42.8 39.8 41.5 38.8 40.4C37.1 38.4 34.3 37.4 30.6 37.4H19.1C18.7 37.4 18.4 37.7 18.3 38.1L13 65.5C13 65.7 13 66 13.2 66.2C13.4 66.4 13.6 66.5 13.8 66.5H19.8C20.2 66.5 20.5 66.2 20.6 65.8L21.9 59.2H26.3C28.6 59.2 30.6 58.9 32.1 58.4C33.7 57.9 35.1 57 36.4 55.8C37.4 54.9 38.3 53.8 38.9 52.7L37.8 58.2C37.8 58.4 37.8 58.7 38 58.9C38.2 59.1 38.4 59.2 38.6 59.2H44.5C44.9 59.2 45.2 58.9 45.3 58.5L48.2 43.4H52.3C54 43.4 54.5 43.7 54.7 43.9C54.8 44 55.1 44.5 54.8 46L52.4 58.1C52.4 58.2 52.4 58.3 52.4 58.5C52.4 58.6 52.5 58.7 52.6 58.8C52.7 58.9 52.8 59 52.9 59C53 59.1 53.1 59.1 53.2 59.1H59.2C59.4 59.1 59.6 59 59.7 58.9C60 58.9 60.1 58.7 60.1 58.5ZM32.6 48C32.2 49.9 31.5 51.3 30.5 52.1C29.5 52.9 27.8 53.3 25.6 53.3H23L24.9 43.4H28.3C30.8 43.4 31.8 43.9 32.2 44.4C32.9 45 33 46.2 32.6 48ZM85.1 40.4C83.4 38.4 80.6 37.4 76.9 37.4H65.4C65 37.4 64.7 37.7 64.6 38.1L59.3 65.5C59.3 65.7 59.3 66 59.5 66.2C59.7 66.4 59.9 66.5 60.1 66.5H66.1C66.5 66.5 66.8 66.2 66.9 65.8L68.2 59.2H72.6C74.9 59.2 76.9 58.9 78.4 58.4C80 57.9 81.4 57 82.7 55.8C83.8 54.8 84.6 53.7 85.3 52.6C86 51.4 86.4 50.1 86.7 48.7C87.4 45.2 86.9 42.4 85.1 40.4ZM79.3 48C78.9 49.9 78.2 51.3 77.2 52.1C76.2 52.9 74.5 53.3 72.3 53.3H69.7L71.6 43.4H75C77.5 43.4 78.5 43.9 78.9 44.4C79.5 45 79.6 46.2 79.3 48Z" fill="white"/>
            <path id="Vector_3" fill-rule="evenodd" clip-rule="evenodd" d="M28.2 42.5999C30.5 42.5999 32 42.9999 32.7 43.8999C33.5 44.6999 33.6 46.1999 33.2 48.1999C32.8 50.2999 32 51.7999 30.8 52.6999C29.6 53.5999 27.8 54.0999 25.4 54.0999H21.8L24 42.5999H28.2ZM13.6 65.6999H19.6L21 58.3999H26.1C28.4 58.3999 30.2 58.1999 31.7 57.6999C33.2 57.1999 34.5 56.3999 35.7 55.2999C36.7 54.3999 37.5 53.3999 38.1 52.2999C38.7 51.1999 39.2 49.9999 39.4 48.5999C40 45.2999 39.6 42.7999 38 40.9999C36.4 39.1999 33.9 38.2999 30.4 38.2999H19L13.6 65.6999ZM43.8 30.8999H49.7L48.3 38.1999H53.6C56.9 38.1999 59.2 38.7999 60.5 39.8999C61.8 41.0999 62.1 42.8999 61.6 45.4999L59.1 58.2999H53.1L55.5 46.1999C55.8 44.7999 55.7 43.8999 55.2 43.3999C54.7 42.8999 53.7 42.5999 52.2 42.5999H47.5L44.4 58.2999H38.5L43.8 30.8999ZM74.8 42.5999C77.1 42.5999 78.6 42.9999 79.3 43.8999C80.1 44.6999 80.2 46.1999 79.8 48.1999C79.4 50.2999 78.6 51.7999 77.4 52.6999C76.2 53.5999 74.4 54.0999 72 54.0999H68.4L70.6 42.5999H74.8ZM60.3 65.6999H66.3L67.7 58.3999H72.8C75.1 58.3999 76.9 58.1999 78.4 57.6999C79.9 57.1999 81.2 56.3999 82.4 55.2999C83.4 54.3999 84.2 53.3999 84.8 52.2999C85.4 51.1999 85.9 49.9999 86.1 48.5999C86.7 45.2999 86.3 42.7999 84.7 40.9999C83.1 39.1999 80.6 38.2999 77.1 38.2999H65.6L60.3 65.6999Z" fill="black"/>
            </g>
        </svg>
        <div class="overlay">PHP</div>
    </div>

    <div aria-label="Django">
        <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="django">
            <path id="Vector" d="M46.2 0H62.5V74.9C54.1 76.5 48 77.1 41.3 77.1C21.4 77.1 11 68.2 11 51C11 34.5 22 23.8 39.1 23.8C41.7 23.8 43.8 24 46.2 24.6V0ZM46.8 38.2C44.9 37.6 43.3 37.4 41.3 37.4C33 37.4 28.3 42.4 28.3 51.3C28.3 59.9 32.9 64.7 41.2 64.7C43 64.7 44.5 64.6 46.8 64.3V38.2Z" fill="#7E7E7E"/>
            <path id="Vector_2" d="M89.3 25.8V63.3C89.3 76.2 88.3 82.4 85.5 87.8C82.8 92.9 79.4 96.2 72.1 99.8L56.9 92.7C64.1 89.3 67.6 86.4 69.8 81.9C72.1 77.3 72.9 71.9 72.9 57.8V25.8H89.3ZM71.3 0H87.6V16.6H71.3V0Z" fill="#7E7E7E"/>
            </g>
        </svg>
        <div class="overlay">Django</div>
    </div>

</div>




    <section class="case-studies">
        <h1 class="title-block">PROJECTS</h1>
        <div class="card-block">
            <?php
            $db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbdatabase);
            if(!$db){
                exit("Error connecting to database");
            }
            $sql = "SELECT * FROM case_studies WHERE is_visible = 1 ORDER BY date_posted DESC";
            $result = mysqli_query($db, $sql);
            $numrow = mysqli_num_rows($result);
            
            while( $row = mysqli_fetch_assoc($result) ){
                echo "<a class='card' href='" . $config_basedir . "project.php?id=" . $row['id'] . "'>";
                    echo "<article>";
                        echo "<div class='img-wrapper'>";
                            echo "<img src='uploads/cover/" . $row['cover_image'] . "' alt='Cover image for " . $row['title'] . "' width='100%'>";
                        echo "</div>";
                        echo "<div class='detail'>";
                            echo "<h3 class='proj-title'>" . $row['title'] . "</h3>";
                            if($row['project_type'] == 'UI-UX'){
                                $tag = 'UI/UX';
                            } else if($row['project_type'] == 'Web'){
                                $tag = 'Web Development';
                            }
                            echo "<div class='tag'>" . $tag . "</div>";
                            echo "<p class='descr'>" . $row['description'] . "</p>";
                        echo "</div>";
                    echo "</article>";
                echo "</a>";
            }
            ?>
        </div>
    </section>


        <?php
            require('include/footer.php');
        ?>
        <script>
    const tools = document.querySelector('.tools');
    
    let isDown = false;
    let startX;
    let scrollLeft;

    tools.addEventListener('mousedown', (e) => {
        isDown = true;
        tools.classList.add('active');  // Optional: Add a class for visual feedback
        startX = e.pageX - tools.offsetLeft;
        scrollLeft = tools.scrollLeft;
    });

    tools.addEventListener('mouseleave', () => {
        isDown = false;
        tools.classList.remove('active');  // Optional: Remove visual feedback
    });

    tools.addEventListener('mouseup', () => {
        isDown = false;
        tools.classList.remove('active');
    });

    tools.addEventListener('mousemove', (e) => {
        if (!isDown) return;  // Stop the function if not clicking
        e.preventDefault();
        const x = e.pageX - tools.offsetLeft;
        const walk = (x - startX) * 2; // Multiply for faster scroll
        tools.scrollLeft = scrollLeft - walk;
    });
</script>
</body>
</html>