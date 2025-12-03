# Payment Strategy API (Laravel)

## Résumé

Payment Strategy est une API backend développée en **PHP Laravel** pour gérer des paiements via différentes méthodes.  
L’objectif est de permettre à un utilisateur de choisir entre **Stripe, PayPal ou CMI** pour effectuer un paiement.  
Le projet utilise le **pattern Strategy + Factory**, ce qui permet d’ajouter facilement de nouvelles méthodes de paiement.

---

## Installation

1. Cloner le projet :

```bash
git clone <URL_DU_REPO>
cd payment-strategy
composer install
cp .env.example .env
php artisan migrate
php artisan serve
```

L’API sera disponible sur : http://127.0.0.1:8000

## Endpoint principal :
POST /api/pay

Permet de réaliser un paiement avec la méthode choisie.

Body JSON :

{
"amount": 500,
"method": "stripe"
}

amount : Montant du paiement (nombre)
method : Méthode de paiement (stripe, paypal, cmi)

Réponse réussie (200 OK)

{
"message": "Paiement de 500 MAD via Stripe réussi.",
"payment": {
"id": 1,
"method": "stripe",
"amount": "500.00",
"status": "success",
"created_at": "...",
"updated_at": "..."
}
}

Réponse en cas d’erreur (400 Bad Request)

{
"message": "Payment failed: Méthode de paiement invalide"
}
# Payment-Strategy
