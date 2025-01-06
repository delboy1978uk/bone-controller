<?php

declare(strict_types=1);

namespace Bone\Controller;

use JMS\Serializer\Serializer;

interface SerializerAwareInterface
{
    public function getSerializer(): Serializer;
    public function setSerializer(Serializer $serializer): void;
    public function serialize(mixed $data, string $format): array;
}
