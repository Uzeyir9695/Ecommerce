<?php

function price(int $price, int $discount=0)
{
    return $price - ($price*$discount/100);
}
