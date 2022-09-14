<?php

namespace Junisan\GoogleChat\UIElements;

class Icon
{
    public const ICONS = [
        "AIRPLANE",
        "BOOKMARK",
        "BUS",
        "CAR",
        "CLOCK",
        "CONFIRMATION_NUMBER_ICON",
        "DESCRIPTION",
        "DOLLAR",
        "EMAIL",
        "EVENT_SEAT",
        "FLIGHT_ARRIVAL",
        "FLIGHT_DEPARTURE",
        "HOTEL",
        "HOTEL_ROOM_TYPE",
        "INVITE",
        "MAP_PIN",
        "MEMBERSHIP",
        "MULTIPLE_PEOPLE",
        "PERSON",
        "PHONE",
        "RESTAURANT_ICON",
        "SHOPPING_CART",
        "STAR",
        "STORE",
        "TICKET",
        "TRAIN",
        "VIDEO_CAMERA",
        "VIDEO_PLAY"
    ];
    private string $icon;

    public static function isValidIcon(string $icon): bool
    {
        $icon = strtoupper($icon);
        return in_array($icon, static::ICONS);
    }

    public function __construct(string $icon)
    {
        $icon = strtoupper($icon);

        if (!static::isValidIcon($icon)) {
            throw new \LogicException('Invalid icon');
        }

        $this->icon = $icon;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

}
