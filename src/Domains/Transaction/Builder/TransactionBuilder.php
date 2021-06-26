<?php

namespace App\Domains\Transaction\Builder;

use App\Domains\Transaction\Entity\Transaction;

class TransactionBuilder
{
    public function createDefaultFromData(array $data): Transaction
    {
        return $this->buildEntityFromData(new Transaction(), $data);
    }

    public function updateDefaultFromData(Transaction $transaction, array $data): Transaction
    {
        return $this->buildEntityFromData($transaction, $data);
    }

    public function buildEntityFromData(Transaction $transaction, array $data): Transaction
    {
        if (\array_key_exists('reference', $data) && !empty($data['reference'])) {
            $transaction->setReference($data['reference']);
        }

        if (\array_key_exists('isActive', $data)) {
            $transaction->setActive($data['isActive']);
        }

        $transaction->setCreatedAt();

        return $transaction;
    }
}
