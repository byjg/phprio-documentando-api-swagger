<?php

namespace Exemplo\Model;

/**
 * Classe contendo os nomes de usuário
 *
 * @package Example\Model
 * @SWG\Definition(required={"name"}, type="object", @SWG\Xml(name="Name"))
 */
class Name
{
    /**
     * @SWG\Property()
     * @var integer
     */
    protected $id;

    /**
     * @SWG\Property()
     * @var string
     */
    protected $name;

    /**
     * @SWG\Property(enum={"male", "female"})
     * @var string
     */
    protected $gender;

    /**
     * @SWG\Property()
     * @var integer
     */
    protected $age;

    /**
     * Name constructor.
     *
     * @param string $name
     * @param string $gender
     * @param int $age
     */
    public function __construct($id, $name, $gender, $age)
    {
        $this->id = $id;
        $this->name = $name;
        $this->gender = $gender;
        $this->age = $age;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $idName
     */
    public function setId(int $idName)
    {
        $this->id = $idName;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age)
    {
        $this->age = $age;
    }
}
