<?php


class Validator
{
    private $input;
    private $output;
    private $parameter;

    public function __construct(array $input)
    {
        $this->input= $input;
    }
    public function setParameter(string $parameter, bool $required = true, $defaultValue = null): Validator
    {
        $this->parameter = $parameter;
        if (isset($this->input[$parameter])) {
            $this->output = $this->input[$parameter];
        } else {
            if ($required) {
                $this->output = '';
                throw new Exception('Необходимо ввести значение');
            } else {
                $this->output = is_null($defaultValue)? null: $defaultValue;
            }
        }
        return $this;
    }

}

$x = (new Validator($_SERVER))->setParameter('PHP_SELF');
var_dump($x);