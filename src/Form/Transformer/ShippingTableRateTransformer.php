<?php

namespace Webgriffe\SyliusTableRateShippingPlugin\Form\Transformer;

use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Webgriffe\SyliusTableRateShippingPlugin\Entity\ShippingTableRate;

class ShippingTableRateTransformer implements DataTransformerInterface
{
    public function __construct(
        private RepositoryInterface $tableRateRepository,
    )
    {
    }

    public function transform(mixed $value): ?ShippingTableRate
    {
        return $this->tableRateRepository->findOneBy(['code' => $value]);
    }

    public function reverseTransform(mixed $value): string
    {
        if ($value instanceof ShippingTableRate) {
            return $value->getCode();
        }

        return '';
    }
}