<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureUser2IsAuthenticated
{
public function handle($request, Closure $next)
{
if (!Auth::guard('users2')->check()) {
// Redirect to login or somewhere else if the user is not authenticated
return redirect('/');
}

return $next($request);
}
}
