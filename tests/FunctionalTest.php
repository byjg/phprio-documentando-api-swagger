<?php
/**
 * User: jg
 * Date: 09/08/17
 * Time: 23:03
 */

namespace Test;

/**
 * Create a TestCase inherited from SwaggerTestCase
 */
class MyTestCase extends \ByJG\Swagger\SwaggerTestCase
{
    protected $filePath = __DIR__ . '/../web/docs/swagger.json';

    /**
     * Test if the REST address /path/for/get/ID with the method GET returns what is
     * documented on the "swagger.json"
     */
    public function testGet()
    {
        $this->makeRequest('GET', "/person/1");
    }

    /**
     * Test if the REST address /path/for/get/NOTFOUND returns a status code 404.
     */
    public function testGetNotFound()
    {
        $this->makeRequest('GET', "/person/-2", 404);
    }

    /**
     * Test if the REST address /path/for/post/ID with the method POST
     * and the request object ['name'=>'new name', 'field' => 'value'] will return an object
     * as is documented in the "swagger.json" file
     */
    public function testPost()
    {
        $this->makeRequest(
            'POST',             // The method
            "/person",             // The path defined in the swagger.json
            200,           // The expected status code
            null,                 // The parameters 'in path'
            [
                'name'=>'new name',
                'age' => 30,
                'gender' => 'male',
                'id'=>50
            ]  // The request body
        );
    }

    /**
     * Test if the REST address /path/for/post/ID with the method POST
     * and the request object ['name'=>'new name', 'field' => 'value'] will return an object
     * as is documented in the "swagger.json" file
     *
     * @expectedException \ByJG\Swagger\Exception\NotMatchedException
     */
    public function testPostInvalidParam()
    {
        $this->makeRequest(
            'POST',             // The method
            "/person",             // The path defined in the swagger.json
            200,           // The expected status code
            null,                 // The parameters 'in path'
            [
                'name'=>'new name',
                'age' => 30,
                'gender' => 'male',
                'id'=>50,
                'birthday'=>'2009-01-01'
            ]  // The request body
        );
    }

    /**
     * Test if the REST address /another/path/for/post/{id} with the method POST
     * and the request object ['name'=>'new name', 'field' => 'value'] will return an object
     * as is documented in the "swagger.json" file
     *
     * @expectedException \ByJG\Swagger\Exception\NotMatchedException
     */
    public function testPostWithoutRequired()
    {
        $this->makeRequest(
            'POST',                                      // The method
            "/person",                         // The path defined in the swagger.json
            200,                                         // The expected status code
            null,                                        // The parameters 'in path'
            ['age' => 30, 'gender' => 'male', 'id'=>50]     // The request body
        );
    }
}
