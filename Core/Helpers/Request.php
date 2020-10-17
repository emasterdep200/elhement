<?php 
/**
 * Manejador de peticiones REST por parte del 
 * usuario.
 */

namespace Core\Helpers;

class Request
{
	const METHOD_GET = 'GET';
	const METHOD_POST = 'POST';
	const METHOD_PUT = 'PUT';
	const METHOD_DELETE = 'DELETE';
	const CONTENT_TYPE_HTML = 'text/html';
	const CONTENT_TYPE_JSON = 'application/json';
	const CONTENT_TYPE_FORM_URL_ENCODED ='application/x-www-form-urlencoded';
	const HEADER_CONTENT_TYPE = 'Content-Type';
	const TRANSPORT_HTTP = 'http';
	const TRANSPORT_HTTPS = 'https';
	const STATUS_200 = '200';
	const STATUS_401 = '401';
	const STATUS_500 = '500';

	//propiedades para manejo de las peticiones
	protected $data = array();
	protected $uri;
	protected $method;
	protected $headers;
	protected $cookies;
	protected $metaData;
	protected $transport;

		
	function __construct(argument)
	{
		# code...
	}

	public function setData($data)
	{
		$this->data[] = $data; //falta hacer la hidratacion
	}

	public function setUri($uri)
	{
		$this->uri = $uri;
	}

	public function setMethod($method)
	{
		$this->method = $method;
	}

	public function setHeader($header)
	{
		$this->headers = $header;
	}

	public function setCookies($cookies)
	{
		$this->cookies = $cookies;
	}

	public function setMetadata($metadata)
	{
		$this->metaData = $metadata;
	}

	public function setTransport($transport)
	{
		$this->transport = $transport;
	}

}