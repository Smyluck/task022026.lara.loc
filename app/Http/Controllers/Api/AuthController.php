<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
         try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $user = User::where('email', $credentials['email'])->first();

            if (! $user || ! Hash::check($credentials['password'], $user->password)) {
                return response()->json([
                    'success' => false,
                    'error' => 'Неверные учетные данные',
                    'message' => 'Неверные учетные данные',
                ], Response::HTTP_UNAUTHORIZED);
            }

            $user->tokens()->delete();
            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
                'success' => true,
                'token' => $token,
            ], Response::HTTP_OK);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка валидации',
                'errors' => $e->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ошибка сервера',
                'error' => config('app.debug') ? $e->getMessage() : null,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
