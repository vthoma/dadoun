<?php

namespace App\Http\Enums;

use Spatie\Enum\Enum;

/**
 * @method static self tesla()
 * @method static self weekend()
 * @method static self ps5()
 * @method static self gamer_pc()
 * @method static self card_game()
 */

class PrizeEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'tesla' => 1,
            'weekend' => 9,
            'ps5' => 10,
            'gamer_pc' => 30,
            'card_game' => 50,
        ];
    }

    static function getPrize(): PrizeEnum {
        $totalProbability = array_sum(PrizeEnum::values());

        // transform array keys to numeric array
        $prizes = array_values(PrizeEnum::toArray());
        $randomNumber = mt_rand(1, $totalProbability);

        $currentProbability = 0;
        // iterate over prizes and check if random number is in range and return prize
        foreach (PrizeEnum::cases() as $lot => $probability) {
            $currentProbability += $probability->value;
            if ($randomNumber <= $currentProbability) {
                return PrizeEnum::from($prizes[$lot]);
            }
        }
    }

}
