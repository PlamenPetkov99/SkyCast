<?php

namespace App\Trait;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\Service\Attribute\Required;

trait Parser
{
    private readonly DenormalizerInterface $denormalizer;
    private readonly SerializerInterface $serializer;
    #[Required]
    public function setSerializer(SerializerInterface $serializer): void
    {
        $this->serializer = $serializer;
    }

    #[Required]
    public function setDenormalizer(DenormalizerInterface $denormalizer): void
    {
        $this->denormalizer = $denormalizer;
    }

    public function parseFromJson
    (
        string $jsonInput,
        string $to,
    )
    {
        return $this->serializer->deserialize($jsonInput, $to, 'json');
    }

    public function parseFromArray
    (
        array $arrayInput,
        string $to
    )
    {
        return $this->denormalizer->denormalize($arrayInput, $to,'array');
    }


}
