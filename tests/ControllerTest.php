<?php

use CryptoPete\Frost\Adapter\Http\GuzzleAdapter;
use CryptoPete\Frost\Adapter\Settings\DotenvAdapter;
use CryptoPete\Frost\Exception\HttpException;
use CryptoPete\Frost\Exception\SettingsException;
use CryptoPete\Frost\Exception\SettingsNotFoundException;
use CryptoPete\Frost\FrostController;
use Dotenv\Dotenv;
use GuzzleHttp\Client;
use Mockery as m;

class ControllerTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    protected function getSettingsMock()
    {
        return m::mock(Dotenv::class)
            ->shouldReceive('load')
            ->shouldReceive('apiKey')
            ->andReturn('cryptoisawesome')
            ->getMock();
    }

    protected function getPsrValidResponse()
    {
        return m::mock(\GuzzleHttp\Psr7\Response::class)
            ->shouldReceive('getBody')
            ->andReturn('{"success":true}')
            ->getMock();
    }

    public function testFetchApi()
    {
        $settings = m::mock(Dotenv::class)
            ->shouldReceive('load')
            ->getMock();

        $http = m::mock(Client::class);
        $api = new FrostController(new DotenvAdapter($settings), new GuzzleAdapter($http));

        $this->assertInstanceOf(FrostController::class, $api);
    }

    public function testCreateApi()
    {
        $settings = $this->getSettingsMock();
        $http = m::mock(Client::class)
            ->shouldReceive('post')
            ->andReturn($this->getPsrValidResponse())
            ->getMock();

        $api = new FrostController(new DotenvAdapter($settings), new GuzzleAdapter($http));
        $result = $api->createWork(['stuff', 'of', 'things']);

        $this->assertInternalType('array', $result);
    }

    public function testGetWorks()
    {
        $settings = $this->getSettingsMock();
        $http = m::mock(Client::class)
            ->shouldReceive('get')
            ->andReturn($this->getPsrValidResponse())
            ->getMock();

        $api = new FrostController(new DotenvAdapter($settings), new GuzzleAdapter($http));
        $result = $api->getWorkById(1);

        $this->assertInternalType('array', $result);

        $result = $api->getWorks();
        $this->assertInternalType('array', $result);
    }

    /**
     * @expectedException CryptoPete\Frost\Exception\HttpException
     */
    public function testHttpGetException()
    {
        $settings = $this->getSettingsMock();
        $http = m::mock(Client::class)
            ->shouldReceive('get')
            ->andThrow(new HttpException('cant connect to mothership'))
            ->getMock();

        $api = new FrostController(new DotenvAdapter($settings), new GuzzleAdapter($http));
        $response = $api->getWorkById(1);
    }

    /**
     * @expectedException CryptoPete\Frost\Exception\HttpException
     */
    public function testHttpPostException()
    {
        $settings = $this->getSettingsMock();
        $http = m::mock(Client::class)
            ->shouldReceive('post')
            ->andThrow(new HttpException('cant connect to mothership'))
            ->getMock();

        $api = new FrostController(new DotenvAdapter($settings), new GuzzleAdapter($http));
        $api->createWork([]);
    }

    /**
     * @expectedException CryptoPete\Frost\Exception\SettingsNotFoundException
     */
    public function testSettingsPathException()
    {
        $settings = m::mock(Dotenv::class)
            ->shouldReceive('load')
            ->andThrow(new \Dotenv\Exception\InvalidPathException)
            ->getMock();

        $http = m::mock(Client::class);

        $api = new FrostController(new DotenvAdapter($settings), new GuzzleAdapter($http));
    }

    /**
     * @expectedException CryptoPete\Frost\Exception\SettingsException
     */
    public function testSettingsException()
    {
        $settings = m::mock(Dotenv::class)
            ->shouldReceive('load')
            ->andThrow(new \Exception)
            ->getMock();

        $http = m::mock(Client::class);

        $api = new FrostController(new DotenvAdapter($settings), new GuzzleAdapter($http));
    }
}
