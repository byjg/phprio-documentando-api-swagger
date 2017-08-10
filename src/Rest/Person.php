<?php

namespace Exemplo\Rest;

use ByJG\RestServer\Exception\Error404Exception;
use ByJG\RestServer\ServiceAbstract;
use ByJG\Serializer\BinderObject;
use Exemplo\Helper;
use Exemplo\Model\Name;

class Person extends ServiceAbstract
{
    /**
     * Gets an Person Name by Id.
     *
     * @SWG\Get(
     *     path="/person/{id}",
     *     operationId="get",
     *     tags={"rest"},
     *     @SWG\Parameter(
     *         name="id",
     *         in="path",
     *         description="The object Id",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="The object",
     *         @SWG\Schema(ref="#/definitions/Name")
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Não autorizado",
     *         @SWG\Schema(ref="#/definitions/error")
     *     ),
     *     @SWG\Response(
     *         response=404,
     *         description="Não encontrado",
     *         @SWG\Schema(ref="#/definitions/error")
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Erro Geral",
     *         @SWG\Schema(ref="#/definitions/error")
     *     )
     * )
     */
    public function get()
    {
        $idPerson = $this->getRequest()->get('id');
        if (intval($idPerson) <= 0) {
            throw new Error404Exception('Id não encontrado');
        }

        $person = new Name($idPerson, "Fulano", 'male', 40);

        $this->response->write($person);
    }


    /**
     * Update the Person Name object
     *
     * @SWG\Post(
     *     path="/person",
     *     operationId="post",
     *     tags={"rest"},
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="The object",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/Name")
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="The object",
     *         @SWG\Schema(
     *            @SWG\Property(property="id", type="integer")
     *         )
     *     ),
     *     @SWG\Response(
     *         response=401,
     *         description="Não autorizado",
     *         @SWG\Schema(ref="#/definitions/error")
     *     ),
     *     @SWG\Response(
     *         response=404,
     *         description="Não encontrado",
     *         @SWG\Schema(ref="#/definitions/error")
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Erro Geral",
     *         @SWG\Schema(ref="#/definitions/error")
     *     )
     * )
     */
    public function post()
    {
        $payload = json_decode($this->request->payload(), true);
        //Helper::validateRequest('/person', 'POST', $payload);
        $this->response->write(["id"=>$payload['id']]);
    }
}
