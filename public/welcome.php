<div style="border-top: 5px solid #EEE;">
    <h2>Nice</h2>
    <p>
        It seems Snow is running as it should. Currently you are on the default home page.<br>
        You can modify this by editing the function <code>get_main()</code> in
        <code><?php echo ROOT . 'requests' . DS . 'index.php'; ?></code>
    </p>
    <p>
        The header of this page is called from <code><?php echo SNOW_DIR; ?>controller.php</code>, function <code>ante_router()</code><br>
        The footer is called from the same file, function <code>post_router()</code>.
    </p>
    <p>
        The views are located in <code><?php echo ROOT . 'public' . DS ?></code>.
    </p>
<br>
    <h2>Code away</h2>
    <p>
        You can find the documentation on Github, over <a href="https://github.com/infyhr/snow/wiki">here</a>.<br>
        Start by modifying the <code>Index</code> request in <code><?php echo ROOT . 'requests' . DS . 'index.php'; ?></code>.
    </p>
</div>
