        </div><!-- /.container -->
    <div id="footer" style="border-top: 5px solid #EEE;margin-top: 20px;">
        <table class="table table-striped table-bordered">
            <colgroup>
              <col class="col-lg-1">
              <col class="col-lg-7">
            </colgroup>
            <tbody>
                <tr>
                    <td>Execution time</td>
                    <td><?php echo $info['time_taken']; ?> miliseconds (ms)</td>
                </tr>
                <tr>
                    <td>Memory usage</td>
                    <td><?php echo $info['memory_usage']; ?> kilobytes (kB)</td>
                </tr>
                <tr>
                    <td>Last error</td>
                    <td><?php var_dump(error_get_last()); ?></td>
                </tr>
                <tr>
                    <td><a href="#" onclick="v('get');">$_GET</a></td>
                    <td><pre id="get" style="display: none;"><?php var_dump($_GET); ?></pre></td>
                </tr>
                <tr>
                    <td><a href="#" onclick="v('post');">$_POST</a></td>
                    <td><pre id="post" style="display: none;"><?php var_dump($_POST); ?></pre></td>
                </tr>
                <tr>
                    <td><a href="#" onclick="v('cookie');">$_COOKIE</a></td>
                    <td><pre id="cookie" style="display: none;"><?php var_dump($_COOKIE); ?></pre></td>
                </tr>
                <tr>
                    <td><a href="#" onclick="v('server');">$_SERVER</a></td>
                    <td><pre id="server" style="display: none;"><?php var_dump($_SERVER); ?></pre></td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        function v(id) {
            var e = document.getElementById(id);
            if(e.style.display == 'block')
                e.style.display = 'none';
            else
                e.style.display = 'block';
        }
    </script>
  </body>
</html>
