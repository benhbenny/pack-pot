<?php


namespace App\Pack\Domain\Transformer;

use App\Domain\Models\LotteryDraw;
use League\Fractal\TransformerAbstract;

class LotteryDrawTransformer extends TransformerAbstract
{
    public function transform(LotteryDraw $lotteryDraw)
    {
        return [
            'id' => $lotteryDraw->getId(),
            'code' => $lotteryDraw->getCode(),
            'order' => $lotteryDraw->getOrder()
        ];
    }
}