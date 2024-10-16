<?php
if( strtolower(basename($_SERVER['PHP_SELF'])) != 'contact.php'){
?>
<aside>
    <a class="cta" href="<?php echo $config_basedir . "contact.php" ?>">Let's Connect</a>
</aside>
<?php
}
?>
<footer>
           
            <!-- <a class="cta" href="#"><strong>opesam42@gmail.com</strong><span class="copy">copy</span></a> -->
            <section class="main">
                <nav class="social">
                    <a href="https://github.com/opesam42" target="blank"><i class="fa fa-regular fa-github"></i> Github</a>
                    <a href="https://www.behance.net/gbengaopeyemi" target="blank"><i class="fa fa-regular fa-behance"></i> Behance</a>
                    <a href="https://linkedin.com/in/opeyemi-oluwagbemiga-2ba61423b" target="blank"><i class="fa fa-regular fa-linkedin"></i> LinkedIn</a>
                </nav>
                <div>
                    &copy; Gbenga Opeyemi 2024
                </div>
            </section>
        </footer>


    <script src="<?php echo $config_basedir; ?>scripts/script.js"  type="text/javascript"></script>
</body>
</html>