<?php
namespace Snow\Lib;

if(!defined('SNOW')) { die('Cannot access directly!'); }

Class Debug {

    public static $var          = array();
    public static $stack        = array();
    public static $void_time    = 0;

    public static function handle_error($errno, $errstr, $errfile, $errline) {
        if(\Setup::DEBUG) {
            switch($errno) {
                case 4:
                    $errno = 'E_PARSE';
                break;
                case 1:
                    $errno = 'E_ERROR';
                break;
                case 2:
                    $errno = 'E_WARNING';
                break;
                case 8:
                    $errno = 'E_NOTICE';
                break;
                case 256:
                    $errno = 'E_USER_ERROR';
                break;
                case 512:
                    $errno = 'E_USER_WARNING';
                break;
                case 1024:
                    $errno = 'E_USER_NOTICE';
                break;
                case 2048:
                    $errno = 'E_STRICT';
                break;
                case 8192:
                    $errno = 'E_DEPRECATED';
                break;
                default:
                    $errno = 'Unknown.';
                break;
            }

            echo '<div class="panel panel-danger">';
            echo '<div class="panel-heading"><h3 class="panel-title">Error</h3></div><div class="panel-body">';
            echo '<strong>Type:</strong> ' . $errno . ' <br>';
            echo '<strong>Message:</strong> ' . ucfirst($errstr) . ' <br>';
            echo '<strong>File:</strong> ' . $errfile . ' <br>';
            echo '<strong>Line:</strong> ' . $errline . ' <br><br><ul><pre>';

            $fp = fopen($errfile, 'rb');
            if(!$fp) { echo 'Unable to inspect the source code.'; }

            $lines_a = explode("\n", fread($fp, filesize($errfile)));
            $lines   = count($lines_a);

            $start = $errline - 3;
            if($start <= 0) { $start = 1; }

            $end   = $errline + 1;
            $out   = '';
            while($start <= $end) {
                if(array_key_exists($start, $lines_a)) {
                    $out .= ($start+1 == $errline) ? $errline : $start+1;
                    $out .= '. ' . $lines_a[$start] . "\n";
                }else {
                    $out .= '~';
                }
                $start = $start+1;
            }

            echo $out;

            echo '</pre></ul></div>';
            echo '</div>';
        }
    }

    public static function shutdown() {
        $last_error = error_get_last();
        // This is fatal...
        #var_dump($last_error);
    }

    public static function handle_tick() {
        self::$void_time = microtime(true);
        #$delta = round((microtime(true) - self::$void_time)*1000);

        $backtrace = debug_backtrace();
        if(count($backtrace) < 1) { return; }

        $frame = $backtrace[1];
        unset($backtrace); # free up some memory

        $function = $frame['function'];
        $line     = $frame['line'];
        $file     = $frame['file'];

        if(!array_key_exists($function, self::$stack)) {
            #array_push(self::$stack, $function);
            self::$stack[$function]['function'] = $function;
            self::$stack[$function]['file']     = $file;
            self::$stack[$function]['line']     = $line;
            self::$stack[$function]['calls']    = 0;
            self::$stack[$function]['time']     = ((microtime(true)-self::$void_time)*1000);
        }else {
            #self::$stack[$function]['calls']--;
            self::$stack[$function]['calls']++;
        }

        self::$void_time = microtime(true);
    }

    public static function debug_info() {
        $return = array();

        $return['time_taken']   = round((microtime(1)-SNOW_START)*1000, 2);
        $return['memory_usage'] = (memory_get_usage()%1000);

        return $return;
    }
    // Nemoj zaboravit na error_log()!
}
