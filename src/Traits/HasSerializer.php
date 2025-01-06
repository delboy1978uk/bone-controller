<?php

declare(strict_types=1);

namespace Bone\Controller\Traits;

use JMS\Serializer\Serializer;

trait HasSerializer
{
    private Serializer $serializer;

    public function getSerializer(): Serializer
    {
        return $this->serializer;
    }

    public function setSerializer(Serializer $serializer): void
    {
        $this->serializer = $serializer;
    }

    public function serialize(mixed $data, string $format): array
    {
        return $this->serializer->serialize($data, $format);
    }
}
