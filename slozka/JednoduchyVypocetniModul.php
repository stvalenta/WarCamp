<?php

class JednoduchyVypocetniModul implements MojeVypocetniRozhrani
{

    public function secti($a, $b)
    {
        return $a + $b;
    }

    public function odecti($a, $b)
    {
        return $a - $b;
    }
}