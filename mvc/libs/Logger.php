<?php

    class Logger
{
    protected static $log_file;
    protected static $file;
    protected static $options = [
        'dateFormat' => 'd-M-Y',
        'logFormat' => 'H:i:s d-M-Y'
    ];
    private static $instance;

    public function createLogFile()
    {
        $time = date(self::$options['dateFormat']);
        self::$log_file = __DIR__ . "/logs/log.txt";

        if (!file_exists(__DIR__ . '/logs')) {
            mkdir(__DIR__ . '/logs', 0755, true);
        }

    }

    public function setOptions($options = [])
    {
        self::$options = array_merge(self::$options, $options);
    }


    public function info($message, array $context = [])
    {
        $bt = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1);

        self::writeLog([
            'message' => $message,
            'bt' => $bt,
            'severity' => 'INFO',
            'context' => $context
        ]);
    }

    public function notice($message, array $context = [])
    {
        $bt = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1);

        self::writeLog([
            'message' => $message,
            'bt' => $bt,
            'severity' => 'NOTICE',
            'context' => $context
        ]);
    }

    public function debug($message, array $context = [])
    {
        $bt = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1);

        self::writeLog([
            'message' => $message,
            'bt' => $bt,
            'severity' => 'DEBUG',
            'context' => $context
        ]);
    }

    public function warning($message, array $context = [])
    {
        $bt = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1);

        self::writeLog([
            'message' => $message,
            'bt' => $bt,
            'severity' => 'WARNING',
            'context' => $context
        ]);
    }

    public function error($message, array $context = [])
    {
        $bt = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1);

        self::writeLog([
            'message' => $message,
            'bt' => $bt,
            'severity' => 'ERROR',
            'context' => $context
        ]);
    }

    public function fatal($message, array $context = [])
    {
        $bt = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1);

        self::writeLog([
            'message' => $message,
            'bt' => $bt,
            'severity' => 'FATAL',
            'context' => $context
        ]);
    }

    public function writeLog($args = [])
    {
        self::createLogFile();

        if (!is_resource(self::$file)) {
            self::openLog();
        }

        $time = date(self::$options['logFormat']);
        $context = json_encode($args['context']);
        $caller = array_shift($args['bt']);
        $btLine = $caller['line'];
        $btPath = $caller['file'];
        $path = self::absToRelPath($btPath);
        $timeLog = is_null($time) ? "[N/A] " : "[{$time}] ";
        $pathLog = is_null($path) ? "[N/A] " : "[{$path}] ";
        $lineLog = is_null($btLine) ? "[N/A] " : "[{$btLine}] ";
        $severityLog = is_null($args['severity']) ? "[N/A]" : "[{$args['severity']}]";
        $messageLog = is_null($args['message']) ? "N/A" : "{$args['message']}";
        $contextLog = empty($args['context']) ? "" : "{$context}";

        fwrite(self::$file, "{$timeLog}{$pathLog}{$lineLog}: {$severityLog} - {$messageLog} {$contextLog}" . PHP_EOL);
        self::closeFile();
    }

    private function openLog()
    {
        $openFile = self::$log_file;
        self::$file = fopen($openFile, 'a') or exit("Can't open $openFile!");
    }

    public function closeFile()
    {
        if (self::$file) {
            fclose(self::$file);
        }
    }

    public function absToRelPath($pathToConvert)
    {
        $pathAbs = str_replace(['/', '\\'], '/', $pathToConvert);
        $documentRoot = str_replace(['/', '\\'], '/', $_SERVER['DOCUMENT_ROOT']);
        return $_SERVER['SERVER_NAME'] . str_replace($documentRoot, '', $pathAbs);
    }

    public  function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __destruct()
    {
    }
}
