<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckProductAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        // Перевірка заголовка при створенні товару
        if (
            $request->isMethod('post') &&
            ! $request->hasHeader('X-App-Client')
        ) {
            return response()->json([
                'status' => 'access_denied',
                'message' => 'Доступ заборонено: відсутній заголовок X-App-Client.',
            ], 403);
        }

        // Передача запиту наступному обробнику
        $response = $next($request);

        // Додавання службового заголовка до відповіді
        $response->headers->set(
            'X-Security-Policy',
            'Enforced'
        );

        return $response;
    }
}
