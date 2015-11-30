<?php namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Request;
use Symfony\Component\Debug\ExceptionHandler as SymfonyDisplayer;
use Illuminate\Support\Facades\Auth;

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
		return parent::render($request, $e);
	}

    /**
     * Render the given HttpException.
     *
     * @param  \Symfony\Component\HttpKernel\Exception\HttpException  $e
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function renderHttpException(HttpException $e)
    {
        $status = $e->getStatusCode();

        $prefix = '';
        if (Request::segment(1) == 'admin' and Auth::check())
        {
            $prefix = 'admin.';
        }

        // Проверяем, не было ли перехода с зеркального сайта. Если был - переходим на главную.
        if ($status == '404' && $prefix != 'admin.' && Request::get('from_second') == 1) {
            return redirect()->action('Marketing\MainController@index');
        }

        if (view()->exists($prefix."errors.{$status}"))
        {
            return response()->view("$prefix.errors.{$status}", [], $status);
        }
        else
        {
            return (new SymfonyDisplayer(config('app.debug')))->createResponse($e);
        }
    }

}
