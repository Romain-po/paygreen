<?php

namespace App\Domains\Transaction\Controller;

use App\Domains\Transaction\Builder\TransactionBuilder;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostTransactionController extends AbstractController
{
    private TransactionBuilder $transactionBuilder;
    private EntityManagerInterface $entityManager;

    public function __construct(TransactionBuilder $transactionBuilder, EntityManagerInterface $entityManager)
    {
        $this->transactionBuilder = $transactionBuilder;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="create", methods={"POST"})
     * @IsGranted("ROLE_USER", statusCode=401, message="Unauthorized")
     */
    public function __invoke(Request $request): JsonResponse
    {
        $transactionData = json_decode($request->getContent(), true) ?? [];
        $transaction = $this->transactionBuilder->createDefaultFromData($transactionData);

        $this->entityManager->persist($transaction);
        $this->entityManager->flush();

        return $this->json($transaction, Response::HTTP_CREATED, [], ['groups' => ['transaction_list']]);
    }
}
