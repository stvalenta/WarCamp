<?php

class Kalkulacka
{
    public function __construct(private MojeVypocetniRozhrani $rozhrani)
    {
    }

    public function secti($a, $b)
    {
        return $this->rozhrani->secti($a, $b);
    }

    public function odecti($a, $b)
    {
        return $this->rozhrani->odecti($a, $b);
    }


}