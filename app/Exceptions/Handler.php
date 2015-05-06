<?php namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler {

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        'Symfony\Component\HttpKernel\Exception\HttpException'
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($this->isHttpException($e))
        {
            return $this->renderHttpException($e);
        }


        if (config('app.debug'))
        {
            return $this->renderExceptionWithWhoops($e);
        }

        return parent::render($request, $e);
    }

    /**
     * Render an exception using Whoops.
     *
     * @param  \Exception $e
     * @return \Illuminate\Http\Response
     */
    protected function renderExceptionWithWhoops(Exception $e)
    {
        $whoops = new \Whoops\Run;

        $handler = new \Whoops\Handler\PrettyPageHandler();

        $translations = array('^' . __DIR__ => '~/Development/PhpStormOpener');

        $handler->setEditor(
            function ($file, $line) use ($translations) {

                foreach ($translations as $from => $to) {
                    $file = preg_replace('#' . $from . '#', $to, $file, 1);
                }

                // return "pstorm://$file:$line"; // old way
                return "phpstorm://open?file=$file&line=$line"; // as of PhpStorm 8 EAP 138.190+, without my app
                // "idea://open?file=$file&line=$line"; // alternative way, as of PhpStorm 8 EAP 138.190+, without my app

            }
        );

        $whoops->pushHandler($handler);

        return new \Illuminate\Http\Response(
            $whoops->handleException($e),
            $e->getStatusCode(),
            $e->getHeaders()
        );
    }

}